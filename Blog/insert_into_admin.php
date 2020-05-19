<?php
require_once "credenciais.php";
$conn= mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("A conexão falhou: " . mysqli_connect_error());
	}
include_once "form_cadastro.php";
$username= $_POST["username"];
$nome= $_POST["nome"];
$email= $_POST["email"];
$senha= $_POST["senha"];

$sql=  "INSERT INTO administrador(username, nome, email, senha)
VALUES ('$username', '$nome', '$email', $senha)";
	if (mysqli_query($conn, $sql)){
		echo "Dados inseridos";
	}
	else{
		echo "Erro: " . $sql . "<br>" . mysqli_error($conn);
	}
	mysqli_close($conn);
?>