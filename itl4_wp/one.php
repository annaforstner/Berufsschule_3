<?php
// Datenbank Zugangsdaten
$host = "localhost";
$username = "root";
$password = "";
$db_name = "itl4_wp";

// Verbindung herstellen
$conn = new mysqli($host, $username, $password, $db_name);

// Verbindung prüfen
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen: " . $conn->connect_error);
}

// SQL-Abfrage
$sql = "SELECT id, vorname, nachname, age FROM user_wp";
$result = $conn->query($sql);

// Ergebnisse abrufen und anzeigen
if ($result->num_rows > 0) {
    // Ausgabe der Daten jeder Zeile
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["vorname"]. " " . $row["nachname"]. " - Alter: ". $row["age"]. "<br>";
    }
} else {
    echo "0 Ergebnisse";
}

// Verbindung schließen
$conn->close();
?>