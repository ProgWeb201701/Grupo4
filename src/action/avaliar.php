<?php 
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$nota = $_POST["nota"];
$caminhoFeedback = "md5 aqui";
$observacao = $_POST["comentarios"];

$sql = "INSERT INTO avaliacao(nota, caminhoFeedback, observacao) VALUES ('".$nota."', '".$caminhoFeedback."', '".$observacao."');";
$sqlconsulta ="SELECT max(idAvaliacao) FROM avaliacao";


$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
$resultado2 = mysqli_query($connection, $sqlconsulta) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

$idAvaliacao;
while($row = $resultado2->fetch_assoc()) {
	$idAvaliacao = $row["max(idAvaliacao)"];
}
$sql4 = "INSERT INTO prof_avalia_monografia (Professor_siape, Monografia_idMonografia, Avaliacao_idAvaliacao) VALUES (123, 1, ".$idAvaliacao.");";


$resultado = mysqli_query($connection, $sql4) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

header('Location: http://localhost/grupo4/src/avaliacoes.php');

 ?>