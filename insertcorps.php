<?php 
//session_start();
//require_once("classesession.php");
include_once 'connexion.php'; 
if(isset($_POST['enregistrer'])) {
  $statut=$_POST['idp1'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $tel=$_POST['tel'];
  $tel2=$_POST['tel2'];


  $req="INSERT INTO `cdi`.`corpsetablissement` (`IDCORPS`, `IDSTATUT`, `NOM`, `PRENOM`, `TEL`, `TEL2`)    
        VALUES(1,1,'$nom','$prenom','$sexe', '$statut','$ouvrage')";
  $stmt_find = $connect->prepare($req);
  $stmt_find->execute();
  $count = $stmt_find->rowCount();
  header('Location:formulaire.php');
  }
 if(isset($_POST['annuler'])) {
  
     header('Location:formulaire.php');
  }
?>