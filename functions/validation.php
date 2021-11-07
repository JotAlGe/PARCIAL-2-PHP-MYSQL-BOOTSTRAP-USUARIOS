<?php
function validate_data() {
    $vMessage='';
    
    if (strlen($_POST['title']) < 10) {
        $vMessage.='El título debe contener al menos 10 caracteres. <br />';
    }
    if (strlen($_POST['description']) < 10) {
        $vMessage.='La descripción debe contener al menos 10 caracteres. <br />';
    }
    
    if (empty($_POST['priority'])) {
        $vMessage.='Debes seleccionar una prioridad. <br />';
    }

    //con esto aseguramos que limpiamos espacios y limpiamos de caracteres de codigo ingresados
    foreach($_POST as $Id=>$Valor){
        $_POST[$Id] = trim($_POST[$Id]);
        $_POST[$Id] = strip_tags($_POST[$Id]);
    }


    return $vMessage;

}

?>