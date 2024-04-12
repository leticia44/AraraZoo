<?php
  include_once("templates/header.php");
?>
<!-- <div class="plano-de-fundo">
  <video autoplay loop muted plays-inline class="back-video">
      <source src="imgs/videoarara.mp4" type="video/mp4">
      
  </video>
  <img src="imgs/logosemfundo.png" class="logosemfundo">
</div> -->
<div class="planodefundo">
  <img src="imgs/ararazoobranca.png" class="logosemfundo">
  <video autoplay loop muted plays-inline class="back-vide0">
    <source src="imgs/videoarara.mp4" type="video/mp4">
  </video>
</div>
<div class="sobrenos">
  <img src="imgs/sobrenos.jpg" class="sobreimg">
  <div class="sobretxt">
    <p>Bem-vindos ao nosso zoológico dedicado à preservação da vida selvagem. Nossa missão é muito mais do que exibir animais raros, buscamos ativamente a conservação de espécies ameaçadas de extinção. Ao proporcionar ambientes naturais e programas de reprodução de animais em extinção, estamos comprometidos em contribuir para a sobrevivência e prosperidade desses magníficos seres vivos. Junte-se a nós nesta jornada de preservação, educação e respeito pela diversidade da fauna mundial.</p>
  </div>
</div>
<br>
<div class="container">
  <div class="animaispulantes">
  
    <img src="imgs/ararasobre.jpg" class="teste">
    <img src="imgs/tigresobre.jpg" class="teste">
    <img src="imgs/girafasobre.jpg" class="teste">
    <img src="imgs/tucanosobre.jpg" class="teste">
  
  </div>
</div>
<br><br><br>
<div class="ingressos">
  <img src="imgs/ingressos.jpg" class="ingressosimg">
</div>
<div class="container2">
  <div class="ingressosfoto">
  <button class="imagem-botao1" onclick="acaoDoBotao()">
    <img src="imgs/5.jpg" class="ingressosfotos">
  </button>
    <button class="imagem-botao2" onclick="acaoDoBotao()">
    <img src="imgs/6.jpg" class="ingressosfotos">
    </button>
    <button class="imagem-botao3" onclick="acaoDoBotao()">
    <img src="imgs/7.jpg" class="ingressosfotos">
    </button>
    <title></title>
    <style>
        .produto {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 20px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .produto p {
            margin: 0;
        }
        .adicionar-carrinho {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            display: inline-block;
            margin-right: 10px;
        }
    </style>
</head>
<body>

    <h1></h1>
    <div id="produtos">
        <!-- Os produtos serão preenchidos dinamicamente -->
    </div>

    <style>
        /* Estilos para o botão */
        .adicionar-carrinho {
            position: absolute;
            top: 2330px;
            left: 190px;
            height: 290px;
            width:260px;
            background-color: transparent;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .adicionar-carrinho1{
            position: absolute;
            top: 2330px;
            left: 800px;
            height: 290px;
            width:260px;
            background-color: transparent;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

    </style>

    <!-- Botões "Adicionar ao Carrinho" fora da tag <script> -->
    <button class="adicionar-carrinho" onclick="adicionarProduto('ingresso inteiro', 90.00)"></button>

    <button class="adicionar-carrinho1" onclick="adicionarProduto('ingresso estudante', 45.00)"></button>
    <script>
  

        window.onload = function() {
            const container = document.getElementById('produtos');

            produtos.forEach(produto => {
                const div = document.createElement('div');
                div.classList.add('produto');
                div.innerHTML = `<p>${produto.nome} - R$ ${produto.preco.toFixed(2)}</p>
                                 <button class="adicionar-carrinho" onclick="adicionarProduto('${produto.nome}', ${produto.preco})">Adicionar ao Carrinho</button>`;
                container.appendChild(div);
            });
        };

        function adicionarProduto(nome, preco) {
            const item = {
                nome: nome,
                preco: preco
            };

            let carrinho = JSON.parse(localStorage.getItem('carrinho')) || [];
            carrinho.push(item);
            localStorage.setItem('carrinho', JSON.stringify(carrinho));

            alert('Produto adicionado ao carrinho!');
        }
    </script>
  </div>
</div>


<?php
  include_once("templates/footer.php");
?>