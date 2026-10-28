<?php 
session_start(); 
require_once __DIR__ . '/../includes/functions.php'; 

$erro = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $usuario = consulta_user($conexao, $email);

    if ($usuario && $usuario['senha'] == $senha) { 
        $_SESSION['id'] = $usuario['id'];
        header("Location: ../index.php");
        exit();
    } else {
        $erro = "Usuário ou senha inválidos.";
    }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php include __DIR__ . '/../includes/header.php'; ?>
    <main>
        <?php if (!empty($erro)): ?>
            <p style="color: red;"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form action="" method="post">
            <label for="email">E-mail: </label>
            <input type="email" name="email" id="email" required><br>

            <label for="senha">Senha: </label>
            <input type="password" name="senha" id="senha" required><br>

            <input type="reset" value="Limpar">
            <input type="submit" value="Entrar">
        </form>

        <?php include __DIR__ . '/../includes/footer.php'; ?>
    </main>
</body>

</html>