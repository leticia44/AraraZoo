<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
$cep = mysqli_real_escape_string($conexao, trim($_POST['cep']));
$numero = mysqli_real_escape_string($conexao, trim($_POST['numero']));
$complemento = mysqli_real_escape_string($conexao, trim($_POST['complemento']));
$rua = mysqli_real_escape_string($conexao, trim($_POST['rua']));
$telefone = mysqli_real_escape_string($conexao, trim($_POST['telefone']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql_check_user = "SELECT COUNT(*) AS total FROM usuario WHERE email = '$email'";
$result_check_user = mysqli_query($conexao, $sql_check_user);
$row_check_user = mysqli_fetch_assoc($result_check_user);

if ($row_check_user['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro.php');
    exit;
}

$sql_insert_user = "INSERT INTO usuario (nome, email, cpf, cep, numero, complemento, rua, telefone, senha, data_cadastro) VALUES ('$nome', '$email', '$cpf', '$cep', '$numero', '$complemento', '$rua', '$telefone', '$senha', NOW())";

if ($conexao->query($sql_insert_user) === TRUE) {
    $_SESSION['status_cadastro'] = true;
} else {
    echo "Error: " . $sql_insert_user . "<br>" . $conexao->error;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>
