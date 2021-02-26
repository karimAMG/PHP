<?php
Include('auth.php');
?>
<?php
Include_once 'con.php';
if (isset($_GET['id'])){
$id = $_GET['id'];
$sql = "DELETE FROM info WHERE id= $id";
$query = mysqli_query($con, $sql);
header('location: info.php');
}
?>