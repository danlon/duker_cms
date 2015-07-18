<?php

function check_required_fields ($required_array){

    $field_errors = array(); 
    foreach($required_array as $fieldname){
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && !is_int($_POST[$fieldname]))) {
        $errors[] = $fieldname;   
        }
    } return $field_errors;
}


function check_max_field_lenghts ($field_lenght_array){
    $field_errors = array(); 
    foreach($field_lenght_array as $fieldname => $maxlenght){
        if(strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlenght){
            $errors[] = $fieldname; }
        }   return $field_errors;
    }


function display_errors($error_array){
    echo "<p class=\"errors\">";
    echo "Review the following fields:<br />";
    foreach($error_array as $error){
        echo " * " . $error . "br />"; 
    }
    echo "</p>";
}



?>