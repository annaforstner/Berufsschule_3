<?php
// Variablen, die ich noch brauche
$stunde = 0;



// wir überprüfen, ob der Button gedrückt wurde
if (isset($_POST["bt_send"])) {
    // was soll passieren wenn der button gedrückt wurde
    // die Namen werden zu variablen
    $geschlecht = $_POST["geschlecht"];
    $alter = $_POST["alter"];
    $gewicht = $_POST["gewicht"];
    $gross = $_POST["groesse"];

    // dann prüfen wir, ob alle Eingaben da sind
    if (empty($geschlecht) || empty($alter) || empty($gewicht) || empty($gross)) {
        echo "Eine der Eingaben war leer. Bitte fülle alle Felder korrekt aus.";
    } elseif (!is_numeric($gewicht) || !is_numeric($gross)) {
        echo "Das Geicht und die Größe müssen eine Zahl sein. Bitte fülle alle Felder korrekt aus.";
    }

    echo "Du solltest pro Tag etwa ".getCal($geschlecht, $alter, $gewicht, $gross)." kCal verbrauchen.";
}
?>


<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kaloriebrechner</title>
</head>

<body>
    <h1>Kalorienrechner</h1>
    <div id="eingabe">
        <form action="index.php" method="POST"><!-- POST, damit die Angaben nicht in der Adresszeile erscheinen -->
            <!--Als erstes kommt das Geschlecht als Radiobox -->
            <label>Geschlecht: </label><br>
            <input type="radio" name="geschlecht" id="w" value="weiblich">
            <label for="w">weiblich</label><br>
            <input type="radio" name="geschlecht" id="m" value="männlich">
            <label for="m">männlich</label><br><br>
            <!-- Hier kommt das Alter -->
            <label>Bitte Alter eingeben: </label><br>
            <input type="number" name="alter"><br><br>
            <!-- Hier kommt das Gewicht -->
            <label>Bitte Gewicht eingeben: </label><br>
            <input type="text" name="gewicht"><br><br>
            <!-- Hier kommt die Körpergröße rein -->
            <label>Bitte Größe eingeben: </label><br>
            <input type="text" name="groesse"><br><br>
            <!-- Hier kommt ein Button, damit die Werte gespeichert werden können -->
            <button name="bt_send">Berechnen</button>
        </form>
    </div>
    <h2>Dein Verbrauch heute</h2>
    <div id="calories">
        <form action="index.php" method="POST">
            <label>schlafend</label><br>
            <label>übriggebliebene Stundenanzahl</label><br>
            <label>ausschließlich sitzend, liegend</label><br>
            <input type="number" min="0" max="24" name="liegen"><br>
            <label>vorwiegend sitzende Tätigkeit, kaum körperliche Aktivität</label><br>
            <input type="number" min="0" max="24" name="sitzen"><br>
            <label>überwiegend sitzende Tätigkeit, dazwischen auch stehend/ gehend</label><br>
            <input type="number" min="0" max="24" name="stehen"><br>
            <label>hauptsächlich stehende und gehende Aktivitäten</label><br>
            <input type="number" min="0" max="24" name="gehen"><br>
            <label>körperlich anstrengende Arbeiten</label><br>
            <input type="number" min="0" max="24" name="anstrengend"><br>
            <button name="bt_cal">Aktivität loggen</button>
        </form>
        
    </div>


</body>

</html>

<?php

function getCal($ges, $alt, $gew, $gro)
{
    if ($ges == "weiblich") {
        $cal = 655.1 + (9.6 * $gew) + (1.8 * $gro) - (4.7 * $alt);
    } elseif ($ges == "männlich") {
        $cal = 66.47 + (13.7 * $gew) + (5 * $gro) - (6.8 * $alt);
    } else {
        echo "Die Eingabe war Mist.";
    }


    return $cal;
}




?>