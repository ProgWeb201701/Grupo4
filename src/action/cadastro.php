<?php 
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$nome = $_POST["nome"];
$matriculaSiape = $_POST["matriculaSiape"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$sou = $_POST["aluno_ou_professor"];

$sql;
if($sou == "aluno"){
	$sql = "INSERT INTO aluno(nome, matricula, senha, email) VALUES ('".$nome."', '".$matriculaSiape."', '".$senha."', '".$email."');";
} else if($sou == "professor"){
	$sql = "INSERT INTO professor(nome, siape, senha, email) VALUES ('".$nome."', '".$matriculaSiape."', '".$senha."', '".$email."');";
}

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

header('Location: http://localhost/grupo4/src/login.html');

?>