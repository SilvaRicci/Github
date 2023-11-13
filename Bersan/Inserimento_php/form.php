<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

  <form>
  <!-- 2 column grid layout with text inputs for the first and last names -->
  <div class="row mb-4">
    <div class="col">
      <div class="form-outline">
        <input type="text" id="form6Example1" class="form-control" />
        <label class="form-label" for="form6Example1">Nome</label>
      </div>
    </div>
    <div class="col">
      <div class="form-outline">
        <input type="text" id="cognome" class="form-control" />
        <label class="form-label" for="form6Example2">Cognome</label>
      </div>
    </div>
  </div>

  <!-- classe input -->
  <div class="form-outline mb-4">
    <input type="text" id="classe" class="form-control" />
    <label class="form-label" for="form6Example3">Classe</label>
  </div>

  <!-- sezione input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example4" class="form-control" />
    <label class="form-label" for="form6Example4">Sezione</label>
  </div>

  <!-- indirizzo input -->
  <div class="form-outline mb-4">
    <input type="text" id="form6Example5" class="form-control" />
    <label class="form-label" for="form6Example5">Indirizzo</label>
  </div>

  <!-- invio button -->
  <button type="submit" class="btn btn-primary btn-block mb-4">Invio</button>
</form>
<?php

$nome =  $_POST("Nome");
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>