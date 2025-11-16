<?php 

phpinfo();

if(isset($_GET["bt_send"])){ // wenn der button gedrückt wird, wird das Formular abgesendet
    // die Namen werden Variablen zugeordnet
    $zahl1 = $_GET["zahl1"];
    $zahl2 = $_GET["zahl2"];

    if(empty($zahl1) || empty($zahl2)){
        echo "Eines der Felder ist leer. Bitte gib bei beiden etwas ein.";
        // falls eines der Felder leer ist, kommt diese Meldung
    }
    elseif(!is_numeric($zahl1) || !is_numeric($zahl2)){
        echo "Das ist keine Zahl. Bitte gib nur Zahlen ein.";
        // falls Instruktionen unklar sind
    }
}
?>

<!-- Stinknormales HTML Feld-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übung 2</title>
</head>
<body>
    <h1>Tankrechner</h1>
    <form action="index.php" method="GET">
        <label>Bitte zwei Tankfüllungen in Liter eingeben:</label><br>
        <input type="text" name="zahl1" placeholder="0"><br>
        <input type="text" name="zahl2" placeholder="0"><br>
        <button name="bt_send">Berechnen</button>
    </form>
    <p>Die Benzinkosten betragen für <?php echo kosten($zahl2, $zahl2);?> Liter <?php echo tanken($zahl1, $zahl2)?>€.</p>
</body>
</html>

<?php // Mathe- Teil
// hier kommt eine Funktion hin, welche die beiden Eingaben addiert und dann
// mit dem Tankpreis von 1.499 multipliziert.
function tanken($a, $b){
    $x = $a + $b;
    $y = $x * 1.499;
    $kosten = number_format($y, 3, ",", ".");
    return $kosten; 

}

function kosten($a, $b){
    $kosten = $a + $b;
    return $kosten;
}


?>