<?php

session_start();
include 'ref.php';
if( !isset($_SESSION['id']) ){
    header("location:index.php");
    exit();
}else{

?>
<html>
<head>
<meta name=viewport content="width=device-width, initial-scale=1"> 
<title>Moi Airport</title>
<link rel="stylesheet" href="styles.css" type="text/css">
</head>
<body>


<?php

$uid = $_SESSION['id'];
$staff_name = $_SESSION['staff_name'];

if (isset($_POST['submit']) AND (!empty($_POST['password1']))){

require "connect.inc.php";
$sql = "UPDATE staff SET staff_pw  = '$_POST[password1]' WHERE staff_id = '$uid'";

if (mysqli_query($conn, $sql)){

echo "Password has been changed<br>";
echo "<a href=logout.php>Back</a>";
}

}else
{
echo "<h1>".$staff_name."</h1><br><br>";

echo "<form method='post'>";
echo "<table border='1'>";
echo "<tr><td>New Password: </td><td><input type='password' name = 'password1'></td></tr>";
echo "<tr><td></td><td><input type='submit' name = 'submit' value = 'Submit'></td></tr>";
echo "</table>";
echo "</form>";

}

}

?>