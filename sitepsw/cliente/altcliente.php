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
    $cpf_cliente= $_POST['cpf_cliente'];

   ##sql para selecionar apens um aluno
   $sql = "SELECT * FROM cliente where cpf_cliente= :cpf_cliente";
   
   # junta o sql a conexao do banco
   $retorno = $conexao->prepare($sql);

   ##diz o paramentro e o tipo  do paramentros
   $retorno->bindParam(':cpf_cliente',$cpf_cliente, PDO::PARAM_INT);

   #executa a estrutura no banco
   $retorno->execute();

  #transforma o retorno em array
   $array_retorno=$retorno->fetch();
   
   ##armazena retorno em variaveis
   $nome_cliente= $array_retorno ['nome_cliente'];
   $email_cliente= $array_retorno['email_cliente'];
   $senha_cliente= $array_retorno['senha_cliente'];
   $cidade_cliente= $array_retorno['cidade_cliente'];
   $estado_cliente= $array_retorno['estado_cliente'];
   $cep_cliente= $array_retorno['cep_cliente'];
   
?>

 <!-- formulario para cadastrar cliente metodo post, enviar dados para form crudcliente.php -->
 <header id="cabeçalho">

        <div class="conteudo">

            <div class="caixa-img"><img class="logo" src="../imgs/logob.png" alt=""></div>

            <div class="menu">
                <div class="menus">
                    <a href="../site/index.php">INICIAL</a>
                </div>
            </div>
        </div>

        <div class="caixa-linha">
            <span class="linha1"></span>
            <spam class="linha"></spam>
        </div>

    </header>
 <main id="corpo">
      <div class="login-2">
      <form method="POST" action="crudcliente.php">
      <h2 class="login">Alterar Dados Cliente</h2>
       <p> Nome: <input type="text" placeholder="Nome" name="nome_cliente"  value="<?php echo $nome_cliente; ?>"  required/> </p> 
       <p> Email: <input type="text" placeholder="Endereco" name="email_cliente" value="<?php echo $email_cliente; ?>" required/> </p>
       <p> Senha: <input type="text" placeholder="Cidade" name="senha_cliente" value="<?php echo $senha_cliente; ?>" required/> </p> 
       <p> Cidade: <input type="text" placeholder="Estado" name="cidade_cliente" value="<?php echo $cidade_cliente; ?>" required/> </p> 
       <p> Estado: 
    <select name="estado_cliente" required>
        <option value="">Selecione</option>
        <option value="AC" <?php if($estado_cliente == 'AC'){echo 'selected';}?>>AC</option>
        <option value="AL" <?php if($estado_cliente == 'AL'){echo 'selected';}?>>AL</option>
        <option value="AP" <?php if($estado_cliente == 'AP'){echo 'selected';}?>>AP</option>
        <option value="AM" <?php if($estado_cliente == 'AM'){echo 'selected';}?>>AM</option>
        <option value="BA" <?php if($estado_cliente == 'BA'){echo 'selected';}?>>BA</option>
        <option value="CE" <?php if($estado_cliente == 'CE'){echo 'selected';}?>>CE</option>
        <option value="DF" <?php if($estado_cliente == 'DF'){echo 'selected';}?>>DF</option>
        <option value="ES" <?php if($estado_cliente == 'ES'){echo 'selected';}?>>ES</option>
        <option value="GO" <?php if($estado_cliente == 'GO'){echo 'selected';}?>>GO</option>
        <option value="MA" <?php if($estado_cliente == 'MA'){echo 'selected';}?>>MA</option>
        <option value="MG" <?php if($estado_cliente == 'MG'){echo 'selected';}?>>MG</option>
        <option value="MS" <?php if($estado_cliente == 'MS'){echo 'selected';}?>>MS</option>
        <option value="MT" <?php if($estado_cliente == 'MT'){echo 'selected';}?>>MT</option>
        <option value="PA" <?php if($estado_cliente == 'PA'){echo 'selected';}?>>PA</option>
        <option value="PB" <?php if($estado_cliente == 'PB'){echo 'selected';}?>>PB</option>
        <option value="PE" <?php if($estado_cliente == 'PE'){echo 'selected';}?>>PE</option>
        <option value="PI" <?php if($estado_cliente == 'PI'){echo 'selected';}?>>PI</option>
        <option value="PR" <?php if($estado_cliente == 'PR'){echo 'selected';}?>>PR</option>
        <option value="RJ" <?php if($estado_cliente == 'RJ'){echo 'selected';}?>>RJ</option>
        <option value="RN" <?php if($estado_cliente == 'RN'){echo 'selected';}?>>RN</option>
        <option value="RO" <?php if($estado_cliente == 'RO'){echo 'selected';}?>>RO</option>
        <option value="RR" <?php if($estado_cliente == 'RR'){echo 'selected';}?>>RR</option>
        <option value="RS" <?php if($estado_cliente == 'RS'){echo 'selected';}?>>RS</option>
        <option value="SC" <?php if($estado_cliente == 'SC'){echo 'selected';}?>>SC</option>
        <option value="SE" <?php if($estado_cliente == 'SE'){echo 'selected';}?>>SE</option>
        <option value="SP" <?php if($estado_cliente == 'SP'){echo 'selected';}?>>SP</option>
        <option value="TO" <?php if($estado_cliente == 'TO'){echo 'selected';}?>>TO</option>
    </select>
</p>
       <p> CEP: <input type="number" placeholder="CEP" name="cep_cliente" value="<?php echo $cep_cliente; ?>" required/> </p> 
           
             <input type="hidden" name="cpf_cliente" id="" value="<?php echo $cpf_cliente ?>" >
             
             <input id="butao" type="submit" name="update" value="Alterar">
       </form>
      </div>
</main>
      <footer id="rodape">


    </footer>

    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })

        window.addEventListener("scroll", function() {
            var span = document.querySelector("span");
            span.classList.toggle("sticky", window.scrollY > 0);
        })

        window.addEventListener("scroll", function() {
            var spam = document.querySelector("spam");
            spam.classList.toggle("sticky", window.scrollY > 0);
        })

        window.addEventListener("scroll", function() {
            var img = document.querySelector("img");
            img.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
  
</body>
</html>