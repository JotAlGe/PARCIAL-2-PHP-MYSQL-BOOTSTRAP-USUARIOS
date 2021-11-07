<?php
function connection_db($host = 'localhost' ,  $user = 'root',  $pass = '1234', $db='parcial2' ) {

    //conectar a la base de datos
    $conn = mysqli_connect($host, $user, $pass, $db);
    if ($conn != false) 
        return $conn;
    else 
        die ('No se pudo establecer la conexión.');

}