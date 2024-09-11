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
  //incluir arquivo de conexao com o BD
    require_once('../site/conexao.php');
 
    //armazena id 
    $cnpj_fornecedor= $_POST['cnpj_fornecedor'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM fornecedor where cnpj_fornecedor= :cnpj_fornecedor";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':cnpj_fornecedor',$cnpj_fornecedor, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome_empresa= $array_retorno ['nome_empresa'];
   $email_forncedor= $array_retorno['email_fornecedor'];
   $endereco_fornecedor= $array_retorno['endereco_fornecedor'];
   $cidade_fornecedor= $array_retorno['cidade_fornecedor'];
   $estado_fornecedor= $array_retorno['estado_fornecedor'];
   $cep_fornecedor= $array_retorno['cep_fornecedor'];
   
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
      <form method="POST" action="crudfornecedor.php">
      <h2 class="login">Alterar dados Fornecedor</h2>
       <p> Nome: <input type="text" placeholder="Nome" name="nome_empresa"  value="<?php echo $nome_empresa; ?>"  required/> </p> 
       <p> E-mail: <input type="text" placeholder="E-mail" name="email_fornecedor" value="<?php echo $email_forncedor; ?>" required/> </p>
       <p> Endereço: <input type="text" placeholder="Endereco" name="endereco_fornecedor" value="<?php echo $endereco_fornecedor; ?>" required/> </p>
       <p> Cidade: <input type="text" placeholder="Cidade" name="cidade_fornecedor" value="<?php echo $cidade_fornecedor; ?>" required/> </p> 
       <p> Estado: 
    <select name="estado_fornecedor" required>
        <option value="">Selecione</option>
        <option value="AC" <?php if($estado_fornecedor == 'AC'){echo 'selected';}?>>AC</option>
        <option value="AL" <?php if($estado_fornecedor == 'AL'){echo 'selected';}?>>AL</option>
        <option value="AP" <?php if($estado_fornecedor == 'AP'){echo 'selected';}?>>AP</option>
        <option value="AM" <?php if($estado_fornecedor == 'AM'){echo 'selected';}?>>AM</option>
        <option value="BA" <?php if($estado_fornecedor == 'BA'){echo 'selected';}?>>BA</option>
        <option value="CE" <?php if($estado_fornecedor == 'CE'){echo 'selected';}?>>CE</option>
        <option value="DF" <?php if($estado_fornecedor == 'DF'){echo 'selected';}?>>DF</option>
        <option value="ES" <?php if($estado_fornecedor == 'ES'){echo 'selected';}?>>ES</option>
        <option value="GO" <?php if($estado_fornecedor == 'GO'){echo 'selected';}?>>GO</option>
        <option value="MA" <?php if($estado_fornecedor == 'MA'){echo 'selected';}?>>MA</option>
        <option value="MG" <?php if($estado_fornecedor == 'MG'){echo 'selected';}?>>MG</option>
        <option value="MS" <?php if($estado_fornecedor == 'MS'){echo 'selected';}?>>MS</option>
        <option value="MT" <?php if($estado_fornecedor == 'MT'){echo 'selected';}?>>MT</option>
        <option value="PA" <?php if($estado_fornecedor == 'PA'){echo 'selected';}?>>PA</option>
        <option value="PB" <?php if($estado_fornecedor == 'PB'){echo 'selected';}?>>PB</option>
        <option value="PE" <?php if($estado_fornecedor == 'PE'){echo 'selected';}?>>PE</option>
        <option value="PI" <?php if($estado_fornecedor == 'PI'){echo 'selected';}?>>PI</option>
        <option value="PR" <?php if($estado_fornecedor == 'PR'){echo 'selected';}?>>PR</option>
        <option value="RJ" <?php if($estado_fornecedor == 'RJ'){echo 'selected';}?>>RJ</option>
        <option value="RN" <?php if($estado_fornecedor == 'RN'){echo 'selected';}?>>RN</option>
        <option value="RO" <?php if($estado_fornecedor == 'RO'){echo 'selected';}?>>RO</option>
        <option value="RR" <?php if($estado_fornecedor == 'RR'){echo 'selected';}?>>RR</option>
        <option value="RS" <?php if($estado_fornecedor == 'RS'){echo 'selected';}?>>RS</option>
        <option value="SC" <?php if($estado_fornecedor == 'SC'){echo 'selected';}?>>SC</option>
        <option value="SE" <?php if($estado_fornecedor == 'SE'){echo 'selected';}?>>SE</option>
        <option value="SP" <?php if($estado_fornecedor == 'SP'){echo 'selected';}?>>SP</option>
        <option value="TO" <?php if($estado_fornecedor == 'TO'){echo 'selected';}?>>TO</option>
    </select>
</p>
       <p> CEP: <input type="number" placeholder="CEP" name="cep_fornecedor" value="<?php echo $cep_fornecedor; ?>" required/> </p> 
           
             <input type="hidden" name="cnpj_fornecedor" id="" value="<?php echo $cnpj_fornecedor ?>" >
             
             <input id="butao" type="submit" name="update" value="Alterar">
       </form>
      </div>
</main>
  
</body>
</html>