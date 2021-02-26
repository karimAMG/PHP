<?php
Include_once 'con.php';
session_start();

if (isset($_POST['user'])){
$user = $_POST ['user'];
$pass = $_POST['pass'];

$code = "SELECT * FROM adm WHERE user='$user' and pass='$pass' ";

$query = mysqli_query($con, $code);

$row = mysqli_num_rows($query);

if ($row == 1){
$_SESSION['user'] = $user;
header('location:info.php');
}

}
?>
<style>
body {
   background-image: url("5.jpg");

}
input[type="submit"] {
    background-color: transparent;
    padding: 9px 34px;
    border-radius: 15px;
    border-color: burlywood;
    color: cornsilk;
    margin-top: 5px;
    outline: none;
    cursor: pointer;
    margin-left: 82%;
}
div#form {
    color: coral;
    font-weight: bold;
    padding-top: 376px;
    padding-right: 56%;
}
a.acc {
    color: antiquewhite;
    text-decoration: none;
}

input[type='text'], [type='email'], [type='password'] {
    padding: 6px 127px;
    border-radius: 7px;
    background-color: transparent;
    color: beige;
    border-color: burlywood;
    text-align: center;
    outline: none;
}
input[type="submit"]:hover {
    border-color: darkgoldenrod;
    color: burlywood;
}
input[type='text']:hover, [type='email']:hover, [type='password']:hover {
    border-color: chocolate;
    color: burlywood;
}
a.acc:hover {
    color: chartreuse;
}
</style>
<a class='acc' href='reg.php'><< Create Account >></a>
<center>
<div id='form'>
<form method="post">
<label for="user">User Name :
<input type="text" id="user" class="user" name="user" required>
</label><br><br>
<label for="pass">Password :
<input type="password" id="pass" class="pass" name="pass" required>
</label><br><br>
<input type="submit" name="submit">
</form>
</div>