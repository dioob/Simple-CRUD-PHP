<?php  
include('repo.php'); 

if (isset($_GET['edit'])) {
	$id = $_GET['edit'];
	$update = true;
	$record = mysqli_query($db, "SELECT * FROM relasi WHERE id=$id");

	if ($record && count($record) == 1 ) {
		$n = mysqli_fetch_array($record);
		$name = $n['nama'];
		$type = $n['tipe'];
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ehem PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>

	<?php $results = mysqli_query($db, "SELECT * FROM relasi"); ?>

	<table>
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Type</th>
				<th colspan="2">Action</th>
			</tr>
		</thead>
	
		<?php while ($row = mysqli_fetch_array($results)) { ?>
			<tr>
				<td><?php echo $row['id']; ?></td>
				<td><?php echo $row['nama']; ?></td>
				<td><?php echo $row['tipe']; ?></td>
				<td>
					<a href="index.php?edit=<?php echo $row['id']; ?>" class="edit_btn" >Edit</a>
				</td>
				<td>
					<a href="repo.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
				</td>
			</tr>
		<?php } ?>
	</table>


	<form method="post" action="repo.php" >
	<input type="hidden" name="id" value="<?php echo $id; ?>">

		<div class="input-group">
			<label>Name</label>
			<input type="text" name="nama" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Type</label>
			<input type="text" name="tipe" value="<?php echo $type; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
				<button class="btn" type="submit" name="update" style="background: #556B2F;" >Update</button>
			<?php else: ?>
				<button class="btn" type="submit" name="save" >Save</button>
			<?php endif ?>
		</div>
	</form>
</body>

<body>
<?php if (isset($_SESSION['message'])): ?>
	<div class="msg">
		<?php 
			echo $_SESSION['message']; 
			unset($_SESSION['message']);
		?>
	</div>
<?php endif ?>

</html>