<?php
require_once 'function_table.php';
require_once "credenciais.php";
$conn= mysqli_connect($servername, $username, $password, $dbname);
	if(!$conn){
		die("A conexão falhou: " . mysqli_connect_error());
	}
$stmt= mysqli_stmt_init($conn);
	if(mysqli_stmt_prepare($stmt, 'SELECT idPost, titulo, categoria, autor, imagem from Postagem' )){
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
    <meta name="description" content="Página Administrativa">
    <meta name="author" content="Allana / Fernanda / Gisele">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Página Administrativa</title>

    <link href="cssP/bootstrap.min.css" rel="stylesheet">

    <link href="cssP/dashboard.css" rel="stylesheet">
  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
        <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="#">Sign out</a>
        </li>
      </ul>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">
            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="edit"></span>
                  Nova Postagem <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="external-link"></span>
                  Visualizar Blog
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="box"></span>
                  Todas as Postagens
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="layers"></span>
                  Categorias
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">
                  <span data-feather="users"></span>
                  Comentários
                </a>
              </li>
            </ul>
        </nav>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Todas as Postagens</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                <button class="btn btn-sm btn-outline-secondary">Share</button>
                <button class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <?php
                if (mysqli_num_rows($result) > 0) {
                 echo create_table_mysql($result);
                } 
                else {
                  echo "0 results";
                }
  ?>
              <button class="btn btn-sm btn-outline-secondary dropdown-toggle">
                <span data-feather="calendar"></span>
                This week
              </button>
            </div>
          </div>

          <!-- caixa de Postagens-->


          <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>


    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

  </body>
</html>