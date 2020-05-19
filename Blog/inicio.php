
<?php
require_once "credenciais.php";
$conn= mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("A conexão falhou: " . mysqli_connect_error());
	}
$stmt= mysqli_stmt_init($conn);
	if(mysqli_stmt_prepare($stmt, 'SELECT * from Postagem order by idPost' )){
		$query= "2";

		mysqli_stmt_bind_param($stmt, "s", $query);

		mysqli_stmt_execute($stmt);

		$result= mysqli_stmt_get_result($stmt);

		mysqli_stmt_fetch($stmt);

		mysqli_stmt_fetch($stmt);

		mysqli_stmt_close($stmt);
	}

mysqli_close($conn);
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog">
    <meta name="author" content="Allana / Fernanda / Gisele">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Blog Template for Bootstrap</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <link href="css/blog.css" rel="stylesheet">
  </head>

  <body>
  <?php
  if (mysqli_num_rows($result) > 0) {
      echo create_table_mysql($result);
  } else {
      echo "0 results";
  }
  ?>
</body>
</html>