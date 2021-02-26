<?php
include 'con.php';
header("Refresh:10");
$sql ='select * from online';
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
$accounts = 0;
$sqla = "select * from redeem where status='true'";
$querya = mysqli_query($con,$sqla);
while($row = mysqli_fetch_array($querya)){
$accounts +=1;
}
echo "<b>[*] accounts : [$accounts] availabe</br>";
?>
<head>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
</head>
<div id="links">

</div>

<script language="javascript" type="text/javascript">
function loadlink(){
    $('#links').load('active.php',function () {
         $(this).unwrap();
    });
}

loadlink(); // This will run on page load
setInterval(function(){
      loadlink() // this will run after every 5 seconds
}, 2000);
</script>
