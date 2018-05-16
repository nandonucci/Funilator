<?php
    $host = 'localhost';
    $user = 'meyer196_nando';
    $pass = 'fbmfby2017';
    $db_name = 'meyer196_funilator';

    $connection = mysqli_connect($host, $user, $pass, $db_name);

    if(!$connection){
        die('Não conectou');
    } else {
    //  echo "Deu bom!";
    }
?>
