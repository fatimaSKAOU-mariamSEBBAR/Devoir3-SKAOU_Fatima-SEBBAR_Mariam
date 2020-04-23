<?php  
        session_start();
        require_once("connexionDb.php");
         
        
        $codeLivre=$_GET['codelivre'];
        $numLecteur=$_SESSION['user']['lecnum'];
        $date = date('Y-m-d');
        $dateret= date('Y-m-d', strtotime($date. ' + 8 days'));

        $requ="SELECT * FROM lecteurs WHERE lecnum LIKE '$numLecteur'";
        $ps1=$pdo->prepare($requ);
        $ps1->execute();
        if($lecteur=$ps1->fetch())
        {
            $nomlecteur=$lecteur['lecnom'];
        }

        $reque="SELECT * FROM livres WHERE livcode LIKE '$codeLivre'";
        $ps2=$pdo->prepare($reque);
        $ps2->execute();
        if($auteur=$ps2->fetch())
        {
            $nomauteur=$auteur['livnomaut'];
        }

        $numEmprunt=substr($nomlecteur,0,2).substr($nomauteur,0,2).$numLecteur;

   $requete="INSERT INTO emprunts (empnum,empdate,empdateret,empcodelivre,empnumlect) VALUES(?,?,?,?,?)";
        
 //tableau de parametres  contenant nos parametres|^
 
    $params=array($numEmprunt,$date,$dateret,$codeLivre,$numLecteur);
    $resultat=$pdo->prepare($requete);
    $resultat->execute($params);
     
    $ps=$pdo->prepare("UPDATE livres set livdejareserve=? WHERE livcode=?");
	$params=array(1,$codeLivre);
	$ps->execute($params);
   
     $req="SELECT * FROM emprunts WHERE empnum LIKE '$numEmprunt'";
     $ps=$pdo->prepare($req);
     $ps->execute(); 
 
    


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Interface de saisie d'un livre</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
    <style>
        .form input{
    padding: 5px;
    width: 300px;
    font-family: Helvetica, sans-serif;
    margin: 0px 0px 10px 0px;
    border: 2px solid #ccc; 
    margin: 5px 10px 5px 0;
        }
        .form label{
    float: left; 
    text-align: right;
    margin-right: 15px;
    width: 100px;
    padding-top: 9px;
    font-size: 1.0em;
        }
        .form select {
    padding: 5px;
    width: 315px;
    font-family: Helvetica, sans-serif;
    margin: 0px 0px 10px 0px;
    border: 2px solid #ccc; 
    margin: 5px 10px 5px 0;
        }
    </style>
</head>
<body>
<h1>Confirmation de votre réservation</h1>


<?php while($fact=$ps->fetch()){ ?>
    <label for="text">Votre réservation est confirmée sous le numéro:</label>
    <label for="text" style="color:green;"><?php echo $fact['empnum']; ?></label><br> 
    
  <label for="text">Date de réservation</label>
  <label for="text" style="color:green;"><?php echo $fact['empdate']; ?></label><br> 

  <label for="text">Date de retour :</label>
  <label for="text" style="color:green;"><?php echo $fact['empdateret']; ?></label><br> 

  <p>Vous pouvez revenir à la liste des livres disponibles à la réservationen cliquant <a href="GestionLecteur.php">ici</a></p>
  
  <?php }?>
  
</body>
</html>