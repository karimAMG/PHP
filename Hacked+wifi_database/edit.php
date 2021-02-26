<?php
Include('auth.php');
?>
<link rel='stylesheet' type='text/css' href='style.css'>
<?php
Include_once 'con.php';
$id = $_GET['id'];
if(isset($_POST['submit'])){
if (isset($_GET['id'])){
$b = $_POST['bssid'];
$e = $_POST['essid'];
$t = $_POST['type'];
$p = $_POST['pin'];
$pw = $_POST['pwd'];
$sql = "UPDATE info SET bssid='$b',essid='$e',type='$t',pin='$p',pwd='$pw' WHERE id=$id";
$query = mysqli_query($con, $sql);
header('location: info.php');
}

}
?>
<?php
$sql ="SELECT * FROM info WHERE id = '$id'";
$query  = mysqli_query($con, $sql);
While($row = mysqli_fetch_array($query)){
$d1 = $row ['bssid'];
$d2 = $row ['essid'];
$d3 = $row ['type'];
$d4 = $row ['pin'];
$d5 = $row ['pwd'];
}
?>
<html><head><title>Wifi Data</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<style>
    img{
        display:none;
    }
a.out {
    float: right;
    font-size: 18px;
    font-family: serif;
    color: bisque;
    margin-top: -42px;
}
</style>
<a class='out' href='logout.php'><i class="fa fa-sign-out" style="font-size: 15px;color: chocolate;"></i> Log out</a>
<div class='form'>
<form method="post" action="save.php">
<label for="bssid">BSSID :
<input type="text" name="bssid" maxlength="17" value='<?php echo $d1 ?>'>
</label><br>
<label for="essid">ESSID :
<input type="text" name="essid" value='<?php echo $d2 ?>'>
</label><br>
<label for="type">TYPE :
<input type="text" name="type" value='<?php echo $d3 ?>'>
</label><br>
<label for="pin">PIN :
<input type="numero" name="pin" maxlength="8" value='<?php echo $d4 ?>'>
</label><br>
<label for="pwd">PWD :
<input type="text" name="pwd" value='<?php echo $d5 ?>'>
</label><br>
<input type="submit" name="submit">
</form></div>
<a class='return' href='info.php'>[0] Return</a>
</body>
</html>