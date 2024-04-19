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
if (isset($_GET['rezultate'])) {
    $rezultate = unserialize(urldecode($_GET['rezultate']));
    echo '<h3>Au fost găsite înregistrările:</h3>';

    // Afisează rezultatele
    echo '<form method="post" action="alege.php">';

    // Afișează rezultatele
    foreach ($rezultate as $row) {
        $idClient = intval($row);

        $sqlClient = "SELECT * FROM Client WHERE IDClient = $idClient";
        $resultClient = $conn->query($sqlClient);

        if ($resultClient->num_rows > 0) {
            $rowClient = $resultClient->fetch_assoc();
            $rest_plata = $rowClient['Total_plata'] - $rowClient['Acont'];

            // Afisează valorile din tabela Client
            echo '<h4>Informații asociate pentru:</h4>';
            echo '<p>Nume: ' . $rowClient['Nume'] . '</p>';
            echo '<p>Prenume: ' . $rowClient['Prenume'] . '</p>';
            echo '<p>Număr de telefon: ' . $rowClient['Nr_telefon'] . '</p>';
            echo '<p>Avans: ' . $rowClient['Acont'] . '</p>';
            echo '<p>Total de plată: ' . $rowClient['Total_plata'] . '</p>';
            echo '<p>Rest de plată: ' . $rest_plata . '</p>';
        } else {
            // Tratează cazul în care nu există înregistrare
            echo "Eroare: A intervenit o problemă în procesul de căutare. Reîncercați";
            exit();
        }

        $sqlEveniment = "SELECT * FROM Eveniment WHERE IDClient = $idClient";
        $resultEveniment = $conn->query($sqlEveniment);

        if ($resultEveniment->num_rows > 0) {
            $rowEveniment = $resultEveniment->fetch_assoc();
            $idSalon = $rowEveniment['IDSalon'];
            $idMeniu = $rowEveniment['IDMeniu'];
            $idFotograf = $rowEveniment['IDFotograf'];

            $sqlSalon = "SELECT Nume_Salon FROM Salon WHERE IDSalon = $idSalon";
            $resultSalon = $conn->query($sqlSalon);

            if ($resultSalon->num_rows > 0) {
                $rowSalon = $resultSalon->fetch_assoc();
                $Salon = $rowSalon['Nume_Salon'];
            } else {
                // Tratează cazul în care nu există înregistrare
                echo "Eroare1: A intervenit o problemă în procesul de căutare. Reîncercați";
                exit();
            }

            $sqlMeniu = "SELECT Denumire FROM Meniu WHERE IDMeniu = $idMeniu";
            $resultMeniu = $conn->query($sqlMeniu);

            if ($resultMeniu->num_rows > 0) {
                $rowMeniu = $resultMeniu->fetch_assoc();
                $Meniu = $rowMeniu['Denumire'];
            } else {
                // Tratează cazul în care nu există înregistrare
                echo "Eroare2: A intervenit o problemă în procesul de căutare. Reîncercați";
                exit();
            }

            $sqlFotograf = "SELECT Nume FROM Fotograf WHERE IDFotograf = $idFotograf";
            $resultFotograf = $conn->query($sqlFotograf);

            if ($resultFotograf->num_rows > 0) {
                $rowFotograf = $resultFotograf->fetch_assoc();
                $Fotograf = $rowFotograf['Nume'];
            } else {
                // Tratează cazul în care nu există înregistrare
                echo "Eroare3: A intervenit o problemă în procesul de căutare. Reîncercați";
                exit();
            }

            // Afisează valorile din tabela Eveniment
            echo '<h4>Informații despre eveniment:</h4>';
            echo '<p>Tipul evenimentului: ' . $rowEveniment['Tip_Eveniment'] . '</p>';
            echo '<p>Culoarea predominantă: ' . $rowEveniment['Culoare_predominanta'] . '</p>';
            echo '<p>Data evenimentului și ora începerii: ' . $rowEveniment['Data_eveniment'] . '</p>';
            echo '<p>Meniu selectat: ' . $Meniu . '</p>';
            echo '<p>Salon: ' . $Salon . '</p>';
            echo '<p>Firmă fotografie: ' . $Fotograf . '</p>';
        } else {
            // Tratează cazul în care nu există înregistrare
            echo "Eroare: A intervenit o problemă în procesul de căutare. Reîncercați";
            exit();
        }

        // Adaugă un radio button pentru fiecare înregistrare
        echo '<input type="radio" name="selectie" value="' . $idClient . '"> Selectează acest buton dacă este înregistrarea căutată, apoi apasă "Pasul următor"';
        echo '<br>';
    }

    // Adaugă un buton pentru a trimite alegerea utilizatorului
    echo '<input type="submit" name="submit" value="Pasul următor">';
    echo '</form>';
} else {
    echo "Eroare la căutare.";
}

// Închide conexiunea la baza de date
$conn->close();
?>
