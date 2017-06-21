<?php
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$nomeTurma = $_GET['nomeTurma'];
$professor_siape = $_GET['professor_siape'];

$sql = "INSERT INTO aluno (nomeTurma, professor_siape) VALUES ('$nomeTurma', '$professor_siape');";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

if($resultado==1){
	echo "SUCESSO!";
} else {
	echo $resultado;
}

$conn->disconnect();
?>