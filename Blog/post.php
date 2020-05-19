<?php
	$autor= $_POST["autor"];
	$titulo= $_POST["titulo"];
	$categoria= $_POST["categoria"];
	$texto= $_POST["texto"];
	$valida= $autor. $titulo. $categoria. $img. $texto;
	$erro= 0;
	$target_dir= "uploads/";
	$target_file= $target_dir . basename($_FILES["img"]["name"]);
	$upload0k= 1;
	$imageFileType= strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8">
		<title>Postagem submetida</title>
	</head>
	<body>
<?php
	if(isset($_POST["submit"])){
			$check= getimagesize($_FILES["img"]["tmp_name"]);
			if($check !== false){
				echo "O arquivo é uma imagem - " . $check["mime"] . ".";
				echo "<br>" . "Localizado em: " . $target_file;
				$upload0k= 1;
			}
			else{
				echo "O arquivo não é uma imagem";
				$upload0k= 0;
			}
		}
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		
		if (empty($autor)){
			echo "Autor é um campo obrigatório";
			$erro= 1;
		}
		else if (empty($titulo)){
			echo "Titulo é um campo obrigatório";
			$erro= 1;
		}
		else if (empty($categoria)){
			echo "Selecione uma categoria";
			$erro= 1;
		}
		else if (!preg_match("/^[a-zA-Z ]*$/", $autor)){
			echo "Caracteres inválidos para o campo autor";
			$erro= 1;
		}

		if ($erro == 0){
			echo "<br>" . "Postagem submetida" . "<br>" ;
			include 'insert_into_posts.php';
		}
	}


	function valida($valida){
		$texto= trim($texto);
		$texto= stripslashes($texto);
		$texto= htmlspecialchars($texto);
		return $texto;
	}

	

?>
	
	</body>
</html>