<?php 
  include('header.php');
  $user = $_GET['user'];
?>
<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="h3 mb-4 page-title">

<?php 
include('connectdb.php');
$sql = "SELECT * FROM `user` WHERE id= ".$user."";
       			
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$i = 1;
  	while($row = $result->fetch_assoc()) {
  		
    echo ''.$row["username"].'';
                                    
  }
} else {
  echo "<script> alert('Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!') </script>";
}
$conn->close();

?>

              	
              </h2>
              <div class="row mt-5 align-items-center">
                <div class="col-md-3 text-center mb-5">
                  <div class="avatar avatar-xl">
<?php 
include('connectdb.php');
$sql = "SELECT * FROM `user` WHERE id= ".$user."";
       			
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$i = 1;
  	while($row = $result->fetch_assoc()) {
  		if($row["image"]!=''){
  			 echo '<img style="width:200px; height:200px;" src="./assets/avatars/'.$row["image"].'" alt="..." class="avatar-img rounded-circle">';
  		}else{
  			echo '<img style="width:200px; height:200px;" src="./assets/avatars/image-not-found.jpg" alt="..." class="avatar-img rounded-circle">';
  		}
   
                                    
  }
} else {
  echo "<script> alert('Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!') </script>";
}
$conn->close();

?>
                    
                  </div>
                </div>
                <div class="col">
                  <div class="row align-items-center">
                    <div class="col-md-7">
                      <h4 class="mb-1">
<?php 
include('connectdb.php');
$sql = "SELECT * FROM `user` WHERE id= ".$user."";
       			
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$i = 1;
  	while($row = $result->fetch_assoc()) {
  		
    echo ''.$row["fullname"].'';
                                    
  }
} else {
  echo "<script> alert('Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!') </script>";
}
$conn->close();

?>
                      </h4>
                      <p class="small mb-3"><span class="badge badge-dark">
<?php 
include('connectdb.php');
$sql = "SELECT * FROM `user` WHERE id= ".$user."";
       			
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$i = 1;
  	while($row = $result->fetch_assoc()) {
  		
    echo ''.$row["role"].'';
                                    
  }
} else {
  echo "<script> alert('Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!') </script>";
}
$conn->close();

?>
                  </span></p>
                    </div>
                  </div>
                  <div class="row mb-4">
                    <div class="col-md-7">
                      <p class="text-muted"> 
<?php 
include('connectdb.php');
$sql = "SELECT * FROM `user` WHERE id= ".$user."";
       			
$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$accot = '';
  	while($row = $result->fetch_assoc()) {
  		
    echo ''.$row["decription"].'';
    $accot = $row["username"];
                                    
  }
} else {
  echo "<script> alert('Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!') </script>";
}
$conn->close();

?>
                       </p>
                    </div>

                  </div>
                </div>
              </div>
              
              
              
            </div> <!-- /.col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->


        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="mb-2 page-title">All Etsy</h2>
              <p class="card-text">Lưu ý: Hiện tại, chưa có gì để lưu ý, khi nào có thể lưu ý thì để lưu ý ở đây. </p>
              <div class="row my-4">
                <!-- Small table -->
                <div class="col-md-12">
                  <div class="card shadow">
                    <div class="card-body">
                      <!-- table -->
                      <table class="table datatables" id="dataTable-1">
                        <thead>
                          <tr>
	                            <th>ID</th>
	                    <th></th>
	                    <th>Etsy Shop</th>
                      <th></th>
	                    <th>Status</th>
	                    
	                    
	                    <th>Info</th>
	                    
	                    <th>PO</th>
	                    
	                    <th>CC</th>
                      <th>VPS</th>
	                    <th>Date</th>
                      
	                    <th>Publisher</th>
	                    <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          
                            <?php
                            include 'connectdb.php';
                            $sqletsy = "SELECT * FROM `etsy` WHERE publisher='".$accot."'";

                            $resultetsy = $conn->query($sqletsy);
                            if ($resultetsy->num_rows > 0) {
                                
                                while ($rowetsy = $resultetsy->fetch_assoc()) {
                                    echo '
					                  <tr>
					                    <th scope="col">' .
                                        $row["id"] .
                                        '</th>
					                    <td><a href="editetsy.php?etsyname='.$rowetsy["etsyname"].'" ><i class="fe fe-eye fe-16"></i></a></td>
					                    <td id="ccnumber'.$row["etsyname"].'"><a target="_blank" href="https://www.etsy.com/shop/' .
                                        $rowetsy["etsyname"] .
                                        '">' .
                                        $rowetsy["etsyname"] .
                                        '</a> </td>
					                    <td>';
                                    if ($rowetsy["status"] == 'live') {
                                        echo '<span class="badge badge-pill badge-success">Live</span>';
                                    }if ($rowetsy["status"] == 'die') {
                                        echo '<span class="badge badge-pill badge-danger">Die</span>';
                                    }if ($rowetsy["status"] == 'NULL'){
                                    	echo '<span class="badge badge-pill badge-warning">Not Checked</span>';
                                    };
                                    echo '</td>

                              <td><a href="htmldom.php?shopname='.$rowetsy["etsyname"].'" onclick="';
                                    echo "CopyToClipboard('ccnumber" . $rowetsy["id"] . "')";
                                    echo ';return false;"><i class="fe fe-copy fe-16"></i></a></td>
					                    <td id="exdate'.$rowetsy["id"].'">';
					                    $sqlinfo = "SELECT * FROM `info` WHERE id='".$rowetsy["info"]."'";
					                    $resultinfo = $conn->query($sqlinfo);
					                    if ($resultinfo->num_rows > 0) {
		                      			while($rowinfo = $resultinfo->fetch_assoc()) {

		                      					echo '<a href="editinfo.php?id='.$rowinfo["id"].'">'.$rowinfo["fullname"].'</a>';
		                      			}} ;

                                    echo '
					                    </td>
					                    
					                    <td id="ccv'.$row["id"].'">';
					                    $sqlpo = "SELECT * FROM `po` WHERE id='".$rowetsy["po"]."'";
					                    $resultpo = $conn->query($sqlpo);
					                    if ($resultpo->num_rows > 0) {
		                      			while($rowpo = $resultpo->fetch_assoc()) {
		                      					echo '<a href="editpo.php?id='.$rowpo["id"].'">'.$rowpo["beneficiaryname"].'</a>';
		                      			}} ;

					                echo '
					                    </td>
					                    <td id="'.$row["cc"].'">';
                              $sqlcc = "SELECT * FROM `cc` WHERE id='".$rowetsy["cc"]."'";
                              $resultcc = $conn->query($sqlcc);
                              if ($resultcc->num_rows > 0) {
                                while($rowcc = $resultcc->fetch_assoc()) {
                                  echo'<a href="editcc.php?id='.$rowcc["id"].'">';
                                    echo $rowcc["ccnumber"];
                                    echo '</a>';
                                }} ;

                                    echo '</td>

					                    <td>';
					                    $sqlvps = "SELECT * FROM `vps` WHERE id='".$rowetsy["vps"]."'";
					                    $resultvps = $conn->query($sqlvps);
					                    if ($resultvps->num_rows > 0) {
		                      			while($rowvps = $resultvps->fetch_assoc()) {
                                    echo'<a href="editvps.php?id='.$rowvps["id"].'">';
                                    echo str_replace( '.us-east-2.compute.amazonaws.com', '', $rowvps["vpsname"] );
		                      					 
                                    echo '</a>';
		                      			}}else{
                                  echo '<td></td>';
                                } ;

                                    echo '</td>
                                    
                      					<td>'.$rowetsy["date"].'</td>
                                  <td>'.$rowetsy["publisher"].'</td>
                          
                                      <td>
                                      	<button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          <a class="dropdown-item" href="#">Edit</a>
                                          <a class="dropdown-item" href="downloadetsy.php?id=' .
                                        $rowetsy["id"] .
                                        '">Assign</a>
                                        </div>
                                      </td>
                                    </tr>


                                    ';
                                }
                            } else {
                                echo "<script> alert('Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!') </script>";
                            }
                            $conn->close();
                            ?>
                            
                          
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div> <!-- simple table -->
              </div> <!-- end section -->
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        <div class="modal fade modal-notif modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Notifications</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div class="list-group list-group-flush my-n3">
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-box fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Package has uploaded successfull</strong></small>
                        <div class="my-0 text-muted small">Package is zipped and uploaded</div>
                        <small class="badge badge-pill badge-light text-muted">1m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-download fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Widgets are updated successfull</strong></small>
                        <div class="my-0 text-muted small">Just create new layout Index, form, table</div>
                        <small class="badge badge-pill badge-light text-muted">2m ago</small>
                      </div>
                    </div>
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-inbox fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Notifications have been sent</strong></small>
                        <div class="my-0 text-muted small">Fusce dapibus, tellus ac cursus commodo</div>
                        <small class="badge badge-pill badge-light text-muted">30m ago</small>
                      </div>
                    </div> <!-- / .row -->
                  </div>
                  <div class="list-group-item bg-transparent">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="fe fe-link fe-24"></span>
                      </div>
                      <div class="col">
                        <small><strong>Link was attached to menu</strong></small>
                        <div class="my-0 text-muted small">New layout has been attached to the menu</div>
                        <small class="badge badge-pill badge-light text-muted">1h ago</small>
                      </div>
                    </div>
                  </div> <!-- / .row -->
                </div> <!-- / .list-group -->
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-block" data-dismiss="modal">Clear All</button>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body px-5">
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-success justify-content-center">
                      <i class="fe fe-cpu fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Control area</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-activity fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Activity</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-droplet fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Droplet</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-upload-cloud fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Upload</p>
                  </div>
                </div>
                <div class="row align-items-center">
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-users fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Users</p>
                  </div>
                  <div class="col-6 text-center">
                    <div class="squircle bg-primary justify-content-center">
                      <i class="fe fe-settings fe-32 align-self-center text-white"></i>
                    </div>
                    <p>Settings</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
<?php
  include('footer.php')
?>