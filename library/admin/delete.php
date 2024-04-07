<?php
session_start();

include('includes/config.php');

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		$sql = "DELETE FROM upload WHERE id = '$id'";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Course deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: delete.php');
	
?>