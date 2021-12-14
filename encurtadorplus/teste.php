<?php

$valores = array();

for($x = 0; $x < 24; $x++){
    array_unshift($valores, $x);
}

for($x = 0; $x < 24; $x++){
    echo $valores[$x];
}


echo'<br><br> teste2<br><br>';
$url = 'encurtadorplus.epizy.com/a.php?l=jeanjeanjeanjeanjeanjean';
$ref = explode('p000p', $url)[1];
echo $ref;
?>