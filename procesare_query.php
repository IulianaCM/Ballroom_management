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

// Preia interogarea din parametrul GET
$sql = $_GET['sql'];

// Realizează interogarea și preia rezultatele
$result = $conn->query($sql);
$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Închide conexiunea la baza de date
$conn->close();

// Trimite datele sub formă de JSON
header('Content-Type: application/json');
echo json_encode($data);
?>