<?php
Include('auth.php');
?>
<link rel='stylesheet' type='text/css' href='style.css'>
<?php
include("con.php");
if(isset($_POST[submit])){
$b = $_POST['bssid'];
$e = $_POST['essid'];
$t = $_POST['type'];
$p = $_POST['pin'];
$pw = $_POST['pwd'];
$sql = "INSERT INTO info (bssid,essid,type,pin,pwd) VALUES  ('$b', '$e', '$t', '$p', '$pw')";
$query = mysqli_query($con, $sql);
header('location: info.php');
}
?>
<html><head><title>Add Wifi Data</title>
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
}
a.adm {
    font-size: 20px;
    font-family: serif;
    color: chocolate;
}
</style>
<a class='adm' href='#'>Login : <i class="fa fa-user" aria-hidden="true" style='color: darkseagreen;'></i> <?php echo $_SESSION['user']; ?></a>

<a class='out' href='logout.php'><i class="fa fa-sign-out" style="font-size: 15px;color: chocolate;"></i> Log out</a>
<div class='form'>
<form method="post" action="save.php">
<label for="bssid">BSSID :
<input type="text" name="bssid" maxlength="17" placeholder="EX: xx:xx:xx:xx:xx:xx">
</label><br>
<label for="essid">ESSID :
<input type="text" name="essid" placeholder="Your ESSID ...">
</label><br>
<label for="type">TYPE :
<input type="text" name="type" placeholder="Your Type ...">
</label><br>
<label for="pin">PIN :
<input type="numero" name="pin" maxlength="8" placeholder="88888888">
</label><br>
<label for="pwd">PWD :
<input type="text" name="pwd" placeholder="Your Pass ...">
</label><br>
<input type="submit" name="submit">
</form></div>
<a class='return' href="info.php" >[0] Return</a>
</body>
</html>