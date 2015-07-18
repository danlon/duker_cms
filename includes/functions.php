<?php
    //  BASIC FUNCTIONS

function confirm_query($result_set){
    if (!$result_set){
        die("Unable to Connect!");
    } 
}


function get_all_info (){
    $query = "SELECT * FROM information ORDER BY position ASC";
    $info_set = mysql_query($query);
    confirm_query($info_set);
    return $info_set;
}

// Passing an argument here
function get_pages_for_info($information_id){
    $query = "SELECT * FROM pages WHERE information_id ={$information_id} ORDER BY position ASC";
    $page_set = mysql_query($query);
    confirm_query($page_set);
    return $page_set;
}

function get_info_by_id($information_id){
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM information ";  //Append equals, so the value cna change
    $query .= "WHERE id=" . $information_id;
    $query .= " LIMIT 1";            //MYSQL command to for Limit 1
    $result_set = mysql_query($query, $connection); // create global var cuz $connection has not been passed through our argument
    confirm_query($result_set);
    
    if ($info = mysql_fetch_array($result_set)){
    return $info;
    } else {
        return NULL;
    }
}

    function get_pages_by_id($page_id){
    global $connection;
    $query = "SELECT * ";
    $query .= "FROM pages ";  //Append equals, so the value cna change
    $query .= "WHERE id=" . $page_id;
    $query .= " LIMIT 1";            //MYSQL command to for Limit 1
    $result_set = mysql_query($query, $connection); // create global var cuz $connection has not been passed through our argument
    confirm_query($result_set);
    
    if ($page = mysql_fetch_array($result_set)){
    return $page;
    } else {
        return NULL;
    }
        
}


function find_selected_page(){
    
    global $sel_table1;
    global $table2;
    
    if (isset($_GET['info'])){     // GRAB VALUE
        $sel_table1 = get_info_by_id($_GET['info']);     
        $sel_t2 = 0;  
        $table2 = NULL;
    } elseif (isset($_GET['page'])){ // else if for our pages
        $table1 = 0;
        $sel_table1 = NULL;
        $table2 = get_pages_by_id($_GET['page']);
    } else {
        $table1 = 0;
        $sel_table1 = NULL;
        $table2 = 0;
    }    
}


function navigation($sel_table1,$table2){  
    
    $output = "<ul class=\"info\">";
//DB QUERY - function
    $info_set = get_all_info();
//USE DATA
    while ($info= mysql_fetch_array($info_set)){
        
        
        $output .= "<li";
        if ($info["id"] == $sel_table1['id']){
        $output .= " class=\"selected\"";
        }
        $output .= "><a href=\"edit_info.php?info=" . urlencode($info["id"]) ."\">{$info["menu"]}</a></li>"; 
    
        $page_set = get_pages_for_info($info["id"]);
        $output .= "<ul class=\"pages\">";         
        while ($page = mysql_fetch_array($page_set)){
        $output .= "<li";
        if ($page["id"] == $table2['id']){
        $output .= " class=\"selected\"";
        }
        $output .= "><a href=\"content.php?page=" .urlencode($page["id"]) . "\">{$page["menu"]}</a></li>"; 
    }
$output .= "</ul>";
}      
   

        
        $output .= "</ul>";
        return $output;
        
}


function mysql_prep($value){
    $magic_quotes_active = get_magic_quotes_gpc();
    $new_enough_php = function_exists("mysql_real_escape_string()");
    
    if ($new_enough_php){ //php version 4.3..0 or higher
                            //undo magic quote effects
        if ($magic_quotes_active){ $value = stripslashes ($value); }
        $value = mysql_real_escape_string($value);
    } else { //before version PHP 4.3.0
        //if magic quotes arent already then add slashes manually
        if (!$magic_quotes_active){ $value = addslashes($value);}
        // if magic quotes are active, then the slashes allready exist
    }
        return $value;
}


function redirect_to( $location = NULL){
    if ($location != NULL){
        header("Location: {$location}");
        exit;
    }
}


function public_navigation($sel_table1,$table2){  
    
    $output = "<ul class=\"info\">";
//DB QUERY - function
    $info_set = get_all_info();
//USE DATA
    while ($info= mysql_fetch_array($info_set)){
        $output .= "<li";
        if ($info["id"] == $sel_table1['id']){  //table1
        $output .= " class=\"selected\""; }
        $output .= "><a href=\"index.php?info=" . urlencode($info["id"]) ."\">{$info["menu"]}</a></li>";
        
        if ($info["id"] == $sel_table1['id']){
            
        $page_set = get_pages_for_info($info["id"]);
        $output .= "<ul class=\"pages\">";         
        while ($page = mysql_fetch_array($page_set)){
            $output .= "<li";
            if ($page["id"] == $table2['id']){
            $output .= " class=\"selected\"";
}
            $output .= "><a href=\"index.php?page=" .urlencode($page["id"]) . "\">{$page["menu"]}</a></li>"; 
        }
        $output .= "</ul>";
        }
    } 
        $output .= "</ul>";
        return $output;
}

?>