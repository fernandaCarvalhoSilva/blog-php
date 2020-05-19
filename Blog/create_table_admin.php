<?php
require_once "credenciais.php";

$conn= mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn){
		die("A conexão falhou: " . mysqli_connect_error());
	}
$sql= "CREATE TABLE administrador (
	nome char(50) primary key,
	email char(50) not null,
	username char(20) not null,
	senha integer
	)";
	if(mysqli_query($conn, $sql)){
		echo "Tabela administrador criada com sucesso";
	}
	else{
		echo "Erro ao criar a tabela: " . mysqli_error($conn);
	}
?>