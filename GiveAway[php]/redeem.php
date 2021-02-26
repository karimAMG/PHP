<?php
include 'con.php';
header("Refresh:31");
$code = $_GET['malha'];
$sql = "select * from redeem where code='$code'";
#begin expired by time
$sqlx = "select * from redeem";
$queryx = mysqli_query($con,$sqlx);
while($row = mysqli_fetch_array($queryx)){
$exp = $row['time'];
if($exp != 'null'){
if((round(time()-$exp))>20){
$codex = $row['code'];
$sql2 = "update redeem set status='false' where code='$codex'";
$query2 = mysqli_query($con,$sql2);
}
}
}
#end
if($query=mysqli_query($con,$sql)){
if (mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array($query)){
if($row['code'] == $code){
if($row['status'] == 'true'){
echo $row['acc'];
echo '<p name="para"></p><progress value="0" max="30" id="progressBar"></progress></div><script>p = document.getElementsByName("para")[0];var timeleft = 30;var downloadTimer = setInterval(function(){if(timeleft <= 0){clearInterval(downloadTimer);}document.getElementsByName("para")[0].innerHTML = 30 - timeleft+"/30 Sec No Time Left !!";document.getElementById("progressBar").value = 30 - timeleft;timeleft -= 1;}, 1000);</script>';
$time = time();
if($row['time'] == 'null'){
$sql3 = "update redeem set time='$time' where code='$code'";
$query3=mysqli_query($con,$sql3);
}
}else{echo '[X] Claimed !!<br><a href="index.php">GO Back</a>';}
}
}
}else{echo '[X] Not Valid<br><a href="index.php">Home</a>';}
}
?>
