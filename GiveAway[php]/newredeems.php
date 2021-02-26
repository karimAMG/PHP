<?php
include 'con.php';
if(isset($_GET['redeem'])){
$code = $_GET['redeem'];
$acc = $_GET['acc'];
$sql = "insert into redeem (code,acc,status,time) values('$code','$acc','true','null')";
if($query = mysqli_query($con,$sql)){
header('location: newredeems.php');
}
}
?>
<html>
<form method='GET' action='newredeems.php'>
<label>redeem:
<input type='text' name='redeem'></label>
<label>E@pass:<input type='text' name='acc'></label>
<input type='submit' name='submit' value='save'>
</form>
<div class='gen'>
<textarea name='gen' rows='9' cols='43'></textarea>
<input type='button' name='btn' onclick="gen();" value='Generate'>
</div>
<script>
var a = document.getElementsByName('gen')[0];
function gen(){
code='';
for(var i=0;i<4;i++){
code += (Math.random().toString(36).substr(2,Math.floor(Math.random()*9+3))).toUpperCase();
if(i < 3){
code += '-';
}
} // for2
a.value += code+'\r\n';
} // fun
</script>
</html>
