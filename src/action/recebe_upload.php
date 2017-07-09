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
				echo "Arquivo enviado com sucesso.";
			}
		} else {
			echo "Voce já enviou a versão final da sua monografia!";
		}

		

	}
	elseif (empty($file_basename))
	{	
		// erro na seleção de arquivo
		echo "Por favor selecione um arquivo para enviar.";
	} 
	elseif ($filesize > 200000000)
	{	
		// erro de tamanho de arquivo
		echo "o arquivo que voce está tentando enviar é grande demais.";
	}
	else
	{
		// erro de tipo de aquivo
		echo "Apenas esses tipos de arquivos podem ser enviados: " . implode(', ',$allowed_file_types);
		unlink($_FILES["file"]["tmp_name"]);
	}
}

?>