<?php
  try
  {
    $conexao = new PDO('mysql:host=localhost; dbname=blog','root','');
    $conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }catch (PDOException $e)
  {
    print"ERROR" . $e->getMessage();
  }
?>
