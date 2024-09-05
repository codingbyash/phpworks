
<?php
$arr = array(5, 12, 7, 9, 3, 15);
$sumArr = array_sum($arr);

$r = array();
for ($i = count($arr) - 1; $i >= 0; $i--) {
    $r[] = $arr[$i];
}

$sumR = array_sum($r);
$maxR = max($r);
$minR = min($r);
?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Array Operations</h2>
        <p>Original array: <?= implode(", ", $arr) ?></p>
        <p>Reversed array: <?= implode(", ", $r) ?></p>
        <p>Sum of the original array: <?= $sumArr ?></p>
        <p>Sum of the reversed array: <?= $sumR ?></p>
        <p>Largest element in the reversed array: <?= $maxR ?></p>
        <p>Smallest element in the reversed array: <?= $minR ?></p>
    </div>
</body>
</html>