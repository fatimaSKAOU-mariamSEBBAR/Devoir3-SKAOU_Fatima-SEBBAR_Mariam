
<?php  
try{
	 $pdo=new PDO("mysql:host=localhost;dbname=librairie","root","");
 
}catch(exception $e)
{
	die("Erreur de connexion:"  .$e->get_Message());
}

?>