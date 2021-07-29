
<?php 
  include('header.php');
?>

      
      <main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="mb-2 page-title">All CC</h2>
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
	                    <th>CC Number</th>
	                    <th>Status</th>
	                    
	                    <th></th>
	                    <th>Expiration date</th>
	                    <th></th>
	                    <th>CCV</th>
	                    <th></th>
	                    <th>ZIP</th>
	                    <th>Date</th>
	                    <th>Ets Name</th>
	                    <th>Action</th>
                            
                          </tr>
                        </thead>
                        <tbody>
                          
                            <?php 
                            include('connectdb.php');
       				$sql = "SELECT * FROM `cc` ORDER BY id DESC";
       			
                    $result = $conn->query($sql);
                   	if ($result->num_rows > 0) {
                   		$i = 1;
                      	while($row = $result->fetch_assoc()) {
                      		
                        echo '
                  <tr>
                    <th scope="col">'.$row["id"].'</th>
                    <td><a href="#" onclick="'; echo"CopyToClipboard('ccnumber".$row["id"]."')"; echo ';return false;"><i class="fe fe-copy fe-16"></i></a></td>
                    <td id="ccnumber'.$row["id"].'"><a href="editcc.php?id='.$row["id"].'">'.$row["ccnumber"].'</a> </td>
                    <td>'; if($row["etsyname"] == ''){echo '<span class="badge badge-pill badge-success">Chưa dùng</span>';}else{echo '<span class="badge badge-pill badge-danger">Đã dùng</span>';}; echo'</td>
                    <td><a href="#" onclick="'; echo"CopyToClipboard('exdate".$row["id"]."')"; echo ';return false;"><i class="fe fe-copy fe-16"></i></a></td>
                    <td id="exdate'.$row["id"].'">'.$row["month"].'/'.$row["year"].'</td>
                    <td><a href="#" onclick="'; echo"CopyToClipboard('ccv".$row["id"]."')"; echo ';return false;"><i class="fe fe-copy fe-16"></i></a></td>
                    <td id="ccv'.$row["id"].'">'.$row["ccv"].'</td>
                    <td><a href="#" onclick="'; echo"CopyToClipboard('zip".$row["id"]."')"; echo ';return false;"><i class="fe fe-copy fe-16"></i></a></td>
                    <td id="zip'.$row["id"].'">'.$row["zip"].'</td>
                    <td>'.$row["date"].'</td>
                    <td><a href="editetsy.php?etsyname='.$row["etsyname"].'">'.$row["etsyname"].'</td>
                    ';

                    echo'
                      
                    
                                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                          <span class="text-muted sr-only">Action</span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                          <a class="dropdown-item" href="#">Edit</a>
                                          <a class="dropdown-item" href="#">Remove</a>
                                          <a class="dropdown-item" href="downloadvps.php?id='.$row["id"].'">Assign</a>
                                        </div>
                                      </td>
                                    </tr>


                                    '



                                    ;
                                    
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
      <script>
function CopyToClipboard(id)
{
var r = document.createRange();
r.selectNode(document.getElementById(id));
window.getSelection().removeAllRanges();
window.getSelection().addRange(r);
document.execCommand('copy');
window.getSelection().removeAllRanges();
}
</script>

<?php
  include('footer.php')
?>