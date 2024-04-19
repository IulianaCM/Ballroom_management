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
if (isset($_GET['idClient'])) {
    $idClient = $_GET['idClient'];

    echo '<h4>Sunteți sigur că doriți să ștergeți acest utilizator și informațiile asociate?</h4>';
    echo '<p>Prin apăsarea butonului "Da" utilizatorul va fi șters.</p>';
    echo '<p>Dacă apăsați butonul "Înapoi la pagina principală" veți fi redirecționat la pagina de bun venit.</p>';

    // Tratează operația pe care clientul dorește să o realizeze
    echo '<form action="confirmare_stergere.php" method="post">';
    echo '   <input type="hidden" name="idClient" value="' . $idClient . '">';
    echo '   <input type="submit" value="Da">';
    echo '</form>';

    // Afiseaza un formular pentru redirectionare
    echo '<form action="index.html" method="get">';
    echo '<input type="submit" value="Înapoi la pagina principală">';
    echo '</form>';

} else {
    echo "Eroare la căutare.";
}

// Închide conexiunea la baza de date
$conn->close();
?>
