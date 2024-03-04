<?php

//<?php
/*session_start();
if(isset($_SESSION['user_id']) && $_SESSION['user_id'] > 0){
    header("Location:./");
    exit;
}*/

$url = $_SERVER['REQUEST_URI'];

preg_match("/department=(\w+)&window=(\d+)/", $url, $matches);

$office = $matches[1];
$windows = $matches[2];

echo $office; 
echo $windows;

?>
