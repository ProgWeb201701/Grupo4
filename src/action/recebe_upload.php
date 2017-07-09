<?php
session_start();
// Envia e renomeia arquivo

if (isset($_POST['submit']))
{
	$filename = $_FILES["file"]["name"];
	$file_basename = substr($filename, 0, strripos($filename, '.')); // get file extention
	$file_ext = substr($filename, strripos($filename, '.')); // get file name
	$filesize = $_FILES["file"]["size"];
	$allowed_file_types = array('.doc','.docx','.rtf','.pdf');	

	if (in_array($file_ext,$allowed_file_types) && ($filesize < 200000000))
	{	
		// Renomeia arquivo
		$newfilename = md5($file_basename) . $file_ext;
		
		include_once '../connection/connection.php';

		$conn = new Connection();
		$connection = $conn->getConnection();

		$sql = "SELECT isFinal from monografia WHERE aluno_matricula = ".$_SESSION['usuario'].";";
		$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));
		$row = $resultado->fetch_assoc();
		if(!$row['isFinal']){
			$sql = "UPDATE monografia SET caminhoEntrega='".$newfilename."', abstract='".$_POST['abstract']."', isFinal='".isset($_POST['final'])."' WHERE aluno_matricula = ".$_SESSION['usuario']."";
			$resultado = mysqli_query($connection, $sql) or die ("Erro ao conectar na tabela " . mysqli_error($connection));

			if($resultado){
				move_uploaded_file($_FILES["file"]["tmp_name"], "../uploads/" . $newfilename);
				echo"<script language='javascript' type='text/javascript'>alert('Monografia enviada com sucesso');window.location.href='../indexAluno.php';</script>";
			}
		} else {
			// se a versão final da monografia ja foi enviada
			echo"<script language='javascript' type='text/javascript'>alert('Voce já enviou a versão final da sua monografia!');window.location.href='../indexAluno.php';</script>";
		}

		

	}
	elseif (empty($file_basename))
	{	
		// erro na seleção de arquivo
		echo"<script language='javascript' type='text/javascript'>alert('Por favor selecione um arquivo para enviar!');window.location.href='../enviarMonografia.php';</script>";
	} 
	elseif ($filesize > 200000000)
	{	
		// erro de tamanho de arquivo
		echo"<script language='javascript' type='text/javascript'>alert('O arquivo que voce está tentando enviar é grande demais.');window.location.href='../enviarMonografia.php';</script>";
	}
	else
	{
		// erro de tipo de aquivo
		echo"<script language='javascript' type='text/javascript'>alert('Apenas esses tipos de arquivos podem ser enviados: " . implode(', ',$allowed_file_types)."');window.location.href='../enviarMonografia.php';</script>";
		unlink($_FILES["file"]["tmp_name"]);
	}
}

?>