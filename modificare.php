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

// Verifică dacă s-a trimis formularul
if (isset($_GET['idClient'])) {
    // Procesează datele primite prin POST
    $idClient = $_GET['idClient'];

    $sqlClientEven = "SELECT C.Nume, C.Prenume, C.Nr_telefon, C.Acont, C.Total_plata, E.IDEveniment, E.Tip_Eveniment, E.Culoare_predominanta, E.Data_eveniment, E.IDMeniu, E.IDSalon, E.IDFotograf FROM Client C INNER JOIN Eveniment E ON C.IDClient = E.IDClient WHERE C.IDClient = $idClient";
    $result = $conn->query($sqlClientEven);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Afisează valorile vechi
        echo '<h3>Modificare client existent</h3>';
        echo 'Bifați căsuțele în dreptul valorilor pe care doriți să le modificați';

        echo '<form method="post" action="update.php">';
        echo '   <input type="hidden" name="idClient" value="' . $idClient . '">';

        echo '   <p>Nume: ' . $row['Nume'] . '</p>';
        echo '   <input type="checkbox" id="nume" name="nume"><br>';
        echo '   <label for="numeNou">Noul nume: </label>';
        echo '   <input type="text" style="display: none;" id="numeNou" name="numeNou"><br>';

        echo '   <p>Prenume: ' . $row['Prenume'] . '</p>';
        echo '   <input type="checkbox" id="prenume" name="prenume"><br>';
        echo '   <label for="prenumeNou">Noul prenume: </label>';
        echo '   <input type="text" style="display: none;" id="prenumeNou" name="prenumeNou"><br>';

        echo '   <p>Număr de telefon: ' . $row['Nr_telefon'] . '</p>';
        echo '   <input type="checkbox" id="telefon" name="telefon"><br>';
        echo '   <label for="telefonNou">Noul număr de telefon: </label>';
        echo '   <input type="text" style="display: none;" id="telefonNou" name="telefonNou" placeholder="Exemplu: 07xxxxxxxx" pattern="0[0-9]{9}"><br>';

        $rest_plata = $row['Total_plata'] - $row['Acont'];
        echo '   <p>Rest de plată: ' . $rest_plata . '</p>';
        echo '   <input type="checkbox" id="avans" name="avans"><br>';
        echo '   <label for="avansNou">Suma pe care doriți să o plătiți: </label>';
        echo '   <input type="text" style="display: none;" id="avansNou" name="avansNou"><br>';

        echo '<label for="preferinta_cost_meniu">Aveți preferință pentru costul meniului?</label>';
        echo '<input type="checkbox" id="preferinta_cost_meniu"><br>';

        echo '<div id="preferinta_meniu_options" style="display: none;">';
        echo '<label for="operator_meniu">Selectați comparator:</label>';
        echo '<select id="operator_meniu">';
        echo '<option value="mai_mult_de">Mai mult de</option>';
        echo '<option value="mai_putin_de">Mai puțin de</option>';
        echo '<option value="egal_cu">Egal cu</option>';
        echo '</select>';

        echo '<label for="cost">Valoare pentru cost meniu:</label>';
        echo '<input type="text" id="costMeniu">';
        echo '</div><br>';

        echo '   <p>Tip de eveniment: ' . $row['Tip_Eveniment'] . '</p>';
        echo '   <input type="checkbox" id="tipEv" name="tipEv"><br>';
        echo '   <label for="tip_eveniment">Noul tip de eveniment:</label>';
        echo '   <select id="tip_eveniment" style="display: none;" name="tip_eveniment">';
        echo '      <option value="-">-</option>';
        echo '      <option value="Nunta">Nuntă</option>';
        echo '      <option value="Botez">Botez</option>';
        echo '      <option value="Bal absolvire">Bal de absolvire</option>';
        echo '   </select><br>';
        echo '  <div id="informatii-container"></div>';

        $idMeniu = $row['IDMeniu'];
        $idEveniment = $row['IDEveniment'];
        $sqlMeniu = "SELECT M.Denumire FROM Meniu M INNER JOIN Eveniment E ON M.IDMeniu = E.IDMeniu WHERE E.IDEveniment = $idEveniment";
        $resultMeniu = $conn->query($sqlMeniu);

        if ($resultMeniu->num_rows > 0) {
            $rowMeniu = $resultMeniu->fetch_assoc();
            echo '   <p>Meniu selectat: ' . $rowMeniu['Denumire'] . '</p>';
            echo '   <input type="checkbox" id="meniu" name="meniu" value=' . $idMeniu . '><br>';
            echo '   <div id="meniuNou"></div>';

        } else {
            // Tratează cazul în care nu există înregistrare
            echo "Eroare: A intervenit o problemă în procesul de căutare. Reîncercați";
            exit();
        }

        echo '   <p>Culoarea predominantă: ' . $row['Culoare_predominanta'] . '</p>';
        echo '   <input type="checkbox" id="culoare" name="culoare"><br>';
        echo '   <label for="culoareNoua">Noua culoare predominantă: </label>';
        echo '   <input type="text" style="display: none;" id="culoareNoua" name="culoareNoua"><br>';

        echo '<label for="preferinta_locuri">Aveți preferință la numărul de locuri?</label>';
        echo '<input type="checkbox" id="preferinta_locuri"><br>';

        echo '<div id="preferinta_locuri_options" style="display: none;">';
        echo '    <label for="operator_locuri">Selectați comparator:</label>';
        echo '    <select id="operator_locuri">';
        echo '        <option value="mai_mult_de">Mai mult de</option>';
        echo '        <option value="mai_putin_de">Mai puțin de</option>';
        echo '        <option value="egal_cu">Egal cu</option>';
        echo '    </select>';

        echo '    <label for="numar_locuri">Număr de locuri:</label>';
        echo '    <input type="text" id="numar_locuri">';
        echo '</div><br>';

        echo '<label for="preferinta_cost">Aveți preferință pentru costul salonului?</label>';
        echo '<input type="checkbox" id="preferinta_cost"><br>';

        echo '<div id="preferinta_cost_options" style="display: none;">';
        echo '    <label for="operator_cost">Selectați comparator:</label>';
        echo '    <select id="operator_cost">';
        echo '        <option value="mai_mult_de">Mai mult de</option>';
        echo '        <option value="mai_putin_de">Mai puțin de</option>';
        echo '        <option value="egal_cu">Egal cu</option>';
        echo '    </select>';

        echo '    <label for="cost">Valoare pentru cost:</label>';
        echo '    <input type="text" id="cost">';
        echo '</div><br>';

        echo '<label for="preferinta_cost_foto">Aveți preferință pentru costul serviciilor fotografului?</label>';
        echo '<input type="checkbox" id="preferinta_cost_foto"><br>';

        echo '<div id="preferinta_foto_options" style="display: none;">';
        echo '    <label for="operator_foto">Selectați comparator:</label>';
        echo '    <select id="operator_foto">';
        echo '        <option value="mai_mult_de">Mai mult de</option>';
        echo '        <option value="mai_putin_de">Mai puțin de</option>';
        echo '        <option value="egal_cu">Egal cu</option>';
        echo '    </select>';

        echo '    <label for="foto">Valoare pentru tariful fotografului:</label>';
        echo '    <input type="text" id="foto">';
        echo '</div><br>';

        echo '   <p>Data și ora evenimentului: ' . $row['Data_eveniment'] . '</p>';
        echo '   <input type="checkbox" id="dataEv" name="dataEv"><br>';
        echo '   <label for="data_eveniment">Data evenimentului:</label>';
        echo '   <input type="date" style="display: none;" id="data_eveniment" name="data_eveniment"><br>';
        echo '   <label for="ora_incepere">Ora de începere:</label>';
        echo '   <input type="time" style="display: none;" id="ora_incepere" name="ora_incepere"><br>';

        echo '   <div id="informatii-container-1"></div>';
        echo '   <div id="informatii-container-2"></div>';

        $idSalon = $row['IDSalon'];
        $sqlSalon = "SELECT Nume_Salon FROM Salon WHERE IDSalon = $idSalon";
        $resultSalon = $conn->query($sqlSalon);

        if ($resultSalon->num_rows > 0) {
            $rowSalon = $resultSalon->fetch_assoc();
            echo '   <p>Salon selectat: ' . $rowSalon['Nume_Salon'] . '</p>';
            echo '   <input type="checkbox" id="salon" name="salon" value=' . $idEveniment . '><br>';
            echo '   <div id="salonNou"></div>';

        } else {
            // Tratează cazul în care nu există înregistrare
            echo "Eroare: A intervenit o problemă în procesul de căutare. Reîncercați";
            exit();
        }

        $idFotograf = $row['IDFotograf'];
        $sqlFotograf = "SELECT F.Nume FROM Fotograf F INNER JOIN Eveniment E ON F.IDFotograf = E.IDFotograf WHERE F.IDFotograf = $idFotograf";
        $resultFotograf = $conn->query($sqlFotograf);

        if ($resultFotograf->num_rows > 0) {
            $rowFotograf = $resultFotograf->fetch_assoc();
            echo '   <p>Firmă fotografie selectată: ' . $rowFotograf['Nume'] . '</p>';
            echo '   <input type="checkbox" id="fotograf" name="fotograf" value=' . $idEveniment . '><br>';
            echo '   <div id="fotoNou"></div>';

        } else {
            // Tratează cazul în care nu există înregistrare
            echo "Eroare: A intervenit o problemă în procesul de căutare. Reîncercați";
            exit();
        }
        echo '   <input type="submit" value="Salvează modificările">';
        echo '</form>';

        // Afiseaza un formular pentru redirectionare
        echo '<form action="index.html" method="get">';
        echo '<input type="submit" value="Înapoi la pagina principală">';
        echo '</form>';
    } else {
        // Tratează cazul în care nu există înregistrare
        echo "Eroare: A intervenit o problemă în procesul de căutare. Reîncercați";
        exit();
    }

    // Închide conexiunea la baza de date
    $conn->close();
} else {
    echo "Eroare la căutare.";
}
?>

<script src="modificare.js"></script>