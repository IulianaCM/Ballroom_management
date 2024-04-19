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
    // Verifică dacă variabila $_POST['meniu'] există și este setată
    if (isset($_POST['meniu'])) {
        // Afișează informațiile despre meniu
        echo "<h3>Informații confirmare meniu:</h3>";

        echo "<p>Denumire meniu: " . $_POST['denumire'] . "</p>";
        echo "<p>Tip eveniment: " . $_POST['tip_eveniment'] . "</p>";
        echo "<p>Preț: " . $_POST['pret'] . "</p>";
        echo "<p>Gustare rece: " . $_POST['gustare_rece'] . "</p>";
        echo "<p>Pește: " . $_POST['peste'] . "</p>";
        echo "<p>Tradițional: " . $_POST['traditional'] . "</p>";
        echo "<p>Grill: " . $_POST['grill'] . "</p>";
        echo "<p>Tort: " . $_POST['tort'] . "</p>";
        echo "<p>Candy Bar: " . $_POST['candy_bar'] . "</p>";
        echo "<p>Băuturi: " . $_POST['bauturi'] . "</p>";

        $sqlMeniu = "";

    } else {
        // Dacă variabila $_POST['meniu'] nu este setată, afișează un mesaj de eroare
        echo "Eroare: Parametrul 'meniu' lipsește!";
    }
} else {
    // Dacă nu este o cerere POST, afișează un mesaj de eroare
    echo "Eroare: Cerere nevalidă!";
}
?>