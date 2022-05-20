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

if (isset($_POST) & !empty($_POST)) {
	$name = ($_POST['name']);
	$detail = ($_POST['description']);
	$category = ($_POST['category']);
	$coordinator = ($_POST['coordinator']);
	$start_date = ($_POST['start_date']);
	$end_date = ($_POST['end_date']);
	
	// Execute query
	$query = "INSERT INTO `events` (name, description, category, coordinator, start_date, end_date) 
		VALUES ('$name', '$detail', '$category', '$coordinator', '$start_date', '$end_date')";
	$res = mysqli_query($connection, $query);
	if ($res) {
		header('location: view.php');
	} else {
		$fmsg = "Failed to Insert data.";
		print_r($res);
		// print_r($res->error_list);
	}
}
?>

<?php require_once($path . 'templates/header.php') ?>

<div class="container">
	<?php if (isset($fmsg)) { ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
	<h2 class="my-4">Add New Event</h2>
	<form method="post" enctype="multipart/form-data">
		<div class="form-group">
			<label>Name</label>
			<input type="text" class="form-control" name="name" value="" required />
		</div>
		<div class="form-group">
			<label>Description</label>
			<input type="text" class="form-control" name="description" value="" required />
		</div>
		<div class="form-group">
			<label>Category: </label>
			<select name="category">
				<?php
				$getCategories = "SELECT * FROM `categories`";
				$res = mysqli_query($connection, $getCategories);
				while ($r = mysqli_fetch_assoc($res)) { ?>
					<option value="<?= $r['name'] ?>"><?= $r['name'] ?></option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label>coordinator</label>
			<input type="text" class="form-control" name="coordinator" value="" />
		</div>
		<div class="form-group">
			<label>Start Date</label>
			<input type="date" class="form-control" name="start_date" value="" />
		</div>
		<div class="form-group">
			<label>End Date</label>
			<input type="date" class="form-control" name="end_date" value="" />
		</div>
		<input type="submit" class="btn btn-primary" value="Add Event"  name="submit"/>
	</form>
</div>
<?php
if(isset($_POST['submit']))
{
  
    if($conn=mysqli_connect('localhost','root','','events_db'))
	 {
		$e=$_POST['name'];

		
	   $q="SELECT * FROM `users`";  
	   $r=mysqli_query($conn,$q);
       while($w=mysqli_fetch_assoc($r))
	   {
		   $to=$w['email'];
		   $subject = 'Events';
		   $content = $_POST['name']." event has been succesfully added plese check the event details in web-app ";
		   $headers = "From: Your-Email\r\n";
		   mail($to, $subject, $content, $headers);
		   
		   
		  }
	   echo "<h2><b>Succesfully added the event<br>Notifications sent to all!!!</b></h2>";
	}
}


?>

<?php require_once($path . 'templates/indexfooter.php') ?>