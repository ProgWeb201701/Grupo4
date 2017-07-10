<?php
session_start();
include_once '../connection/connection.php';
$conn = new Connection();
$connection = $conn->getConnection();
$nome = $_POST['nome'];
$usuario = $_POST['usuario'];
$senha = $_POST['senha'];
$email = $_POST['email'];

if (isset($_POST['submit']))
{
	$sql;
	if($_SESSION['sou']>1){
        $sql = "UPDATE professor SET nome = '$nome', siape = '$usuario', senha = '$senha', email = '$email' WHERE siape = '$usuario';";
        
    } else {
        $sql = "UPDATE aluno SET nome = '$nome', matricula = '$usuario', senha = '$senha', email = '$email' WHERE matricula = '$usuario';";
    }

	$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

	if($resultado){
		$_SESSION['usuario'] = $usuario;
		echo"<script language='javascript' type='text/javascript'>alert('Perfil atualizado com sucesso!');window.location.href='../login.html';</script>";
	} else {
		echo"<script language='javascript' type='text/javascript'>alert('Não foi possivel atualizar seu perfil!');</script>";
	}
}
?>