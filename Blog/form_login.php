<?php
$email= $_POST['email'];
$senha= $_POST['senha'];
$texto= $email. $senha;

//verifica se os campos foram deixados em branco
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    	if (empty($senha)) { 
    		echo "senha é obrigatório";
    	}
    	else if(empty($email)){
    		echo "email é obrigatório";
    	}
}

//faz a conexão com o banco de dados
require_once 'credenciais.php'; 
$conn= mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("A conexão falhou: " . mysql_connect_error());
	}
//faz o select só da senha e do email do usuário administrador já cadastrado
$sql= "SELECT email, senha FROM administrador";
$result= mysqli_query($conn, $sql);
	if(mysqli_num_rows($result) > 0){ //se o numero de colunas for maior que 0
		while ($row= mysqli_fetch_assoc($result)) { // perguntar o que mysqli_fetch_assoc faz
			if (($email == $row["email"]) && ($senha == $row["senha"])){ // valida se o email E a senha de entrada são iguais à alguma linha da coluna email e da coluna senha
				$login= 1; //se sim login passa a valer 1
			}
			else if (($email != $row["email"]) || ($senha != $row["senha"])){ // valida se o email OU a senha de entrada são diferentes às linhas da coluna email e da coluna senha
				$login= 0; //se sim login vale 0
			}
		 $reg= $reg + $login; //faz uma soma dos valores das condicionais enquanto o loop durar
		}

		if($reg != 0){ //se o valor somado for diferente de 0 o usuário é redirecionado para a página de administrador do blog
			include_once 'pageAdministrativa.html';
		}
		else{ // se não é impresso na tela que o usuário não foi encontrado
			echo "usuário não encontrado";
		}

	}
// encerra a conexão
mysqli_close($conn);


?>