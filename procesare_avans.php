<?php
// Verificare dacă este o cerere POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesare parametrii din formular
    $avans = $_POST['avans'];
    $idClient = $_POST['idClient'];

    // Conexiune la baza de date
    $servername = "localhost";
    $database = "proiect_bd";
    $username = "root";
    $password = "1234";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificare conexiune
    if ($conn->connect_error) {
        die("Conexiune eșuată: " . $conn->connect_error);
    }

    // Actualizează suma avansului pentru client
    $sqlActualizareAvans = "UPDATE Client SET Acont = '$avans' WHERE IDClient = '$idClient'";

    if ($conn->query($sqlActualizareAvans) === TRUE) {
        echo "Avansul de $avans a fost achitat cu succes!";
        
        // Afiseaza un formular pentru redirectionare
        echo '<form action="index.html" method="get">';
        echo '<input type="submit" value="Înapoi la pagina principală">';
        echo '</form>';
    } else {
        echo "Eroare la actualizarea avansului: " . $conn->error;
    }

    // Închidere conexiune
    $conn->close();
} else {
    echo "Acces interzis.";
}
?>
