<?php
include('server.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script src='https://kit.fontawesome.com/a076d05399.js'></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script src="ajax.js"></script>
		<link rel="icon" href="https://cdn3.iconfinder.com/data/icons/mixed-communication-and-ui-pack-1/48/general_pack_NEW_glyph_profile-512.png">
	<link rel="stylesheet" type="text/css" href="css/news.css">
</head>
<body>
	<div class="topic">
		<h2>Profile</h2>
	</div>
	<div class="profile">

		<?php if (isset($_SESSION['success'])) : ?>
			<div class="fail success" >

				<h3>
					<?php
						echo $_SESSION['success'];
						unset($_SESSION['success']);
					?>
				</h3>
            </div>
            <img src="https://img.icons8.com/bubbles/2x/admin-settings-male.png"
            width="195" height="200" alt="profile image">
		<?php endif ?>
  <h1>Current admins of news portal:</h1>
		<?php  if (isset($_SESSION['uname'])) : ?>
				<?php
				$sql = "SELECT username, email, password FROM users1 ";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				  echo "<table ><tr><th style='padding-right: 15px '>Username</th><th > Email</th></tr>";
				  while($row = $result->fetch_assoc()) {
				    echo "<tr><td>".$row["username"]."</td><td>".$row["email"]."</td></tr>";
				  }
				  echo "</table>";
				} else {
				  echo "0 results";
				}?>
				<br>

			<p> <a href="logout.php" style="color: red;">Sign out</a> </p>
			<p> <a href="view.php " style="color: red;">View as visitor</a> </p>
		<?php endif ?>
	</div>
	<div class="main">
			<div class="top2">
					<h2>Latest News:</h2>
			</div>
			<div class="newspanel">
				<div class="container">
<p id="success"></p>
			<div class="table-wrapper">
					<div class="table-title">
							<div class="row" style="margin-bottom:3ex">
				<div class="col-sm-6">
					<a href="#addNews" class="btn btn-info" data-toggle="modal" style="padding:3px 2px 3px 2px"><i class='fas'>&#xf382;</i> <span>Add New Articles</span></a>
					<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_selected"  style="padding:3px 2px 3px 2px"><i class="fas">&#xf1f8;</i> <span>Delete News</span></a>
				</div>
							</div>
					</div>
					<table style="width: 80%" class="table table-striped table-hover">
							<thead>
									<tr>
					<th style="width:1%">
						<span class="custom-checkbox">
							<input type="checkbox" id="tickall">
							<label for="tickall"></label>
						</span>
					</th>
					<th style="width:2%">ID</th>
											<th style="width:5%">Image</th>
											<th style="width:7%">Topic</th>
					<th style="width:7%">Content</th>
											<th style="width:2%">Date</th>
											<th style="width:2%">Author</th>
											<th style="width:2%">Tools</th>

									</tr>
							</thead>
			<tbody>
			<?php
			$result = mysqli_query($conn,"SELECT * FROM nportal");
				$i=1;
				while($row = mysqli_fetch_array($result)) {
			?>
			<tr id="<?php echo $row["id"]; ?>">
			<td>
						<span class="custom-checkbox">
							<input type="checkbox" data-user-id="<?php echo $row["id"]; ?>">
							<label for="checkbox2"></label>
						</span>
					</td>
				<td><?php echo $i; ?></td>
				<td><img src="<?php echo $row['image'] ?>" width="275" height="183"  alt="Article_Image" class="img-rounded"></td>
				<td><?php echo $row["topic"]; ?></td>
				<td><?php echo $row["content"]; ?></td>
				<td><?php echo $row["date"]; ?></td>
				<td><?php echo $row["author"]; ?></td>
				<td>
					<a href="#changeNews" class="edit" data-toggle="modal">
						<i class="material-icons update" data-toggle="tooltip"
						data-id="<?php echo $row["id"]; ?>"
						data-image="<?php echo $row["image"]; ?>"
						data-topic="<?php echo $row["topic"]; ?>"
						data-content="<?php echo $row["content"]; ?>"
						data-date="<?php echo $row["date"]; ?>"
						data-author="<?php echo $row["author"]; ?>"
						title="Edit">&#xe869;</i>
					</a>
					<a href="#deleteNews" class="delete" data-id="<?php echo $row["id"]; ?>" data-toggle="modal"><i class="material-icons" data-toggle="tooltip"
					 title="Delete">&#xe92b;</i></a>
									</td>
			</tr>
			<?php
			$i++;
			}
			?>
			</tbody>
		</table>

			</div>
	</div>
	<div id="addNews" class="modal fade">
		<div class="modal-dialog" style="width:80%">
			<div class="modal-content">
				<form id="addition_form" style="width:88%">
					<div class="modal-header">
						<h3 class="modal-title">Add New Article</h3>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>Image Url</label>
							<input type="url" id="image" name="image" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Topic</label>
							<input type="text" id="topic" name="topic" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Content</label>
							<textarea  rows="9" cols="50" id="content" name="content" class="form-control" required>
							</textarea>
						</div>
						<div class="form-group">
							<label>Date</label>
							<input type="date" id="date" name="date" class="form-control" required>
						</div>
						<div class="form-group">
							<label>Author</label>
							<input type="text" id="author" name="author" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
							<input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="addbtn">Add</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<div id="changeNews" class="modal fade">
	<div class="modal-dialog " style="width:80%" >
		<div class="modal-content">
			<form id="edition_form" style="width:88%" >
				<div class="modal-header">
					<h4 class="modal-title"><b>Update This Article</b></h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="edit_id" name="id" class="form-control" required>
					<div class="form-group">
						<label>Image Url</label>
						<input type="url" id="edit_image" name="image" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Topic</label>
						<input type="text" id="edit_topic" name="topic" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Content</label>
						<textarea  rows="9" cols="50" id="edit_content" name="content" class="form-control" required>
						</textarea>
					</div>
					<div class="form-group">
						<label>Date</label>
						<input type="date" id="edit_date" name="date" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Author</label>
						<input type="text" id="edit_author" name="author" class="form-control" required>
					</div>
				</div>
				<div class="modal-footer">
				<input type="hidden" value="2" name="type">
					<input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancel">
					<button type="button" class="btn btn-warning" id="update">Update</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div id="deleteNews" class="modal fade">
	<div class="modal-dialog" style="width:60%" >
		<div class="modal-content">
			<form style="width:85%" >

				<div class="modal-header">
					<h3 class="modal-title"><b>Deletion</b></h3>
				</div>
				<div class="modal-body">
					<input type="hidden" id="delete_id" name="id" class="form-control">
					<p>Do you realy want to delete this article?</p>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-primary" data-dismiss="modal" value="Cancel">
					<button type="button" class="btn btn-danger" id="delete">Delete</button>
				</div>
			</form>
		</div>
	</div>
</div>

</body>
</html>
