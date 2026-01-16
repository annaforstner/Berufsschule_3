<?php
include 'database.php';

// Insert
if (isset($_POST['submit_insert'])) {
    if ($name === '' || $password === '') {
        die("Bitte alle Felder ausfüllen");
    }
    if (strlen($password) < 8) {
        die("Passwort muss mindestens 8 Zeichen haben");
    }
    $name = trim($_POST["name"]);
    $password = trim($_POST["password"]);
    $hash = password_hash($password, PASSWORD_DEFAULT);


    $conn = Database::connect();
    // das grüne ist der Klassenname, und wird deswegen groß geschrieben

    $stmt = $conn->prepare(
        "INSERT INTO user (name, password) VALUES (?, ?)"
    );

    if ($stmt === false) {
        die("Prepared Statement ist falsch: " . $conn->error);
    }
    $stmt->bind_param("ss", $name, $hash);

    if ($stmt->execute()) {
        echo "<p>Daten wurden gespeichert!</p>";
    } else {
        echo "<p>Fehler: " . $stmt->error . "</p>";
    }

    $stmt->close();
    $conn->close();
}


// Login
if (isset($_REQUEST['submit_login'])) {

    $u_name = trim($_POST["name"]);
    $passwort = trim($_POST["password"]);

    $conn = Database::connect();
    $stmt = $conn->prepare("SELECT * FROM `user` WHERE name = ?");

    if ($stmt === false) {
        die("Prepared Statement ist falsch: " . $conn->error);
    }
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 1) {
        $stmt->bind_result($hash);
        $stmt->fetch();

        // Passwort prüfen
        if (password_verify($passwort, $hash)) {
            header("Location: backend.php");
            exit;
        }
    }

    echo "Passwort oder User-Name falsch";

    $stmt->close();
    $conn->close();
}

// Output
$conn = Database::connect();
$sql = "SELECT * FROM `user`";
$result = $conn->query($sql);
if ($result === false) {
    die("Query fehlgeschlagen: " . $conn->error);
}
$out = "";
// Ausgabe
while ($row = $result->fetch_assoc()) {
    $out .= "ID: " . htmlspecialchars($row["id"]) .
        " || Name: " . htmlspecialchars($row["name"]) .
        " || Passwort (Hash): " . htmlspecialchars($row["password"]) .
        "<br>";
}
$conn->close();
?>

<html lang="de">

<head>
    <title>SQL-Injections</title>
</head>

<body>

    <h1>Test-Seite SQL Injections</h1>
    <h2>Insert</h2>
    <form action="frontend.php" method="POST">
        <input type="text" name="Name" placeholder="Name" required><br>
        <input type="password" name="Passwort" placeholder="Passwort" required><br>
        <input type="submit" name="submit_insert" value="Insert">
    </form>
    <hr>
    <h2>Login</h2>
    <form action="frontend.php" method="POST">
        <input type="text" name="Name" placeholder="Name" required><br>
        <input type="password" name="Passwort" placeholder="Passwort" required><br>
        <input type="submit" name="submit_login" value="Login">
    </form>
    <hr>
    <h2>Output</h2>
    <?= $out ?>
</body>

</html>