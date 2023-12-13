<?php
session_start();
if (!isset($_SESSION['nome'])) {
    header('Location: l0gin1.php'); // Redireciona para l0gin1.php se não houver uma sessão ativa
    exit();
}

// Aqui você pode adicionar lógica adicional, se necessário

header('Location: index.php'); // Redireciona para index.php após o login
exit();
?>
