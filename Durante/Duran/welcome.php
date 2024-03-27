<?php
//se l'utente non ha una sessione attiva non dovrebbe essere qui, viene quindi rimandato alla pagina di login
  session_start();
  if(!isset($_SESSION['username'])){
      header("Location: login.php");
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>WELCOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <dic class="container">
        <?php
            $username = $_SESSION["username"];
            //stampo a video Benvenuto + l'username dell'utente
            echo "Benvenuto $username!";
            ?>
         
      <a href="logout.php"><button class="btn btn-outline-info" type="button">Logout</button></a>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
