<?php
    $host = 'localhost';
    $dbname = 'cdi';
    $username = 'root';
    $password = '';
 
  try {
  
    $conn = new PDO('mysql:host=localhost;dbname=CDI;charset=utf8', 'root', '');
    $conn->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_WARNING);
    $conn->setAttribute(pdo::ATTR_DEFAULT_FETCH_MODE,pdo::FETCH_ASSOC);
    //echo "Connecté à $dbname sur $host avec succès.";
    
  } catch (PDOException $e) {
  
    die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());
    
  }
  $conn->query("set names'utf8' ");
?>
