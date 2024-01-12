<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8"   >
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Durante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body style = "background-color:white">
    <center><br><br><h1>Effettua il reso</h1><br>   
    
    <?php include "connessione.php"; ?>

    <div class="container">
<form action="#" method="POST">
  <div class="form-row">

    <!-- Inserimento username -->
    <div class="form-group"><br>
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    </div>

    <!-- Inserimento password -->
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password"><br><br>
    </div>

    
    <!-- Selezione prodotto -->
    <?php

      echo '<div class="form-group my-2">
    <label for="id_prodotto">Prodotto</label>
    <select id="id_prodotto" name="id_prodotto" class="form-control">
      <option selected value="-1">Scegli il prodotto</option>';

      $result = $db_connection->query("SELECT DISTINCT id_prodotto, nome_prodotto FROM prodotti");                      
      $rows = $result->num_rows;  
      echo $rows;
      if($rows > 0){  
        while($row = $result->fetch_assoc()){                                                    
          echo '<option value='."$row[id_prodotto]".'>'."$row[nome_prodotto]".'</option>';
        }
      }
      echo '</select> </div>';
      ?>
<br>
<button type="submit" id="submit_btn" name="submit_btn" class="btn btn-primary">Reso</button><br><br>
    </form>

  <?php                                                                 
        
        if (isset($_POST["submit_btn"])) {
            
            $id_prodotto = $_POST["id_prodotto"];
            $username = $_POST["username"];
            $password = $_POST["password"];


            if($id_prodotto<0){
                echo "Errore, selezionare un prodotto";
            }elseif($username==""){
                echo "Errore, username non inserito";
            }elseif($password==""){
                echo "Errore, password non inserita";
            }else{
                $result = $db_connection->query("SELECT id_user FROM utenti WHERE username = '$username' AND password = '$password'");
                $rows = $result->num_rows;    

                if($rows > 0){ 

                    $row = $result->fetch_assoc(); 
                    $id_user = "$row[id_user]";

                    $output = $db_connection->query("DELETE FROM `utenti_prodotti` WHERE id_user = '$id_user' AND id_prodotto = '$id_prodotto' ");
                    echo "Reso effettuato";

                    //$result->close(); 
                    //$output->close();   

                }else{echo "Username o password errati";}
            }
        }
                                                                                   
        $db_connection->close();                                                                                 

    ?>
  </tbody>
</table>

    </center>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>