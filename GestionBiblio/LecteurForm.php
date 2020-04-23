<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Interface de saisie d'un lecteur</title>
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
    </style>
</head>
<body>
<h1>Enregistrement d'un lecteur</h1>
<p>Si vous etes un nouveau lecteur , veuillez vous enregistrer en remplissant le formulaire ci-dessous:</p><br>
<form class="form" action="ValideLecteur.php" method="post">
 
<label for="text">Numero:</label>
  <input type="text" name="numero"><br>

  <label for="text">Nom:</label>
  <input type="text" name="nom"><br>

  <label for="text">Prenom:</label>
  <input type="text" name="prenom"><br>

  <label for="text">Mot de passe:</label>
  <input type="password" name="pwd"><br>

  <label for="text">Adresse:</label>
  <input type="text" name="adresse"><br>

  <label for="text">Ville:</label>
  <input type="text" name="ville"><br>

  <label for="text">Code postal:</label>
  <input type="text" name="code"><br>

  <button type="submit" name="valider"  style="margin-left: 200px;">Valider</button>

 
</form>
    
</body>
</html>