<?php include('header.php') ?>
<?php include('dbcon.php') ?>

<?php  
	if(isset($_POST['update-student'])){
		$id=$_GET['id'];
		$first_name=$_POST['first_name'];
		$last_name=$_POST['last_name'];
		$age=$_POST['age'];
		$query="UPDATE `student` SET `first_name`='$first_name',`last_name`='$last_name',`age`='$age' WHERE `id`= '$id'";
		$result=mysqli_query($connection, $query);
		if(!$result){
			die("Failed");
		}
		else{
			header('location:index.php?message=Update successful!');
		}
	}
?>

<?php 
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$query="SELECT * FROM `student` WHERE `id`='$id'";
		$result=mysqli_query($connection, $query);
		if($result){
			$student=mysqli_fetch_assoc($result);
			?>
			<form method="post" action="update_student.php?id=<?php echo $id ?>" class="form-group">
      			<div class="modal-body">
        
		        	<label>First name</label>
		        	<input type="text" name="first_name" class="form-control" value="<?php echo $student['first_name'] ?>">
		        	<label>Last name</label>
		        	<input type="text" name="last_name" class="form-control" value="<?php echo $student['last_name'] ?>">
		        	<label>Age</label>
	        		<input type="number" name="age" class="form-control" value="<?php echo $student['age'] ?>">
  
		      	</div>
		      	<div class="modal-footer">
			        <a href="index.php" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</a>
			        <input type="submit" class="btn btn-primary" name="update-student" value="Save">
		      	</div>
		  	</form>
			<?php
		}
		else{
			header('location:index.php');		
		}
	}
	else{
		header('location:index.php');
	}
 ?>



<?php include('footer.php'); ?>