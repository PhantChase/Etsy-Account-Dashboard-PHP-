<?php 
	$id = $_GET['id'];
	if (isset($_POST['addcc']))
        {
        include('connectdb.php');
          
        //Lấy dữ liệu nhập vào
        $ccnumber = trim(addslashes($_POST['ccnumber']));
        $month = trim(addslashes($_POST['month']));
        $year = addslashes(trim($_POST['year']));
        $ccv = addslashes(trim($_POST['ccv']));
        $zip = addslashes(trim($_POST['zip']));
        $dateget = addslashes(trim($_POST['date']));
        $date = date("Y-m-d", strtotime($dateget) );
        
        
        $sql = "UPDATE `cc` SET `ccnumber` = '".$ccnumber."', `month` = '".$month."', `year` = '".$year."', `ccv` = '".$ccv."', `zip` = '".$zip."', `date` = '".$date."' WHERE `cc`.`id` = ".$id."";

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
            <div class="col-12">
            	<?php
                include('connectdb.php');
                $sql = "SELECT * FROM `cc` WHERE id='".$id."'";
                $result = $conn->query($sql);
               if ($result->num_rows > 0) {
                  
                  while($row = $result->fetch_assoc()) {
                    
                    echo '
              <h2 class="page-title">'.$row["ccnumber"].'</h2>
              <p class="text-muted">Demo for form control styles, layout options, and custom components for creating a wide variety of forms.</p>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">'.$row["id"].'</strong>
                    </div>
                    <div class="card-body">
                      <form class="form-inline" action = "" method = "post">
                        <label class="sr-only" for="inlineFormInputName2">CC Name</label>
                        <input type="text" name="ccnumber" value="'.$row["ccnumber"].'" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="CC Number"required>

                        
                        <div class="input-group mb-2 mr-sm-2">
                        

                        <select class="custom-select my-1 mr-sm-2" name="month" id="inlineFormCustomSelectPref">
                          <option value="'.$row["month"].'" selected>'.$row["month"].'</option>
                          <option value="01">01</option>
						    <option value="02">02</option>
						    <option value="03">03</option>
						    <option value="04">04</option>
						    <option value="05">05</option>
						    <option value="06">06</option>
						    <option value="07">07</option>
						    <option value="08">08</option>
						    <option value="09">09</option>
						    <option value="10">10</option>
						    <option value="11">11</option>
						    <option value="12">12</option>
                        </select>
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                        

                        <select class="custom-select my-1 mr-sm-2" name="year" id="inlineFormCustomSelectPref">
                          <option value="'.$row["year"].'"  selected hidden >'.$row["year"].'</option>
						<option value="2021">2021</option>
                        <option value="2022">2022</option>
                        <option value="2023">2023</option>
                        <option value="2024">2024</option>
                        <option value="2025">2025</option>
                        <option value="2026">2026</option>
                        <option value="2027">2027</option>
                        <option value="2028">2028</option>
                        <option value="2029">2029</option>
                        <option value="2030">2030</option>
                        <option value="2031">2031</option>
                        <option value="2032">2032</option>
                        <option value="2033">2033</option>
                        <option value="2034">2034</option>
                        <option value="2035">2035</option>
                        <option value="2036">2036</option>
                        <option value="2037">2037</option>
                        <option value="2038">2038</option>
                        <option value="2039">2039</option>
                        <option value="2040">2040</option>
                        </select>
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                          
                          <input type="text" maxlength="4" name="ccv"  class="form-control" value="'.$row["ccv"].'" id="inlineFormInputGroupUsername2" placeholder="CCV" style="width: 80px;" required>
                      </div>
                          <div class="input-group mb-2 mr-sm-2">
                          <input type="text" value="'.$row["zip"].'" class="form-control" name="zip" id="validationCustom05" placeholder="ZIP" required="">
                        </div>
                        <div class="input-group mb-2 mr-sm-2 input-group">
                        <input type="text" name="date" value="'.date("m/d/Y", strtotime($row["date"])).'" class="form-control drgpicker" id="datepicker" value="" aria-describedby="button-addon2">
                        <div class="input-group-append">
                              <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                        </div>
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                          <input type="text" value="'.$row["etsyname"].'" class="form-control" disabled id="validationCustom05" placeholder="ZIP" required="">
                        </div>
                      
                        
                        <button type="submit"  name="addcc" class="btn btn-primary mb-2">Submit</button>
                      </form>

                    </div>

                  </div>
                </div>
              </div> <!-- end section -->
              ';}} else {
                  echo "><script> alert('Info không tồn tại, vui lòng thử lại!'); </script>";

                }

                $conn->close(); ?>

              
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
console.log(document.execCommand('copy'));
document.execCommand('copy');
window.getSelection().removeAllRanges();

}
$('#datepicker').datepicker();
function today(){
    var d = new Date();
    var curr_date = d.getDate();
    var curr_month = d.getMonth() + 1;
    var curr_year = d.getFullYear();
    document.write(curr_date + "-" + curr_month + "-" + curr_year);
}
</script>

<?php
  include('footer.php')
?>