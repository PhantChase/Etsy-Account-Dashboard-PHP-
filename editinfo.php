
<?php 
	$id = $_GET['id'];
	if (isset($_POST['addinfo']))
        {
        include('connectdb.php');
        
        //Lấy dữ liệu nhập vào
        $fullname = ucwords(trim(addslashes(strtolower($_POST['fullname']))));
        
        $datefirst = addslashes(trim($_POST['date']));
        $date = date("Y-m-d", strtotime($datefirst) );

        $ssn = addslashes(trim($_POST['ssn']));
        $email = addslashes(strtolower($_POST['email']));
        $phone = addslashes($_POST['phone']);
        $address = trim(ucwords(addslashes(strtolower($_POST['address']))));
        $city = trim(ucwords(addslashes(strtolower($_POST['city']))));
        $state = addslashes($_POST['state']);
        $zipcode = addslashes($_POST['zipcode']);
        
        if (isset($_POST['used'])) {
        	$used = 1;
        }else{
        	$used = 0;
        }
        
        $sql = "UPDATE `info` SET  `fullname` = '".$fullname."', `ssn` = '".$ssn."', `mail` = '".$email."', `phone` = '".$phone."', `address` = '".$address."', `city` = '".$city."', `dob` = '".$date."', `state` = '".$state."', `zipcode` = '".$zipcode."' , `used` = '".$used."' WHERE `info`.`id` = ".$id.";";

          if ($conn->query($sql) === TRUE) {
            
          } else {
            echo "Error updating record: " . $conn->error;
          }   

        }

?>
<?php 
  include('header.php');
?>

<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <d
                <?php
                include('connectdb.php');
                                $sql = "SELECT * FROM `info` WHERE id='".$id."'";
                                $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
               <div class="col-12">
              <h2 class="page-title">'.$row["fullname"].'</h2>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Advanced Validation</strong>
                    </div>
                    <div class="card-body">
                      <form class="needs-validation" novalidate action = "" method = "post">
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Fullname</label>
                            <input type="text" class="form-control" id="validationCustom3" name="fullname" value="'.$row["fullname"].'" required>
                            <div class="valid-feedback"> Looks good! </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Etsy Shop</label>
                            <input type="text" class="form-control" id="validationCustom3" disabled name="fullname" value="'.$row["etsyname"].'">
                            <div class="valid-feedback"> Looks good! </div>
                          </div>
                          
                        </div> <!-- /.form-row -->
                        <div class="form-row mb-3">
                          <div class="col-md-3 mb-3">
                            <label for="date-input1">Date Picker</label>
                            <div class="input-group">
                              <input type="text" name="date" class="form-control drgpicker" id="date-input1" value="'.date("m/d/Y", strtotime($row["dob"])).'" aria-describedby="button-addon2">
                              <div class="input-group-append">
                                <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-2 mb-3">
                            <label for="custom-phone">SSN</label>
                            <input class="form-control " name="ssn" value="'.$row["ssn"].'" id="custom-phone" maxlength="9" required>
                            <div class="invalid-feedback"> Please enter a correct SSN </div>
                          </div>
                          <div class="col-md-5 mb-3">
                            <label for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" value="'.$row["mail"].'" name="email" aria-describedby="emailHelp1" required>
                            <div class="invalid-feedback"> Please use a valid email </div>
                          </div>
                          <div class="col-md-2 mb-3">
                            <label for="custom-phone">US Telephone</label>
                            <input value="'.$row["phone"].'" class="form-control input-phoneus" name="phone" id="custom-phone" maxlength="14" required>
                            <div class="invalid-feedback"> Please enter a correct phone </div>
                            </div>
                        </div>
                        <!-- /.form-row -->
                        <div class="form-group mb-3">
                          <label for="address-wpalaceholder">Address</label>
                          <input type="text" id="address-wpalaceholder" name="address" class="form-control" value="'.$row["address"].'" placeholder="Enter your address">
                          <div class="valid-feedback"> Looks good! </div>
                          <div class="invalid-feedback"> Badd address </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom33">City</label>
                            <input type="text" value="'.$row["city"].'" class="form-control" name="city" id="validationCustom33" required>
                            <div class="invalid-feedback"> Please provide a valid city. </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="validationSelect2">State</label>
                            <select class="form-control select2" name="state" id="validationSelect2" required>
                              <option value="'.$row["state"].'">'.$row["state"].'</option>
                              	<option value="AL">Alabama</option>
								<option value="AK">Alaska</option>
								<option value="AZ">Arizona</option>
								<option value="AR">Arkansas</option>
								<option value="CA">California</option>
								<option value="CO">Colorado</option>
								<option value="CT">Connecticut</option>
								<option value="DE">Delaware</option>
								<option value="DC">District Of Columbia</option>
								<option value="FL">Florida</option>
								<option value="GA">Georgia</option>
								<option value="HI">Hawaii</option>
								<option value="ID">Idaho</option>
								<option value="IL">Illinois</option>
								<option value="IN">Indiana</option>
								<option value="IA">Iowa</option>
								<option value="KS">Kansas</option>
								<option value="KY">Kentucky</option>
								<option value="LA">Louisiana</option>
								<option value="ME">Maine</option>
								<option value="MD">Maryland</option>
								<option value="MA">Massachusetts</option>
								<option value="MI">Michigan</option>
								<option value="MN">Minnesota</option>
								<option value="MS">Mississippi</option>
								<option value="MO">Missouri</option>
								<option value="MT">Montana</option>
								<option value="NE">Nebraska</option>
								<option value="NV">Nevada</option>
								<option value="NH">New Hampshire</option>
								<option value="NJ">New Jersey</option>
								<option value="NM">New Mexico</option>
								<option value="NY">New York</option>
								<option value="NC">North Carolina</option>
								<option value="ND">North Dakota</option>
								<option value="OH">Ohio</option>
								<option value="OK">Oklahoma</option>
								<option value="OR">Oregon</option>
								<option value="PA">Pennsylvania</option>
								<option value="RI">Rhode Island</option>
								<option value="SC">South Carolina</option>
								<option value="SD">South Dakota</option>
								<option value="TN">Tennessee</option>
								<option value="TX">Texas</option>
								<option value="UT">Utah</option>
								<option value="VT">Vermont</option>
								<option value="VA">Virginia</option>
								<option value="WA">Washington</option>
								<option value="WV">West Virginia</option>
								<option value="WI">Wisconsin</option>
								<option value="WY">Wyoming</option>
                            </select>
                            <div class="invalid-feedback"> Please select a valid state. </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="custom-zip">Zip code</label>
                            <input class="form-control input-zip" value="'.$row["zipcode"].'" name="zipcode" id="custom-zip" autocomplete="off" maxlength="9" required>
                            <div class="invalid-feedback"> Please provide a valid zip. </div>
                          </div>
                          <div class="form-check">
                          <div class="custom-control custom-switch">';
                          if($row["used"]=='1'){
                          	echo '<input type="checkbox" name="used" class="custom-control-input" id="c5" checked>';
                          }else{
                          	echo '<input type="checkbox" name="used" class="custom-control-input" id="c5">';
                          }
                        
                        echo'
                        <label class="custom-control-label" for="c5"></label>
                      </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="addinfo">Submit form</button>
                        </div>
                        
                        
                        
                       
                        


                      </form>
                    </div> <!-- /.card-body -->
                  </div> <!-- /.card -->
                </div> <!-- /.col -->
              </div> <!-- end section -->';}
                                } else {
                                  echo "><script> alert('Info không tồn tại, vui lòng thử lại!'); </script>";

                                }
                                $conn->close(); ?>
            </div> <!-- /.col-12 col-lg-10 col-xl-10 -->
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