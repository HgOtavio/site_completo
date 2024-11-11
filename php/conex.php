<?php
// Informações de conexão ao banco de dados MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Eli_work1178";

// Criando a conexão ao banco de dados
$conexao = new mysqli($servername, $username, $password, $dbname);

 //Verificando se a conexão foi bem-sucedida
 //if ($conexao->connect_error) {
   // echo"Falha na conexão ";
//}
// echo  "sucesso na conexão ";//


// Fechar a conexão
//$conexao->close();


?>