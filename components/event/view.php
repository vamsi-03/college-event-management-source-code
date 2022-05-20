<?php
$path = $_SERVER['DOCUMENT_ROOT'];
$path .= "/events/";

require_once($path . 'connect.php');

// Initialize the session
session_start();

if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['role'] == 'admin')) {
	echo "Unauthorized Access";
	return;
}

$ReadSql = "SELECT * FROM `events`";
$res = mysqli_query($connection, $ReadSql);

?>

<?php require($path . 'templates/header.php') ?>
<div class="container-fluid my-4">
	<div class="row my-2">
		<h2>Event Management System - Events</h2>
		<a href="add.php"><button type="button" class="btn btn-primary ml-4 pl-2">Add New</button></a>
		
	</div>
	<table class="table ">
		<thead>
			<tr>
				<th>Name</th>
				<th>Category</th>
				<th>Start Date</th>
				<th>End Date</th>
				<th>coordinator name</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while ($r = mysqli_fetch_assoc($res)) {
			?>
				<tr>
					
					<td><?php echo $r['name']; ?></td>
					<td><?php echo $r['category']; ?></td>
					<td><?php echo $r['start_date']; ?></td>
					<td><?php echo $r['end_date']; ?></td>
					<td><?php echo $r['coordinator']; ?></td>
					<td>
						<a href="update.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-info">Edit</button></a>
						<a href="delete.php?id=<?php echo $r['id']; ?>"><button type="button" class="btn btn-danger">  Delete</button></a>
								

							</div>
						</div>

					</td>
				</tr>
			<?php } ?>
		</tbody>
	</table>
</div>



<?php require($path . 'templates/indexfooter.php') ?>