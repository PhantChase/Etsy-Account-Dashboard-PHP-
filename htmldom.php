<?php
    session_start();
    if(!isset($_SESSION['username']) || $_SESSION['role'] == '') {
       header('Location: auth-login.php');
    }else{
        // echo '<script>alert("bạn đăng nhập với tài khoản '.$_SESSION['username'].'")</script>';
    }
?>
<?php
// example of how to use advanced selector features
set_error_handler(
  function ($err_severity, $err_msg, $err_file, $err_line, array $err_context) {
    // do not throw an exception if the @-operator is used (suppress)
    if (error_reporting() === 0) return false;

    throw new ErrorException( $err_msg, 0, $err_severity, $err_file, $err_line );
  },
  E_WARNING
);

$shopname = $_GET['shopname'];

include('connectdb.php');

include('simplehtmldom_1_9_1/simple_html_dom.php');

// -----------------------------------------------------------------------------
try {
	$html = file_get_html('https://www.etsy.com/shop/'.$shopname.'');
	//to fetch all hyperlinks from a webpage
	$links = array();
	foreach($html->find('a') as $a) {
	 $links[] = $a->href;
	}

	if($links[350] == 'https://www.etsy.com/your/purchases/select_order?ref=order-help-frozen-shop-page-alert'){
		$sqlinfo = "UPDATE etsy SET status='die' WHERE etsyname='".$shopname."'";

	    if ($conn->query($sqlinfo) === TRUE) {
	            echo"die";
	            header('Location: alletsy.php');
	            
				header('Location: alletsy.php');
	    } else {
	        echo "Error updating record: " . $conn->error;
	    } 
	}else{
		$sqlinfo = "UPDATE etsy SET status='live' WHERE etsyname='".$shopname."'";

	    if ($conn->query($sqlinfo) === TRUE) {
	            echo "live";
	            header('Location: alletsy.php');
	            
				
	    } else {
	        echo "Error updating record: " . $conn->error;
	    } 
	}
} catch (Exception $e) {
    header('Location: alletsy.php');
    
}


?>