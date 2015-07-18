<?php require_once("includes/session.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php confirm_logged_in(); ?>  
<?php include('includes/header.php')?>
  
    
    <div id="content">      <!--   Main Content   -->
        
        <table id="table">      <!--  Table   -->
            <tr>
                <td id="nav">
                    &nbsp;
                </td>
                
                <td id="main">
                    <h2> Faculty Area</h2>
                    <p> Welcome <?php echo $_SESSION['username']; ?>, to the staff area!</p><br>
                    <ul>
                        <li><a href="content.php">Manage site</a></li>
                        <li><a href="new_fac.php">Add new Faculty User</a></li>
                        <li><a href="logout.php">Logout</a></li>
                    </ul>                 
                </td>   
            </tr>
            
         </table>    
        
    </div> <!-- END CONTENT -->
    

<?php include ('includes/footer.php')?>