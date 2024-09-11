<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styleos.css">
    <title>AGROCAMPO</title>
</head>

<body>
    <header id="cabeçalho">

        <div class="conteudo">

            <div class="caixa-img"><img class="logo" src="../imgs/logob.png" alt=""></div>

            <div class="menu">
                <a href="../index.php">INICIAL</a>
            </div>
        </div>

        <div class="caixa-linha">
            <span class="linha1"></span>
            <spam class="linha"></spam>
        </div>

    </header>

    <main id="corpo">

        <div class="conteudo-for">
            <div class="titlo">
                <h1>CADASTRO DE PRODUTO</h1>
            </div>
            <div class="caixa-formulario">
            <form action="crudproduto.php" method="post" onsubmit="return validarFormulario();">
    <div class="for-1">
        <label for="nome_produto">Nome do Produto:</label>
        <input type="text" name="nome_produto" id="nome_produto" required>
    </div>
    <div class="for-2">
        <label for="preco_produto">Preço:</label>
        <input type="number" step="0.01" name="preco_produto" id="preco_produto" required placeholder="Digite o preço do produto">
    </div> <div class="for-2">
    <label for="nome_categoria">Nome da Categoria:</label>
    <select name="nome_categoria" id="nome_categoria" required>
    <option value="">Selecione</option>
    <option value="lubrificantes">Lubrificantes</option>
    <option value="medicamentos">Medicamentos</option>
    <option value="nutricao animal">Nutrição Animal</option>
    <option value="arames e acessorios">Arames e Acessórios</option>
    <option value="ferragens">Ferragens</option>
</select>

    </div>
    <div class="for-2">
    <label for="nome_marca">Nome da Marca:</label>
    <select name="nome_marca" id="nome_marca" required>
    <option value="">Selecione</option>
    <option value="petronas">Petronas</option>
    <option value="lepecid">Lepecid</option>
    <option value="top line">Top line</option>
    <option value="cidental">Cidental</option>
    <option value="supremax mineral">Supremax Mineral</option>
    <option value="brachiaria">Brachiaria</option>
</select>

</div>
<p> URL:
        <input type="text" id="url_produto" name="url_produto" placeholder="URL" required>
</p>
        <input id="cadastre" type="submit" name="cadastrar" value="Cadastrar">
</form>
            </div>
        </div>

    </main>

    <footer id="rodape">
    </footer>

    <script>
        window.addEventListener("scroll", function() {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });

        window.addEventListener("scroll", function() {
            var span = document.querySelector("span");
            span.classList.toggle("sticky", window.scrollY > 0);
        });

        window.addEventListener("scroll", function() {
            var spam = document.querySelector("spam");
            spam.classList.toggle("sticky", window.scrollY > 0);
        });

        window.addEventListener("scroll", function() {
            var img = document.querySelector("img");
            img.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>

</body>

</html>
