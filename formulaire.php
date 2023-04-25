<?php error_reporting(0);  ?>

<?php include_once 'doctype.php';  ?>
<?php include_once 'menu.php';  ?> 
<?php include_once 'connexion.php'; ?>
     <!--<div id="content_header"></div>-->   
<?php

//on recupere les informations entrées du formulaire

        @$nom      = $_POST["nom"];
        @$prenom   = $_POST["prenom"];
        @$tel      = $_POST["tel"];
        @$tel2     = $_POST["tel2"];
        @$statut   = $_POST["statut"];
        @$ouvrage  = $_POST["ouvrage"];
        @$envoyer  = $_POST["Envoyer"];
        //au click sur envoyer
        if (isset($envoyer)){
        //si le champ nom n'est pas rempli
          if(empty($nom))//&& empty($tel)&& empty($statut) && empty($ouvrage))
            $message='<div class="erreur">Saisissez un Nom.</div>';
            //header ("Refresh: 0;URL=formulaire.php");
            else if (empty($tel))
            $message='<div class="erreur">Saisissez un numero de téléphone.</div>';
            else if (empty($statut))
            $message='<div class="erreur">selectionner un statut.</div>';
            else if (empty($ouvrage))
            $message='<div class="erreur">selectionner un ouvrage.</div>';
             
            else{

              //$conn = new PDO('mysql:host=localhost;dbname=cdi;charset=utf8', 'root', '');
              //$conn->setAttribute(pdo::ATTR_ERRMODE,pdo::ERRMODE_WARNING);
              //$conn->setAttribute(pdo::ATTR_DEFAULT_FETCH_MODE,pdo::FETCH_ASSOC);

              $sql = "INSERT INTO corpsetablissement (IDSTATUT,NOM,PRENOM,TEL,TEL2) VALUES (?,?,?,?,?)";
              $pdo=$conn->prepare($sql)->execute([$statut,$nom, $prenom,$tel,$tel2]);
              $mem_id=$conn->lastInsertId();

                $date=date("Y-m-d");
                $sql1 = "INSERT INTO mouvement (IDOUVRAGE,IDCORPS,DATESORTIE) VALUES (?,?,?)";
                $pdo1=$conn->prepare($sql1)->execute([$ouvrage,$mem_id,$date]);
               
                header('Location: Formulaire.php');
             
             }
        }
     
        ?>
<?php include_once 'doctype.php';  ?>
<?php include_once 'menu.php';  ?>

     <!--<div id="content_header"></div>-->
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <?php include_once 'menudroite.php'; ?>
      <div id="content">
        <!-- insert the page content here -->

        <h1>Formulaire d'Enregistrement</h1>
<h
        <?php echo $message ?>
       
        <form action="formulaire.php" method="post">
            <fieldset id="apercu_form2">
            <legend align="center"> <h5 style="color: black;"> Informations sur l'emprunteur</h5> </legend>
            <div class="form_settings">
          <table>
            <tr> 
            <td>Nom*    : </td> <td><input type="text" name="nom"  value="<?php echo $nom?>" /></td>
            </tr>
            <tr>
            <td>Prenom  : </td> <td><input type="text" name="prenom" id="" value="<?php echo $prenom?>" /></td>
            </tr>
            <tr>
            <td>Tel*    : </td> <td><input type="text" name="tel" id="" value="<?php echo $tel?>" /></td>
            </tr>
            <tr>
            <td>Tel2    : </td> <td><input type="text" name="tel2" id="" value="<?php echo $tel2?>" /></td>
            </tr>
            </table> 
            <tr>
            <td>Statut*                         : 
              <select type="text" id="statut" name="statut" value="<?php echo $statut ?>"/>
              <option value="<?php echo $statut?>">- Choisissez un statut -</option>
            <?php
               
                $requete1="SELECT IDSTATUT,LIBELLE FROM statut";
                $req=$conn->prepare($requete1);
                       $req->execute();
                       $data=$req->fetchall();
                       foreach($data as $data){
                        $lib1=htmlentities($data['LIBELLE'],ENT_QUOTES,'iso-8859-1');
                        $libpre1=$data['LIBELLE'];
                        $idp1=$data['IDSTATUT'];
                                        $libpre1 = htmlentities($libpre1,ENT_QUOTES,'iso-8859-1');
                                        echo "<option value=".$idp1.">".$libpre1." </option>";
                       }  
              ?>
              </select>
           
            </td>
            </tr>
            <p>
            <tr>
            <td>Ouvrage*    :
              <select type="text" id="ouvrage" name="ouvrage" />
              <option value="<?php echo $ouvrage?>">- Choisissez un ouvrage -</option>
              <?php
               
                $requete2="SELECT IDOUVRAGE,LIBELLE FROM OUVRAGE";
                $req2=$conn->prepare($requete2);
                       $req2->execute();
                       $data2=$req2->fetchall();
                       foreach($data2 as $data){
                        $lib1=htmlentities($data['LIBELLE'],ENT_QUOTES,'iso-8859-1');
                        $libpre1=$data['LIBELLE'];
                        $idp1=$data['IDOUVRAGE'];
                                        $libpre1 = htmlentities($libpre1,ENT_QUOTES,'iso-8859-1');
                                        echo "<option value=".$idp1.">".$libpre1." </option>";
                       }  
              ?>
              </select>
           
            </td></tr></p> </div>
            <div class="c100" id="submit">
             
                <input  type="submit" value="Envoyer" name="Envoyer">
                <input type="reset"  value="Annuler"></p></td>

            </div>
        </fieldset>
        </form>
           


        <p>Dans le formulaire precedent, Les champs avec * sont des champs obligatoires .</p>
       
       
       
      </div>
      <div id="content">
        <!-- insert the page content here -->
       
      </div>
    </div>
    <div id="content_footer"></div>
    <div id="footer">
      Copyright &copy; BIKELE | <a href="http://validator.w3.org/check?uri=referer">CDI</a> | <a href="http://jigsaw.w3.org/css-validator/check/referer">BIKELE</a> | <a href="http://www.html5webtemplates.co.uk">2023</a>
    </div>
    </div>
  </div>
</body>
</html>
