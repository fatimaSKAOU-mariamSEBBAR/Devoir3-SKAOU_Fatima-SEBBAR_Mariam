<?php

session_start();
if(isset($_SESSION['erreurLogin']))
{
    if($_SESSION['erreurLogin']==0)
    {
        $erreurLogin="non";
    }
    else if($_SESSION['erreurLogin']==1)
    {
        $erreurLogin="oui";
        require_once("connexionDb.php");
        $user=$_SESSION['user']['lecnum'];

        $req="SELECT * FROM livres WHERE livdejareserve=0 ";
        $ps=$pdo->prepare($req);
        $ps->execute();

$req1="SELECT * FROM livres  WHERE livcode in (select empcodelivre from emprunts where empnumlect LIKE '$user')";
        $ps1=$pdo->prepare($req1);
        $ps1->execute();
    }
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
<h1>Gestion du lecteur</h1>
<?php
if($erreurLogin=="non")
{ ?>
<p>Le lecteur n'est pas reconnu <br>
Cliquer <a href="login.php">ici</a> pour tenter une nouvelle authentification
</p>
<?php require_once('LecteurForm.php');?>
<?php  }?>

<?php
  if($erreurLogin=="oui")
{ ?>
<p> Le lecteur n°<?php echo $_SESSION['user']['lecnum'];?> est reconnu<br></p>
<h3>voici la liste des livres disponibles à la réservation</h3>
<form method="get" action="ReserverUnLivre.php">
<table border="2px;"width= "80%" text-align="center">
<th style="color:red">Code Livre</th>
<th style="color:red;">Nom de l'auteur</th>
<th style="color:red;">Prenom de l'auteur</th>
<th style="color:red;">Titre</th>
<th style="color:red;">Catégorie</th>
<th style="color:red;">ISBN</th>
<th style="color:red;"></th>

 <?php while($livre=$ps->fetch()) {?>
   <tr>
    <td><?php echo $livre['livcode']?></td>
    <td><?php echo $livre['livnomaut']?></td>
    <td><?php echo $livre['livprenomaut']?></td>
    <td><?php echo $livre['livtitre']?></td>
    <td><?php echo $livre['livcategorie']?></td>
    <td><?php echo $livre['livISBN']?></td>
    <td><a href="ReserverUnLivre.php?code=<?php echo $livre['livcode']?>" >Réserver</a></td>
    </tr>
<?php }?>
</table>
</form>

<h3>Voici la liste de vos réservations</h3>
<table border="2px;"width= "80%" text-align="center">
<th style="color:red">Code Livre</th>
<th style="color:red;">Nom de l'auteur</th>
<th style="color:red;">Prenom de l'auteur</th>
<th style="color:red;">Titre</th>
<th style="color:red;">Catégorie</th>
<th style="color:red;">ISBN</th>
<?php while($livre1=$ps1->fetch()) {?>
   <tr>
    <td><?php echo $livre1['livcode']?></td>
    <td><?php echo $livre1['livnomaut']?></td>
    <td><?php echo $livre1['livprenomaut']?></td>
    <td><?php echo $livre1['livtitre']?></td>
    <td><?php echo $livre1['livcategorie']?></td>
    <td><?php echo $livre1['livISBN']?></td>
    </tr>
<?php }?>
<?php }?>
   
</body>
</html>