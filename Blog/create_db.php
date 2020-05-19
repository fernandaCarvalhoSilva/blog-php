<?php
require_once "credenciais.php";
$conn= mysqli_connect($servername, $username, $password);
	if (!$conn){
		die("A conexão falhou: " . mysqli_connect_error());
	}
$sql= "CREATE DATABASE $dbname";
	if (mysqli_query($conn, $sql)){
		echo "Database criada com sucesso";
	} 
	else{
		echo "Erro ao criar database: " . mysqli_error($conn);
	}
	mysqli_close($conn);
?>