<?php
include_once('conex.php');

if (isset($_POST['update'])) {
    // Confirma se o formulário foi enviado
    $id = $_POST['id_cds'];
    $nome = $_POST['nome'];
    $senha_antiga = $_POST['senha_antiga'];
    $senha_nova = $_POST['senha_nova'];
    $senha_nova_confirm = $_POST['senha_nova_confirm']; // Nova senha confirmada
    $email = $_POST['email'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $estado = $_POST['estado'];
    $pais = $_POST['pais'];
    $bairro = $_POST['bairro'];
    $numero = $_POST['numero'];
    $complemento = $_POST['complemento'];

    // Verifica se a nova senha e a confirmação são iguais
    if ($senha_nova !== $senha_nova_confirm) {
        echo "As senhas novas não coincidem.";
        exit;
    }

    // Verifica se a conexão com o banco de dados está ativa
    if (!$conexao) {
        die("Erro de conexão: " . $conexao->connect_error);
    }

    // Recupera a senha atual do banco de dados
    $sqlSelect = "SELECT senha FROM Cadastro WHERE id_cds = '$id'";
    $result = $conexao->query($sqlSelect);

    if ($result && $result->num_rows > 0) {
        $user_data = $result->fetch_assoc();
        $senha_atual = $user_data['senha'];

        // Verifica se a senha antiga fornecida é igual à senha armazenada no banco de dados
        if (password_verify($senha_antiga, $senha_atual)) {
            // Se a senha antiga estiver correta, atualiza a senha nova, se fornecida
            if (!empty($senha_nova)) {
                // Criptografa a nova senha
                $senha_nova_hash = password_hash($senha_nova, PASSWORD_DEFAULT);
            } else {
                // Caso a senha nova não tenha sido fornecida, mantém a senha atual
                $senha_nova_hash = $senha_atual;
            }

            // Prepara e executa a consulta de atualização
            $stmt = $conexao->prepare("UPDATE Cadastro 
                SET nome=?, senha=?, email=?, cep=?, cidade=?, estado=?, pais=?, bairro=?, numero=?, complemento=? 
                WHERE id_cds=?");

            if ($stmt === false) {
                die("Erro na preparação da consulta: " . $conexao->error);
            }

            // Faz a ligação dos parâmetros e executa
            $stmt->bind_param("ssssssssssi", $nome, $senha_nova_hash, $email, $cep, $cidade, $estado, $pais, $bairro, $numero, $complemento, $id);

            if ($stmt->execute()) {
                // Redireciona após a atualização bem-sucedida
                header('Location: Betasite.php');
                exit;
            } else {
                echo "Erro ao atualizar os dados: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Caso a senha antiga não seja válida, exibe uma mensagem de erro
            echo "Senha antiga incorreta.";
        }
    } else {
        echo "Erro ao recuperar os dados do usuário.";
    }

    $conexao->close();
}
?>