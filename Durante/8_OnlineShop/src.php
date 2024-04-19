<?php

    function aggiungiAlCarrello($id,$quantita){ 

        $magazzino = controllaMagazzino($id,$quantita);

        if($magazzino==1){
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
            return $magazzino;
        }else{
            return $magazzino;
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

    function controllaMagazzino($id,$quantita){

        include "connessione.php";
        
        $magazzino = true;

        $result = $db_connection->query("SELECT qnt_prodotto FROM prodotto WHERE id_prodotto='$id'");
        $row = $result->fetch_assoc();
        $qnt = $row['qnt_prodotto'];

        if($quantita > $qnt){
            $magazzino = $qnt;
        }

        return $magazzino;
    }

    function alert($text){
        echo '<script>  alert("'. $text .'"); </script>';
    }

    function controllaEmail($email){
        include "connessione.php";
        
        $esiste = -1;

        $result = $db_connection->query("SELECT email_user FROM utente WHERE email_user='$email'");
        if($row = $result->fetch_assoc()){
             $esiste = sendCode($email);
        }
        
        return $esiste;     
    }

    function sendCode($email){
        //NON FUNZIONA, MANCA SERVER SMTP (ANCHE SE IL NUMERO VIENE GENERATO VIENE USATO UN CODICE STANDARD PER TEST)
        $code = mt_rand(111111, 999999);
        return $code;
    }

    function changePassword($email,$password){
        include "connessione.php";
        
        $done = false;
        $password = password_hash($password,PASSWORD_DEFAULT);

        $result = $db_connection->query("UPDATE `utente` SET `password_user`='$password' WHERE `email_user`='$email'");

        //if($row = $result->fetch_assoc()){
            $done = true;
        //}
        
        return $done;     
    }

    function addToNewsletter($email){
        include "connessione.php";
        $isDone = false;

        $query = "SELECT * FROM `newsletter` WHERE `email` = '$email'";
        $check = $db_connection->query($query);

        $rows = $check->num_rows;
  
        if($rows == 0){
            $query = "INSERT INTO `newsletter` (`email`) VALUES ('$email')";
            $ok=$db_connection->query($query);
            $isDone = true;
        }
        
        $db_connection->close(); 
        return $isDone;
    }

    function acquista($id,$quantita){
        include "connessione.php";

        //verifica quantità dal magazzino prima di acquistare
        if(controllaMagazzino($id,$quantita)){
            echo "Quantità verificata! test:". $id;

            $id_user = getIdUser();
            $date = date("Y/m/d");
            $time = date("h:i:sa");
            $total = getTotal($id,$quantita);

            $queryAcquisto = "UPDATE `prodotto` SET `qnt_prodotto`=`qnt_prodotto`-".$quantita." WHERE `id_prodotto`='".$id."';";
            $queryTracking = "INSERT INTO `shopTracking`(`id_user`, `id_prodotto`, `qnt_acquistata`, `data_diAcquisto`, `ora_diAcquisto`, `spesa_totale`) VALUES ('$id_user','$id','$quantita','$date','$time','$total')";
            
            $result = $db_connection->query($queryAcquisto);
            $tracking = $db_connection->query($queryTracking);
            
            echo "Acquisto effettuato: ".$id;
        }


    }

    function getIDUser(){
        include "connessione.php";

        $id_user = null;
        if(isset($_SESSION['username'])){
            $usr = $_SESSION['username'];
            $query = "SELECT `id_user` FROM `utente` WHERE `username_user` = '".$usr."'";
            $result = $db_connection->query($query);
            $row = $result->fetch_assoc();
            $id_user = $row["id_user"];
        }

        return $id_user;
    }

    function getTotal($id,$quantita){
        include "connessione.php";

        $total= null;

        $result = $db_connection->query("SELECT pvu_prodotto FROM prodotto WHERE id_prodotto='$id'");
        $row = $result->fetch_assoc();
        $pvu = $row['pvu_prodotto'];

        $total = $pvu * $quantita;

        return $total;
    }
