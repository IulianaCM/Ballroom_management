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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idClient = $_POST['idClient'];
    if($_GET['nume']) {
        $numeNou = $_GET['numeNou'];
        $sqlUpdateNume = "UPDATE Client SET Nume = '$numeNou' WHERE IDClient = $idClient";
        if ($conn->query($sqlUpdateNume) !== TRUE) {
            echo "Eroare la actualizarea numelui: " . $conn->error;
        }
    }
    if($_GET['prenume']) {
        $prenumeNou = $_GET['prenumeNou'];
        $sqlUpdatePrenume = "UPDATE Client SET Prenume = '$prenumeNou' WHERE IDClient = $idClient";
        if ($conn->query($sqlUpdatePrenume) !== TRUE) {
            echo "Eroare la actualizarea prenumelui: " . $conn->error;
        }
    }
    if($_GET['telefon']) {
        $telefonNou = $_GET['telefonNou'];
        $sqlUpdateTelefon = "UPDATE Client SET Nr_telefon = '$telefonNou' WHERE IDClient = $idClient";
        if ($conn->query($sqlUpdateTelefon) !== TRUE) {
            echo "Eroare la actualizarea telefonului: " . $conn->error;
        }
    }
    if($_GET['avans']) {
        $sqlAvans = "SELECT Acont FROM Client WHERE IDClient = $idClient";
        $resultAvans = $conn->query($sqlAvans);
        if ($resultAvans->num_rows > 0) {
            $rowAvans = $resultAvans->fetch_assoc(); 
        }
        $avansNou = $_GET['avansNou'];
        $plus = $rowAvans['Acont'] + $avansNou;
        $sqlUpdateAvans = "UPDATE Client SET Acont = $plus WHERE IDClient = $idClient";
        if ($conn->query($sqlUpdateAvans) !== TRUE) {
            echo "Eroare la actualizarea avansului : " . $conn->error;
        }
    }
    if($_GET['tipEv']) {
        $tip_eveniment = $_GET['tip_eveniment'];
        $meniu_ev = $_GET['dinamic_select'];
        $sqlMeniu = "SELECT IDMeniu FROM Meniu WHERE Denumire = '$meniu_ev'";
        $resultMeniu = $conn->query($sqlMeniu);
        if ($resultMeniu->num_rows > 0) {
            $rowMeniu = $resultMeniu->fetch_assoc();
            $idMeniu = $rowMeniu['IDMeniu'];
        }
        $sqlUpdateEven = "UPDATE Eveniment SET Tip_Eveniment = '$tip_eveniment', IDMeniu = $idMeniu WHERE IDClient = $idClient";
        if ($conn->query($sqlUpdateEven) !== TRUE) {
            echo "Eroare la actualizarea evenimentului: " . $conn->error;
        }
    } else if($_GET['meniu']) {
        $meniuNou = $_GET['dinamic_select_meniu'];
        $sqlMeniuNou = "SELECT IDMeniu FROM Meniu WHERE Denumire = '$meniuNou'";
        $resultMeniuNou = $conn->query($sqlMeniuNou);
        if ($resultMeniuNou->num_rows > 0) {
            $rowMeniuNou = $resultMeniuNou->fetch_assoc();
            $idMeniuNou = $rowMeniuNou['IDMeniu'];
        }
        $sqlUpdateMeniu = "UPDATE Eveniment SET IDMeniu = $idMeniuNou WHERE IDClient = $idClient";
        if ($conn->query($sqlUpdateMeniu) !== TRUE) {
            echo "Eroare la actualizarea meniului: " . $conn->error;
        }
    }
    if($_GET['culoare']) {
        $culoareNoua = $_GET['culoareNoua'];
        $sqlUpdateCuloare = "UPDATE Eveniment SET Culoare_predominanta = '$culoareNoua' WHERE IDClient = $idClient";
        if ($conn->query($sqlUpdateCuloare) !== TRUE) {
            echo "Eroare la actualizarea culorii: " . $conn->error;
        }
    }
    if($_GET['dataEv']) {
        $dataNoua = $_GET['data_eveniment'];
        $oraNoua = $_GET['ora_incepere'];
        $salon = $_GET['dinamic_select_1'];
        $fotograf = $_GET['dinamic_select_2'];
        $sqlUpdateData = "UPDATE Eveniment SET Data_eveniment = '$dataNoua $oraNoua', IDSalon = (SELECT IDSalon FROM Salon WHERE Nume_Salon = '$salon'), IDFotograf = (SELECT IDFotograf FROM Fotograf WHERE Nume = '$fotograf') WHERE IDClient = $idClient";
        if ($conn->query($sqlUpdateData) !== TRUE) {
            echo "Eroare la actualizarea culorii: " . $conn->error;
        }
    } else {
        if($_GET['salon']) {
            $salonNou = $_GET['dinamic_select_salon'];
            $sqlUpdateSalon = "UPDATE Eveniment SET IDSalon = (SELECT IDSalon FROM Salon WHERE Nume_Salon = '$salonNou') WHERE IDClient = $idClient";
            if ($conn->query($sqlUpdateSalon) !== TRUE) {
                echo "Eroare la actualizarea salonului: " . $conn->error;
            }
        }
        if($_GET['fotograf']) {
            $fotografNou = $_GET['dinamic_select_foto'];
            $sqlUpdateFoto = "UPDATE Eveniment SET IDFotograf = (SELECT IDFotograf FROM Fotograf WHERE Nume = '$fotografNou') WHERE IDClient = $idClient";
            if ($conn->query($sqlUpdateFoto) !== TRUE) {
                echo "Eroare la actualizarea firmei de fotografie: " . $conn->error;
            }
        }
    }
    
    header("Location: confirmare_modificare.php?idClient=" . $idClient);
    exit();
} else {
    echo "Interzis";
}

// Închide conexiunea la baza de date
$conn->close();
?>