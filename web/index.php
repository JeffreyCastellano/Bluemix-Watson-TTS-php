<?php

$output;
exec("ffmpeg -version 2>&1", $output);

$arrlength = count($output);

for($x = 0; $x < $arrlength; $x++) {
    echo $output[$x];
    echo "<br>";
}
?>