<?php
  /*
    Non essendoci scritto nulla ipotizzo che questa pagina sia una pagine di test dei cookie separata all'esercizio precedente
    in cui non si necessita nessuna sessione, ma solo l'utilizzo dei cookie per selezionare il colore di sfondo, la dimensione 
    del testo e il font solo ed esclusivamente in questa pagina
  */
    ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <?php
        if(isset($_COOKIE["backgroundColor"])){
          echo "<style>body { background-color:

            ".$_COOKIE['backgroundColor']."; }</style>";
        }
        if(isset($_COOKIE["font"])){
          echo "<style>body { font-family:

            ".$_COOKIE['font']."; }</style>";
        }
        if(isset($_COOKIE["dimTesto"])){
          echo "<style>body { font-size:

            ".$_COOKIE['dimTesto']."px; }</style>";
        }
      ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cookie</title>
  </head>
  <body>
   
    <div class="container">
    <form method="post" action="#">
    <div class="form-group my-3">
        <label for="backgroundColor" class="form-label">Scegli il colore</label>
            <input type="color" class="form-control form-control-color" id="backgroundColor" name="backgroundColor" value="#ffffff"> <!-- Imposto bianco di default per il bene dei miei occhi-->
          
      </div>
        <div class="form-group my-3">
            <label for="selezioneFont" name="selezioneFont">Seleziona un font:</label>
                <select class="form-control" id="selezioneFont" name="selezioneFont">
                    <option value="Arial">Arial</option>
                    <option value="Verdana">Verdana</option>
                    <option value="Times New Roman">Times New Roman</option>
                    <option value="Courier New">Courier New</option>
               </select>
        </div>
        <div class="form-group my-3">
            <label for="dimTesto" name="dimTesto">Seleziona una dimensione:</label> <!-- Imposto 14 di default per il bene dei miei occhi pt.2-->
                <select class="form-control" id="dimTesto" name="dimTesto">
                    <option value="8">8</option>
                    <option value="10">10</option>
                    <option value="12">12</option>
                    <option value="14" selected>14</option>
                    <option value="20">20</option>
                    <option value="30">30</option>

               </select>
        </div>
        <button type="submit" id="invia" name="invia">Imposta 
        </button>

    

    <?php
    // Verifica se è stato inviato un colore tramite il form
    if(isset($_POST['invia'])) {
       
      //recupero delle variabili dai vari input/select
      $backgroundColor = $_POST["backgroundColor"];
      $font = $_POST["selezioneFont"];
      $dimTesto = $_POST["dimTesto"];

      //setto ogni cookie col proprio nome, valore e tempo = 30 secondi
      setcookie("backgroundColor", $backgroundColor, time() + (30));
      setcookie("font", $font, time() + (30));
      setcookie("dimTesto", $dimTesto, time() + (30));
        

        //Ultimo comando da inserire
        header("Location: cookie2.php");

    }
    ?>
</form>
</div> 
  </body>
</html>