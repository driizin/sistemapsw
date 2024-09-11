<?php
require_once('site/conexao.php');
require 'site/cart.php';
require 'site/product.php';

// Buscar produtos do banco de dados
$retorno = $conexao->prepare('SELECT * FROM produto');
$retorno->execute();
$produtos = $retorno->fetchAll(PDO::FETCH_ASSOC);

session_start();

if (isset($_GET['id'])) {
    $id = strip_tags($_GET['id']);
    $productInfo = array_filter($produtos, fn($prod) => $prod['id_produto'] == $id);
    if ($productInfo) {
        $productInfo = array_pop($productInfo); // Pega o produto filtrado
        $product = new Product;
        $product->setId($productInfo['id_produto']);
        $product->setName($productInfo['nome_produto']);
        $product->setPrice($productInfo['preco_produto']);
        $product->setQuantity(1);

        $cart = new Cart;
        $cart->add($product);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>AGROCAMPO</title>
</head>

<body>
<header id="cabeçalho">
        <div class="conteudo">

          <div class="cabeca"><a href="index.php"><img class="logo" src="imgs/logob.png" alt="logo-agrocampo" width="100px">
        </div>
            
            <div class="menu">
                <div class="menus">CATEGORIAS 
                    <ul class="dropdown">
                        <li><a href="../sitepsw/produtos/lubrificantes.php">LUBRIFICANTES</a></li>
                        <li><a href="../sitepsw/produtos/medicamentos.php">MEDICAMENTOS</a></li>
                        <li><a href="../sitepsw/produtos/nutricaoanimal.php">NUTRIÇÃO ANIMAL</a></li>
                        <li><a href="../sitepsw/produtos/arameseacessorios.php">ARAMES E ACESSÓRIOS</a></li>
                        <li><a href="../sitepsw/produtos/ferragens.php">FERRAGENS</a></li>
                    </ul>
                </div>
                <div class="menus">CADASTRAR 
                    <ul class="dropdown">
                        <li><a href="../sitepsw/fornecedor/formulariofor.php">FORNECEDOR</a></li>
                        <li><a href="../sitepsw/produto/formulariopro.php">PRODUTO</a></li>
                    </ul>
                </div>
                <div class="menus">CONSULTAR 
                    <ul class="dropdown">
                        <li><a href="../sitepsw/cliente/tabelacliente.php">CLIENTE</a></li>
                        <li><a href="../sitepsw/fornecedor/tabelafornecedor.php">FORNECEDOR</a></li>
                        <li><a href="../sitepsw/produto/tabelaproduto.php">PRODUTO</a></li>
                    </ul>
            </div>
            <div class="menus">
                <a href="site/login.php">ENTRAR</a>
            </div>
            <div class="cabeca2">
            <a href="site/mycart.php"><img src="imgs/carrinho.png"  alt="carrinho" width="70px"></a>
            </div>
</header>
  
    <main id="corpo">
        <img src="imgs/Agrocampo.jpeg" alt="">
    </main>

    <section class="module content">
        <div class="container">
          <div class="t"></div>
          <div class="conteudodopodcast">
           <h2>No Agrocampo valorizamos a essência do campo e a paixão pela vida rural. Somos mais do que uma simples loja; somos o ponto de encontro de quem vive e respira o agro. Aqui, você encontra produtos de alta qualidade que atendem às suas necessidades e respeitam a tradição da vida no campo.</h2>
          </div>
        </div>
    </section>

    <section class="module parallax parallax-2">
        <h1>É VAQUEJADA MEU PATRÃO</h1>
    </section>

    <section class="module content">
        <div class="container">
          <div class="carousel">
            <div class="carousel-item">
              <img src="imgs/ep1.jpeg" alt="Produto 1">
              <p>Espora Cavalo Vaquejada - R$ 150,00</p>
            </div>
            <div class="carousel-item">
              <img src="imgs/ep2.jpeg" alt="Produto 2">
              <p>Kit Sela Vaquejada - R$ 1230,00</p>
            </div>
            <div class="carousel-item">
              <img src="imgs/ep3.jpeg" alt="Produto 3">
              <p>Capacete de Vaquejada - R$ 350,00</p>
            </div>
          </div>
        </div>
    </section>

    <section class="module content video-section">
        <div class="container">

            <div class="video-wrapper">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/vPVO9Rq0gvQ?si=VwHgp5SNKRunxWL9" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <footer id="rodape">
        <div class="ret">
            <p>developers for @driizin_ @mcflyer43 @peixekkk <?php echo date("Y"); ?></p>
        </div>
    </footer>
</body>

</html>
