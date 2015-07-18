<?php require_once("includes/session.php"); ?>
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
            </td>               <!--   NAV END    -->
            
            <td id="main">
                
                <h2>Add Info</h2>
                <form action="create_info.php" method="post">
                    <p>Info Title:
                        <input type="text" name="menu" value="" id="menu" />
                    </p>
                    <p>Position:
                        <select name="position">
                        <?php   
                            $info_set = get_all_info();
                            $info_count = mysql_num_rows($info_set); //msql how many rows
for($count=1; $count <=$info_count+1; $count++){
    echo "  <option value=\"{$count}\">{$count}</option>";
        
                            }

                        ?>
                            
                        </select>
                    </p>
                    <p>Visible:
                        <input type="radio" name="visible" value="0" />No
                        &nbsp;
                        <input type="radio" name="visible" value="1" />Yes                     </p>
                    <input type="submit" value="Add" />
                </form>
                <br>
                <a href="content.php">Cancel</a>
                
                
                
            </td>
        </tr>
       
     </table>      <!--  Table END   -->    

    </div> <!--   Main Content END  -->


<?php include ('includes/footer.php') ?>   

