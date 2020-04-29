<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'dbtest');

	// initialize variables
	$name = "";
	$type = "";
	$id = "";
	$update = false;

	if (isset($_POST['save'])) {
        $id = $_POST['id'];
		$name = $_POST['nama'];
		$type = $_POST['tipe'];

		mysqli_query($db, "INSERT INTO relasi (id, nama, tipe) VALUES ('$id','$name', '$type')"); 
		$_SESSION['message'] = "Data Saved"; 
		header('location: index.php');
    }
    
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['nama'];
        $type = $_POST['tipe'];
    
        mysqli_query($db, "UPDATE relasi SET nama='$name', tipe='$type' WHERE id=$id");
        $_SESSION['message'] = "Data Updated!"; 
        header('location: index.php');
    }

    if (isset($_GET['del'])) {
        $id = $_GET['del'];
        mysqli_query($db, "DELETE FROM relasi WHERE id=$id");
        $_SESSION['message'] = "Data Deleted!"; 
        header('location: index.php');
    }