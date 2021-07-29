<?php
    session_start();
    if(!isset($_SESSION['username']) || $_SESSION['role'] == '') {
        
       header('Location: auth-login.php');
    }else{
        // echo '<script>alert("bạn đăng nhập với tài khoản '.$_SESSION['username'].'")</script>';
    }
?>
<?php
	$id = $_GET['id'];
	include('connectdb.php');
	
	$sql = "DELETE FROM `info` WHERE `info`.`id` = ".$id."";

	if ($conn->query($sql) === TRUE) {
	  echo "Record deleted successfully";
	  header('Location: info.php');
	} else {
	  echo "Error deleting record: " . $conn->error;
	}

	$conn->close();
?>