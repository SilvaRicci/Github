<?php
/*
Non essendoci scritto nulla ipotizzo che la pagina admin sia accedibile solo tramite URL e non ci sia possibilità di login
*/
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PAGINA ADMINISTRATOR</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
      
      <?php
        //se esiste l'array lo ciclo, se non esiste stampo un messaggio a schermo
        if(isset($_SESSION['onlineUsers'])){
          echo '
            <table class="table">
            <thead>
              <tr>
                <th scope="col">Username</th>
                <th scope="col">Time</th>
              </tr>
            </thead>
            <tbody>
          ';
          //per ogni elemento un ciclo
          foreach ($_SESSION['onlineUsers'] as $user){
            //stampo username e ora per ogni riga della tabella
            echo "
            <tr>
              <th scope='row'>".$user['username']."</th>
              <td>".$user['time']."</td>
          </tr>
          ";
          } 

          echo '
              </tbody>
            </table>
          </div>
          ';
        }else{
          echo "Nessun utente è attualmente online!";
        }


      ?>    
        
        
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
