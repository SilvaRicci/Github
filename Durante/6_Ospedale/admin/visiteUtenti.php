<?php
	
    include "../config/path.php";
    include $CONN_PATH;
    
    session_start();
    if(!isset($_SESSION['username'])){
      header("Location: $LOGIN_PATH");
    }
  
  function searchVisita($data,$type){
    	
    include "../config/path.php";
    include $CONN_PATH;
    
    switch($type){
      case 0:{
        $query = "SELECT * FROM utente WHERE id = '$data'";
        break;
      }
      case 1:{
        $query = "SELECT * FROM utente WHERE CF_utente = '$data'";
        break;
      }
      case 2:{
        $query = "SELECT * FROM utente WHERE tipologia = '$data'";
        break;
      }
    }
    
    $resultSearch = $db_connection->query($query);
    
    printTable($resultSearch);

    $resultSearch->close();
    $db_connection->close();

  }

  function printTable($data){

    $rows = $data->num_rows;

    if($rows<=0){
      echo "Nessun risultato trovato";
      return;
    }

        $row = $data->fetch_assoc();
        echo "
          <div class='container text-center'>
            <div class='row py-4'>
              <div class='col-6'>
                <input type='text' class='form-control' id='CF' name='CF' value='$row[id]' disabled>
              </div>
              <div class='col-3'>
                <input type='text' class='form-control' id='cognome' name='cognome' value='$row[CF_utente]' disabled>
              </div>
              <div class='col-3'>
                <input type='text' class='form-control' id='nome' name='nome' value='$row[nome]' disabled>
              </div>
            </div>
            <div class='row py-4'>
              <div class='col-3'>
                <input type='text' class='form-control' id='indirizzo' name='indirizzo' value='$row[indirizzo]' disabled>
              </div>
              <div class='col-3'>
                <input type='text' class='form-control' id='comune' name='comune' value='$row[comune]' disabled>
              </div>
              <div class='col-3'>
                <input type='text' class='form-control' id='CAP' name='CAP' value='$row[CAP]' disabled>
              </div>
              <div class='col-3'>
                <input type='text' class='form-control' id='provincia' name='provincia' value='$row[provincia]' disabled>
              </div>
            </div>
            <div class='row py-4'>
              <div class='col-4'>
                <input type='date' class='form-control' id='dataNascita' name='dataNascita' value='$row[dataNascita]' disabled>
              </div>
              <div class='col-4'>
                <input type='password' class='form-control' id='password' name='password' value='12345678' disabled>
              </div>
              <div class='col-4'>
                <input type='password' class='form-control' id='confermaPassword' name='confermaPassword' value='12345678' disabled>
              </div>
            </div>
            <div class='row py-4'>
            <div class='col-3'></div>
            <div class='col-2'>
                <a href='modificaUtenti.php?CF=$row[CF]' class='btn btn-danger' role='button'>Modifica</a>
            </div>
            <div class='col-2'></div>
            <div class='col-2'>
                <a href='eliminaUtenti.php?CF=$row[CF]' class='btn btn-danger' role='button'>Elimina</a>
            </div>
            <div class='col-3'></div>
            </div>
          </div>
          ";

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
        <li class="nav-item dropdown px-5 pt-3 active nav-underline ">
            <a class="nav-link dropdown-toggle active nav-underline" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
          <li class="nav-item px-5 pt-3">
            <a class="nav-link" href="<?php echo"$AVISITE_PATH"?>">Visite</a>
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
    <div class='container text-center'>
        <div class='row py-4'>
        <div class='col-2'></div>
            <div class='col-4'>
                <input type='text' class='form-control' id='inputData' name='inputData' placeholder='Inserisci un dato'>
            </div>
            <div class='col-4'>
                <select id="type" name="type" class="form-control">
                    <option selected value="-1">Scegli la tipologia</option>;
                    <option value="0">ID</option>;
                    <option value="1">CF Utenti</option>;
                    <option value="2">Tipologia</option>;
                </select>
            </div>
            <div class='col-2'></div>
        </div>
        <div class='row py-4'>
            <div class='col-5'></div>
            <div class='col-2'>
                <button type='submit' id='submit_btn' name='submit_btn' class='btn btn-danger'>Ricerca</button>
            </div>
            <div class='col-5'></div>
        </div>
    </div>
    </form>

  <?php 
  
    if(isset($_GET['id'])){
      searchVisita($_GET['id'],0);
    }

    if(isset($_POST["submit_btn"])){
      $data = $_POST['inputData'];
      $type = $_POST['type'];
      searchVisita($data,$type);
    }
  ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>


