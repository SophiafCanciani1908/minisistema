<?php 
session_start();
require_once __DIR__ . '../includes/functions.php';
require_once __DIR__ . '../login/verifica_user.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
   
    <title>Cadastrar Usuário</title>
</head>
<body>
    <?php include __DIR__ . '../includes/header.php';?>
    <main>
        <form action="" method="post">
            <label for="nome">Nome: </label>
            <input type="text" name="nome" id="nome"><br>
            <label for="turma">Turma: </label>
            <input type="text" name="turma" id="turma"><br>
            <label for="email">E-mail: </label>
            <input type="text" name="email" id="email"><br>
            <label for="nascimento">Nascimento: </label>
            <input type="date" name="nascimento" id="nascimento"><br>
            <label for="ativo">Ativo: </label>
            <input type="radio" name="ativo" id="ativo" value="true">
            <label for="ativo">Sim</label>
            <input type="radio" name="ativo" id="ativo" value="false">
            <label for="ativo">Não</label> <br>
            <input type="reset" value="Limpar">
            <input type="submit" value="Cadastrar">

        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST")
        cadastrar($conexao, $_POST['nome'], $_POST['turma'], $_POST['nascimento'], $_POST['ativo'], $_POST['email']);
        ?>
        <?php include __DIR__ . '/../includes/footer.php';?>
    </main>
</body>
</html>