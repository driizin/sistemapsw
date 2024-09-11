<?php 

require_once('../site/conexao.php');

if(isset($_POST['cadastrar'])){

$nome_cliente= $_POST ['nome_cliente'];
$email_cliente= $_POST['email_cliente'];
$senha_cliente= $_POST['senha_cliente'];
$cidade_cliente= $_POST['cidade_cliente'];
$estado_cliente= $_POST['estado_cliente'];
$cep_cliente= $_POST['cep_cliente'];
$cpf_cliente= $_POST['cpf_cliente'];

$sql= "INSERT INTO cliente(nome_cliente, email_cliente, senha_cliente, cidade_cliente, estado_cliente, cep_cliente, cpf_cliente) VALUES ('$nome_cliente', '$email_cliente', '$senha_cliente', '$cidade_cliente', '$estado_cliente', '$cep_cliente', '$cpf_cliente')";


$sqlcombanco=$conexao->prepare($sql);



if($sqlcombanco->execute())
{

    echo" <strong>OK!<!strong> Cliente $nome_cliente foi registrado
     </br>";
    
}

echo "<button class='button button3'><a href='../index.php'>Voltar</a></button>";

};

if(isset($_POST['update'])){


    ##dados recebidos pelo metodo POST
    $nome_cliente= $_POST ['nome_cliente'];
    $email_cliente= $_POST['email_cliente'];
    $senha_cliente= $_POST['senha_cliente'];
    $cidade_cliente= $_POST['cidade_cliente'];
    $estado_cliente= $_POST['estado_cliente'];
    $cep_cliente= $_POST['cep_cliente'];
    $cpf_cliente= $_POST['cpf_cliente'];

      ##codigo sql
    $sql = "UPDATE  cliente SET nome_cliente= :nome_cliente, email_cliente= :email_cliente, senha_cliente= :senha_cliente, cidade_cliente= :cidade_cliente, estado_cliente= :estado_cliente, cep_cliente= :cep_cliente WHERE cpf_cliente= :cpf_cliente" ;

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':nome_cliente', $nome_cliente, PDO::PARAM_STR);
    $stmt->bindParam(':email_cliente', $email_cliente, PDO::PARAM_STR);
    $stmt->bindParam(':senha_cliente', $senha_cliente, PDO::PARAM_STR);
    $stmt->bindParam(':cidade_cliente', $cidade_cliente, PDO::PARAM_STR); 
    $stmt->bindParam(':estado_cliente', $estado_cliente, PDO::PARAM_STR); 
    $stmt->bindParam(':cep_cliente', $cep_cliente, PDO::PARAM_INT);
    $stmt->bindParam(':cpf_cliente', $cpf_cliente, PDO::PARAM_INT);
    
 

    //CASO INSERIU DADOS NO BD MOSTRA MENSAGEM
    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o cliente
             $nome_cliente foi Alterado com sucesso!!!"; 

            echo " <button class='button'><a href='../cliente/tabelacliente.php'>voltar</a></button>";
        }

};

if(isset($_GET['excluir'])){
    
    //RECEBE E ARMAZENA ID DO CLIENTE
    $cpf_cliente = $_GET['cpf_cliente'];

    //APAGA NO BANCO DE DADOS O CLIENTE QUE TIVER O ID = $id recebida pelo metodo $_GET
    $sql ="DELETE FROM `cliente` WHERE cpf_cliente={$cpf_cliente}";

    ##diz o paramentro e o tipo  do paramentros
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
      ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);
     ## executa o codigo SQL no BD
    $stmt->execute();


    ##se nao houve erros mostra menssagem
    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o cliente foi excluido!!!"; 

            echo " <button class='button'><a href='../cliente/tabelacliente.php'>voltar</a></button>";
        }

}


?>
