<?php
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$titulo = $_POST['titulo'];
$matricula = $_POST['aluno'];
$orientador = $_POST['orientador'];
$coorientador = $_POST['coorientador'];

$sql = "INSERT INTO monografia (titulo, aluno_matricula, professor_orientador, Professor_Coorientador) VALUES ('$titulo', '$matricula', '$orientador', '$coorientador');";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

if ($resultado) {
	echo"<script language='javascript' type='text/javascript'>alert('Monografia atribuida com sucesso!');window.location.href='../monografias.php';</script>";
	    die();
} else {
	echo"<script language='javascript' type='text/javascript'>alert('Não foi possivel atribuir uma monografia a esse aluno.');window.location.href='../monografias.php';</script>";
	    die();
}
$conn->disconnect();
?>