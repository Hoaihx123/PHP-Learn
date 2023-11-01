<?php include("header.php"); ?>
<?php include("dbcon.php"); ?>
	<?php 
		if(isset($_GET['message'])){
			echo "<h4>".$_GET['message']."</h4>";
		}
	?>
	<div class="box1">
		<h2>All Student</h2>
		<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Add student</button>
		</div>
	<table class="table table-hover table-bodered table-striped">
		<thead>
			<th>id</th>
			<th>last name</th>
			<th>fisrt name</th>
			<th>age</th>
			<th></th>
			<th></th>
		</thead>
		<tbody>
			<?php 
				$query="SELECT * FROM `student`";
				$result=mysqli_query($connection, $query);
				if($result){
					while($row = mysqli_fetch_assoc($result)){
						?>
						<tr>
							<td><?php echo $row['id'] ?></td>
							<td><?php echo $row['first_name'] ?></td>
							<td><?php echo $row['last_name'] ?></td>
							<td><?php echo $row['age'] ?></td>
							<td><a href="update_student.php?id=<?php echo $row['id'] ?>" class="btn btn-success">Update</a></td>
							<td><a href="delete_student.php?id=<?php echo $row['id'] ?>" class="btn btn-danger">Delete</a></td>
						</tr>
						<?php
					}
				}
			 ?>
		</tbody>
	</table>
	
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="post" action="add-student.php" class="form-group">
      <div class="modal-body">
        
        	<label>First name</label>
        	<input type="text" name="first_name" class="form-control">
        	<label>Last name</label>
        	<input type="text" name="last_name" class="form-control">
        	<label>Age</label>
        	<input type="number" name="age" class="form-control">
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" name="add-student" value="Save">
      </div>
  	</form>
    </div>
  </div>
</div>
<?php include("footer.php"); ?>
