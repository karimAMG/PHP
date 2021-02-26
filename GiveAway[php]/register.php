<?php
include 'con.php';
if(isset($_GET['submit'])){
$user = $_GET['user'];
$pass = $_GET['pass'];
$sql = 'insert into online (user,pass,status) values("'.$user.'","'.$pass.'",1)';
if($query = mysqli_query($con,$sql)){
header('location: login.php');
}else{die('[x] err: sql error!!');}
}
?>
<html>
<form method='GET' action='register.php'>
<label>UserName:<input type='text' name='user'></label>
<label>Password:<input type='password' name='pass'></label>
<input type='submit' name='submit' value='submit'>
</form>
</html>
