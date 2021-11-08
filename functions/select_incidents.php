<?php
// lista los incidentes de acuerdo con el nivel de usuario
function list_incidents($vConn, $lev)
{

    $list = [];
    /* DEPENDIENDO DEL USUARIO SE VA A EJECUTAR UNA DETERMINADA CONSULTA */
    if ($lev == 3) {
        // si el nivel de usuario es igual a 3 o "tecnico" ...
        $sql = "SELECT i.id_inc, i.id_us, i.title_inc, i.descrip_inc, i.date_inc,
                       s.id_sta, s.descrip_sta,
                       p.id_pri, p.descrip_pri,
                       u.name_us, u.last_name_us, u.id_lev,
                       a.id_ar ,a.descrip_ar
            FROM incidents as i,
                 states as s,
                 priorities as p,
                 users as u,
                 areas as a
            where i.id_pri = p.id_pri
              AND i.id_sta = s.id_sta
              AND i.id_us = u.id_us
              AND u.id_ar = a.id_ar
              AND s.id_sta != 3
            GROUP BY i.id_inc";
    } elseif ($lev == 2) {

        //Si el nivel de usuario es igual a 2 o usuario común...
        $sql = "SELECT i.id_inc, i.id_us, i.title_inc, i.descrip_inc, i.date_inc,
                    s.id_sta, s.descrip_sta,
                    p.id_pri, p.descrip_pri,
                    u.name_us, u.last_name_us, u.id_lev,
                    a.id_ar ,a.descrip_ar
                FROM incidents as i,
                    states as s,
                    priorities as p,
                    users as u,
                    areas as a
                WHERE i.id_pri = p.id_pri
                AND i.id_sta = s.id_sta
                AND i.id_us = u.id_us
                AND u.id_ar = a.id_ar
                AND u.id_lev = $lev
                ORDER BY i.date_inc";
    } else {
        // El administrador verá lo que muestra esta consulta...
        $sql = "SELECT i.id_inc, i.id_us, i.title_inc, i.descrip_inc, i.date_inc,
                    s.id_sta, s.descrip_sta,
                    p.id_pri, p.descrip_pri,
                    u.name_us, u.last_name_us, u.id_lev,
                    a.id_ar ,a.descrip_ar
                FROM incidents as i,
                    states as s,
                    priorities as p,
                    users as u,
                    areas as a
                WHERE i.id_pri = p.id_pri
                AND i.id_sta = s.id_sta
                AND i.id_us = u.id_us
                AND u.id_ar = a.id_ar
                ORDER BY i.date_inc";
    }

    // ejecución de la consulta
    $result = mysqli_query($vConn, $sql);

    // $result en forma de matriz
    $i = 0;
    while ($data = mysqli_fetch_array($result)) {
        $list[$i]['ID'] = $data['id_inc'];
        $list[$i]['TITLE'] = $data['title_inc'];
        $list[$i]['DESCRIPINC'] = $data['descrip_inc'];
        $list[$i]['DATEINC'] = $data['date_inc'];
        $list[$i]['IDSTA'] = $data['id_sta'];
        $list[$i]['DESCRIPSTA'] = $data['descrip_sta'];
        $list[$i]['IDPRI'] = $data['id_pri'];
        $list[$i]['DESCRIPPRI'] = $data['descrip_pri'];
        $list[$i]['NAMEUS'] = $data['name_us'];
        $list[$i]['LASTNAMEUS'] = $data['last_name_us'];
        $list[$i]['DESCRIPAR'] = $data['descrip_ar'];

        $i++;
    }


    //devuelvo el listado generado en el array $list. (Podra salir vacio o con datos)..
    return $list;
}

// cuenta las incidencias
function count_incidents($vConn, $sta)
{
    $sql = "SELECT id_inc FROM incidents WHERE id_sta = {$sta}";
    $result = mysqli_query($vConn, $sql);
    $cant = mysqli_num_rows($result);
    return $cant;
}
