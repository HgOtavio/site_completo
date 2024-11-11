<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include_once('conex.php');

// Teste de conexão com o banco de dados
if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Consulta para recuperar todas as máquinas
$query = "SELECT * FROM Maquina";
$result = $conexao->query($query);

if ($result === false) {
    echo "Erro na consulta: " . $conexao->error;
    exit;
}

echo "<h1>Máquinas Disponíveis</h1>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<h2>" . htmlspecialchars($row['nome_maq']) . "</h2>";
        echo "<p>Preço: R$ " . number_format($row['valor'], 2, ',', '.') . "</p>";
        echo "<p>Quantidade em Estoque: " . $row['quantidade_m'] . "</p>";
    }
} else {
    echo "<p>Nenhuma máquina encontrada.</p>";
}

// Fecha a conexão
$conexao->close();
?>
