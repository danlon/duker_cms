

<?php

require ("constants.php");

$connection = mysql_connect(DB_SERVER, DB_USER, DB_PASS);

if (!$connection){
    die("<br>Error connecting to Page!");
}

$db = mysql_select_db(DB_NAME, $connection);

if (!$db) {
    die ("<br> Unable to connect to Database!");
}

?> 
