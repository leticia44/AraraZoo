<?php
include_once("templates/header.php"); 
?>

<div class="imagem">
    <center> <img src="cadastre-se.png" width="450px" /> </center>
</div>
<link rel="stylesheet" type="text/css" href="cadastro.css">
</head>

<body>

    <div id="notification" class="notification">
       
        <p>Faça login informando o seu usuário e senha <a href="l0gin1.php">aqui</a></p>
    </div>


    <form action="cadastrar.php" method="POST">
        <div class="forms">
        <div>
            <h2>Nome:</h2>
            <input name="nome" type="text" class="forms1" autofocus> <br>

            <h2>Email:</h2>
            <input name="email" type="email" class="forms1"> <br>

            <h2>CPF:</h2>
            <input name="cpf" type="text" class="forms1" oninput="formatarCPF(this)" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}"><br>

            <h2>CEP:</h2>
            <input name="cep" type="text" class="forms1" oninput="formatarCEP(this)" pattern="\d{5}-\d{3}"><br>

            <h2>Número:</h2>
            <input name="numero" type="text" class="forms2">

        </div>
        <div>
            <h2>Complemento:</h2>
            <input name="complemento" type="text" class="forms1"> <br>

            <h2>Rua:</h2>
            <input name="rua" type="text" class="forms1"> <br>
            <h2>Telefone:</h2>
            <input name="telefone" type="text" class="forms1"><br>
            <h2>Senha:</h2>
            <input name="senha" class="forms1" type="password"><br>
        </div>
        </div>
</div>
    <button type="submit" class="button is-block is-link is-large is-fullwidth">Cadastrar</button>
</form>
    <script>
        function formatarCPF(campo) {
            campo.value = campo.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            campo.value = campo.value.slice(0, 11); // Limita o CPF a 11 dígitos

            if (campo.value.length > 3) {
                campo.value = campo.value.replace(/(\d{3})(\d{3})?(\d{3})?(\d{2})?/, '$1.$2.$3-$4');
            } else if (campo.value.length > 6) {
                campo.value = campo.value.replace(/(\d{3})(\d{3})(\d{3})?(\d{2})?/, '$1.$2.$3-$4');
            } else if (campo.value.length > 9) {
                campo.value = campo.value.replace(/(\d{3})(\d{3})(\d{3})(\d{2})/, '$1.$2.$3-$4');
            }
        }

        function formatarCEP(campo) {
            campo.value = campo.value.replace(/\D/g, ''); // Remove caracteres não numéricos
            campo.value = campo.value.slice(0, 8); // Limita o CEP a 8 dígitos

            if (campo.value.length > 5) {
                campo.value = campo.value.replace(/(\d{5})(\d{3})/, '$1-$2');
            }
        }
    </script>

<?php
  include_once("templates/footer.php");
?>