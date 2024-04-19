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

$sqlEvenNou = "SELECT COUNT(*) FROM Eveniment WHERE IDEveniment NOT IN (SELECT DISTINCT E.IDEveniment FROM Eveniment E INNER JOIN EvenimentAngajat EA ON E.IDEveniment = EA.IDEveniment)";
$resultEvenNou = $conn->query($sqlEvenNou);

if ($resultEvenNou->num_rows > 0) {
    $rowEvenNou = $resultEvenNou->fetch_row();
    $countEvenNou = $rowEvenNou[0];
}

$sqlSalon = "SELECT COUNT(*) FROM Salon WHERE IDSalon NOT IN (SELECT DISTINCT S.IDSalon FROM Salon S INNER JOIN Eveniment E ON E.IDSalon = S.IDSalon)";
$resultSalon = $conn->query($sqlSalon);

if ($resultSalon->num_rows > 0) {
    $rowSalon = $resultSalon->fetch_row();
    $countSalon = $rowSalon[0];
}

$sqlMeniu = "SELECT COUNT(*) FROM Meniu WHERE IDMeniu NOT IN (SELECT DISTINCT M.IDMeniu FROM Meniu M INNER JOIN Eveniment E ON E.IDMeniu = M.IDMeniu)";
$resultMeniu = $conn->query($sqlMeniu);

if ($resultMeniu->num_rows > 0) {
    $rowMeniu = $resultMeniu->fetch_row();
    $countMeniu = $rowMeniu[0];
}

$sqlFotograf = "SELECT COUNT(*) FROM Fotograf WHERE IDFotograf NOT IN (SELECT DISTINCT F.IDFotograf FROM Fotograf F INNER JOIN Eveniment E ON E.IDFotograf = F.IDFotograf)";
$resultFotograf = $conn->query($sqlFotograf);

if ($resultFotograf->num_rows > 0) {
    $rowFotograf = $resultFotograf->fetch_row();
    $countFotograf = $rowFotograf[0];
}

echo '<h3>Bună ziua! Pe lista de astăzi avem:</h3>';

echo '<p>Evenimente care necesită atribuirea unor angajați: ' . $countEvenNou . '</p>';
echo '<p>Saloane care nu sunt utilizate: ' . $countSalon . '</p>';
echo '<p>Firme de fotografie care nu sunt contactate: ' . $countFotograf . '</p>';
echo '<p>Meniuri care nu sunt utilizate: ' . $countMeniu . '</p>';

// Tratează operația pe care adminul dorește să o realizeze
echo '<form method="post" action="adauga_meniu.html">';
echo '   <input type="submit" value="Adaugă un meniu">';
echo '</form>';
echo '<form method="post" action="modif_meniu.php">';
echo '   <input type="submit" value="Modifică/Șterge un meniu">';
echo '</form>';
echo '<form method="post" action="adauga_salon.html">';
echo '   <input type="submit" value="Adaugă un salon">';
echo '</form>';
echo '<form method="post" action="modif_salon.php">';
echo '   <input type="submit" value="Modifică/Șterge un salon">';
echo '</form>';
echo '<form method="post" action="adauga_foto.html">';
echo '   <input type="submit" value="Adaugă o firmă de fotografie">';
echo '</form>';
echo '<form method="post" action="modif_foto.php">';
echo '   <input type="submit" value="Modifică/Șterge o firmă de fotografie">';
echo '</form>';
echo '<form method="post" action="adauga_angajat.html">';
echo '   <input type="submit" value="Adaugă un angajat">';
echo '</form>';
echo '<form method="post" action="modif_angajat.php">';
echo '   <input type="submit" value="Modifică/Șterge datele unui angajat">';
echo '</form>';
echo '<form method="post" action="atribuie_ang.php">';
echo '   <input type="submit" value="Atribuie angajați evenimentelor noi">';
echo '</form>';

// Afiseaza un formular pentru redirectionare
echo '<form action="index.html" method="get">';
echo '<input type="submit" value="Înapoi la pagina principală">';
echo '</form>';

// Închide conexiunea la baza de date
$conn->close();
?>

<style>
    form {
        display: inline-block;
        margin: 5px 20px;
    }
</style>