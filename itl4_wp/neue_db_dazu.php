<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "itl4_wp";

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prüfen, ob das Formular abgeschickt wurde
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Formularfelder auslesen
        $vorname  = $_POST['vorname'] ?? null;
        $nachname = $_POST['nachname'] ?? null;
        $age      = $_POST['age'] ?? null;

        // SQL Statement
        $sql = "INSERT INTO user_wp (vorname, nachname, age)
                VALUES (:vorname, :nachname, :age)";

        $stmt = $conn->prepare($sql);

        // Ausführen
        $stmt->execute([
            ':vorname'  => $vorname,
            ':nachname' => $nachname,
            ':age'      => $age
        ]);

        echo "✔ Eintrag erfolgreich gespeichert!";
    }

} catch (PDOException $e) {
    echo "Fehler: " . $e->getMessage();
}

$conn = null;
?>
