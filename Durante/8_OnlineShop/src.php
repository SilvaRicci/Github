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

        $output = null;

        $result = $db_connection->query("SELECT password FROM utente WHERE username_user='$username' OR email_user='$username'");
        $rows = $result->num_rows;
  
        if($rows > 0){
  
            $row = $result->fetch_assoc();
            $psw = $row['password'];
  
            if(password_verify($password,$psw)) {
                echo "Utente loggato con successo! Trasferimento in corso...";
                
                session_start();
                
                $_SESSION['username'] = $row['CF'];
                //$HOME_PATH = $HOME_PATH+"";
  
                echo '<script>  window.location.href = "'.$HOME_PATH.'"; </script>';
              }
            }
          $db_connection->close();
      }