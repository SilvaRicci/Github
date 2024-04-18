<?php
    include "src.php";

    $email = $_POST["email-newsletter"];
    echo "".$email;
    addToNewsletter($email);

    alert("Iscrizione avvenuta con successo! Buona giornata.");

    //sleep(3);
    //header("Location: index.php");