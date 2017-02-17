<?php 



$hostname = 'localhost';
$username ='root';
$password = '';
$db_name = 'ajax_student_search';

$connection = mysqli_connect($hostname,$username,$password,$db_name);

if($connection){
	echo "connected";
}else{
	die("Database failed to connect".mysqli_error($connection));
}

if(isset($_GET['id'])){
	$id = $_GET['id'];

	$query = "SELECT * FROM tbl_like_count WHERE like_id ='$id'";
	$result = mysqli_query($connection,$query);

	$like_info = mysqli_fetch_assoc($result);

	$like_count = $like_info['like_count']+1;

	$sql = "UPDATE tbl_like_count SET like_count='$like_count' WHERE like_id='$id'"; 

	$up_result = mysqli_query($connection,$sql);
}

if(isset($_GET['pp'])){
	$id = $_GET['pp'];
	$query = "SELECT * FROM tbl_like_count WHERE like_id='$id'";

	$result = mysqli_query($connection,$query);
	$unlike_info = mysqli_fetch_assoc($result);

	$unlike_count = $unlike_info['unlike_count']+1;

	$sql = "UPDATE tbl_like_count SET unlike_count='$unlike_count' WHERE like_id='$id'";

	$unlike_result = mysqli_query($connection,$sql);
}

$query = "SELECT * FROM tbl_like_count";
$result = mysqli_query($connection,$query);
?>


<table border="1" align="center">
	<tr>
		<td>Social Media Name </td>
		<td> Like</td>
		<td> Dislike</td>
	</tr>
	<?php while($row=mysqli_fetch_assoc($result)) {?>
<tr>
	<td height="40"><?php echo $row['social_media']; ?></td>
	<td>(<?php echo $row['like_count']; ?>) <a href="" onclick="update_like(<?php echo $row['like_id'];?>,'res');">Like</a></td>
	<td>(<?php echo $row['unlike_count']; ?>) <a href="" onclick="update_unlike(<?php echo $row['like_id'];?>,'res')">Unlike</a></td>
</tr>

<?php } ?>
</table>