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

// Verifică acțiunea solicitată
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['idClient'])) {
    $idClient = $_POST['idClient'];

    if (isset($_POST['modifica'])) {
        // Acțiunea de modificare
        header("Location: modificare.php?idClient=" . $idClient);
        exit();
    } elseif (isset($_POST['sterge'])) {
        // Acțiunea de ștergere
        header("Location: sterge.php?idClient=" . $idClient);
        exit();
    } else {
        // Acțiune nedefinită
        echo "Acțiune nedefinită.";
    }
} else {
    echo "ID Client lipsă.";
}

// Închide conexiunea la baza de date
$conn->close();
?>
