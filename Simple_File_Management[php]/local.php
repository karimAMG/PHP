<?php
# Begin
$path = '/home/ghost/Desktop/php';
$scan = scandir($path,1);

foreach($scan as $arr){
#1
if (! is_dir($arr)){
print '<a href="'.$arr.'" class="__file" style="text-decoration:none;" download><div class="__file" style="color:green;">'.$arr.'</div></a>';
}
#2
if (is_dir($arr)){

# remove ..
if ($arr == '.' or $arr == '..'){
continue;
}

print '<div class="__folder" style="color:blueviolet;">[+] '.$arr.'</div>';

}
}

?>

