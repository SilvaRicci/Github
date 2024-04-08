<?php

    function aggiungiAlCarrello($id,$quantita){ 

        if(controllaMagazzino($quantita)){
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
            return true;
        }else{
            return false;
        }  
    }

    function login($username,$password){

        include "connessione.php";

        $output = false;

        $result = $db_connection->query("SELECT password_user,cart_user FROM utente WHERE username_user='$username' OR email_user='$username'");
        $rows = $result->num_rows;
  
        if($rows > 0){
  
            $row = $result->fetch_assoc();
            $psw = $row['password_user'];
  
            if(password_verify($password,$psw)) {
                $output = true;
                recoverCart($row['cart_user']);
              }
            }
          $db_connection->close();
          return $output;
      }

      function signup($username,$email,$nome,$cognome,$dataNascita,$citta,$cap,$provincia,$via,$password,$confermaPassword){
        
        include "connessione.php";
        $output = false;

        if(dataVerify($username,$email,$nome,$cognome,$dataNascita,$citta,$cap,$provincia,$via,$password,$confermaPassword)){
            $password = password_hash($password,PASSWORD_DEFAULT);

            $query = "INSERT INTO `utente`(`nome_user`, `cognome_user`, `dataDiNascita_user`, `citta_user`, `cap_user`, `provincia_user`, `via_user`, `email_user`, `username_user`, `password_user`) VALUES ('$nome','$cognome','$dataNascita','$citta','$cap','$provincia','$via','$email','$username','$password')";
            $ok=$db_connection->query($query);

            $output = true;
        }
        
        $db_connection->close(); 
        return $output;   
    }

    function dataVerify($username,$email,$nome,$cognome,$dataNascita,$citta,$cap,$provincia,$via,$password,$confermaPassword){
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

        if($password != $confermaPassword){
            $isOk = false;
            echo "Le password non coincidono <br />";
        }

        return $isOk;
    }

    function saveCartToDB(){
        include "connessione.php";


    }

    function recoverCart($cart){

    }



?>