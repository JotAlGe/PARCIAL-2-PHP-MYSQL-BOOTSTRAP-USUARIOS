<?php
function user_data($vUser, $vPass, $vConnection)
{
    $users = array();

    // actualiza la fecha del último acceso del usuario
    $SQL = "UPDATE users SET last_access_us = CURRENT_TIMESTAMP() WHERE email_us = '$vUser'";

    if (!mysqli_query($vConnection, $SQL)) {
        return false;
    }

    //consulta sql
    $SQL = "SELECT u.id_us,
        u.name_us,
        u.last_name_us,
        u.image_us,
        u.last_access_us,
        u.active_us,
        u.email_us,
        u.password_us,
        l.id_lev,
        l.descrip_lev 
    FROM users AS u,
    levels as l
    WHERE u.email_us='$vUser' AND u.password_us = MD5('$vPass') 
    AND u.id_lev = l.id_lev";

    $rs = mysqli_query($vConnection, $SQL);

    $data = mysqli_fetch_array($rs);
    if (!empty($data)) {
        $users['ID'] = $data['id_us'];
        $users['NAME'] = $data['name_us'];
        $users['LASTNAME'] = $data['last_name_us'];

        #$users['LASTACC'] = date("Y-M-d");
        $users['LASTACC'] = $data['last_access_us'];

        $users['EMAIL'] = $data['email_us'];
        $users['PASS'] = $data['password_us'];
        $users['IDLEV'] = $data['id_lev'];
        $users['DESCLEV'] = $data['descrip_lev'];


        // imagen por defecto user.png
        if (empty($data['image_us'])) {
            $data['image_us'] = 'user.png';
        }
        $users['IMG'] = $data['image_us'];
        $users['ACTIVE'] = $data['active_us'];
    }
    return $users;
}

function count_users($vConnection)
{
    $sql = "SELECT id_us FROM users";
    $result = mysqli_query($vConnection, $sql);
    $cant = mysqli_num_rows($result);
    return $cant;
}
