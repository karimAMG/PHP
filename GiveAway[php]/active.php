<?php 
include 'con.php';
if(isset($_COOKIE['user'])){
$user = $_COOKIE['user'];
$sql1 = "SELECT * FROM online where user = '$user'";
$sql2 = "UPDATE online SET status=0 WHERE user='$user'";
$sql3 = "SELECT * FROM online";
$count = 0;
$on = array();
if($query3 = mysqli_query($con,$sql3)){
while($row = mysqli_fetch_array($query3)){
if ($row['status'] == 0){
$count += 1;
echo $row['user'].' Online<br>';

}
}
echo "Online $count/10";

$sql4 = "select * from redeem where status='true'";
if($query4 = mysqli_query($con,$sql4)){
if(mysqli_num_rows($query4) > 0){
if($count == 2){
while($row = mysqli_fetch_array($query4)){
if($row['status'] == true){
$code = $row['code'];
}
}#while loop
echo "<a href='redeem.php?malha=$code' id='ahref'></a><script>a=document.getElementById('ahref');a.click()</script>";
}
}else{echo "<a href='finish.php' id='fn'></a><script>a = document.getElementById('fn');a.click();</script>";}
}

}
if($query1 = mysqli_query($con,$sql1)){
foreach($query1 as $row){
if($user == $row['user']){
if($row['status'] == 1){
if($query2 = mysqli_query($con,$sql2)){
echo '';
}else{die('[X] err: sql error');}
}
}else{die('user not exist');}
}
}else{die('[X] err: sql error!!');}
}else{echo '<a href="login.php">Login</a>';}
?>

