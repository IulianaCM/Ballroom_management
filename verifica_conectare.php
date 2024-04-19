<?php
// Informații de conectare la baza de date
$servername = "localhost";
$database = "proiect_bd";

// Preia valorile introduse în formular
$username = $_POST['username'];
$password = $_POST['password'];

// Creare conexiune
$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    echo "Conectare eșuată. Verificați numele de utilizator și parola.";
    die("Conexiunea a eșuat: " . $conn->connect_error);
} else {
    echo "Login reușit! Veți fi redirecționat imediat.";
    // Așteaptă 1 secunda
    sleep(1);

    header("Location: noutati.php");
    exit();
}

// Închidere conexiune
$conn->close();
?>