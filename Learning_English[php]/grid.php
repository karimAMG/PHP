<html><head><title>grid</title></head><body>
<style>
html{text-align:center;}
.grid_con{
display:grid;

grid-template-areas:
'head head head head head head head head'
'menu menu menu menu menu menu menu menu'
'nav data data data data data data aside'
'nav main main main main main main aside'
'nav pagination pagination pagination pagination pagination pagination aside'
'footer footer footer footer footer footer footer footer'
;
grid-gap:5px;
}
.grid_con > *{
padding:30px;
margin: 5px 0;
color:#fff;
}
body,html{
margin:0.5;
padding:0.5;
background:
linear-gradient(to left, #ff0000 1%, #00ccff 100%);
}
.head{grid-area:head;
height:1px;
background:linear-gradient(to bottom, #591717 0%, #a846a64f 100%);
}
.menu{grid-area:menu;
height:25px;
background:linear-gradient(to bottom, #672eb966 0%, #332122 100%);
}
.data{grid-area:data;
background:black;
padding:15px;
}
.main{grid-area:main;
background:transparent;

}
.aside{grid-area:aside;
background:black;
padding-top:30px;
padding-left:0px;
padding-right:0px;
width:220px;
}
.nav{grid-area:nav;
background:black;
color:cadetblue;
display:grid;
grid-auto-columns:minmax(176px,auto);
grid-template-rows:repeat(5,40px);
width:160px;
text-align:right;
}
.pagination{grid-area:pagination;
background:transparent;
}
.footer{grid-area:footer;
background:linear-gradient(to bottom, #390808bd 0%, #a846a64f 100%);
}
.ul1{
width:auto;
float:right;
margin-top:-16px;
line-height:5px;
cursor:pointer;
}
.ul2{
width:auto;
float:right;
margin-top:-16px;
cursor:pointer;
}
.li1 {
display:inline-block;
padding:15px 30px;
background: crimson;
border-radius: 7px;
}
.li2 {
display:inline-block;
padding:15px 30px;
background: chocolate;
border-radius: 8px 47px 45px;
}
a{
text-decoration:none;
color:#ffffff;
text-align:center;
font-size: 1.2vw;
}
h3{
position:absolute;
padding:3px;
float:left;
margin:auto;
color:#39ca74;
}
input,select{
width: 94%;
color: bisque;
background: border-box;
border-radius: 4px;
margin-top: 13px;
padding: 5px 8px;
border-color: brown;
text-align:center;
}
.main,.data,.pagination{
width:500px;
}
tr,th,td{
border:1px black solid;
padding: 18px;
}
table{margin:auto;
border:1px black solid;
}
.pagination a{
padding: 6px;
background: indianred;
color: black;
border-radius: 4px;
}
th{
color:black;
}
.nav, .aside, .pagination, .footer, .main, .data, .head, .menu {
    border-radius: 18px;
}
input[type="submit"] {
    color: brown;
}
table, tr, th, td {

    border-radius: 4px;

}
img {

    border-radius: 3px;

}

.noradius {
    border-radius: 5;
    width: 37px;
}
.color {

    color: ghostwhite;

}
.color6 {

    color: gainsboro;
    background: crimson;

}
th {

    background: chocolate;

}
.color3 {

    color: chartreuse;

}
.color2 {

    color: darkslateblue;

}
.color1 {

    color: brown;
    background: transparent;
}
td {

    background: royalblue;

}

.en{display:none;}
.es{display:none;}
.de{display:none;}
.ja{display:none;}





.tooltip {
  cursor:pointer;
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;

  /* Position the tooltip */
  position: absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
</style>
<?php
if ($_GET['text'] != '' && $_GET['lan'] != ''){
$word = $_GET['text'];
$lan = $_GET['lan'];
$ar = $_GET['ar'];
$t=time();
$time = $t.'  '.date("Y-M-D",$t);
$db = new sqlite3('test.db');
$db->exec("insert into dics (text,ar,lan,time) values ('$word','$ar','$lan','$time')");
}else{
echo '';
}
?>

<div class='grid_con'>
<div class='head'>
     <div class='dropdown1'>
     <ul class='ul1'>
        <li class='li1'><a href='#' >contact us</a></li>
        <li class='li1'><a href='#' >privacy</a></li>
        <li class='li1'><a href='#' >license</a></li>        
     </ul></div>
</div>
<div class='menu'>
     <div class='dropdown2'>
     <img src="images/logo3.png" style="width: 138px;height: 70px;float: left;margin: -29px;">
        <!--<h3>menu</h3> -->
     <ul class='ul2'>
        <li class='li2'><a href='#' >home</a></li>
        <li class='li2'><a href='#' >apps</a></li>
        <li class='li2'><a href='#' >news</a></li>
        <li class='li2'><a href='#' >images</a></li>        
     </ul>
     </div>
</div>

<div class='data'>
<div class='limi' style='width:100%;'>
<img src="images/w.jpg" alt="Cinque Terre" width="100%" height="100">
</div>
</div>

<div class='main'>
<div style='width:100%;'>
        <table>
             <tr>
                 <th class='color1'>Id</th>
                 <th class='color2'>Words</th>
                 <th class='color3'>Languages</th>
                 <th class='color6'>flags</th>
             </tr>
             <?php
             if (isset($_GET['page_no'])){
             $page_no = $_GET['page_no'];
             }else{$page_no = 1;};
             $total_per_page = 10;
             $lim = ($page_no - 1) * $total_per_page;
             $db = new sqlite3('test.db');
             $dics = $db->query("select * from dics limit $lim , $total_per_page");
             while($row = $dics->fetchArray()){
             $total +=1;
             if($row['lan'] == 'english'){
             $l='images/en.png';
             };
             if($row['lan'] == 'español'){
             $l='images/es.png';
             };
             if($row['lan'] == 'german'){
             $l='images/de.png';
             };
             if($row['lan'] == 'japanese'){
             $l='images/je.png';
             };
             
             echo "<tr>
                 <td class='color'>".$row['id']."</td>
                 <td class='color2'><div class='tooltip'>".$row['text']."<span class='tooltiptext'>".$row['ar']."</span>
</div></td>
                 <td class='color3'>".$row['lan']."</td>
                 <td><img src='".$l."' class='noradius' /></td>
             </tr>";
             
             }
             
                 ?>
        </table>
</div>
</div>

<div class='aside'>

      <select id='select' onchange="onchange2()">
      <option value='en'>English</option>
      <option value='es'>Español</option>
      <option value='de'>German</option>
      <option value='ja'>Japanese</option>
      </select>
      
      <div class='en'>
      <form action='grid.php' method='GET'>
      <input type='text' name='text' placeholder='English'><br>
      <input type='text' name='ar' placeholder='Arabic'><br>
      <input type='hidden' name='lan' value='english'>
      <input type='submit' value='submit' name='submit'></form>
      <img src='images/en.png' style='border-radius:0px;' />
      </div>
      <br>
      
      <div class='es'>
      <form action='grid.php' method='GET'>
      <input type='text' name='text' placeholder='Español'><br>
      <input type='text' name='ar' placeholder='Arabic'><br>
      <input type='hidden' name='lan' value='español'>
      <input type='submit' value='submit' name='submit'></form>
      <img src='images/es.png' style='border-radius:0px;' />
      <br>
      </div>
      
      <div class='de'>
      <form action='grid.php' method='GET'>
      <input type='text' name='text' placeholder='German'><br>
      <input type='text' name='ar' placeholder='Arabic'><br>
      <input type='hidden' name='lan' value='german'>
      <input type='submit' value='submit' name='submit'></form>
      <img src='images/de.png' style='border-radius:0px;' />
      <br>
      </div>

      <div class='ja'>
      <form action='grid.php' method='GET'>
      <input type='text' name='text' placeholder='Japanese'><br>
      <input type='text' name='ar' placeholder='Arabic'><br>
      <input type='hidden' name='lan' value='japanese'>
      <input type='submit' value='submit' name='submit'></form>
      <img src='images/je.png' style='border-radius:0px;' />
      <br>
      </div>
      
</div>
<div class='nav'>
       <?php
        $db = new sqlite3('test.db');
        $dics = $db->query("select * from dics");
        $total = 0;
        $eng = 0;
        $esp = 0;
        $ger = 0;
        $jap = 0;
        while($row = $dics->fetchArray()){
        $total +=1;
        if($row['lan'] == 'english'){
        $eng += 1; 
        };
        if($row['lan'] == 'español'){
        $esp += 1;
        };
        if($row['lan'] == 'german'){
        $ger += 1;
        };
        if($row['lan'] == 'japanese'){
        $jap += 1;
        };}
       echo '
       <p>English progress : '.$eng.'</p>
       <p>español Progress : '.$esp.'</p>
       <p>german Progress : '.$ger.'</p>
       <p>japanese Progress : '.$jap.'</p>
       <p>total : '.$total.'</p>';
       ?>
</div>
<div class='pagination'>
    <?php
    $prev = $page_no-1;
    $next = $page_no+1;
    if ($page_no > 1) {
    echo "<a href='?page_no=1'>First</a>";
}
    ?>
    <a href='<?php if ($page_no <= 1){echo '#';}else{echo '?page_no='.$prev ;}; ?>'>prev</a>
    <?php 

    $db = new sqlite3('test.db');
    $total_pages = $db->querysingle("select count(*) from dics");
    

for ($i = $page_no - 3; $i < $page_no + 6; $i++) {
   // if it's a valid page number...
   if (($i >= 1) && ($i <= $total_pages)) {
      // if we're on current page...
      if ($i == $page_no) {
         // 'highlight' it but don't make a link
         echo "<a href='?page_no=$i' style='background:bisque;'>$i</a>";
      // if not current page...
      } else {
         // make it a link
         echo " <a href='{$_SERVER['PHP_SELF']}?page_no=$i'>$i</a> ";
      } // end else
   } // end if 
}

    ?>
    <a href='<?php if ($page_no >= $total_pages){echo '#';}else{echo '?page_no='.$next ;}; ?>'>next</a>
    <a href='<?php if($page_no >= $total_pages ){echo '#';}{echo '?page_no='.$total_pages ;}; ?>'>Last</a>
</div>
<div class='footer'>footer Power By itself</div>

</div>

<script>
if (document.getElementById('select').value== 'en'){
document.getElementsByClassName('en')[0].style.display='block';
}
function onchange2(){
if (document.getElementById('select').value== 'en'){
document.getElementsByClassName('en')[0].style.display='block';
document.getElementsByClassName('es')[0].style.display='none';
document.getElementsByClassName('de')[0].style.display='none';
document.getElementsByClassName('ja')[0].style.display='none';
}
if (document.getElementById('select').value== 'es'){
document.getElementsByClassName('en')[0].style.display='none';
document.getElementsByClassName('es')[0].style.display='block';
document.getElementsByClassName('de')[0].style.display='none';
document.getElementsByClassName('ja')[0].style.display='none';
}

if (document.getElementById('select').value== 'de'){
document.getElementsByClassName('en')[0].style.display='none';
document.getElementsByClassName('es')[0].style.display='none';
document.getElementsByClassName('de')[0].style.display='block';
document.getElementsByClassName('ja')[0].style.display='none';
}
if (document.getElementById('select').value== 'ja'){
document.getElementsByClassName('en')[0].style.display='none';
document.getElementsByClassName('es')[0].style.display='none';
document.getElementsByClassName('de')[0].style.display='none';
document.getElementsByClassName('ja')[0].style.display='block';
}}
</script>
</body></html>
