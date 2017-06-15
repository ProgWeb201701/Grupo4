<?php
$hostname = "localhost";
$database = "tcc";
$username = "root";
$password = "";
$connection = mysqli_connect($hostname, $username, $password, $database) or die ("Error " . mysqli_error($connection));

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
?>