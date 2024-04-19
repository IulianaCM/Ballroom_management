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

// Procesare parametrii din formular
$nume = $_POST['nume'];
$prenume = $_POST['prenume'];
$telefon = $_POST['telefon'];
$tipEveniment = $_POST['tip_eveniment'];
$culoarePredominanta = $_POST['culoare'];
$dataEveniment = $_POST['data_eveniment'];
$oraIncepere = $_POST['ora_incepere'];
$Meniu = $_POST['dinamic_select'];
$Salon = $_POST['dinamic_select_1'];
$Fotograf = $_POST['dinamic_select_2'];

$sqlMeniu = "SELECT IDMeniu, Pret FROM Meniu WHERE Denumire = '$Meniu'";
$resultMeniu = $conn->query($sqlMeniu);

if ($resultMeniu->num_rows > 0) {
    $rowMeniu = $resultMeniu->fetch_assoc();
    $idMeniu = $rowMeniu['IDMeniu'];
    $costMeniu = $rowMeniu['Pret'];
} else {
    // Tratează cazul în care nu există înregistrare
    echo "Eroare1: A intervenit o problemă în procesul de inserare.";
    exit();
}

$sqlSalon = "SELECT IDSalon, Cost_inchiriere FROM Salon WHERE Nume_Salon = '$Salon'";
$resultSalon = $conn->query($sqlSalon);

if ($resultSalon->num_rows > 0) {
    $rowSalon = $resultSalon->fetch_assoc();
    $idSalon = $rowSalon['IDSalon'];
    $costSalon = $rowSalon['Cost_inchiriere'];
} else {
    // Tratează cazul în care nu există înregistrare
    echo "Eroare2: A intervenit o problemă în procesul de inserare.";
    exit();
}

$sqlFotograf = "SELECT IDFotograf, Cost_servicii FROM Fotograf WHERE Nume = '$Fotograf'";
$resultFotograf = $conn->query($sqlFotograf);

if ($resultFotograf->num_rows > 0) {
    $rowFotograf = $resultFotograf->fetch_assoc();
    $idFotograf = $rowFotograf['IDFotograf'];
    $costFotograf = $rowFotograf['Cost_servicii'];
} else {
    // Tratează cazul în care nu există înregistrare
    echo "Eroare3: A intervenit o problemă în procesul de inserare.";
    exit();
}

// Inserare în tabela Client
$total_plata = $costMeniu + $costSalon + $costFotograf;
$sqlClientAdd = "INSERT INTO Client (Nume, Prenume, Nr_telefon, Total_plata)
                 VALUES ('$nume', '$prenume', '$telefon', '$total_plata')";

// Client adăugat cu succes, acum extrage IDClient
if ($conn->query($sqlClientAdd) === TRUE) {
    $sqlClient = "SELECT `IDClient` FROM `Client` WHERE `Nume` = '$nume' AND `Prenume` = '$prenume' AND `Nr_telefon` = '$telefon'";
    $resultClient = $conn->query($sqlClient);

    if ($resultClient->num_rows > 0) {
        $rowClient = $resultClient->fetch_assoc();
        $idClient = $rowClient['IDClient'];
    } else {
        // Tratează cazul în care nu există înregistrare
        echo "Eroare4: A intervenit o problemă în procesul de inserare.";
        exit();
    }
} else {
    // Eroare la adăugarea clientului
    echo "Eroare la adăugarea clientului: " . $conn->error;
}

// Inserare în tabela Eveniment
$sqlEveniment = "INSERT INTO Eveniment (Tip_Eveniment, Culoare_predominanta, Data_eveniment, IDMeniu, IDSalon, IDFotograf, IDClient)
                 VALUES ('$tipEveniment', '$culoarePredominanta', '$dataEveniment $oraIncepere', '$idMeniu', '$idSalon', '$idFotograf', '$idClient')";

if ($conn->query($sqlEveniment) === TRUE) {
    // Eveniment adăugat cu succes
    header("Location: afisare_total_plata.php?idClient=" . $idClient);
    exit();
} else {
    // Eroare la adăugarea evenimentului
    echo "Eroare la adăugarea evenimentului: " . $conn->error;
}

// Închidere conexiune
$conn->close();
?>