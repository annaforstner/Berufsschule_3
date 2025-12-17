<?php 
// Driver code
$arr = [64, 34, 25, 12, 22, 11, 90, 22, 7, 46, 28, 35, 11];

function bubblesort($arr){
    $n = count($arr);
    for($i = 0; $i < $n; $i++){
        for($j = 0; $j < $n - 1; $j++){
            if($arr[$j] > $arr[$j + 1]){
                $temp = $arr[$j];
                $arr[$j] = $arr[$j + 1];
                $arr[$j + 1] = $temp;
            }
        }
    }
    return $arr;
}
$sortedArray = bubbleSort($arr);
?>

<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Arbeitsaufträge in Info</title>
</head>
<body>
    <div class="angabe">
    <h1>Sortierverfahren</h1>
    <p>Ausgangsarray: <?php echo implode(", ", $arr) ?></p>
    </div>
    <div class="bubble">
        <h2>Bubblesort</h2>
        <p>sortiertes Array: <?php echo implode(", ", $sortedArray) ?></p>




    </div>
    
</body>
</html>

