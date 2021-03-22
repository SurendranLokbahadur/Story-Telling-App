<?php

$username='root';
$password='';
$db = mysqli_connect("localhost" , "root", "", "cmm007");
if(!$db){
    die('Could not Connect My Sql:' .mysqli_error());
}
?>