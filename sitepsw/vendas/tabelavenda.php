<?php
require '../site/conexao.php';

// Consulta para obter as vendas com o total
$sqlVendas = "SELECT v.id_venda, c.nome_cliente, v.data_venda, v.hora_venda, SUM(p.preco_produto * vp.quantidade) as total
              FROM venda v
              JOIN cliente c ON v.cpf_cliente = c.cpf_cliente
              JOIN venda_produto vp ON v.id_venda = vp.id_venda
              JOIN produto p ON vp.id_produto = p.id_produto
              GROUP BY v.id_venda";

// Executa a consulta
$stmtVendas = $conexao->query($sqlVendas);
$vendas = $stmtVendas->fetchAll();

?>

<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Tabela Produto</title>
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
  <?php         
    echo "<button class='butao2'><a href='../index.php'>Voltar</a></button>";
  ?>

    <table>
        <thead>
            <tr>
                <th>Produtos</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Total</th>
                <th>ID Venda</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($vendas as $venda): ?>
                <tr>
                    <td>
                        <?php
                        $sqlProdutos = "SELECT p.nome_produto, vp.quantidade, p.preco_produto
                                        FROM venda_produto vp
                                        JOIN produto p ON vp.id_produto = p.id_produto
                                        WHERE vp.id_venda = :id_venda";
                        $stmtProdutos = $conexao->prepare($sqlProdutos);
                        $stmtProdutos->bindParam(':id_venda', $venda['id_venda'], PDO::PARAM_INT);
                        $stmtProdutos->execute();
                        $produtos = $stmtProdutos->fetchAll();

                        foreach ($produtos as $produto): ?>
                            <div>
                                <?php echo htmlspecialchars($produto['nome_produto']); ?> - Quantidade: <?php echo htmlspecialchars($produto['quantidade']); ?> - Preço: R$ <?php echo number_format($produto['preco_produto'], 2, ',', '.'); ?>
                            </div>
                        <?php endforeach; ?>
                    </td>
                    <td><?php echo htmlspecialchars($venda['nome_cliente']); ?></td>
                    <td><?php echo htmlspecialchars($venda['data_venda']); ?></td>
                    <td><?php echo htmlspecialchars(date('H:i:s', strtotime($venda['hora_venda']))); ?></td>
                    <td>R$ <?php echo number_format($venda['total'], 2, ',', '.'); ?></td>
                    <td><?php echo htmlspecialchars($venda['id_venda']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    </main>
    <footer id="rodape">
</footer>
</body>
</html>
