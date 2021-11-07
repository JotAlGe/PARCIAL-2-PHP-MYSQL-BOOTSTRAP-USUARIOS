<?php
function insert_incidents($vConn)
{

    //consulta sql para insertar usuarios
    $sql = "INSERT INTO incidents (id_pri,
                                   id_sta,
                                   id_us, 
                                   title_inc,
                                   descrip_inc,
                                   date_inc)
                VALUES ('{$_POST['priority']}' , 1 , '{$_POST['id']}', 
                TRIM('{$_POST['title']}') , TRIM('{$_POST['description']}'), CURRENT_TIMESTAMP())";


    if (!mysqli_query($vConn, $sql)) {
        //si surge un error, finalizo la ejecucion del script con un mensaje
        die('<h4>Error al intentar insertar el registro.</h4>');
    }

    return true;
}
