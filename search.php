<?php 

$search_text = $_GET['text'];

echo $search_text;

$data = array('PHP','php','mysql','JAVA','java',"C","Dot net",'angular js','Python','object oriented programming');

if(in_array($search_text,$data)){

	echo "<br/>Found Successful";
}else{
	echo "<br/>Search Is not completed";
}


 ?>