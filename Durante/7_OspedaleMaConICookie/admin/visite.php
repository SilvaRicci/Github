<?php
	
    include "../config/path.php";
    include $CONN_PATH;
    
    session_start();
    if(!isset($_SESSION['username'])){
      header("Location: $LOGIN_PATH");
    }


    function getTypeData(){
      include "../config/path.php";
      include $CONN_PATH;
  
      $query = "SELECT * FROM `tipologieVisite` WHERE 1 = 1";
      $result = $db_connection->query($query);                                                                                                                                        
    
      if($result->num_rows > 0){

          echo "
          <div class='container text-center'>
            <div class='row py-4'>
              <div class='col-2'></div>
              <div class='col-4'>
                <ul class='list-group'>
            ";
            while($row=$result->fetch_assoc()){
              echo " <a href='modificaNome.php?nome=$row[nome]' class='list-group-item list-group-item-action'>$row[nome]</a>";
            }
            echo" 
                </ul>
              </div>
              <div class='col-4'>
                <div class='row py-4'>
                  <input type='text' class='form-control' id='visita' name='visita'>
                </div>
                <div class='row py-4'>
                  <br><center><button type='submit' id='submit_btn' name='submit_btn' class='btn btn-danger'>Inserisci</button></center>
                </div>
              </div>
            </div>
          </div>
          ";
      }
    }

    function addData(){
      include "../config/path.php";
      include $CONN_PATH;
  
      $nome = $_POST["visita"];

      $query = "INSERT INTO `tipologieVisite`(`nome`) VALUES ('$nome')";
      $result = $db_connection->query($query);
    }
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
  <nav class="navbar navbar-dark navbar-expand-lg bg-danger">
    
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

      <div class="row">
        <ul class="navbar-nav mr-auto">
        
        <!-- 1# button -> Torna a home.php -->
        <li class="nav-item px-5 pt-3">
            <a class="nav-link" href="<?php echo"$ADMIN_PATH"?>">Home <span class="sr-only"></span></a>
          </li>

        <!-- 2# button -> Vai a index.php -->
        <li class="nav-item dropdown px-5 pt-3">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Gestione
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo"$AUTENTI_PATH"?>">Utenti</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo"$AVISITEUTENTI_PATH"?>">Visite</a></li>
            </ul>
          </li> 

          <!-- Torna a home.php -->
          <a class="navbar-brand px-5" href="<?php echo"$ADMIN_PATH"?>">
            <img src="<?php echo"$ALOGO_PATH"?>" alt="Logo" width="50" height="50">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>

          <!-- 3# button -> Vai a visite.php -->
          <li class="nav-item active nav-underline px-5 pt-3">
            <a class="nav-link active nav-underline" href="<?php echo"$AVISITE_PATH"?>">Visite</a>
          </li>
          
          <!-- 4# button -> Vai a profilo.php/logout.php -->
          <li class="nav-item dropdown px-5 pt-3">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profilo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo"$APROFILE_PATH"?>">Visualizza</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="<?php echo"$LOGOUT_PATH"?>">Logout</a></li>
              
            </ul>
          </li>       
        </ul>

      </div>
    </div>
  </nav>
  <!-- Fine navbar -->

  <form action='#' method='POST'>
    <br>
    <?php 
      getTypeData();
    ?>
  </form>

  <?php
    if(isset($_POST["submit_btn"])){
      addData();
      echo("<meta http-equiv='refresh' content='1'>"); //Refresh by HTTP 'meta'
    }
  ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


