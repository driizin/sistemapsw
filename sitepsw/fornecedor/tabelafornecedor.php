<?php 

  require_once( '../site/conexao.php');

  $retorno = $conexao->prepare('SELECT * FROM fornecedor');

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
                    <th>Nome Empresa</th>
                    <th>CNPJ</th>
                    <th>Email</th>
                    <th>Endereço</th>
                    <th>Cidade</th>
                    <th>Estado</th>
                    <th>CEP</th>
                   
                </tr>
            </thead>

            <tbody>
                <tr>  
                    <?php foreach($retorno->fetchall() as $value) { ?>
                        <tr>
                            <td> <?php echo $value['nome_empresa'] ?>   </td> 
                            <td> <?php echo $value['cnpj_fornecedor']?>  </td> 
                            <td> <?php echo $value['email_fornecedor']?> </td> 
                            <td> <?php echo $value['endereco_fornecedor']?> </td>
                            <td> <?php echo $value['cidade_fornecedor']?> </td> 
                            <td> <?php echo $value['estado_fornecedor']?> </td> 
                            <td> <?php echo $value['cep_fornecedor']?> </td>  
                            <td><!-- codigo para alterar aluno escolhido, enviar via post para o form altfornecedor.php -->
                               <form method="POST" action="altfornecedor.php">
                                        <input name="cnpj_fornecedor" type="hidden" value="<?php echo $value['cnpj_fornecedor'];?>"/>
                                        <button class="butao" name="alterar"  type="submit">Alterar</button>
                                </form>

                             </td> 

                             <td><!-- codigo para excluir aluno escolhido, enviar via get para excluir no crufornecedor.php -->
                               <form method="GET" action="crudfornecedor.php" onsubmit="return confirm('Tem certeza que deseja excluir este fornecedor?');">
                                        <input name="cnpj_fornecedor" type="hidden" value="<?php echo $value['cnpj_fornecedor'];?>"/>
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