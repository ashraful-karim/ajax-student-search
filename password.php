<?php 

$length = $_GET['lenght'];

$alpha = array('a','k','t','x','g','i','y','@','B','#','$','A','M');

$password ='';

for($i=0;$i<= $length-1;$i++){

	$r =rand(0,9);
	$password .= $alpha[$r];
}

echo $password;



 ?>