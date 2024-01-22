<!doctype html>

<?php
    include "../config/path.php";
    include $CONN_PATH;
    session_start();
    if(!isset($_SESSION['CF'])){
      header("Location: $LOGIN_PATH");
    }

    //recupero id utente con conseguente record dal database
    $CF = $_SESSION['CF'];
            
    $result = $db_connection->query("SELECT * FROM utente WHERE CF = '$CF'");                      
    $rows = $result->num_rows;                                                                                                                         
    $row = $result->fetch_assoc();   
?>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">

  <!-- Inizio navbar -->
  <nav class="navbar navbar-dark bg-primary">

    <!-- Torna a home.php -->
    <a class="navbar-brand" href="home.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- 1# button -> Torna a home.php -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="home.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <!-- 2# button -> Vai a profilo.php -->
        <li class="nav-item">
          <a class="nav-link" href="profilo.php">Profilo</a>
        </li>
        <!-- 1# button -> Vai a profilo.php -->
        <li class="nav-item">
          <a class="nav-link" href="profilo.php">Profilo</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
    </div>
  </nav>
    
  <?php       
        //visualizzazione base pagina per normali utenti
        echo '<table class="table">
        <thead>
            <tr>
            <th scope="col">CF</th>
            <th scope="col">Cognome</th>
            <th scope="col">Nome</th>
            </tr>
        </thead>
        <tbody>';

        echo "<tr> <th scope=."."row"."class="."secondary".">". "$row[CF]</th>";
        echo "<th scope=."."row".">". "$row[cognome] </th>";
        echo "<th scope=."."row".">". "$row[nome] </th></tr>";
    ?>
        <form action="<?php echo"$LOGOUT_PATH"?>">
          <button type="submit" id="logout_btn" name="logout_btn" class="btn btn-primary">Logout</button>
        </form>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>