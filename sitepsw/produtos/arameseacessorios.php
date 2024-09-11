<?php
require_once('../site/conexao.php');
require_once('../site/product.php');
require_once('../site/cart.php');

session_start();

$nome_categoria = 'arameseacessorios'; // Pode ser parametrizado para outras marcas

$sql = "SELECT * FROM produto WHERE nome_categoria = :nome_categoria";
$stmt = $conexao->prepare($sql);
$stmt->bindParam(':nome_categoria', $nome_categoria, PDO::PARAM_STR);
$stmt->execute();
$produtos = $stmt->fetchAll();

if (isset($_POST['add_to_cart'])) {
    $product = new Product();
    $product->setId($_POST['id_produto']);
    $product->setName($_POST['nome_produto']);
    $product->setPrice($_POST['preco_produto']);
    $product->setQuantity(1); // Quantidade inicial

    $cart = new Cart();
    $cart->add($product);

    header("Location: {$nome_categoria}.php"); // Redireciona para a página da marca correta
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos</title>
    <link rel="stylesheet" href="../css/styleprodutos.css">
</head>
<body>
    <header id="cabeçalho">
        <div class="conteudo">
            <div class="caixa-img">
            <a href="index.php"><img class="logo" src="../imgs/logob.png" alt="logo-agrocampo">
            </div>
            <div class="menu">
                <div class="menus">CATEGORIAS 
                    <ul class="dropdown">
                        <li><a href="../produtos/lubrificantes.php">LUBRIFICANTES</a></li>
                        <li><a href="../produtos/medicamentos.php">MEDICAMENTOS</a></li>
                        <li><a href="../produtos/nutricaoanimal.php">NUTRIÇÃO ANIMAL</a></li>
                        <li><a href="../produtos/arameseacessorios.php">ARAMES E ACESSÓRIOS</a></li>
                        <li><a href="../produtos/ferragens.php">FERRAGENS</a></li>
                    </ul>
                </div>
                <div class="menus">CADASTRAR 
                    <ul class="dropdown">
                        <li><a href="../fornecedor/formulariofor.php">FORNECEDOR</a></li>
                        <li><a href="../produto/formulariopro.php">PRODUTO</a></li>
                    </ul>
                </div>
                <div class="menus">CONSULTAR 
                    <ul class="dropdown">
                        <li><a href="../cliente/tabelacliente.php">CLIENTE</a></li>
                        <li><a href="../fornecedor/tabelafornecedor.php">FORNECEDOR</a></li>
                        <li><a href="../produto/tabelaproduto.php">PRODUTO</a></li>
                    </ul>
            </div>
                <div class="menus">
                    <a href="../site/login.php">ENTRAR</a>
                </div>
                <div class="menus">
                    <a href="../index.php">INICIAL</a>
                </div>
        </div>
        <div class="caixa-linha">
            <span class="linha1"></span>
            <span class="linha"></span>
        </div>
    </header>

    <main id="corpo">
    <div class="product-list">

<?php if (empty($produtos)) : ?>
    <p>Nenhum produto disponível.</p>
<?php else : ?>
    <?php foreach ($produtos as $produto) : ?>
        <div class="produto">
            <h3><?php echo htmlspecialchars($produto['nome_produto']); ?></h3>
            <p>Categoria: <?php echo htmlspecialchars($produto['nome_categoria']); ?></p>
            <p>Marca: <?php echo htmlspecialchars($produto['nome_marca']); ?></p>
            <p>Valor: R$ <?php echo number_format($produto['preco_produto'], 2, ',', '.'); ?></p>
            <form action="<?php echo $nome_categoria; ?>.php" method="post">
                <input type="hidden" name="id_produto" value="<?php echo $produto['id_produto']; ?>">
                <input type="hidden" name="nome_produto" value="<?php echo $produto['nome_produto']; ?>">
                <input type="hidden" name="preco_produto" value="<?php echo $produto['preco_produto']; ?>">
                <button id="butao" type="submit" name="add_to_cart">Adicionar ao carrinho</button>
            </form>
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</div>
    </main>

    <footer id="rodape">
        <div class="ret">
            <p>developers for @driizin_ @mcflyer43 @peixekkk <?php echo date("Y"); ?></p>
        </div>
    </footer>

    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });

        window.addEventListener("scroll", function() {
            var spans = document.querySelectorAll("span");
            spans.forEach(span => {
                span.classList.toggle("sticky", window.scrollY > 0);
            });
        });

        window.addEventListener("scroll", function() {
            var img = document.querySelector("img");
            img.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
</body>
</html>
