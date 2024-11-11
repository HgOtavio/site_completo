<?php
session_start();

if (!empty($_GET['id_cds'])) {
    include_once('conex.php');

    $id = $_GET['id_cds'];

    // Verifica se o id_cds existe no banco de dados
    $sqlSelect = "SELECT * FROM Cadastro WHERE id_cds = ?";
    $stmt = $conexao->prepare($sqlSelect);
    
    if ($stmt === false) {
        die("Erro na preparação da consulta: " . $conexao->error);
    }

    // Liga o parâmetro e executa a consulta
    $stmt->bind_param("i", $id);  // "i" indica que $id é um inteiro
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Exclui o usuário se ele existir
        $sqlDelete = "DELETE FROM Cadastro WHERE id_cds = ?";
        $stmtDelete = $conexao->prepare($sqlDelete);

        if ($stmtDelete === false) {
            die("Erro na preparação da consulta de exclusão: " . $conexao->error);
        }

        $stmtDelete->bind_param("i", $id);  // "i" indica que $id é um inteiro
        if ($stmtDelete->execute()) {
            // Redireciona após excluir o usuário
            header('Location: login.php');
            exit;
        } else {
            echo "Erro ao excluir o usuário: " . $stmtDelete->error;
        }

        $stmtDelete->close();
    } else {
        echo "Usuário não encontrado.";
    }

    $stmt->close();
}

$conexao->close();
?>