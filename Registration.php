<?php
require_once "db_connectivity.php";
$fn = $_POST["txtfn"];
$sn = $_POST["txtsn"];
$ln = $_POST["txtln"];
$surname = $_POST["txtsurn"];
$dob = $_POST["dob"];
$uid = $_POST["txtuid"];
$pwd = $_POST["txtpwd"];
$repwd = $_POST["txtrepwd"];
$name = $fn.$sn.$ln.$surname;
if($pwd===$repwd and $fn!=NULL && $surname!=NULL && $dob!=NULL && $uid!=NULL)
{
$gender = $_POST["gender"];
$sql = "insert into user_info(fname, sname, lname, surname, dob, gender, userID, password)values('$fn','$sn','$ln','$surname','$dob','$gender','$uid','$pwd')";
if($con->query($sql) === TRUE)
{
echo "<div style='position:absoulte;text-align:right'><a href='SignIN.htm' style='text-decoration:none;font-size:20px;'>SignIN</a></div>";
echo "<p>Welcome ! $name <br>Congratulations ! Registered Successfully!</p>";
}
}
else
{
echo "Password mismatch !";
echo "<div style='top: 150px;left: 300px; position:absolute'>
<a href='Registration.htm' style='text-decoration:none'>Click here</a> to register again
</div>";
}
?>