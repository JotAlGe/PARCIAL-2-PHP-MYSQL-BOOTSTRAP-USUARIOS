<?php
function count_users($vConnection)
{
    $sql = "SELECT id_us FROM users";
    $result = mysqli_query($vConnection, $sql);
    $cant = mysqli_num_rows($result);
    return $cant;
}

function count_incidents($vConn, $sta)
{
    $sql = "SELECT id_inc FROM incidents WHERE id_sta = {$sta}";
    $result = mysqli_query($vConn, $sql);
    $cant = mysqli_num_rows($result);
    return $cant;
}
