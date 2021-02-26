<?php
Include('auth.php');
?>
<link rel='stylesheet' type='text/css' href='style.css'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
<table border="1">
<?php
Include_once 'con.php';
$sql = "SELECT * FROM info";
$query = mysqli_query($con, $sql);
echo "<tr>
          <th>BSSID</th>
          <th>ESSID</th>
          <th>Type</th>
          <th>Pin</th>
          <th>PWD</th>
          <th>DEL</th>
          <th>Edit</th>
</tr>";
while  ($row = mysqli_fetch_array ($query)){
$data1 = $row ['bssid'];
$data2 = $row ['essid'];
$data3 = $row ['type'];
$data4 = $row ['pin'];
$data5 = $row ['pwd'];
$id = $row['id'];
echo "<tr>
          <td>$data1</td>
          <td>$data2</td>
          <td>$data3</td>
          <td>$data4</td>
          <td>$data5</td>";
if ($_SESSION ['user'] == 'karim1'){
echo "    <td><a class='del' href='del.php?id="."$id"."'>[-] Delete<a></td>
          <td><a class='edit' href='edit.php?id="."$id"."'>[*] Edit<a></td>
</tr>";}else{
echo "    <td><a class='del' href='#'>[x] Ask Admin<a></td>
          <td><a class='edit' href='#'>[x] Ask Admin<a></td>
</tr>";}

    
}?>
</table>
<a class='add' href="save.php">[+] add Wifi</a>