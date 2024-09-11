<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="./styleos.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
  <title>Resultado do Formulário</title>
</head>
<body>
<h1 class="titlo">Suas informações são:</h1>
<div class="card">

  <div class="tools">
    <div class="circle">
      <span class="red box"></span>
    </div>
    <div class="circle">
      <span class="yellow box"></span>
    </div>
    <div class="circle">
      <span class="green box"></span>
    </div>
  </div>
  <div class="card__content">

<?php

// Recebendo as informações do formulário de cadastro de fornecedor
$nome_empresa = $_POST['nome_empresa'];
$cnpj = $_POST['cnpj'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$endereco = $_POST['endereco'];
$cidade = $_POST['cidade'];
$estado = $_POST['estado'];
$cep = $_POST['cep'];

// Exibindo as informações para o usuário
echo "Nome da Empresa: $nome_empresa <br><br>";
echo "CNPJ: $cnpj <br><br>";
echo "E-mail: $email <br><br>";
echo "Telefone: $telefone <br><br>";
echo "Endereço: $endereco <br><br>";
echo "Cidade: $cidade <br><br>";
echo "Estado: $estado <br><br>";
echo "CEP: $cep <br><br>";

?>

  </div>
</div>

<svg class="fundo2" version="1.1" xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
              <defs>
                  <linearGradient id="bg">
                  <stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.06)"></stop>
                      <stop offset="50%" style="stop-color:rgba(0, 255, 4, 0.6)"></stop>
                      <stop offset="100%" style="stop-color:rgba(0, 0, 0, 0.2)"></stop>
                  </linearGradient>
                  <path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
          s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
              </defs>
              <g>
                  <use xlink:href='#wave' opacity=".3">
                      <animateTransform
                attributeName="transform"
                attributeType="XML"
                type="translate"
                dur="10s"
                calcMode="spline"
                values="270 230; -334 180; 270 230"
                keyTimes="0; .5; 1"
                keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                repeatCount="indefinite" />
                  </use>
                  <use xlink:href='#wave' opacity=".6">
                      <animateTransform
                attributeName="transform"
                attributeType="XML"
                type="translate"
                dur="8s"
                calcMode="spline"
                values="-270 230;243 220;-270 230"
                keyTimes="0; .6; 1"
                keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                repeatCount="indefinite" />
                  </use>
                  <use xlink:href='#wave' opacty=".9">
                      <animateTransform
                attributeName="transform"
                attributeType="XML"
                type="translate"
                dur="6s"
                calcMode="spline"
                values="0 230;-140 200;0 230"
                keyTimes="0; .4; 1"
                keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0"
                repeatCount="indefinite" />
                  </use>
              </g>
          </svg>
</body>
</html>
