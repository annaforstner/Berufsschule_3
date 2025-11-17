<?php
if(isset($_GET["bt_send"])){ // wenn der button gedrückt wird, wird das Formular abgesendet
    // die Namen werden Variablen zugeordnet
    $prim = $_GET["prim"];
    
    if(empty($prim)){
        echo "Das Eingebefelder ist leer. Bitte gib etwas ein.";
        // falls das Feld leer ist, kommt diese Meldung
    }
    elseif(!is_numeric($prim)){
        echo "Das ist keine Zahl. Bitte gib nur Zahlen ein.";
        // falls Instruktionen unklar sind
    }
}
?>
<!-- Normaler HTML Block-->
<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primzähler & Logarithmus</title>
</head>
<body>

<h1>Primzahlberechnung</h1>
<form action="index.php" method="GET">
    <label>Bitte eine Zahl eingeben, bis zu der Primzahlen ausgerechnet werden sollen.</label><br>
    <input type="text" name="prim"><br>
    <button name="bt_send">Bitte ausrechnen</button><br>
</form>

<?php echo isPrim($prim);?>


<h1>Logarithmus</h1>
<p>Hier stellen wird den Logarithmus von log(1) bis log(100) dar.</p> <!-- Text zur Erklärung was hier passiert. -->
<?php echo logarithmus();?> <!-- hier aktivieren wir die Funktion. Die Ausgabe der Sterne kommt hier hin.-->

    
</body>
</html>

<?php
// Muss definitiv überarbeitet werden

function mathe($n){
    if($n <= 1) return false; // 0 und 1 sind nicht prim
    if($n == 2) return true; // 2 ist prim
    if($n % 2 == 0) return false; // alle geraden Zahlen nach 2 sind keine prim

    $wurzel = floor(sqrt($n)); // wir müssen bis zur Wurzel testen --> Schleife
    for($i = 3; $i <= $wurzel; $i += 2){ // aber nur die ungeraden Zahlen
        if($n % $i == 0){
            return false;
        }
    }
    return true;


}

function isPrim($prim){
    for($j = 2; $j <= $prim; $j++){ // damit alle Zahlen bis zur eingegebenen Zahl abgeprüft werden
        if(mathe($j)){
            echo $j.", "; // Zahlenausgabe + Zahlentrennung
        }
    }
    echo "Ende"; // damit hinter der letzten Zahl kein Leerzeichen mehr ist
}


function logarithmus(){
    for($j = 1; $j < 101; $j++){ // damit alle Zahlen von 1 bis 100 drangenommen werden
        $zahl = log($j, 10); // hier kommt die Antwort raus (es gibt bereits eine funktion, die den Logarithmus errechnet)
        $return = $zahl * 100; // Antwort mal hundert, um bessere sichtbarkeit zu erhalten
        $ganz = (int) $return; // Antwort muss int sein, sonst gehts nicht
        echo str_repeat("*", $ganz)."<br>"; // her werden die Zahlen in Sternchen dargestellt
    }
}

?>