<?php require_once("includes/session.php"); ?>
<?php require_once("includes/connect.php"); ?>
<?php require_once("includes/functions.php"); ?>
<?php

   if (logged_in()) {
        redirect_to("faculty.php");
        }

    include_once("includes/form_functions.php"); 


// Start Form processing
if (isset($_POST['submit'])) {         // if set we'll run form validation
    $errors = array ();
    
    //FORM VALIDATION
    $required_fields = array('username', 'password'); 
    $errors = array_merge($errors, check_required_fields($required_fields, $_POST));
    
    
    $fields_with_lenghts = array ('username' => 30, 'password' => 30);
    $errors = array_merge($errors, check_max_field_lenghts($fields_with_lenghts, $_POST));
    
     // cleaing up data before putting it into DB
        
    $username = trim(mysql_prep($_POST['username']));
    $password = trim(mysql_prep($_POST['password']));
    $hashed_password = sha1($password);
    
    if  (empty($errors)) {
    // Check DB if username/pass exist
        $query = "SELECT id, username ";
        $query .= "FROM users ";
        $query .= "WHERE username = '{$username}' ";
        $query .= "AND hashed_password = '{$hashed_password}' ";
        $query .= "LIMIT 1";
        $result_set = mysql_query($query);
        confirm_query($result_set);
        if (mysql_num_rows($result_set) == 1){
        // Username / Password working, and there 1 match
            $found_user = mysql_fetch_array($result_set);
            $_SESSION['user_id'] = $found_user['id'];
            $_SESSION['username'] = $found_user['username'];
            redirect_to("faculty.php");
        } else {
            $message = "Username / Password are incorrect. <br>
            Please make shure your caps lock is off!";
        }
        
    } else {
        if (count($errors) == 1) {
            $message = "There was 1 error in the form";
        } else {
            $message = "There where " . count($errors) . " errors in the form";
        }
    }
    
    } else { // Form has not been submitted
        if (isset($_GET['logout']) && $_GET['logout'] == 1){
            $message = "You are now logged out.";        
        }
        $username = "";
        $password = "";
    }

?>


<?php include("includes/header.php"); ?>

<div id="content">      <!--   Main Content   -->

    <table id="table">      <!--  Table   -->
        <tr>
            <td id="nav">            <!-- NAV -->
                <a href="faculty.php">Return to Menu</a>
            <br>
            </td>               <!--   NAV END    -->
            <td id="main">
                <h2>User Login</h2>
                <?php if (!empty($message)) {echo "<p class=\"message\">" . $message . "</p>";} ?>
                <?php if (!empty($errors)) { display_errors($errors); } ?>
                <form action="login.php" method="post">
                <table>
                    <tr>
                        <td>Username:</td>
                        <td><input type="text" name="username" maxlength="30" value="<?php echo htmlentities($username); ?>" />
                        </td>
                    </tr>
                    <tr>
                        <td>Password:</td>
                        <td><input type="password" name="password" maxlength="30" value="<?php echo htmlentities($password); ?>" />
                        </td>    
                    </tr>
                    <tr>
                        <td colspan="2"><input type="submit" name="submit" value="Login" />   
                        </td>
                    </tr>      
                </table>
                </form>
            </td>
        </tr>     
    </table>      <!--  Table END   -->  
</div> <!--   Main Content END  -->


<?php include ('includes/footer.php') ?>   
