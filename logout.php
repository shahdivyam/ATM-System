<?php

require ("connect.php");
require ("user_data.php") ;

session_destroy();

header('Location: index.html');

?>