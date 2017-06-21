<?php
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$idAvaliacao = $_GET['idAvaliacao'];
$nota = $_GET['nota'];
$caminhoFeedback = $_GET['caminhoFeedback'];
$observacao = $_GET['observacao'];

$sql = "INSERT INTO avaliacao (idAvaliacao, nota, caminhoFeedback, observacao) VALUES ('$idAvaliacao', '$nota', '$caminhoFeedback', '$observacao');";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

if($resultado==1){
	echo "SUCESSO!";
} else {
	echo $resultado;
}

$conn->disconnect();
?>