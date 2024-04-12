<?php
session_start();
include("conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$contato = $_POST['contato'];
$email = $_POST['email'];
$rua = $_POST['rua'];
$numero = $_POST['numero'];
$complemento = $_POST['complemento'];
$cep = $_POST['cep'];
$cidade = $_POST['cidade'];
$uf = $_POST['uf'];
$senha = md5($_POST['senha']);

// Verifica se o usuário já existe
$sql_check_user = "SELECT COUNT(*) AS total FROM loginPessoal WHERE email = :email";
$stmt_check_user = $pdo->prepare($sql_check_user);
$stmt_check_user->bindParam(':email', $email);
$stmt_check_user->execute();
$row_check_user = $stmt_check_user->fetch(PDO::FETCH_ASSOC);

if ($row_check_user['total'] == 1) {
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro.php');
    exit;
}

// Insere o novo usuário
$sql_insert_user = "INSERT INTO loginPessoal (nome, cpf, contato, email, rua, numero, complemento, cep, cidade, uf, senha) VALUES (:nome, :cpf, :contato, :email, :rua, :numero, :complemento, :cep, :cidade, :uf, :senha)";
$stmt_insert_user = $pdo->prepare($sql_insert_user);
$stmt_insert_user->bindParam(':nome', $nome);
$stmt_insert_user->bindParam(':cpf', $cpf);
$stmt_insert_user->bindParam(':contato', $contato);
$stmt_insert_user->bindParam(':email', $email);
$stmt_insert_user->bindParam(':rua', $rua);
$stmt_insert_user->bindParam(':numero', $numero);
$stmt_insert_user->bindParam(':complemento', $complemento);
$stmt_insert_user->bindParam(':cep', $cep);
$stmt_insert_user->bindParam(':cidade', $cidade);
$stmt_insert_user->bindParam(':uf', $uf);
$stmt_insert_user->bindParam(':senha', $senha);

if ($stmt_insert_user->execute()) {
    $_SESSION['status_cadastro'] = true;
} else {
    echo "Error: " . $sql_insert_user . "<br>" . $stmt_insert_user->errorInfo();
}

header('Location: cadastro.php');
exit;
?>
