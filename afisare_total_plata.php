<?php
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

// Preia ID-ul clientului din URL
if (isset($_GET['idClient'])) {
    $idClient = $_GET['idClient'];
} else {
    echo "Eroare la căutare.";
}

// Obține informații despre client și eveniment
$sqlClientInfo = "SELECT * FROM Client WHERE IDClient = '$idClient'";
$resultClientInfo = $conn->query($sqlClientInfo);

$sqlEvenimentInfo = "SELECT * FROM Eveniment WHERE IDClient = '$idClient'";
$resultEvenimentInfo = $conn->query($sqlEvenimentInfo);

if ($resultClientInfo->num_rows > 0 && $resultEvenimentInfo->num_rows > 0) {
    $rowClient = $resultClientInfo->fetch_assoc();
    $rowEveniment = $resultEvenimentInfo->fetch_assoc();

    // Afișează informațiile despre client
    echo "Informații despre client:<br>";
    echo "Nume: " . $rowClient['Nume'] . "<br>";
    echo "Prenume: " . $rowClient['Prenume'] . "<br>";
    echo "Număr de telefon: " . $rowClient['Nr_telefon'] . "<br>";

    // Afișează informațiile despre eveniment
    echo "<br>Informații despre eveniment:<br>";
    echo "Tip eveniment: " . $rowEveniment['Tip_Eveniment'] . "<br>";
    echo "Culoare predominantă: " . $rowEveniment['Culoare_predominanta'] . "<br>";
    echo "Data eveniment: " . $rowEveniment['Data_eveniment'] . "<br>";

    // Afișează totalul de plată
    $total_plata = $rowClient['Total_plata'];
    echo "<br>Total plată: " . $total_plata . "<br>";

    // Adaugă întrebarea despre achitarea avansului și formularul asociat
    echo "<br>Doriți să achitați un avans? ";
    echo '<input type="checkbox" id="achitareAvansCheckbox" name="achitareAvansCheckbox" onclick="afisareCaseta()">';

    // Adaugă caseta pentru introducerea numărului într-un formular ascuns
    echo '<form id="formularAvans" style="display: none;" method="post" action="procesare_avans.php">';
    echo '   Introduceți valoarea avansului: <input type="text" id="numarInput" name="avans">';
    echo '   <input type="hidden" name="idClient" value="' . $idClient . '">';
    echo '   <input type="submit" value="Achită avans">';
    echo '</form>';

    // Afiseaza un formular pentru redirectionare
    echo '<form action="index.html" method="get">';
    echo '   <input type="submit" value="Înapoi la pagina principală">';
    echo '</form>';
} else {
    echo "Eroare la obținerea informațiilor despre client și eveniment.";
}

// Închidere conexiune
$conn->close();
?>

<script>
    function afisareCaseta() {
        var checkbox = document.getElementById("achitareAvansCheckbox");
        var formular = document.getElementById("formularAvans");

        if (checkbox.checked) {
            formular.style.display = "block";
        } else {
            formular.style.display = "none";
        }
    }
</script>
