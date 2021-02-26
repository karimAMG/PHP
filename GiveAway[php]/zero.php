<?php
# reset all users status to 0
include 'con.php';
header("Refresh:0");
$sql ='select * from online';
$sql2 = "update online set status=1 where user='$user'";
if($query = mysqli_query($con,$sql)){
if(mysqli_num_rows($query) > 0){
while($row = mysqli_fetch_array ($query)){
if($row['status'] == 0){
$user = $row['user'];
$sql2 = "update online set status=1 where user='$user'";
$query2 = mysqli_query($con,$sql2);
}
}
}else{die('err: Number of rows is Zero');}
}else{die('err: sql error !!');}
?>
