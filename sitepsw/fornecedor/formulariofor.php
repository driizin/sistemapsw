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
                <h1>CADASTRO DE FORNECEDOR</h1>
            </div>
            <div class="caixa-formulario">
                <form action="crudfornecedor.php" method="post">
                    <div class="caixa-per">

                        <div class="for-1">
                            <label for="nome_empresa">Nome da Empresa:</label>
                            <input type="text" name="nome_empresa" id="nome_empresa" required>
                        </div>
                        
                        <div class="for-2">
                            <label for="cnpj">CNPJ:</label>
                            <input type="text" name="cnpj_fornecedor" id="cnpj_fornecedor" required>
                        </div>

                    </div>
                    <div class="caixa-per">
                        <div class="for-3">
                            <label for="email">Email:</label>
                            <input type="email" name="email_fornecedor" id="email_fornecedor" required placeholder="Digite seu email">
                        </div>
                    </div>
                    <div class="caixa-per">
                        <div class="for-5">
                            <label for="endereco">Endereço:</label>
                            <input type="text" name="endereco_fornecedor" id="endereco_fornecedor" required>
                        </div>
                        <div class="for-6">
                            <label for="cidade">Cidade:</label>
                            <input type="text" name="cidade_fornecedor" id="cidade_fornecedor" required>
                        </div>
                        <div class="for-7">
                            <label for="estado">Estado:</label>
                            <select name="estado_fornecedor" id="estado_fornecedor" required>
                                <option value="">Selecione</option>
                                <option value="AC">AC</option>
                                <option value="AL">AL</option>
                                <option value="AP">AP</option>
                                <option value="AM">AM</option>
                                <option value="BA">BA</option>
                                <option value="CE">CE</option>
                                <option value="DF">DF</option>
                                <option value="ES">ES</option>
                                <option value="GO">GO</option>
                                <option value="MA">MA</option>
                                <option value="MG">MG</option>
                                <option value="MS">MS</option>
                                <option value="MT">MT</option>
                                <option value="PA">PA</option>
                                <option value="PB">PB</option>
                                <option value="PE">PE</option>
                                <option value="PI">PI</option>
                                <option value="PR">PR</option>
                                <option value="RJ">RJ</option>
                                <option value="RN">RN</option>
                                <option value="RO">RO</option>
                                <option value="RR">RR</option>
                                <option value="RS">RS</option>
                                <option value="SC">SC</option>
                                <option value="SE">SE</option>
                                <option value="SP">SP</option>
                                <option value="TO">TO</option>
                            </select>
                        </div>
                        <div class="for-8">
                            <label for="cep">CEP:</label>
                            <input type="number" name="cep_fornecedor" id="cep_fornecedor" required>
                        </div>
                    </div>
                    <input id="butao" type="submit" name="cadastrar" value="Cadastrar">
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
