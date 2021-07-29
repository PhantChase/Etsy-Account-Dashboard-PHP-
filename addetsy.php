<?php 
  include('header.php');

?>
<?php 
  if (isset($_POST['addetsy']))
        {
        include('connectdb.php');
          
        //Lấy dữ liệu nhập vào
        $etsyname = trim(addslashes($_POST['etsyname']));
        $info = trim(addslashes($_POST['info']));
        $po = addslashes(trim($_POST['po']));
        $cc = addslashes(trim($_POST['cc']));
        $vps = addslashes(trim($_POST['vps']));
        $dateget = addslashes(trim($_POST['date']));
        $date = date("Y-m-d", strtotime($dateget) );
        
        $sql = "INSERT INTO `etsy` (`id`, `etsyname`, `vps`, `info`, `po`, `cc`, `status`, `date`, `publisher`) VALUES (NULL, '".$etsyname."', '".$vps."', '".$info."', '".$po."', '".$cc."', 'NULL', '".$date."', '".$_SESSION['username']."')";
        if (mysqli_query($conn, $sql)) {
          $sqlinfo = "UPDATE info SET used='1', etsyname='".$etsyname."' WHERE id=".$info."";
          if ($info != '') {
            if ($conn->query($sqlinfo) === TRUE && $info != '') {
             
            } else {
              echo "Error updating info: " . $conn->error;
            }
          }     
          $sqlpo = "UPDATE po SET used='1', etsyname='".$etsyname."' WHERE id=".$po."";
          if ($po != '') {
            if ($conn->query($sqlpo) === TRUE  && $po != '') {
              
            } else {
              echo "Error updating po: " . $conn->error;
            }
          }
          $sqlcc = "UPDATE cc SET used='1', etsyname='".$etsyname."' WHERE id=".$cc."";
          if ($cc != '') {
            if ($conn->query($sqlcc) === TRUE  ) {
              
            } else {
              echo "Error updating cc: " . $conn->error;
            }  
          }
          $sqlvps = "UPDATE vps SET used='1', etsyname='".$etsyname."' WHERE id=".$vps."";
          if ($vps != '') {
            if ($conn->query($sqlvps) === TRUE  ) {
              
            } else {
              echo "Error updating cc: " . $conn->error;
            }  
          }
                    
        } else {
          echo "Error: " . $sql . " " . mysqli_error($conn);
        }
          mysqli_close($conn);
      }
        

?>


<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <h2 class="page-title">Add Etsy Shop</h2>
              <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-body">
                      <p class="mb-3"><strong>Etsy form</strong></p>
                      <form class="" action = "" method = "post">
                      <div class="input-group mb-3">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">@</span>
                        </div>
                        <input type="text" name="etsyname" class="form-control" placeholder="Tên Shop" aria-label="Username" aria-describedby="basic-addon1">
                      </div>
                      
                      
                      <label for="simple-select2">VPS</label>
                      <select class="form-control " name="vps"  id="simple-select2">
                        <option disabled selected></option>
                        <optgroup label="Chưa dùng">
                          <?php 
                          include('connectdb.php');
                          $sql = "SELECT * FROM `vps` WHERE used='0'";
                          $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                          <option value="'.$row["id"].'">'.$row["vpsname"].'</option>
                          '; }}?>
                        </optgroup>
                        <optgroup label="Đã dùng">
                          <?php 
                          include('connectdb.php');
                          $sql = "SELECT * FROM `vps` WHERE used='1'";
                          $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                          <option value="'.$row["id"].'">'.$row["vpsname"].'</option>
                          '; }}?>
                        </optgroup>
                       
                      </select>
                      <label for="simple-select2">Info</label>
                      <select class="form-control " name="info" id="simple-select2">
                        <option value="" selected></option>
                        <optgroup label="Chưa dùng">
                          <?php 
                          include('connectdb.php');
                          $sql = "SELECT * FROM `info` WHERE used='0'";
                          $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                          <option value="'.$row["id"].'">'.$row["fullname"].'</option>
                          '; }}?>
                        </optgroup>
                        <optgroup label="Đã dùng">
                          <?php 
                          include('connectdb.php');
                          $sql = "SELECT * FROM `info` WHERE used='1'";
                          $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                          <option value="'.$row["id"].'">'.$row["fullname"].'</option>
                          '; }}?>
                          
                        </optgroup>
                      </select>

                      <label for="simple-select2">PO</label>
                      <select class="form-control " name="po"  id="simple-select2">
                        <option value="" selected></option>
                        <optgroup label="Chưa dùng">
                          <?php 
                          include('connectdb.php');
                          $sql = "SELECT * FROM `po` WHERE used='0'";
                          $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                          <option value="'.$row["id"].'">'.$row["email"].'</option>
                          '; }}?>
                        </optgroup>
                        <optgroup label="Đã dùng">
                          <?php 
                          include('connectdb.php');
                          $sql = "SELECT * FROM `po` WHERE used='1'";
                          $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                          <option value="'.$row["id"].'">'.$row["email"].'</option>
                          '; }}?>
                        </optgroup>
                      </select>
                       
                      <label for="simple-select2">CC</label>
                      <select class="form-control " name="cc"  id="simple-select2">
                        <option value="" selected></option>
                        <optgroup label="Chưa dùng">
                          <?php 
                          include('connectdb.php');
                          $sql = "SELECT * FROM `cc` WHERE used='0'";
                          $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                          <option value="'.$row["id"].'">'.$row["ccnumber"].'</option>
                          '; }}?>
                        </optgroup>
                        <optgroup label="Đã dùng">
                          <?php 
                          include('connectdb.php');
                          $sql = "SELECT * FROM `cc` WHERE used='1'";
                          $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                          <option value="'.$row["id"].'">'.$row["ccnumber"].'</option>
                          '; }}?>
                        </optgroup>
                       
                      </select>

                      <label for="date-input1">Date Picker</label>
                      <div class="input-group">
                        <input type="text" name="date"  class="form-control drgpicker" id="date-input1" value="" aria-describedby="button-addon2">
                        <div class="input-group-append">
                          <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                        </div>
                      </div>
                      <label for="date-input1"></label>
                  	<div class="mb-12">
                  		<button type="submit"  name="addetsy" class="btn mb-2 btn-primary"><span class="fe fe-arrow-right fe-16 mr-2"></span>Thêm</button>
              		</div>
                </form>
                    </div>
                  </div> 
                </div> <!-- /.col -->
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
      </main> <!-- main -->

<?php
  include('footer.php')
?>