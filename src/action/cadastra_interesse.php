<?php 
session_start();
include_once '../connection/connection.php';

$conn = new Connection();
$connection = $conn->getConnection();

$siape = $_SESSION['usuario'];

foreach($_POST['check_box'] as $idInteresse){
$idInteresse = $idInteresse; 

$sql ="INSERT INTO `prof_has_interesse`(`siape`, `idInteresse`) VALUES ('".$siape."', '".$idInteresse."') ON DUPLICATE KEY UPDATE `siape`= '".$siape."' , `idInteresse` = '".$idInteresse."';";

$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
}

echo"<script language='javascript' type='text/javascript'>alert('Areas de interesse alteradas com sucesso!');window.location.href='../perfil.php';</script>";

?>