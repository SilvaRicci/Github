<?php
// Connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$database = "bancomatDatabase";

$connessione = new mysqli($servername, $username, $password, $database , "3306");

// Verifica della connessione
if ($connessione->connect_error) {
    die("Connessione al database fallita: " . $connessione->connect_error);
}


// Operazione 1: Inserimento di un nuovo attore
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitInserimentoAttore'])) {
    $nomeAttore = $connessione->real_escape_string($_POST['nomeAttore']);
    $cognomeAttore = $connessione->real_escape_string($_POST['cognomeAttore']);
    $dataNascita = $connessione->real_escape_string($_POST['dataNascita']);

    $queryInserimentoAttore = "INSERT INTO attori (nome, cognome, data_nascita) VALUES ('$nomeAttore', '$cognomeAttore', '$dataNascita')";

    if ($connessione->query($queryInserimentoAttore) === TRUE) {
        echo "<p>Nuovo attore inserito con successo!</p>";
    } else {
        echo "<p>Errore durante l'inserimento dell'attore: " . $connessione->error . "</p>";
    }
}



// Operazione 2: Visualizzazione in tabella dei film
$queryVisualizzazioneFilm = "SELECT * FROM film";
$result = $connessione->query($queryVisualizzazioneFilm);

if (!$result) {
    echo "Errore durante l'esecuzione della query: " . $connessione->error;
} else {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Nome</th><th>Trama</th><th>Durata</th><th>Data Uscita</th><th>ID Genere</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>{$row['id_film']}</td><td>{$row['nome']}</td><td>{$row['trama']}</td><td>{$row['durata']}</td><td>{$row['data_uscita']}</td><td>{$row['id_genere']}</td></tr>";
    }

    echo "</table>";
}



// Operazione 3: Modifica della durata di un film specifico
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitModificaDurata'])) {
    $idFilmDaModificare = $connessione->real_escape_string($_POST['idFilmDaModificare']);

    $queryModificaDurata = "UPDATE film SET durata = durata + 5 WHERE id_film = '$idFilmDaModificare'";

    if ($connessione->query($queryModificaDurata) === TRUE) {
        echo "<p>Durata del film modificata con successo!</p>";
    } else {
        echo "<p>Errore durante la modifica della durata del film: " . $connessione->error . "</p>";
    }
}



// Operazione 4: Visualizzazione dei film di un determinato genere scelto da un menù a tendina
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitVisualizzaGenere'])) {
    $idGenereSelezionato = $connessione->real_escape_string($_POST['idGenereSelezionato']);
    $queryVisualizzazioneFilmGenere = "SELECT * FROM film WHERE id_genere = '$idGenereSelezionato'";
    $resultGenere = $connessione->query($queryVisualizzazioneFilmGenere);

    if (!$resultGenere) {
        echo "Errore durante l'esecuzione della query: " . $connessione->error;
    } else {
        echo "<p>Film del genere selezionato:</p>";
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Nome</th><th>Trama</th><th>Durata</th><th>Data Uscita</th><th>ID Genere</th></tr>";

        while ($rowGenere = $resultGenere->fetch_assoc()) {
            echo "<tr><td>{$rowGenere['id_film']}</td><td>{$rowGenere['nome']}</td><td>{$rowGenere['trama']}</td><td>{$rowGenere['durata']}</td><td>{$rowGenere['data_uscita']}</td><td>{$rowGenere['id_genere']}</td></tr>";
        }

        echo "</table>";
    }
}

$connessione->close();
?>
