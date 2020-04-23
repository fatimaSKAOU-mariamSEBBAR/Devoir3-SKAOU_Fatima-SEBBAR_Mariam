
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
<h1>Enregistrement d'un livre</h1>
<form class="form" action="ValideLivre.php" method="post">

  <label for="text">Nom :</label>
  <input type="text" name="nom"><br>

  <label for="text">Prenom :</label>
  <input type="text" name="prenom"><br>

  <label for="text">Titre:</label>
  <input type="text" name="titre"><br>

  <label for="text">Catégorie:</label>
 <select name="categorie">
     <option name="sf">Science-fiction</option>
     <option name="roman">Roman</option>
     <option name="junior">Junior</option>
     <option name="policier">Policier</option>
 </select>
  <br>

  <label for="text">Numéro ISBN:</label>
  <input type="text" name="isbn"><br>

  <button type="submit" name="enregistrer"  style="margin-left: 200px;">Enregistrer</button>

 
</form>
    
</body>
</html>