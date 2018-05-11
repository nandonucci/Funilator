<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db_name = 'funilator';

    $connection = mysqli_connect($host, $user, $pass, $db_name);

    if(!$connection){
        die('Não conectou');
    } else {
      echo "Deu bom!";
    }
?>
