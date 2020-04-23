<?php  
    if(isset($_POST['enregistrer']))
    { 
        require_once("connexionDb.php");
     
        $nom=isset($_POST['nom'])?$_POST['nom']:"";
        $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
        $titre=isset($_POST['titre'])?$_POST['titre']:"";
        $categorie=isset($_POST['categorie'])?$_POST['categorie']:"";
        $isbn=isset($_POST['isbn'])?$_POST['isbn']:"";
        $numero=substr($nom,0,2).substr($prenom,0,2).substr($categorie,0,2).substr($isbn,-2,2);
$requete="INSERT INTO livres (livcode,livnomaut,livprenomaut,livtitre,livcategorie,livISBN,livdejareserve) VALUES(?,?,?,?,?,?,?)";

//tableau de parametres  contenant nos parametres|^

$params=array($numero,$nom,$prenom,$titre,$categorie,$isbn,0);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);

    $req="SELECT * FROM livres WHERE livcode LIKE '$numero'";
    $ps=$pdo->prepare($req);
    $ps->execute();  
    }
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
<h1>Validation d'un livre</h1>

<?php while($fact=$ps->fetch()){ ?>
<
   
    <label for="text">Numero de livre:</label>
    <label for="text" style="color:green;"><?php echo $fact['livcode']; ?></label><br> 
    
  <label for="text">Nom  de l'auteur:</label>
  <label for="text" style="color:green;"><?php echo $fact['livnomaut']; ?></label><br> 

  <label for="text">Prenom de l'auteur :</label>
 <label for="text" style="color:green;"><?php echo $fact['livprenomaut']; ?></label><br> 

  <label for="text">Titre:</label>
 <label for="text" style="color:green;"><?php echo $fact['livtitre']; ?></label><br> 

  <label for="text">Catégorie:</label>
 <label for="text" style="color:green;"><?php echo $fact['livcategorie']; ?></label><br> 

  <label for="text">Numéro ISBN:</label>
  <label for="text" style="color:green;"><?php echo $fact['livISBN']; ?></label><br> 
  
  <?php }?>
</body>
</html>