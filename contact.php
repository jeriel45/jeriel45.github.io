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
        
      <meta charset="utf-8">
      
        <p><h2>Tenue du document</h2>
        <h4 style="color: black;"> Le document emprunte doit etre tune correctement et rendu au departement CDI en bonne et due forme.<br> Dans le cas contraire l'emprunteur sera dans l'obligation de rembourser le document.</h4></p>

        <p><h2>Delais de retention</h2>
        <h4 style="color: black;">Le document emprunte doit etre rendue dans un delais de 2 semaines apres la prise du document.<br>En cas de prolongation de la duree de rntention du document pour divers raison, l'emprunteur est dans l'obligation d'aller le signaler au departement CDI.</h4></p>

        <p><h2>En cas de perte</h2>
        <h4 style="color: black;"> En cas de perte du document, le remboursement s'impose et est non negociable.
        </h4></p>

        <p><h2>Nombre de document empruntable</h2>
        <h4 style="color: black;">Le nombre de document empruntable en une seul prise est limite au nombre de 1.
        </h4></p>

      <form action="insertcorps.php" method="post">
        

      </div>
    </div>
    <?php include_once 'pied.php';  ?> 
  </div>
</body>
</html>
