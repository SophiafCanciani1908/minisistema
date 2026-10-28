<?php
require_once '../database/connect.php';

function cadastrar($conexao, $nome, $turma, $nascimento, $ativo, $email)
{
    $sql = "INSERT INTO alunos (nome, turma, nascimento, ativo, email) VALUES (:nome, :turma, :nascimento, :ativo, :email)";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":turma", $turma);
        $stmt->bindValue(":nascimento", $nascimento);
        $stmt->bindValue(":ativo", $ativo);
        $stmt->bindValue(":email", $email);

        $stmt->execute();
        echo "Aluno inserido com sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function apagar($conexao, $id)
{
    $sql = "DELETE FROM alunos WHERE id = :id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        echo "Registro deletado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function relatorio($conexao)
{
    $sql = "SELECT * FROM alunos ORDER BY id";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->execute();

        $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($alunos as $aluno) {
            echo "ID: {$aluno['id']}<br>";
            echo "nome: {$aluno['nome']}<br>";
            echo "turma: {$aluno['turma']}<br>";
            echo "email: {$aluno['email']}<br>";
            echo "ativo: {$aluno['ativo']}<br>";
            echo "<hr>";
        }
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function atualizar($conexao, $id, $nome, $turma, $nascimento, $ativo, $email)
{
    $sql = "UPDATE alunos SET nome = :nome , nascimento = :nascimento , ativo = :ativo , email = :email , turma = :turma WHERE id = :id";

    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->bindValue(":nome", $nome);
        $stmt->bindValue(":turma", $turma);
        $stmt->bindValue(":nascimento", $nascimento);
        $stmt->bindValue(":ativo", $ativo);
        $stmt->bindValue(":email", $email);

        $stmt->execute();
        echo "Aluno atualizado com sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

function consultar($conexao, $id)
{
    $sql = "SELECT * FROM alunos WHERE id = :id";

    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(":id", $id);
    $stmt->execute();

    try {

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":id", $id);
        $stmt->execute();

        $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
        echo "Nome: " . $aluno['nome'] . "<br>";
        echo "Turma: " . $aluno['turma'] . "<br>";
        echo "Nascimento: " . $aluno['nascimento'] . "<br>";
        echo "Ativo: " . $aluno['ativo'] . "<br>";
        echo "Email: " . $aluno['email'] . "<br><br>";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}

// funções para login
function cadastrar_user($conexao, $email, $senha) {
    $sql = "INSERT INTO usuarios (email, senha) VALUES (:email, :senha)";
    try {
        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':email', trim($email));
        $stmt->bindValue(':senha', trim($senha));
        $stmt->execute();
        echo "Usuário inserido com sucesso!";
    } catch(PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}


function consulta_user($conexao, $email)
{
    $sql = "SELECT id, email, senha FROM usuarios WHERE email = :email";

    try {

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(":email", $email);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    }
}
?>