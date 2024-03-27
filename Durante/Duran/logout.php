
<?php
    session_start();

    //rendo l'array nulla
    $_SESSION[]=array();
    //faccio l'unset di tutte le variabili
    session_unset();
    //distruggo la sessione
    session_destroy();

    //porto l'utente alla pagine di login
    header("Location: login.php");
?>
