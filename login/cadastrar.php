<?php require_once __DIR__ .  '/../includes/functions.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Usuário</title>
</head>
<body>
    <?php include __DIR__ .  '/../includes/header.php';?>
    <main>
        <form action="" method="post">
            <label for="email">email: </label>
            <input type="text" name="email" id="email"><br>
            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha"><br>
            <input type="reset" value="Limpar">
            <input type="submit" value="Cadastrar">

        </form>
        <?php
        if($_SERVER['REQUEST_METHOD'] == "POST"){
        cadastrar_user($conexao, $_POST['email'], $_POST['senha']);
        header("Location: /minisistema/index.php");
        exit();
        }
        ?>
        <?php include __DIR__ . '/../includes/footer.php';?>
    </main>
</body>
</html>
