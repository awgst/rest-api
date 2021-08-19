<?php
    $data = file_get_contents('coba.json');
    $mahasiswa = json_decode($data);
    $mahasiswa = $mahasiswa->mahasiswa;
    foreach ($mahasiswa as $mhs) {
        foreach ($mhs as $key => $value){
            echo $key."=".$value."<br>";
        }
        echo "<br>";
    }
?>