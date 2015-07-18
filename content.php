<?php require_once ('includes/session.php'); ?>
<?php require_once ('includes/connect.php'); ?>
<?php require_once ('includes/functions.php'); ?>
<?php confirm_logged_in(); ?>
<?php find_selected_page(); ?>
<?php include ('includes/header.php'); ?>  



<div id="content">      <!--   Main Content   -->

    <table id="table">      <!--  Table   -->
        <tr>
            <td id="nav">            <!-- NAV -->
                <?php

                echo navigation ($sel_table1, $table2);
                
                ?>
                <br><br>
                
                <div id="new">
                    
                <a href="new_info.php">Add new information</a>
                    
                </div>
            </td>               <!--   NAV END    -->
            
            
            <td id="main">
                <?php if (!is_null($sel_table1)) {?>
                <h2><?php echo $sel_table1['menu']; ?></h2>
                <?php } elseif (!is_null(($table2))) {  ?>
                <h2><?php echo $table2['menu']; ?></h2>
                <div class="page-content">
                <?php
                    echo $table2['content'];
                ?>    
                </div>
                <br>
                <a href="edit_page.php?page=<?php echo urlencode($table2['id']); ?>">Edit page</a>
                 
                <?php } else { ?>
                <h2>Select a menu from our Imforamtion table or Page table</h2>
                <?php } ?>     
            </td>
            
        </tr>
       
     </table>      <!--  Table END   -->    

    </div> <!--   Main Content END  -->


<?php include ('includes/footer.php') ?>   

