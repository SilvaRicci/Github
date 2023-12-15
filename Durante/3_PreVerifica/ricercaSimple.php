<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8"   >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><br><br><h1>Visualizzazione clienti tramite ricerca semplice</h1><br>   
    

    
    <?php include "connessione.php"; ?>

    <div class="container">
<form action="#" method="POST">
  <div class="form-row">
    <?php

      echo '<div class="form-group my-2">
    <label for="codiceFiscale">Codice fiscale</label>
    <select id="codiceFiscale" name="codiceFiscale" class="form-control">
      <option selected value="0">Scegli l utente</option>';

      $result = $db_connection->query("SELECT DISTINCT CodFisc FROM utente");                      
      $rows = $result->num_rows;  
      echo $rows;
      if($rows > 0){  
        while($row = $result->fetch_assoc()){                                                    
          echo '<option value='."$row[CodFisc]".'>'."$row[CodFisc]".'</option>';
        }
      }
      echo '</select> </div>';
      ?>

<button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Ricerca</button>
    </form>

  <?php                                                                 
        
        if (isset($_POST["submit_btn"])) {
            
            $codiceFiscale = $_POST["codiceFiscale"];

            $result = $db_connection->query("SELECT CodContenuto,Data,Valutazione FROM valutazione WHERE CodFisc = '$codiceFiscale'");                      
            $rows = $result->num_rows;             
            $result = $db_connection->query("SELECT Genere FROM contenuto_multimediale WHERE CodContenuto = ''");                                                                       

            if($rows > 0){  
                    echo ' <div class="container ml-5">
                    <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Codice contenuto</th>
                    <th scope="col">Data</th>
                    <th scope="col">Valutazione</th>
                    </tr>
                </thead>
                <tbody>';
                    while($row1 = $result->fetch_assoc()){                                                    
                        echo "<tr> <th scope=."."row"."class="."secondary".">>". "$row1[CodContenuto] </a> </th>";
                        echo "<th scope=."."row".">". "$row1[Data] </th>";
                        echo "<th scope=."."row".">". "$row1[Valutazione] </th>";
                        echo "</tr>";
                    }
            }else{echo "Nessuna valutazione trovata";}
        }
        
        $result->close();                                                                               
        $db_connection->close();                                                                                 

    ?>
  </tbody>
</table>

    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>