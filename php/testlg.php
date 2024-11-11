<?php
session_start();

if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['senha'])) {
    include_once('conex.php');
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta o banco para obter o hash da senha
    $sql = "SELECT * FROM Cadastro WHERE email = '$email'";
    $result = $conexao->query($sql);

    if($result && mysqli_num_rows($result) > 0) {
        $usuario = mysqli_fetch_assoc($result);

        // Verifica a senha com o hash armazenado
        if(password_verify($senha, $usuario['senha'])) {
            // Se a senha estiver correta, define as variáveis de sessão
            $_SESSION['email'] = $email;
            $_SESSION['user_id'] = $usuario['id_cds'];  // Supondo que `id_cds` é o identificador do usuário
            header('Location: homesite02.php');
            exit();
        } else {
            // Se a senha estiver incorreta
            $_SESSION['login_error'] = "Senha incorreta.";
            header('Location: login.php');
            exit();
        }
    } else {
        // Se o email não existe
        $_SESSION['login_error'] = "Email não encontrado.";
        header('Location: login.php');
        exit();
    }
} else {
    // Se o formulário não for enviado corretamente
    header('Location: login.php');
    exit();
}