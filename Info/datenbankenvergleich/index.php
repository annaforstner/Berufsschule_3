<!-- 05.12.2025 -->

<!-- Objektorientiertes mySQLi-->
<?php
echo "Objektorientiertes MySQLi: ";
$host = "localhost";
$username = "root";
$password = "";
$db_name = "itl4_wp";

// Create connection
$conn = new mysqli($host, $username, $password, $db_name);

// Check connection
if ($conn->connect_error) {
    die("Verbindung fehlgeschlagen beim objektorientierten mqSQLi, weil: " . $conn->connect_error);
}

echo "Objektorientierte Programmierung der Datenbank funktioniert!";
echo "<br>"."<br>";

// wir holen etwas aus der Tabelle raus

$sql = "SELECT id, vorname, nachname FROM user_wp";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Name: " . $row["vorname"]. " " . $row["nachname"]. "<br>";
    }
  } else {
    echo "Keine Ergebnisse";
  }





// Verbindung schließen
$conn->close();
echo "<br>";
?>




<!-- Prozedurales MySQLi-->
<?php
echo "Prozedurales MySQLi: ";

$server = "localhost";
$username = "root";
$password = "";
$db_name = "itl4_wp";

// Create connection
$conn = mysqli_connect($server, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Verbindung nicht möglich bei prozed. MySQLi, weil: " . mysqli_connect_error());
}
echo "Verbindung mittels prozedurales MySQLi erfolgreich!"."<br>";

$sql = "SELECT id, vorname, nachname FROM user_wp";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
      echo "id: " . $row["id"]. " - ganzer Name: " . $row["vorname"]. " " . $row["nachname"]. "<br>";
    }
  } else {
    echo "Tabelle leer.";
  }






// Verbindung schließen
mysqli_close($conn);
echo "<br>";
?>




<!-- PDO- Verbindung -->
<?php

echo "PDO- Verbindung: ";

$servername = "localhost";
$username = "root";
$password = "";
$db = "itl4_wp";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);

    //set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Verbindung mittels PDO erfolgreich!";
} catch (PDOException $e) {
    echo "Die Verbindung hat nicht funktioniert, weil: " . $e->getMessage();
}


$sql = "SELECT id, vorname, nachname FROM user_wp";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    echo "<table><tr><th>ID</th><th>Name</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["id"]."</td><td>".$row["vorname"]." ".$row["nachname"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "Leere Tabelle";
  }




// Verbindung schließen
$conn = null;
echo "<br>";
?>







