<?php 

  require_once( '../site/conexao.php');

  $retorno = $conexao->prepare('SELECT * FROM cliente');

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
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Email</th>
                    <th>Senha</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>CEP</th>
                   
                </tr>
            </thead>

            <tbody>
                <tr>  
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['nome_cliente'] ?>   </td> 
                            <td> <?php echo $value['cpf_cliente']?>  </td> 
                            <td> <?php echo $value['email_cliente']?> </td> 
                            <td> <?php echo $value['senha_cliente']?> </td>
                            <td> <?php echo $value['cidade_cliente']?> </td> 
                            <td> <?php echo $value['estado_cliente']?> </td> 
                            <td> <?php echo $value['cep_cliente']?> </td> 
                            <td><!-- codigo para alterar cliente escolhido, enviar via post para o form altcliente.php -->
                               <form method="POST" action="altcliente.php">
                                        <input name="cpf_cliente" type="hidden" value="<?php echo $value['cpf_cliente'];?>"/>
                                        <button class="butao" name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td><!-- codigo para excluir cliente escolhido, enviar via get para excluir no crudcliente.php -->
                               <form method="GET" action="crudcliente.php" onsubmit="return confirm('Tem certeza que deseja excluir este cliente?');">
                                        <input name="cpf_cliente" type="hidden" value="<?php echo $value['cpf_cliente'];?>"/>
                                        <button class="butao" name="excluir"  type="submit">Excluir</button>
                                </form>

                             </td> 
                      </tr>
                    <?php  }  ?> 
                 </tr>
            </tbody>
        </table>
        </div>

</main>

<footer id="rodape">
</footer>

</body>
</html>