<?php  
session_start();
    if(isset($_POST['valider']))
    { 
        require_once("connexionDb.php");
        
        $numero=isset($_POST['numero'])?$_POST['numero']:"";
        $nom=isset($_POST['nom'])?$_POST['nom']:"";
        $prenom=isset($_POST['prenom'])?$_POST['prenom']:"";
        $pwd=isset($_POST['pwd'])?$_POST['pwd']:"";
        $adresse=isset($_POST['adresse'])?$_POST['adresse']:"";
        $ville=isset($_POST['ville'])?$_POST['ville']:"";
        $code=isset($_POST['code'])?$_POST['code']:"";
        $requete="INSERT INTO lecteurs (lecnum,lecnom,lecprenom,lecadresse,lecville,leccodepostal,lecmotdepasse) VALUES(?,?,?,?,?,?,?)";
       
//tableau de parametres  contenant nos parametres|^

$params=array($numero,$nom,$prenom,$adresse,$ville,$code,$pwd);
$resultat=$pdo->prepare($requete);
$resultat->execute($params);
    
    //$numero=$_SESSION['user']['lecnum'];
    $req="SELECT * FROM lecteurs WHERE lecnum LIKE '$numero'";
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
<h1>Validation d'un lecteur</h1>

<?php while($fact=$ps->fetch()){ ?>
    
  <label for="text">Nom  :</label>
  <label for="text" style="color:green;"><?php echo $fact['lecnom']; ?></label><br> 

  <label for="text">Prenom :</label>
 <label for="text" style="color:green;"><?php echo $fact['lecprenom']; ?></label><br> 

  <label for="text">Adresse:</label>
 <label for="text" style="color:green;"><?php echo $fact['lecadresse']; ?></label><br> 

  <label for="text">Ville:</label>
 <label for="text" style="color:green;"><?php echo $fact['lecville']; ?></label><br> 

  <label for="text">Code postal :</label>
  <label for="text" style="color:green;"><?php echo $fact['leccodepostal']; ?></label><br> 

  <label for="text">Numéro  :</label>
  <label for="text" style="color:green;"><?php echo $fact['lecnum']; ?></label><br> 
  
  <?php }?>
<p>vous etes enregistrer dans la base de la biblithéque,<br>
vous avez maintenant la possibilité de reserver des livres ou vous <a href="login.php">identifiant ici</a>
</p>
</body>
</html>