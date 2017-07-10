<?php
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$titulo = $_POST['titulo'];
$matricula = $_POST['aluno'];
$orientador = $_POST['orientador'];
$coorientador = $_POST['coorientador'];
$avaliador1 = $_POST['avaliador1'];
$avaliador2 = $_POST['avaliador2'];

$sql = "INSERT INTO monografia (titulo, aluno_matricula, professor_orientador, Professor_Coorientador) VALUES ('$titulo', '$matricula', '$orientador', '$coorientador');";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

if ($resultado) {
	$sql = "SELECT max(idMonografia) FROM monografia;";
	$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
	$row = $resultado->fetch_assoc();
	$idMonografia = $row['max(idMonografia)'];

	$sql = "INSERT INTO prof_avalia_monografia (monografia_idMonografia, professor_siape) VALUES ($idMonografia, $avaliador1), ($idMonografia, $avaliador2);";
	mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

	echo"<script language='javascript' type='text/javascript'>alert('Monografia atribuida com sucesso!');window.location.href='../monografias.php';</script>";
	    die();
} else {
	echo"<script language='javascript' type='text/javascript'>alert('Não foi possivel atribuir uma monografia a esse aluno.');window.location.href='../monografias.php';</script>";
	    die();
}
$conn->disconnect();
?>