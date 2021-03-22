<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$db = "cmm007";
$db = new mysqli($dbhost,  $dbusername , $dbpassword , $db);

$username=$_POST['username'];
$password=$_POST['password'];

$sql = "SELECT*FROM users WHERE username = '$username' AND password = '$password' ";


$result = mysqli_query($db, $sql);
$row = mysqli_fetch_array($result);

if ($username =="" && $password =="")
{
    echo "Welcome  " . $username  . " - Admin ";

}
if($row['username']==$username && $row['password']==$password)
{

    header("location: admin.php");

}
else {
    echo " Incorrect Admin - Username or Password. ";
}
?>
