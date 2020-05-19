<?php
	$username= $_POST["username"];
	$nome= $_POST["nome"];
	$email= $_POST["email"];
	$senha= $_POST["senha"];
	$csenha= $_POST["csenha"];
	$texto= $username. $nome. $email. $senha. $csenha;
    $erro= 0;
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Cadastro submetido</title>
	</head>
	<body>
<?php
	
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
    	if (empty($senha)) {
    		echo "senha é obrigatório";
    	}
		else if (empty($csenha)){
    		echo "senha é obrigatório";
    	}
    	else if($csenha != $senha){
    		echo "senha invalida, as duas senhas inseridas não são compatíveis";
    	}
    	else if (empty($username)){
    		echo "username é obrigatório";
    	}
    	else if (empty($nome)){
    		echo "nome é obrigatório";
    	}
    	else if(!preg_match("/^[a-zA-Z ]*$/", $nome)){
    		echo "caracteres inválidos para nome";
    	}
    	else if (empty($email)){
    		echo "É-mail é obrigatório";
    	}
    	else if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
    		echo "E-mail inválido";
    	}
    }
    if ($erro == 0){
        echo "usuário cadastrado" . "<br>";
        include 'insert_into_admin.php';
    }
    
    function valida($texto){
    	$texto= trim($texto);
    	$texto= stripslashes($texto);
    	$texto= htmlspecialchars($texto);
    	return $texto;
    }
    
   
    
  
  ?>
	</body>
</html>