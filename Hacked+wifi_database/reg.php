<?php
Include_once 'con.php';

$email = $_POST['email'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$pass2 = $_POST['pass2'];
If ($pass && $pass2 != ""){
if ($pass == $pass2){
$code = "INSERT INTO adm (email,user,pass) VALUES  ('$email','$user','$pass')";
$query = mysqli_query($con, $code);
header('location:login.php');
}
echo "ops! not the same password";
}
?>
<style>
body {
   background-image: url("6.jpg");

}
div#form {
    color: bisque;
    font-weight: bold;
    float: right;
    margin-top: 98px;
}
input {
    padding: 6px 127px;
    border-radius: 7px;
    background-color: darkred;
    color: beige;
    float: right;
    border-color: burlywood;
    text-align: center;
    outline: none;
}
input#btn {
    background-color: black;
    border-color: aquamarine;
    text-align: center;
    border-radius: 26px;
    width: 70%;
    height: 44px;
    margin-top: 41px;
    color: aquamarine;
}

input[type='text']:hover, [type='email']:hover, [type='password']:hover {
    background-color: crimson;
    border-color: deeppink;
    color: coral;
    font-family: fantasy;
    
}
</style>

<div id='form'>
<form method="post">
<label for="email">e-mail :
<input type="email" class="email" id="email" name="email" required>
</label></br></br><br>
<label for="user">User Name :
<input type="text" class="user" id="user" name="user" required>
</label><br><br><br>
<label for="pass">Password :
<input type="password" class="pass" id="pass" name="pass" required>
</label><br><br><br>
<label for="pass2">Re-type Password :
<input type="password" class="pass2" id="pass2" name="pass2" required>
</label><br><br><br>
<input type="submit" class="btn" id="btn" name="submit">
</form>
</div>