<?php

  include_once("config/url.php");
  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- FONTES  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jura:wght@300&display=swap" rel="stylesheet">
    <!-- CSS  -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>css/style.css">

</head>
<body>
    <div class="fixo">
        <header>
            <table>
                <a href="<?= $BASE_URL ?>index.php"><img src="imgs/logo.jpg" class="logo"></a>
                    <div class="login">  
                    <a href="<?= $BASE_URL ?>l0gin1.php">Entrar</a>
                    <a href="<?= $BASE_URL ?>cadastro.php">Criar Conta</a>
                    <a href="<?= $BASE_URL ?>carrinho.php"><img src="imgs/carrinhofoto.png" width="60px"></a> 
                    </div>
            </table>
        </header>
        <div class="nav">
            <a href="agende.php">AraraZOO Hotel</a>
            <a href="nossosAnimaisArara.php">Nossos Animais</a>
            <a href="nossosProjetosArara.php">Nosso Projeto</a>
            <a href="contato.php">Contato</a>
        </div>
    </div>
