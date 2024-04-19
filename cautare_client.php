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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Procesare parametrii din formular
    $nume = $_POST["nume"];
    $prenume = $_POST["prenume"];
    $telefon = $_POST["telefon"];

    $sql = "SELECT IDClient FROM Client WHERE Nume = '$nume' AND Prenume = '$prenume' AND Nr_telefon = '$telefon'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $rezultate = array();
        while ($row = $result->fetch_assoc()) {
            $rezultate[] = $row['IDClient'];
        }

        // Închide conexiunea la baza de date
        $conn->close();

        // Redirecționează către alt fișier PHP și transmite ID-ul clientului prin URL
        header("Location: procesare.php?rezultate=" . urlencode(serialize($rezultate)));
        exit();
    } else {
        // Tratează cazul în care nu există înregistrare
        echo "Eroare: A intervenit o problemă în procesul de căutare. Reîncercați";
        exit();
    }
}

// Închide conexiunea la baza de date
$conn->close();
?>
