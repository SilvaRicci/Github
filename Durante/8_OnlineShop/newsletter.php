<?php
    include "src.php";
    
    $email = $_POST["email-newsletter"];
    addToNewsletter($email);

    alert("Iscrizione avvenuta con successo! Buona giornata.");

    header("Location: index.php");