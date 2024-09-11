<?php 

require_once('../site/conexao.php');

// Função para validar a URL
function validarUrl($url) {
    // Verifica se o URL não está vazio e não contém espaços
    if (empty($url) || preg_match('/\s/', $url)) {
        return false;
    }
    
    // Verifica se a URL é válida e termina com .png
    return filter_var($url, FILTER_VALIDATE_URL) !== false && preg_match('/\.png$/i', $url);
}

if(isset($_POST['cadastrar'])){

    $nome_produto = $_POST['nome_produto'];
    $preco_produto = $_POST['preco_produto'];
    $nome_categoria = $_POST['nome_categoria'];
    $nome_marca = $_POST['nome_marca'];
    $url_produto = $_POST['url_produto'];


    $sql = "INSERT INTO produto (nome_produto, preco_produto, nome_categoria, nome_marca, url_produto) VALUES (:nome_produto, :preco_produto, :nome_categoria, :nome_marca, :url_produto)";

$stmt = $conexao->prepare($sql);

$stmt->bindParam(':nome_produto', $nome_produto, PDO::PARAM_STR);
$stmt->bindParam(':preco_produto', $preco_produto, PDO::PARAM_STR);
$stmt->bindParam(':nome_marca', $nome_marca, PDO::PARAM_STR);
$stmt->bindParam(':nome_categoria', $nome_categoria, PDO::PARAM_STR);
$stmt->bindParam(':url_produto', $url_produto, PDO::PARAM_STR);

if ($stmt->execute()) {
    $_SESSION['message'] = "O produto $nome_produto foi registrado.";
    header("Location: tabelaproduto.php");
    exit();
} else {
    $_SESSION['message'] = "Não foi possível registrar o produto.";
    header("Location: tabelaproduto.php");
    exit();
}
}

if (isset($_POST['update'])) {
$nome_produto = $_POST['nome_produto'];
$preco_produto = $_POST['preco_produto'];
$nome_marca = $_POST['nome_marca'];
$nome_categoria = $_POST['nome_categoria'];
$url_produto = $_POST['url_produto'];
$id_produto = $_POST['id_produto'];

$sql = "UPDATE produto SET nome_produto = :nome_produto, preco_produto = :preco_produto, nome_marca = :nome_marca, nome_categoria = :nome_categoria, url_produto = :url_produto WHERE id_produto = :id_produto";

$stmt = $conexao->prepare($sql);

$stmt->bindParam(':nome_produto', $nome_produto, PDO::PARAM_STR);
$stmt->bindParam(':preco_produto', $preco_produto, PDO::PARAM_STR);
$stmt->bindParam(':nome_categoria', $nome_categoria, PDO::PARAM_STR);
$stmt->bindParam(':nome_marca', $nome_marca, PDO::PARAM_STR);
$stmt->bindParam(':url_produto', $url_produto, PDO::PARAM_STR);
$stmt->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);

if ($stmt->execute()) {
    $_SESSION['message'] = "O produto $nome_produto foi alterado com sucesso!";
    header("Location: tabelaproduto.php");
    exit();
} else {
    $_SESSION['message'] = "Não foi possível alterar o produto.";
    header("Location: tabelaproduto.php");
    exit();
}
}

if (isset($_GET['excluir'])) {
$id_produto = $_GET['id_produto'];

$sql = "DELETE FROM produto WHERE id_produto = :id_produto";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);

if ($stmt->execute()) {
    $_SESSION['message'] = "O produto foi excluído!";
    header("Location: tabelaproduto.php");
    exit();
} else {
    $_SESSION['message'] = "Não foi possível excluir o produto.";
    header("Location: tabelaproduto.php");
    exit();
}
}

?>