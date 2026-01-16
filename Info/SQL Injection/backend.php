<?php
include "database.php";

$conn = Database::connect();

$sql = "SELECT id, name, password FROM user";
$result = $conn->query($sql);

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