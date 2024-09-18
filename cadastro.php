<?php
require_once 'conexao.php';
if (isset($_POST['cadastrar'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

    try{
        $query = "INSERT INTO usuarios (nome, email, senha) VALUES (:nome, :email, :senha)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        if ($stmt->execute()){
            echo "Usuario cadastrado com sucesso!";
        }
        else{
            echo "Erro ao cadastrar usuario.";
        }
    } catch (PDOException $e){
        echo "Erro: " . $e->getMessage();
    }
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Cadastro de Usuario</title>
    </head>
<body>
    <h1>CADASTRO DE NOVO USUARIO</H1>
    <form action="cadastro.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        
        <input type="submit" name="cadastrar" value="Cadastrar">
        <button type="reset" class="btn-limpar">Limpar</button>
        <button type="button" class="btn-voltar" onclick="window.location.href='index5.html'">Voltar</button>
    </form>
</body>
</html>