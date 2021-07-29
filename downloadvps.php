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
	$sql = "SELECT * FROM `vps` WHERE id ='".$_GET['id']."'";
 	$result = $conn->query($sql);
   	if ($result->num_rows > 0) {
      	while($row = $result->fetch_assoc()) {

			$myfile = fopen("assets/VPS/".$row["id"].".rdp", "w") or die("Unable to open file!");
			$txt = "auto connect:i:1\n";
			fwrite($myfile, $txt);
			$txt = "full address:s:".$row["vpsname"]."\n";
			fwrite($myfile, $txt);
			$txt = "username:s:Administratorrr";
			fwrite($myfile, $txt);
			fclose($myfile);
			$filepath = "assets/VPS/".$row["id"].".rdp";
			if(file_exists($filepath)) {
		        header('Content-Description: File Transfer');
		        header('Content-Type: application/octet-stream');
		        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');
		        header('Expires: 0');
		        header('Cache-Control: must-revalidate');
		        header('Pragma: public');
		        header('Content-Length: ' . filesize($filepath));
		        flush(); // Flush system output buffer
		        readfile($filepath);
		        exit;
		    }

      	}
        } else {
          echo "<script> alert('VPS bị lỗi hoặc gì đó, vui lòng thử lại sau!') </script>";
        }
        $conn->close();
?>