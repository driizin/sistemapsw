<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/styleform.css">
    <title>AGROCAMPO</title>
</head>

<body>
    <main id="corpo">
        <div class="login-container">
            <div class="titlo">
                <h1>LOGIN</h1>
            </div>
            <div class="caixa-formulario">
            <form action="index2.php">
       <h2 class="login">Login</h2>
       <p> E-mail: <input type="text"placeholder="E-mail:" name="email_cliente" required/> </p> 
       <p> Senha: <input type="text" placeholder="senha:" name="senha_cliente" required/> </p> 
       <p id="cadastre">Não tem uma conta? <a href="../cliente/formulario.php"> <span id="cad-aqui">Cadastre-se aqui</span></a></p>
       <input id="butao" type="submit" value="Enviar">
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
