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
                       $data=$req->fetchall();
                        
              ?>

                <table cellpadding="0px" cellspacing="0px" bgcolor="#00CCFF" class="table2" border="0px" >
                        <thead>
                          <tr>

                            <th style="width:100px;" colspan="3" align="center">Parametres</th>
                            <th style="width:100px;" align="right">Nom</th>
                            <th style="width:100px;" align="right">Prenom </th>
                            <th style="width:100px;" align="center">Ouvrage</th>
                            <th style="width:100px;" align="center">datesortie</th>
                            <th style="width:100px;" align="center">dateretour</th>
                            
                          </tr>
                        </thead>
                </table> 



      </div>
    </div>
    <?php include_once 'pied.php';  ?> 
  </div>
</body>
</html>
