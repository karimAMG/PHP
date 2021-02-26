<?php
include 'con.php';
#jump to the home page
if(isset($_GET['submit'])){
$user = $_GET['user'];
$pass = $_GET['pass'];
$sql = "select * from online where user='$user' and pass='$pass'";
if($query = mysqli_query($con,$sql)){
if(mysqli_num_rows($query) > 0){
if(!isset($_COOKIE['user'])){
setcookie('user',$user,time()+1*24*60*60);  #1 day * 24 hours * 60 min * 60 sec
header('location: index.php');
}
else{
setcookie('user','',time()+1*24*60*60);
header('location: login.php');
}
}else{die('[X] err: Emty rows');}
}else{die('[X] err: error sql!!');}
}
?>
<html>
<form method='GET' action='login.php'>
<label>UserName:<input type='text' name='user'></label>
<label>Password:<input type='password' name='pass'></label>
<input type='submit' name='submit' value='submit'>
</form>
</html>
