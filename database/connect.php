<?php
$host = "192.168.10.70";
$dbname = "escola";
$user = "postgres";
$pass = "SENAI@1908"; 

try {
    $conexao = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass
    );
    echo "Conexão realizada com sucesso!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit();
}
?>