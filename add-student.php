<?php 
	include('dbcon.php');
	if(isset($_POST['add-student'])){
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$age=$_POST['age'];
		if($first_name&&$last_name&&$age){
			$query="INSERT INTO `student`(`first_name`, `last_name`, `age`) VALUES ('$first_name','$last_name','$age')";
			$result=mysqli_query($connection,$query);
			if($result){
				header('location:index.php?message=Saved successful!');
			}
			else{
				die("Failed");
			}
		}
		else {
			header('location:index.php?message=Data is empty!');
		}
	}
?>