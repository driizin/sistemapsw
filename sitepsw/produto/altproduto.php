<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGROCAMPO</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<?php
require_once('../site/conexao.php');

//armazena id 
$id_produto= $_POST['id_produto'];

    // SQL para selecionar o produto
    $sql = "SELECT * FROM produto WHERE id_produto= :id_produto";

    // Prepara a consulta
    $retorno = $conexao->prepare($sql);

    // Passa o valor do parâmetro id_produto
    $retorno->bindParam(':id_produto', $id_produto, PDO::PARAM_INT);

    // Executa a consulta
    $retorno->execute();

    // Busca o resultado da consulta
    $array_retorno = $retorno->fetch();

    ##armazena retorno em variaveis
  $nome_produto= $array_retorno ['nome_produto'];
  $preco_produto= $array_retorno ['preco_produto'];
  $nome_marca= $array_retorno ['nome_marca'];
  $nome_categoria= $array_retorno['nome_categoria'];
  $url_produto= $array_retorno['url_produto'];
  $id_produto= $_POST ['id_produto'];

?>
?>


 <!-- formulario para cadastrar fornecedor metodo post, enviar dados para form crudforne.php -->
 <header id="cabeçalho">

<div class="conteudo">

    <div class="caixa-img"><img class="logo" src="../imgs/logob.png" alt=""></div>

    <div class="menu">
        <div class="menus">
            <a href="../index.php">INICIAL</a>
        </div>
    </div>
</div>

<div class="caixa-linha">
    <span class="linha1"></span>
    <spam class="linha"></spam>
</div>

</header>
 <main id="background">
      <div class="login-2">
      <form method="POST" action="crudproduto.php">
      <h2 class="login">Alterar Dados Produto</h2>
       <p> Nome: <input type="text" placeholder="Nome" name="nome_produto"  value="<?php echo $nome_produto; ?>"  required/> </p> 
       <p> Preço: <input type="text" placeholder="Preco" name="preco_produto" value="<?php echo $preco_produto; ?>" required/> </p>
       <p> Categoria: 
    <select name="nome_categoria" required>
        <option value="">Selecione</option>
        <option value="lubrificantes" <?php if($nome_categoria == 'lubrificantes'){echo 'selected';}?>>Lubrificantes</option>
        <option value="medicamentos" <?php if($nome_categoria == 'medicamentos'){echo 'selected';}?>>Medicamentos</option>
        <option value="nutricao animal" <?php if($nome_categoria == 'nutricao animal'){echo 'selected';}?>>Nutrição Animal</option>
        <option value="arames e acessorios" <?php if($nome_categoria == 'arames e acessorios'){echo 'selected';}?>>Arames e Acessórios</option>
        <option value="ferragens" <?php if($nome_categoria == 'ferragens'){echo 'selected';}?>>Ferragens</option>
    </select>
</p>
<p> Marca: 
    <select name="nome_marca" required>
        <option value="">Selecione</option>
        <option value="petronas" <?php if($nome_marca == 'petronas'){echo 'selected';}?>>Petronas</option>
        <option value="lepecid" <?php if($nome_marca == 'lepecid'){echo 'selected';}?>>Lepecid</option>
        <option value="top line" <?php if($nome_marca == 'top line'){echo 'selected';}?>>Top line</option>
        <option value="cidental" <?php if($nome_marca == 'cidental'){echo 'selected';}?>>Cidental</option>
        <option value="supremax mineral" <?php if($nome_marca == 'supremax mineral'){echo 'selected';}?>>Supremax Mineral</option>
        <option value="brachiaria" <?php if($nome_marca == 'brachiaria'){echo 'selected';}?>>Brachiaria</option>
    </select>
</p> URL: <input type="text" id="url_produto" name="url_produto" placeholder="URL" value="<?php echo $url_produto; ?>" required>       
             <input type="hidden" name="id_produto" id="" value="<?php echo $id_produto ?>" >
             
             <input id="butao" type="submit" name="update" value="Alterar">
       </form>
      </div>
</main>
  
</body>
</html>