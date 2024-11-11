<?php
session_start();
include_once('conex.php');

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['finalizar'])) {
    $email = $_SESSION['email'];
    $query = "SELECT id_cds FROM Cadastro WHERE email = ?";
    $stmt = $conexao->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    if (!$usuario) {
        echo "Usuário não encontrado.";
        exit;
    }

    $id_usuario = $usuario['id_cds'];
    $nome_cartao = $_POST['nome_cartao'];
    $numero_cartao = $_POST['numero_cartao'];
    $validade = $_POST['validade'];
    $cvv = $_POST['cvv'];

    // Insere os dados de pagamento
    $query_pagamento = "INSERT INTO Pagamento (id_usuario, nome_cartao, numero_cartao, validade, cvv) VALUES (?, ?, ?, ?, ?)";
    $stmt_pagamento = $conexao->prepare($query_pagamento);
    $stmt_pagamento->bind_param("issss", $id_usuario, $nome_cartao, $numero_cartao, $validade, $cvv);

    if ($stmt_pagamento->execute()) {
        // Limpa o carrinho e redireciona
        unset($_SESSION['carrinho']);
        $_SESSION['message'] = "Compra realizada com sucesso!";
        header("Location: maquinas.php");
        exit;
    } else {
        echo "Erro ao processar o pagamento. Por favor, tente novamente.";
}
}
?>