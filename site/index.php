<?php
    $fileData = json_decode(file_get_contents("data.json"));
    foreach ($fileData as $indice => $valore) {
        $d = $valore -> dato;
        echo "[$indice] $d<br>";
    }
    $newValore = new stdClass();
    $newValore -> dato = ($d+1);
    $fileData[] = $newValore;
    file_put_contents("data.json", json_encode($fileData)); 
?>