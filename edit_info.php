<?php require_once ('includes/session.php'); ?>
<?php require_once ('includes/connect.php'); ?>
<?php require_once ('includes/functions.php'); ?>
<?php confirm_logged_in(); ?>

<?php

    if (intval($_GET['info']) == 0){
        redirect_to("content.php");
    }
    
    if (isset($_POST['submit'])) {               // if set we'll run form validation
        $errors = array ();
    //FORM VALIDATION
        $required_fields = array('menu', 'position', 'visible'); 
    foreach($required_fields as $fieldname){
    
        if (!isset($_POST[$fieldname]) || (empty($_POST[$fieldname]) && !is_numeric($_POST[$fieldname]))) {
        $errors[] = $fieldname;   
        }
    }
    
    $fields_with_lenghts = array ('menu' => 30);
    foreach($fields_with_lenghts as $fieldname => $maxlenght){
        if(strlen(trim(mysql_prep($_POST[$fieldname]))) > $maxlenght){
            $errors[] = $fieldname; }
        
    }
    
    if (empty($errors)){    
        $id = mysql_prep($_GET['info']);
        $menu = mysql_prep($_POST['menu']);     
        $position = mysql_prep($_POST['position']);
        $visible = mysql_prep($_POST['visible']);
        
        $query = "UPDATE information SET
            menu = '{$menu}',
            position = {$position},
            visible = {$visible}
            
            WHERE id = {$id}";
            
        $result = mysql_query($query, $connection);
            
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
            </td>               <!--   NAV END    -->
            
            <td id="main">
                
                <h2>Edit Info: <?php echo $sel_table1['menu']; ?></h2>
               
                <?php
                    if (!empty($message)){
                        echo "<p class=\"message\">" . $message . "</p>";  
                    }
                ?>
                
                <?php
                    //output  list  of fields with errors
                    if(!empty($errors)){
                        echo "<p class=\"errors\">";
                        echo "Please correct the following fields:<br />";
                        foreach($errors as $error){
                            echo " * " . $error . "<br />";
                        }   echo "</p>";
                    }
                ?>
                
                <form action="edit_info.php?info=<?php echo urlencode($sel_table1['id']); ?>" method="post">
                    <p>Menu Title:
                        <input type="text" name="menu" value="<?php echo $sel_table1['menu']; ?>" id="menu" />
                    </p>
                    <p>Position:
                        <select name="position">
                        <?php   
                            $info_set = get_all_info();
                            $info_count = mysql_num_rows($info_set); //msql how many rows
                            for($count=1; $count <=$info_count+1; $count++){    
                                echo "  <option value=\"{$count}\"";

                                if ($sel_table1['position'] == $count){

                                    echo "selected";
                                }   

                                echo " >{$count}</option>";

                             }

                        ?>
                            
                        </select>
                    </p>
                    <p>Visible:
                        <input type="radio" name="visible" value="0" 
                        <?php       
                            if ($sel_table1['visible'] == 0){
                                echo " checked";
                            }                   
                        ?>       
                         />No
                        &nbsp;
                        <input type="radio" name="visible" value="1" 
                          <?php       
                            if ($sel_table1['visible'] == 1){
                                echo " checked";
                            }                   
                        ?>                                 
                        />Yes
                    </p>
                    <input type="submit" name="submit" value="Edit Information" />
                    &nbsp; &nbsp;
                    <a href="delete_information.php?info=<?php
                    echo urlencode($sel_table1['id']);
?>"onclick="return confirm('Do you really want to delete this?');">Delete Information</a>
                </form>
                <br>
                <a href="content.php">Cancel</a>
                
                <div style="margin-top: 2em; border-top: 1px solid #000000">
                    <h3>Pages in this Information:</h3>
                    <ul>
            <?php
            $info_pages = get_pages_for_info($sel_table1['id']);

            while($page = mysql_fetch_array($info_pages)){
                echo "<li><a href=\"content.php?page={$page['id']}\">
                {$page['menu']}</a></li>";
            } 
            
            ?>
                       
                    </ul>
                    <br>
                    <a href="new_page.php?info=<?php echo $sel_table1['id']; ?>">
                    Add a new page to this information</a>
                </div>
            </td>
        </tr>
       
     </table>      <!--  Table END   -->    

    </div> <!--   Main Content END  -->


<?php include ('includes/footer.php') ?>   

