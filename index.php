<?php require_once ('includes/connect.php'); ?>
<?php require_once ('includes/functions.php'); ?>
<?php find_selected_page(); ?>
<?php include ('includes/header.php'); ?>  



<div id="content">      <!--   Main Content   -->

    <table id="table">      <!--  Table   -->
        <tr>
            <td id="nav">            <!-- NAV -->
                <?php echo public_navigation ($sel_table1, $table2); ?>
        
            </td>               <!--   NAV END    -->
                  
            <td id="main">
                <?php if ($table2) { ?>
                    <h2><?php echo $table2['menu']; ?></h2>
                    <div class="page-content">   
                        <?php echo $table2['content']; ?>    
                    </div>
                <?php } else { ?>
                <h2>Welcome to Duker website</h2>
                <?php } ?>     
            </td>
            
        </tr>
       
     </table>      <!--  Table END   -->    

    </div> <!--   Main Content END  -->


<?php include ('includes/footer.php') ?>   

