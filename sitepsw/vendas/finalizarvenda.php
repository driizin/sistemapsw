<?php

require '..site/product.php';
require '..site/cart.php';
require_once ('..site/conexao.php');

session_start();

$cart = new Cart;
$productsInCart = $cart->getCart();
$idcliente = $_POST['cpf_cliente'];

if (count($productsInCart) > 0 && $idcliente) {
    // Registrar venda
    $stmt = $conexao->prepare("INSERT INTO venda (cpf_cliente, data_venda, hora_venda) VALUES (:cpf_cliente, CURDATE(), CURTIME())");
    $stmt->bindParam(':cpf_cliente', $cpf_cliente, PDO::PARAM_INT);
    $stmt->execute();
    $idvenda = $conexao->lastInsertId();

    // Registrar os produtos na venda
    foreach ($productsInCart as $product) {
        $stmt = $conexao->prepare("INSERT INTO venda_produto (id_venda, id_produto, quantidade) VALUES (:id_venda, :id_produto, :quantidade)");
        $stmt->bindParam(':id_venda', $id_venda, PDO::PARAM_INT);
        $stmt->bindParam(':id_produto', $product->getId(), PDO::PARAM_INT);
        $stmt->bindParam(':quantidade', $product->getQuantity(), PDO::PARAM_INT);
        $stmt->execute();
    }

    // Esvaziar carrinho
    $cart->clear();

    echo "<p>Venda finalizada com sucesso!</p>";
    echo "<a href='index.php'>Voltar para a Home</a>";
} else {
    echo "<p>Erro ao finalizar a venda. Certifique-se de que o carrinho não esteja vazio e um cliente esteja selecionado.</p>";
    echo "<a href='site/mycart.php'>Voltar para o Carrinho</a>";
}
?>
