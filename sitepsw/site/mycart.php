<?php
require 'product.php';
require 'cart.php';
require_once('conexao.php');

$retorno = $conexao->prepare('SELECT * FROM produto');

$retorno->execute();

session_start();

$cart = new Cart;
$productsInCart = $cart->getCart();

if (isset($_GET['remove'])) {
    $id = strip_tags($_GET['remove']);
    $cart->remove($id);
    header('Location: mycart.php');
    exit;
}

if (isset($_GET['update'])) {
    $id = strip_tags($_GET['update']);
    $qty = strip_tags($_GET['qty']);
    $cart->updateQty($id, $qty);
    header('Location: mycart.php');
    exit;
}

date_default_timezone_set('America/Bahia');

// Inserção da venda na tabela
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $cpf_cliente = $_POST['cpf_cliente'];
    $data_venda = date('Y-m-d');
    $hora_venda = date('H:i:s');

    $sqlVenda = "INSERT INTO venda (cpf_cliente, data_venda, hora_venda) VALUES (:cpf_cliente, :data_venda, :hora_venda)";
    $stmtVenda = $conexao->prepare($sqlVenda);
    $stmtVenda->bindParam(':cpf_cliente', $cpf_cliente, PDO::PARAM_INT);
    $stmtVenda->bindParam(':data_venda', $data_venda, PDO::PARAM_STR);
    $stmtVenda->bindParam(':hora_venda', $hora_venda, PDO::PARAM_STR);

    if ($stmtVenda->execute()) {
        $id_venda = $conexao->lastInsertId();

        foreach ($productsInCart as $product) {
            $id_produto = $product->getId();
            $quantidade = $product->getQuantity();

            $sqlVendaProduto = "INSERT INTO venda_produto (id_venda, id_produto, quantidade) VALUES (:id_venda, :id_produto, :quantidade)";
            $stmtVendaProduto = $conexao->prepare($sqlVendaProduto);
            $stmtVendaProduto->bindParam(':id_venda', $id_venda, PDO::PARAM_INT);
            $stmtVendaProduto->bindParam(':id_produto', $id_produto, PDO::PARAM_INT); 
            $stmtVendaProduto->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
            $stmtVendaProduto->execute();

        }

        // Limpar o carrinho após a venda
        $cart->clear();

        // Redirecionar para a página da tabela de vendas
        header('Location: ../vendas/tabelavenda.php');
        exit;
    } else {
        echo "Erro ao registrar a venda.";
    }
}

// Recuperar a lista de clientes para seleção
$sqlClientes = "SELECT cpf_cliente, cpf_cliente FROM cliente";
$stmtClientes = $conexao->prepare($sqlClientes);
$stmtClientes->execute();
$clientes = $stmtClientes->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Carrinho</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
<header>
<header id="cabeçalho">
        <div class="conteudo">

          <div class="cabeca"><a href="index.php"><img class="logo" src="../imgs/logob.png" alt="logo-agrocampo" width="100px">
        </div>
            <div class="menus">
                <a href="../index.php"></a>
            </div>
</header>
    <main id="corpo">
<div class="conteudo-for">

<?php         
    echo "<button class='butao2'><a href='../index.php'>Voltar</a></button>";
?>

<ul class="form">
    <?php if (count($productsInCart) <= 0) : ?>
        <li>Nenhum produto no carrinho</li>
    <?php else: ?>
        <?php foreach ($productsInCart as $product) : ?>
            <li class="tilt">
                <p><?php echo htmlspecialchars($product->getName()); ?></p>
                <form action="" method="get">
                    <input type="hidden" name="update" value="<?php echo $product->getId(); ?>">
                    <input type="number" name="qty" value="<?php echo $product->getQuantity() ?>" min="1">
                    <input class="update" type="submit" value="Atualizar">
                </form>
                <p>Preço: R$ <?php echo number_format($product->getPrice(), 2, ',', '.') ?> </p>
                <p>Subtotal: R$ <?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.') ?></p>
                <a class="remove" href="?remove=<?php echo $product->getId(); ?>">Remover</a>
            </li>
        <?php endforeach; ?>
    <?php endif; ?>
    <li class="total">Total: R$ <?php echo number_format($cart->getTotal(), 2, ',', '.'); ?></li>
</ul>

<form class="form2" method="post" action="">
    <label for="cpf_cliente">Selecione o Cliente:</label>
    <select name="cpf_cliente" id="cpf_cliente" required>
        <?php foreach ($clientes as $cliente) : ?>
            <option class="bt" value="<?php echo $cliente['cpf_cliente']; ?>"><?php echo $cliente['cpf_cliente']; ?></option>
        <?php endforeach; ?>
    </select>
    <button class="butao" type="submit">Finalizar Compra</button>
</form>
        </main>
        <footer id="rodape">
        </footer>
</body>
</html>