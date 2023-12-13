<?php
session_start();
?>

<?php
include_once("templates/header.php"); 
?>
<link rel="stylesheet" href="css/login.css">
<style>
    .notification {
    background: red;
    color: white;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
    margin-top: 20px;
}
</style>
    <?php
    if (isset($_SESSION['nao_autenticado'])) :
    ?>
        <div class="notification">
            <p>ERRO: Usuário ou senha inválidos.</p>
        </div>
    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>
    <div class="login-container">
        <form action="login.php" method="POST">
            <div class="imagem">
                <img src="imgs/login.png" width="320" text-align=center; alig height="205" />
            </div>

            <div class="link-wrapper">
        <a href="cadastro.php">Cadastrar-se AQUI</a>
         </div>

         <br> <br>

            <input name="email" class="login-container input" placeholder="Seu e-mail" autofocus="">
            <br>
            <input name="senha" class="login-container input" type="password" placeholder="Sua senha">
    </div>
    </div>


    <button type="submit" class="buttonLog">Entrar</button>
    </form>
    </div>
    <br><br><br><br>

    <?php
  include_once("templates/footer.php");
?>
