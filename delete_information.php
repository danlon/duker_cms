<?php require_once ('includes/session.php'); ?>
<?php require_once ('includes/connect.php'); ?>
<?php require_once ('includes/functions.php'); ?>
<?php confirm_logged_in(); ?>

<?php    
    if (intval($_GET['info']) == 0){      // makes shure we recive info id successfuly
        redirect_to("content.php");
    }
    $id = mysql_prep($_GET['info']);   // let's my sql prep the value to get ready for the query
    
    if ($information = get_info_by_id($id)){

    $query = "DELETE FROM information WHERE id = {$id} LIMIT 1";
    $result = mysql_query($query, $connection);
//TESTING
    if (mysql_affected_rows() == 1){
        header("Location: content.php");
        exit;
    } else {
// our delete failed! 
        echo "Information deletion failed";
        echo mysql_error();
        echo "<a href=\"content.php\">Return to our Content Page</a>";
        }
    } else {
       // information isnt in our database! 
        header("Location: content.php");
        exit;
}
?>

<?php mysql_close($connection); ?>


<?php
    

?>