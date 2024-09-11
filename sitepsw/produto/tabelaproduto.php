<?php 

require_once('../site/conexao.php');

// Consulta com INNER JOIN para pegar o nome da categoria e da marca
$sql = 'SELECT * FROM produto';

$retorno = $conexao->prepare($sql);
$retorno->execute();

?> 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGROCAMPO</title>
    <link rel="stylesheet" href="../css/tabela.css">
</head>
<body>
<header id="cabeçalho">
        <div class="conteudo">
        <div class="menus">
                <a href="/index.php">VOLTAR</a>
            </div>   
</header>

<main id="corpo">

<div class="conteudo-for">
        <table> 
            <thead>
                <tr>
                    <th>Imagem</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Marca</th>
                    <th>ID</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach($retorno->fetchAll() as $value) { ?>
                    <?php $url = $value['url_produto'] ?>
                    <tr>
                    <td id="imgT"> <?php echo "<img src='$url' height='100px' width='100px'>" ?> </td>
                        <td> <?php echo $value['nome_produto']; ?> </td> 
                        <td> <?php echo $value['preco_produto']; ?> </td> 
                        <td> <?php echo $value['nome_categoria']; ?> </td> 
                        <td> <?php echo $value['nome_marca']; ?> </td> 
                        <td> <?php echo $value['id_produto']; ?> </td> 
                        <td><!-- Formulário para alterar o produto -->
                            <form method="POST" action="altproduto.php">
                            <input name="id_produto" type="hidden" value="<?php echo $value['id_produto'];?>"/>
                                <button class="butao" name="alterar" type="submit">Alterar</button>
                            </form>
                        </td> 
                        <td><!-- Formulário para excluir o produto -->
                            <form method="GET" action="crudproduto.php" onsubmit="return confirm('Tem certeza que deseja excluir este produto?');">
                            <input name="id_produto" type="hidden" value="<?php echo $value['id_produto'];?>"/>
                                <button class="butao" name="excluir" type="submit">Excluir</button>
                            </form>
                        </td> 
                    </tr>
                <?php } ?>
            </tbody>
        </table>
</div>

</main>

<footer id="rodape">
</footer>

</body>
</html>
