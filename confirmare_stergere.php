<?php
// Conexiune la baza de date
$servername = "localhost";
$database = "proiect_bd";
$username = "root";
$password = "1234";

$conn = new mysqli($servername, $username, $password, $database);

// Verifică conexiunea
if ($conn->connect_error) {
    die("Conexiunea a eșuat: " . $conn->connect_error);
}

// Preia ID-ul clientului din URL
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idClient = $_POST['idClient'];

    // Șterge clientul cu idClient preluat din form
    $sqlStergeClient = "DELETE FROM Client WHERE IDClient = '$idClient'";

    if ($conn->query($sqlStergeClient) === TRUE) {
        echo '<h4>Ștergerea a fost realizată cu succes!</h4>';

        // Afiseaza un formular pentru redirectionare
        echo '<form action="index.html" method="get">';
        echo '   <input type="submit" value="Înapoi la pagina principală">';
        echo '</form>';
    } else {
        echo "Eroare la ștergere: " . $conn->error;
    }
} else {
    echo "Eroare la căutare.";
}

// Închide conexiunea la baza de date
$conn->close();
?>
