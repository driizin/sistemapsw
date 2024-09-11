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

            <div class="caixa-img"><img class="logo" src="../IMGS/logob.png" alt=""></div>

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

    <main id="corpo">

        <div class="conteudo-for">
            <div class="titlo">
                <h1>CADASTRO DE CLIENTE</h1>
            </div>
            <div class="caixa-formulario">
                <form action="crudcliente.php" method="post">
                    
                    <p> Nome: 
                        <input type="text" placeholder="nome_cliente" name="nome_cliente" required/> 
                    </p> 
                    
                    <p> CPF: 
                        <input type="text" placeholder="cpf_cliente" name="cpf_cliente" required/> 
                    </p>
                    
                    <p> E-mail: 
                        <input type="email" placeholder="email_cliente" name="email_cliente" required/> 
                    </p>
                    
                    <p> Senha: 
                        <input type="password" placeholder="senha_cliente" name="senha_cliente" required/> 
                    </p>
                    
                    <p> Cidade: 
                        <input type="text" placeholder="cidade_cliente" name="cidade_cliente" required/> 
                    </p>
                    
                    <p> Estado: 
                        <select name="estado_cliente" id="estado_fornecedor" required>
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
                    </p>
                    
                    <p> CEP: 
                        <input type="number" placeholder="cep_cliente" name="cep_cliente" required/> 
                    </p>
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