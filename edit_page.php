<?php require_once("includes/session.php"); ?>
<?php require_once ('includes/connect.php'); ?>
<?php require_once ('includes/functions.php'); ?>
<?php confirm_logged_in(); ?>

<?php

    if (intval($_GET['page']) == 0){
        redirect_to("content.php");
    }

    include("includes/form_functions.php");  
    
    if (isset($_POST['submit'])) {               // if set we'll run form validation
    $errors = array ();
    //FORM VALIDATION
    $required_fields = array('menu', 'position', 'visible', 'content'); 
    $errors = array_merge($errors, check_required_fields($required_fields));
    
    
    $fields_with_lenghts = array ('menu' => 30);
    $errors = array_merge($errors, check_max_field_lenghts($fields_with_lenghts));
    
     // cleaing up data before putting it into DB
        $id = mysql_prep($_GET['page']);
        $menu = trim(mysql_prep($_POST['menu'])); // cutting out white space     
        $position = mysql_prep($_POST['position']);
        $visible = mysql_prep($_POST['visible']);
        $content = mysql_prep($_POST['content']);
        
    //SUBMIT button working ONLY if there are 0 errors    
        if (empty($errors)){   
        $query = "UPDATE pages SET
            menu = '{$menu}',
            position = {$position},
            visible = {$visible},        
            content = '{$content}'
            
            WHERE id = {$id}";
            
        $result = mysql_query($query);
            
        if (mysql_affected_rows() == 1) {
            $message = "Update Successful.";
        } else {
            //failboat
            $message = "Inputed info failed miserably!";
            $message = "<br />" . mysql_error();
        } 
        
    } else {
            // Errors are happening   
        $message = "There are " . count($errors) . " Errors. You blew it";
        }
        
    }
        

?>
<?php find_selected_page(); ?>

<?php include ('includes/header.php'); ?>  



<div id="content">      <!--   Main Content   -->

    <table id="table">      <!--  Table   -->
        <tr>
            <td id="nav">            <!-- NAV -->
                <?php 
                   echo navigation ($sel_table1, $table2); 
                ?>
                <br>
                <a href="new_info.php">+ Add new information</a>
            </td>               <!--   NAV END    -->
            
            <td id="main">
                
                <h2>Edit Page: <?php echo $table2['menu']; ?></h2>
               
                <?php
                    if (!empty($message)){
                        echo "<p class=\"message\">" . $message . "</p>";  
                    }
                ?>
                
                <?php
                    if (!empty($errors)){
                        display_errors($errors);    
                    }
                ?>
                
                
                <form action="edit_page.php?page=<?php echo $table2['id']; ?>" method="post">
                    
                    <?php include "includes/page_form.php" ?>
                    
                    <input type="submit" name="submit" value="Update Page" />
                    &nbsp; &nbsp;
                    <a href="delete_page.php?page=<?php
                    echo $table2['id'];
?>"onclick="return confirm('Do you really want to delete this page?');">Delete Page</a>
                </form>
                <br>
                <a href="content.php?page=<?php echo $table2['id']; ?>">Cancel</a>
                
                
                
            </td>
        </tr>
       
     </table>      <!--  Table END   -->    

    </div> <!--   Main Content END  -->


<?php include ('includes/footer.php') ?>   

