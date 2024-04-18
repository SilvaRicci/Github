<html>
    <body>
        <?php
            include "src.php";
            
            $email = $_POST["email-newsletter"];
            addToNewsletter($email);

            alert("Iscrizione avvenuta con successo! Buona giornata.");
            echo "window.setTimeout(function(){window.location.href = 'index.php';}, 5000);"
        ?>
    </body>
</html>