<?php
    try {
        // Substitua 'caminho/para/seu/banco/de/dados.db' pelo caminho real do seu arquivo de banco de dados SQLite
        $pdo = new PDO('login.db');
    } catch (PDOException $e) {
        echo "Erro!: " . $e->getMessage();
        die();
    }
?>
