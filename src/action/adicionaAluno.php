<?php 
session_start();
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$siape = $_SESSION['usuario'];
$sql = "SELECT nomeTurma FROM turma WHERE Professor_siape = $siape;";
$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
$row=$resultado->fetch_assoc();
$turma = $row['nomeTurma'];

$sqlDel ="DELETE FROM `turma_has_aluno` WHERE `Turma_nomeTurma` = '".$turma."';";

$resultado = mysqli_query($connection, $sqlDel) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

if(isset($_POST['check_box']) == true){
	foreach($_POST['check_box'] as $matricula){

		$sql ="INSERT INTO `turma_has_aluno`(`Turma_nomeTurma`, `Aluno_matricula`) VALUES ('".$turma."', '".$matricula."') ON DUPLICATE KEY UPDATE `Turma_nomeTurma`= '".$turma."' , `Aluno_matricula` = '".$matricula."';";

		$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
	}
	echo"<script language='javascript' type='text/javascript'>alert('Alunos alterados com sucesso!');window.location.href='../indexCoordenador.php';</script>";
}
echo"<script language='javascript' type='text/javascript'>alert('Todos os alunos foram removidos!');window.location.href='../indexCoordenador.php';</script>";


?>