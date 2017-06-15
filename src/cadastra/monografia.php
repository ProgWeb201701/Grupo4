<?php
$hostname = "localhost";
$database = "tcc";
$username = "root";
$password = "";
$connection = mysqli_connect($hostname, $username, $password, $database) or die ("Error " . mysqli_error($connection));

$versao = $_GET['versao'];
$titulo = $_GET['titulo'];
$matricula = $_GET['matricula'];

$sql = "INSERT INTO monografia (versao, titulo, matricula) VALUES ('$versao', '$titulo', '$matricula');";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

if($resultado==1){
	echo "SUCESSO!";
} else {
	echo $resultado;
}
?>