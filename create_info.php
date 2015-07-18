<?php require_once ('includes/session.php'); ?>
<?php require_once ('includes/connect.php'); ?>
<?php require_once ('includes/functions.php'); ?>
<?php confirm_logged_in(); ?>

<?php   

//Form Validation
    $errors = array ();
    
    $required_fields = array('menu', 'position', 'visible');
    foreach($required_fields as $fieldname){
    
        if (!isset($_POST['fieldname']) || empty($_POST['fieldname'])) {
        $errors[] = $fieldname;   
        }
    }
    
    $fields_with_lenghts = array ('menu' => 30);
    foreach($fields_with_lenghts as $fieldname => $maxlenght){
        if(strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlenght){
            $errors[] = $fieldname; }
    }

    if (empty($errors)){
        header("Location: new_info.php");
        exit;
    }  
?>


<?php
    $menu = mysql_prep($_POST['menu']);     
    $position = mysql_prep($_POST['position']);
    $visible = mysql_prep($_POST['visible']);
?>

<?php
    $query = "INSERT INTO information (
        menu, position, visible 
        ) VALUES (
        '{$menu}', {$position}, {$visible}      
        )";
    if (mysql_query($query, $connection)){
        header("location: content.php");
        exit;
    } else {
        echo "<p>Creating Info Failed Epicly!</p>";
        echo mysql_error();
    }
?>

<?php mysql_close($connection); ?>