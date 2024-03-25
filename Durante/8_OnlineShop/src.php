<?php

    function aggiungiAlCarrello($id,$quantita){ 

        if(!isset($_SESSION['carrello'])){
            $_SESSION['carrello'][] = array();
        }

        if(isset($_SESSION['carrello'][$id])){
            $_SESSION['carrello'][$id]['quantita']=$_SESSION['carrello'][$id]['quantita']+$quantita;
        }else{
            $item = array(
                'id' => $id,
                'quantita' => $quantita
            );
            $_SESSION['carrello'][$id] = $item;
        }
    }

    function login($username,$password){

        include "connessione.php";

        $output = false;

        $result = $db_connection->query("SELECT password FROM utente WHERE username_user='$username' OR email_user='$username'");
        $rows = $result->num_rows;
  
        if($rows > 0){
  
            $row = $result->fetch_assoc();
            $psw = $row['password'];
  
            if(password_verify($password,$psw)) {
                $output = true;
              }
            }
          $db_connection->close();
          return $output;
      }

      function signup(){
            
        include "connessione.php";
        
        if(dataVerify($CF,$cognome,$nome,$indirizzo,$comune,$CAP,$provincia,$dataNascita,$genere,$password)){
            $password = password_hash($password,PASSWORD_DEFAULT);
            
            $query = "INSERT INTO `utente`(`id_user`, `nome_user`, `cognome_user`, `dataDiNascita_user`, `citta_user`, `cap_user`, `provincia_user`, `via_user`, `email_user`, `username_user`, `password_user`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]','[value-7]','[value-8]','[value-9]','[value-10]','[value-11]')";
            $ok=$db_connection->query($query);

            
            echo "Inserimento dei dati nella tabella: 100% completato.";
            
            //$LOGIN_PATH = $LOGIN_PATH+"";

            echo '<script>  window.location.href = "'.$LOGIN_PATH.'"; </script>';
        }
        
        $db_connection->close();    
    }

    function dataVerify($username,$email,$nome,$cognome,$dataNascita,$citta,$cap,$provincia,$via,$password){
        $isOk = true; // Inizialmente impostiamo la variabile a true, se uno dei controlli fallisce, diventerà false

        if($username == ""){
            $isOk = false;
            echo "Username non inserito <br />";
        }

        if($email == ""){
            $isOk = false;
            echo "Email non inserita <br />";
        }

        if($nome == ""){
            $isOk = false;
            echo "Nome non inserito <br />";
        }

        if($cognome == ""){
            $isOk = false;
            echo "Cognome non inserito <br />";
        }

        if($dataNascita == ""){
            $isOk = false;
            echo "Data di nascita non inserita <br />";
        }

        if($citta == ""){
            $isOk = false;
            echo "Città non inserita <br />";
        }

        if($cap == ""){
            $isOk = false;
            echo "CAP non inserito <br />";
        }

        if($provincia == ""){
            $isOk = false;
            echo "Provincia non inserita <br />";
        }

        if($via == ""){
            $isOk = false;
            echo "Indirizzo non inserito <br />";
        }

        if($password == ""){
            $isOk = false;
            echo "Password non inserita <br />";
        }

        if($confermaPassword == ""){
            $isOk = false;
            echo "Conferma Password non inserita <br />";
        }

        //eventuali nuovi controlli sulla password
        return $isOk;
    }

?>