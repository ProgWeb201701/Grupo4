<?php
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$matricula = $_GET['matricula'];
$nome = $_GET['nome'];
$senha = $_GET['senha'];

$sql = "INSERT INTO aluno (matricula, nome, senha) VALUES ('$matricula', '$nome', '$senha');";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

if($resultado==1){
	echo "SUCESSO!";
} else {
	echo $resultado;
}

$conn->disconnect();
?>