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
        
        $CF = $_POST["CF"];
        $cognome = $_POST["cognome"];
        $nome = $_POST["nome"]; 
        $indirizzo = $_POST["indirizzo"];
        $comune = $_POST["comune"];
        $CAP = $_POST["cap"];
        $provincia = $_POST["provincia"];
        $dataNascita = $_POST["dataNascita"];
        $genere = $_POST["genere"];
        $password = $db_connection->real_escape_string(stripslashes($_POST["password"]));
        
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

    function dataVerify($CF,$cognome,$nome,$indirizzo,$comune,$CAP,$provincia,$dataNascita,$genere,$password){
        $isOk=true;
        
        if($CF==""){
            $isOk=false;
            echo "Codice fiscale non inserito <br />";
        }
        if(!(strlen($CF)==16) && $isOk){
            $isOk=false;
            echo "Codice fiscale non valido <br />";
        }
        if($cognome==""){
            $isOk=false;
            echo "Cognome non inserito <br />";
        }
        if($nome==""){
            $isOk=false;
            echo "Nome non inserito <br />";
        }
        if($indirizzo==""){
            $isOk=false;
            echo "Indirizzo non inserito <br />";
        }
        if($comune==""){
            $isOk=false;
            echo "Comune non inserito <br />";
        }
        if($CAP==""){
            $isOk=false;
            echo "CAP non inserito <br />";
        }
        if($provincia==""){
            $isOk=false;
            echo "Provincia non inserita <br />";
        }
        if($dataNascita==""){
            $isOk=false;
            echo "Data di nascita non inserita <br />";
        }
        if($genere=="-1"){
            $isOk=false;
            echo "Genere non inserito <br />";
        }
        if($password==""){
        $isOk=false;
        echo "Password non inserita <br />";
        }
        //eventuali nuovi controlli sulla password
        return $isOk;
    }

?>