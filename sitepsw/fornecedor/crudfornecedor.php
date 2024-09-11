<?php 

require_once('../site/conexao.php');

if(isset($_POST['cadastrar'])){

$nome_empresa= $_POST ['nome_empresa'];
$email_fornecedor= $_POST['email_fornecedor'];
$endereco_fornecedor= $_POST['endereco_fornecedor'];
$cidade_fornecedor= $_POST['cidade_fornecedor'];
$estado_fornecedor= $_POST['estado_fornecedor'];
$cep_fornecedor= $_POST['cep_fornecedor'];
$cnpj_fornecedor= $_POST['cnpj_fornecedor'];

$sql= "INSERT INTO fornecedor(nome_empresa, email_fornecedor, endereco_fornecedor, cidade_fornecedor, estado_fornecedor, cep_fornecedor, cnpj_fornecedor) VALUES ('$nome_empresa', '$email_fornecedor', '$endereco_fornecedor', '$cidade_fornecedor', '$estado_fornecedor', '$cep_fornecedor', '$cnpj_fornecedor')";



$sqlcombanco=$conexao->prepare($sql);



if($sqlcombanco->execute())
{

    echo" <strong>OK!<!strong> Fornecedor $nome_empresa foi registrado
     </br>";
    
}

echo "<button class='button button3'><a href='../index.php'>Voltar</a></button>";

};

if(isset($_POST['update'])){


    ##dados recebidos pelo metodo POST
    $nome_empresa= $_POST ['nome_empresa'];
    $email_fornecedor= $_POST['email_fornecedor'];
    $endereco_fornecedor= $_POST['endereco_fornecedor'];
    $cidade_fornecedor= $_POST['cidade_fornecedor'];
    $estado_fornecedor= $_POST['estado_fornecedor'];
    $cep_fornecedor= $_POST['cep_fornecedor'];
    $cnpj_fornecedor= $_POST['cnpj_fornecedor'];

      ##codigo sql
    $sql = "UPDATE  fornecedor SET nome_empresa= :nome_empresa, email_fornecedor= :email_fornecedor, endereco_fornecedor= :endereco_fornecedor, cidade_fornecedor= :cidade_fornecedor, estado_fornecedor= :estado_fornecedor, cep_fornecedor= :cep_fornecedor WHERE cnpj_fornecedor= :cnpj_fornecedor" ;

    ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);

    ##diz o paramentro e o tipo  do paramentros
    $stmt->bindParam(':nome_empresa',$nome_empresa, PDO::PARAM_STR);
    $stmt->bindParam(':email_fornecedor',$email_fornecedor, PDO::PARAM_STR);
    $stmt->bindParam(':endereco_fornecedor',$endereco_fornecedor, PDO::PARAM_STR);
    $stmt->bindParam(':cidade_fornecedor',$cidade_fornecedor, PDO::PARAM_STR);
    $stmt->bindParam(':estado_fornecedor',$estado_fornecedor, PDO::PARAM_STR);
    $stmt->bindParam(':cep_fornecedor',$cep_fornecedor, PDO::PARAM_INT);
    $stmt->bindParam(':cnpj_fornecedor',$cnpj_fornecedor, PDO::PARAM_INT);
    $stmt->execute();
 

    //CASO INSERIU DADOS NO BD MOSTRA MENSAGEM
    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o fornecedor
             $nome_empresa foi Alterado com sucesso!!!"; 

            echo " <button class='button'><a href='../index.php'>voltar</a></button>";
        }

};

if(isset($_GET['excluir'])){
    
    //RECEBE E ARMAZENA ID DO FORNECEDOR
    $cnpj_fornecedor = $_GET['cnpj_fornecedor'];

    //APAGA NO BANCO DE DADOS O FORNECEDOR QUE TIVER O ID = $id recebida pelo metodo $_GET
    $sql ="DELETE FROM `fornecedor` WHERE cnpj_fornecedor={$cnpj_fornecedor}";

    ##diz o paramentro e o tipo  do paramentros
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);   
      ##junta o codigo sql a conexao do banco
    $stmt = $conexao->prepare($sql);
     ## executa o codigo SQL no BD
    $stmt->execute();


    ##se nao houve erros mostra menssagem
    if($stmt->execute())
        {
            echo " <strong>OK!</strong> o fornecedor foi excluido!!!"; 

            echo " <button class='button'><a href='../fornecedor/tabelafornecedor.php'>voltar</a></button>";
        }

}


?>
