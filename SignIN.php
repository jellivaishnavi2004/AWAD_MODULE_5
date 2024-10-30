<?php
require_once "db_connectivity.php";
session_start();
$uid = $_POST["txtuid"];
$pwd = $_POST["txtpwd"];
$sql = "select fname, sname, lname, surname from user_info where userid='$uid' and password='$pwd'";
$rs = $con->query($sql);
if($rs->num_rows>0)
{
$rec = $rs->fetch_assoc();
date_default_timezone_set("Asia/Kolkata");
$d = date("d/m/y h:i:s A");
$lb = fopen("LogBook.txt","a");
$_SESSION["un"] = $rec["fname"]." ".$rec["sname"]." ".$rec["lname"]." ".$rec["surname"];
fwrite($lb,$_SESSION["un"]."-> In Time -> ".$d."\n");
echo "<div style='text-align:right'>
<a href='SignUp.php' style='text-decoration:none;font-size:20px'>
Sign Out</a>
</div>";
echo "Welcome ". $_SESSION["un"];
fclose($lb);
}
else{
echo "<div style='text-align:center;'>User credentials not matched ! <br>
<a href='SignIN.htm' style='text-decoration:none;font-size:20px'>SignIN</a> again</div>";
}
?>