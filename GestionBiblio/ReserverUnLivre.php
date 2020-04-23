<?php  
     session_start();
    require_once("connexionDb.php");
    $code=$_GET['code'];
    $req="SELECT * FROM livres WHERE livcode LIKE '$code'";
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
<h1>Réserver un livre</h1>
<p>Vous désirez réserver le livre suivant :</p>

<form method="get" action="CofirmationReservation.php">
<?php while($fact=$ps->fetch()){ ?>
   <table border="2px;">
 <tr>
  <td for="text">Numero de livre:</td>
  <td for="text" style="color:green;"><?php echo $fact['livcode'];?></td>  
</tr>
<tr>
  <td for="text">Nom  de l'auteur:</td>
  <td for="text" style="color:green;"><?php echo $fact['livnomaut']; ?></td>

</tr>

<tr>
  <td for="text">Prenom de l'auteur :</td>
  <td for="text" style="color:green;"><?php echo $fact['livprenomaut']; ?></td> 
</tr>

<tr>
  <td for="text">Titre:</td>
  <td for="text" style="color:green;"><?php echo $fact['livtitre']; ?></td>
</tr>

<tr>
  <td for="text">Catégorie:</td>
  <td for="text" style="color:green;"><?php echo $fact['livcategorie']; ?></td> 
</tr>

<tr>
  <td for="text">Numéro ISBN:</td>
  <td for="text" style="color:green;"><?php echo $fact['livISBN']; ?></td>
  </tr>
  </table>
  <br>

  <a type="submit"  href="CofirmationReservation.php?codelivre=<?php echo $fact['livcode'];?>">Confirmer</a>
  <?php }?>
  </form>
</body>
</html>