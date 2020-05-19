<?php
require_once "credenciais.php";

$conn= mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("A conexão falhou: " . mysqli_connect_error());
	}
$sql= "CREATE TABLE Postagem (
	idPost integer primary key auto_increment,
	autor char(50) not null,
	titulo char (120) not null,
	imagem varchar(200),
	texto char(255)
	)";
	if (mysqli_query($conn, $sql)){
		echo "tabela postagem criada com sucesso";
	}
	else{
		echo "Erro ao criar a tabela: " . mysqli_error($conn);
	}
?>