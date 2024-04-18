<?php
    include "src.php";

    $email = $_POST["email-newsletter"];
    addToNewsletter($email);

    alert("Iscrizione avvenuta con successo! Buona giornata.");

    sleep(3);
    header("Location: index.php");