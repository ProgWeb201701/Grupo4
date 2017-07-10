<?php 
session_start();
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$siape = $_SESSION['usuario'];

if(isset($_POST['check_box']) == true){
foreach($_POST['check_box'] as $matricula){
$matricula = $matricula;

$sql ="INSERT INTO `turma_has_aluno`(`Turma_nomeTurma`, `Aluno_matricula`) VALUES ('".COLOCAR TURMA POR POST."', '".$matricula."') ON DUPLICATE KEY UPDATE `matricula`= '".$matricula."' , `Turma_nomeTurma` = '".COLOCAR TURMA POR POST."';";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
}
echo"<script language='javascript' type='text/javascript'>alert('Alunos adicionados com sucesso!');window.location.href='../perfil.php';</script>";
}
echo"<script language='javascript' type='text/javascript'>alert('Todos os alunos foram removidos da turma!');window.location.href='../perfil.php';</script>";


?>