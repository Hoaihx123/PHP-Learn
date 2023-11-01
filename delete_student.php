<?php include('dbcon.php') ?>
<?php 
	if (isset($_GET['id'])) {
		$id=$_GET['id'];
		$query="DELETE FROM `student` WHERE `id`='$id'";
		$result=mysqli_query($connection, $query);
		if($result){
			header('location:index.php?message=Deleted student');
		}
		else{
			die("Faile");
		}
	}
 ?>