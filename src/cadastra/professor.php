<?php
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$siape = $_GET['siape'];
$nome = $_GET['nome'];
$senha = $_GET['senha'];

$sql = "INSERT INTO professor (siape, nome, senha) VALUES ('$siape', '$nome', '$senha');";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

if($resultado==1){
	echo "SUCESSO!";
} else {
	echo $resultado;
}

$conn->disconnect();
?>