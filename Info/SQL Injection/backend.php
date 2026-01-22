<?php
session_start();
include "database.php";

// Zugriff schützen
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: frontend.php");
    exit;
}

$conn = Database::connect();
$stmt = $conn->prepare("SELECT id, name, password FROM user");
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Query fehlgeschlagen: " . $conn->error);
}

$out = "";

while ($row = $result->fetch_assoc()) {
    $out .= "ID: " . htmlspecialchars($row["id"]) . " || ";
    $out .= "Name: " . htmlspecialchars($row["name"]) . " || ";
    $out .= "Passwort: " . htmlspecialchars($row["password"]) . "<br>";
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>SQL-Injections BACKEND</title>
</head>

<body>
    <h1>Test-Seite BACKEND</h1>
    <?= $out ?>
</body>

</html>