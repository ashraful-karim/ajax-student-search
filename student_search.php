<?php 

$student_search = $_GET['text'];

$hostname = 'localhost';
$username ='root';
$password = '';
$db_name = 'ajax_student_search';

$connection = mysqli_connect($hostname,$username,$password,$db_name );

if($connection){
	echo "connected";
}else{
	die("Database failed to connect".mysqli_error($connection));
}

if(!isset($student_search)){
	$id = $_GET['id'];
	$mobile_number = $_GET['mobile_number'];

	$query = "UPDATE tbl_student SET mobile='$mobile_number' WHERE student_id='$id'";
	mysqli_query($connection,$query);
}

if(isset($student_search)){

	$query = "SELECT * FROM tbl_student WHERE student_name like '%$student_search%' or mobile like '%$student_search%'";

}else{
	$query = "SELECT * FROM tbl_student";
}



$query_result = mysqli_query($connection,$query);

 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
 </head>
 <body>

 <table class="table table-bordered " >

 	<thead>
 		<th>Student Id</th>
 		<th>Student Name</th>
 		<th>Student Email</th>
 		
 		<th>Student Address</th>
 		<th>Student Mobile</th>

 	</thead>

 	<tbody>

 	<?php while($row = mysqli_fetch_assoc($query_result)){ ?>
 		<tr>
 			<td><?php echo $row['student_id']; ?></td>
 			<td><?php echo $row['student_name']; ?></td>
 			<td><?php echo $row['student_email']; ?></td>
 			<td><?php echo $row['student_address']; ?></td>
 			<td contenteditable="true" id="mobile_number<?php echo $row['student_id']; ?>" onblur="ajax_update(<?php echo $row['student_id'];?>)"><?php echo $row['mobile']; ?></td>
 		


 		</tr>

 		<?php } ?>
 	</tbody>
 	
 </table>
 
 </body>
 </html>