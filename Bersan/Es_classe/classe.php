<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
  <?php 

include "connessione.php";

$indirizzo = $db_connection->query("SELECT DISTINCT indirizzo FROM studenti");		            
$rowsindirizzo=$indirizzo->num_rows;

$result = $db_connection->query("SELECT ID, Nome, Cognome, Classe, Sezione, Indirizzo FROM studenti");		            
$rows=$result->num_rows;


?>

<form action="#" method="POST">

<!--Menu a tendina-->
<div class="form-group">
    <label for=" ">Classe</label>
    <select class="form-control" name="Classeselect">
    <option selected>Seleziona la classe</option>
    <option value="classe1">1</option>
    <option value="classe2">2</option>
    <option value="classe3">3</option>
    <option value="classe4">4</option>
    <option value="classe5">5</option>
</div>

<!--Menu a tendina-->
<div class="form-group">
    <label for=" ">Indirizzo</label>
    <select class="form-control" name="Posizione">
    <option selected>Seleziona la classe</option>
    <option value="classe1">1</option>
    <option value="classe2">2   </option>
    <option value="classe3">3</option>
    <option value="classe4">4</option>
    <option value="classe5">5</option>
</div>

<!--Button-->
<button type="input" class="btn btn-warning" value="invio">Invia</button>

</form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>