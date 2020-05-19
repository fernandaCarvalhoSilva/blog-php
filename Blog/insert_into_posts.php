<?php
require_once "credenciais.php";
$conn= mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("A conexão falhou: " . mysqli_connect_error());
	}
include_once "post.php";
$autor= $_POST['autor'];
$titulo= $_POST['titulo'];
$categoria= $_POST['categoria'];
$texto= $_POST['texto'];
$dir= "uploads/";
$img= $dir . basename($_FILES["img"]["name"]);

$sql= "INSERT INTO Postagem (autor, titulo, imagem, texto, categoria)
VALUES ('$autor', '$titulo', '$img', '$texto', '$categoria')";
	if (mysqli_query($conn, $sql)){
		echo "Dados inseridos";
	}
	else{
		echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);

?>