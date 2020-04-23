<?php
session_start();

require_once("connexionDb.php");//se connecter a la base de donnee
$login=isset($_POST['login'])?$_POST['login']:"";
$pass=$_POST['pwd'];
    $requete="SELECT * FROM lecteurs WHERE lecnom LIKE '$login' AND lecmotdepasse LIKE '$pass'";
    $resultat=$pdo->query($requete);

if ($user=$resultat->fetch())
{
    $_SESSION['erreurLogin']=1;
    $_SESSION['user']=$user;
    header("location:GestionLecteur.php");
    
}
else
{
    $_SESSION['erreurLogin']=0;
    header("location:GestionLecteur.php");
}

?>