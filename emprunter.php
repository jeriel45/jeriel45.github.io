<?php include_once 'doctype.php';  ?>
<?php include_once 'menu.php';  ?> 
<?php include_once 'connexion.php'; ?>
    <!--<div id="content_header"></div>-->
    <div id="site_content">
      <div class="sidebar">
        <!-- insert your sidebar items here -->
        <?php include_once 'menudroite.php'; ?>
      <div id="content">
        <!-- insert the page content here -->
        
     
              <?php
               
                $requete1="SELECT cp.nom,cp.prenom,ov.libelle ouvrage,
                           DATE_FORMAT(m.datesortie,'%d/%m/%Y') as datesortie,m.dateretour 
                           FROM `mouvement` m 
                           join `ouvrage` ov on ov.idouvrage = m.idouvrage 
                           join `corpsetablissement` cp on cp.idcorps = m.idcorps 
                           WHERE m.dateretour is null";
                $req=$conn->prepare($requete1);
                       $req->execute();
                       //$row = $req->fetchAll(PDO::FETCH_ASSOC);
                       $result= $req->rowcount();
              ?>

                <table cellpadding="0px" cellspacing="0px" bgcolor="#00CCFF" class="table2" border="0px" >
                        <thead>
                          <tr>
                            
                            <th style="width:100px;" align="left">Nom</th>
                            <th style="width:100px;" align="left">Prenom </th>
                            <th style="width:100px;" align="center">Ouvrage</th>
                            <th style="width:100px;" align="center">datesortie</th>
                            <th style="width:100px;" align="center">dateretour</th>
                            <th style="width:100px;" colspan="3" align="center">Parametres</th>

                          </tr>
                        </thead>
                </table> 


//======================================================================================================  
// lecture et affichage des résultats sur N colonnes, 1 résultat par ligne.    
//======================================================================================================
   <?php
    while($row = $req->fetchAll(PDO::FETCH_ASSOC)) {
      echo '<tr>
    
    
      <td bgcolor="" style="width:70px;font-size:13px"align="center">'.$row['nom'].'</td>
      <td bgcolor="" style="width:100px;font-size:13px"align="center">'.$row["prenom"].'</td>
      <td bgcolor="" style="width:90px;font-size:13px"align="center">'.$row["ouvrage"].'</td>
      <td bgcolor="" style="width:60px;font-size:13px"align="center">'.$row["datesortie"].'</td>
      <td bgcolor="" style="width:90px;font-size:13px"align="center">'.$row["dateretour"].'</td>
      <td bgcolor="" style="width:19px;" align="center"><a href="#"  title="Supprimer">S</a></td>
      <td bgcolor="" style="width:15px;" align="center"><a href="#"  title="Modifier">M</a></td>
      <td bgcolor="" style="width:15px;" align="center"><a href="index.php?var=14&v='.$row['id_ordinateurs'].'"  title="Terminer l\'intervention du client afin de passé a une autre">T</a></td>
      <td style="width:120px; font-family:Gentium Book Basic; font-size:13px; text-align:center">'.$row["nom_client"].'</td>
       </tr>';
    }
    echo "</table>";    // fin du tableau.

    ?> 

      </div>
    </div>
    <?php include_once 'pied.php';  ?> 
  </div>
</body>
</html>
