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
  <nav class="navbar navbar-dark navbar-expand-lg bg-success">
    
    <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">

      <div class="row">
        <ul class="navbar-nav mr-auto">
        
          <!-- 1# button -> Torna a home.php -->
          <li class="nav-item active nav-underline px-5 pt-3">
              <a class="nav-link active nav-underline" href="<?php echo"$HOME_PATH"?>">Home <span class="sr-only"></span></a>
          </li>

          <!-- 2# button -> Vai a index.php -->
            <li class="nav-item px-5 pt-3">
              <a class="nav-link" href="<?php echo"$INDEX_PATH"?>">Panoramica <span class="sr-only"></span></a>
            </li>

            <!-- Torna a home.php -->
            <a class="navbar-brand px-5" href="<?php echo"$HOME_PATH"?>">
              <img src="<?php echo"$LOGO_PATH"?>" alt="Logo" width="50" height="50">
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <!-- 3# button -> Vai a visite.php -->
            <li class="nav-item px-5 pt-3">
              <a class="nav-link" href="<?php echo"$VISITE_PATH"?>">Visite</a>
            </li>
          
          <!-- 4# button -> Vai a profilo.php/logout.php -->
          <li class="nav-item dropdown px-5 pt-3">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Profilo
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="<?php echo"$PROFILE_PATH"?>">Visualizza</a></li>
              <li><hr class="dropdown-divider"></li>
              <?php 
                  if(!isset($_SESSION['CF'])){
                    echo '<li><a class="dropdown-item" href="'.$SIGNUP_PATH.'">Signup</a></li>';
                    echo '<li><a class="dropdown-item" href="'.$LOGIN_PATH.'">Login</a></li>';
                  }else{
                    echo '<li><a class="dropdown-item" href="'.$LOGOUT_PATH.'">Logout</a></li>';
                  }
              ?>
              
            </ul>
          </li>       
        </ul>

      </div>
    </div>
  </nav>
  <!-- Fine navbar -->
  
  <div class="container text-center">
  <div class="row">
    <div class="col">
      <!-- 1 of 3 -->
    </div>
    <div class="col-6">
      <!-- 2 of 3 (wider) -->
      <div id="carouselExample" class="carousel slide p-3">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="https://wips.plug.it/cips/initalia.virgilio.it/cms/2020/03/ospedale-italiano.jpg" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="data:image/jpeg;base64,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" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="data:image/jpeg;base64,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 " class="d-block w-100" alt="...">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <div class="col">
      <!--3 of 3 -->
    </div>
  </div>
  <div class="row">
    <div class="col">
      <!-- 1 of 3 -->
    </div>
    <div class="col-5">
      <!-- 2 of 3 (wider) -->
    </div>
    <div class="col">
      <!-- 3 of 3 -->
    </div>
  </div>
</div>

  
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
