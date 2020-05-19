<?php
require_once "credenciais.php";
$conn= mysqli_connect($servername, $username, $password, $dbname);
  if(!$conn){
    die("A conexão falhou: " . mysqli_connect_error());
  }

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

    <div class="container">
      <header class="blog-header py-3">
        <div class="row flex-nowrap justify-content-between align-items-center">
          <div class="col-4 pt-1">
            <a class="text-muted" href="cadastro-adm.html">Subscribe</a> <!--manter? -->
          </div>
          <div class="col-4 text-center">
            <a class="blog-header-logo text-dark" href="#">O BLOG</a>
          </div>
          <div class="col-4 d-flex justify-content-end align-items-center">
            <a class="text-muted" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mx-3"><circle cx="10.5" cy="10.5" r="7.5"></circle><line x1="21" y1="21" x2="15.8" y2="15.8"></line></svg>
            </a>
            <a class="btn btn-sm btn-outline-secondary" href="login.html">Sign up</a>
          </div>
        </div>
      </header>

      <div class="nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="index2.php">Inicio</a>
          <a class="p-2 text-muted" href="filmes.php">Cinema</a>
          <a class="p-2 text-muted" href="livros.php">Livros</a>
          <a class="p-2 text-muted" href="jogos.php">Jogos</a>
          <a class="p-2 text-muted" href="musica.php">Música</a>
          <a class="p-2 text-muted" href="#">Séries</a>
          <a class="p-2 text-muted" href="sbbre.php">Sobre</a>
        </nav>
      </div>
          
    <main role="maini" class="container">
      <div class="row">
        <div class="col-md-8 blog-main">
          

          <div class="blog-post" method= "post" >
            <h2 class="blog-post-title"> </h2>
            <p class='blog-post-meta' name= "sql">
        <?php
        require_once "credenciais.php";
        $conn= mysqli_connect($servername, $username, $password, $dbname);
          if(!$conn){
            die("A conexão falhou: " . mysqli_connect_error());
          }

        $categoria= $_POST["categoria"];
        $sql= 'SELECT * FROM Postagem WHERE Postagem.categoria= "Séries" order by idPost';
       $result= $conn->query($sql);

        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()){
            echo "<h2> " . $row["titulo"]. "</h2>" . "<p class='blog-post-meta'>"  . $row["autor"]. "</p>" .  "<br>" . "<img src='" . $row["imagem"] . "'>". "<br>" . "<br>" . $row["texto"]. "<br>";
          }
        }
        else {
          echo "0 results";
        }
      $conn->close();
        ?>
      </p>
      </div>
    </div>
   </div>
   </main>
    
</div>
</body>
  </html>