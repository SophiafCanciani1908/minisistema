<?php 
session_start();
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../login/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pessoas Cadastradas</title>
</head>
<body>
    <?php include __DIR__ . '/../includes/header.php';?>
    <main>
        <h1>👥 Lista de Pessoas Cadastradas</h1>
        <p>Abaixo estão todas as alunas e os seus respectivos Personais e Planos:</p>
        <br>
        <?php 
        // Exibe a lista completa usando a função do functions.php
        relatorio($conexao);
        ?>
    </main>
    <?php include __DIR__ . '/../includes/footer.php';?>
</body>
</html>