<?php 
  include('header.php');
?>
<?php 
	$etsyname = $_GET['etsyname'];

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
        
        $sql = "UPDATE `info` SET  `fullname` = '".$fullname."', `ssn` = '".$ssn."', `mail` = '".$email."', `phone` = '".$phone."', `address` = '".$address."', `city` = '".$city."', `dob` = '".$date."', `state` = '".$state."', `zipcode` = '".$zipcode."' , `used` = '".$used."' WHERE `info`.`etsyname` = '".$etsyname."';";

          if ($conn->query($sql) === TRUE) {
            
          } else {
            echo "Error updating record: " . $conn->error;
          }   

        }

?>
<?php 
  if (isset($_POST['changenameetsy']))
        {
        include('connectdb.php');
          
        //Lấy dữ liệu nhập vào
        $changeetsyname = trim(addslashes($_POST['changeetsyname']));
        
        

        $sqlchangenameetsy = "UPDATE etsy SET etsyname='".$changeetsyname."' WHERE etsyname='".$etsyname."'";
          
            if ($conn->query($sqlchangenameetsy) === TRUE && $changeetsyname != '') {
              $sqlinfo = "UPDATE info SET etsyname='".$changeetsyname."' WHERE etsyname='".$etsyname."'";
              
                if ($conn->query($sqlinfo) === TRUE ) {
                 
                } else {
                  echo "Error updating info: " . $conn->error;
                }
                  
              $sqlpo = "UPDATE po SET etsyname='".$changeetsyname."' WHERE etsyname='".$etsyname."'";
              
                if ($conn->query($sqlpo) === TRUE ) {
                  
                } else {
                  echo "Error updating po: " . $conn->error;
                }
              
              $sqlcc = "UPDATE cc SET etsyname='".$changeetsyname."' WHERE etsyname='".$etsyname."'";
              
                if ($conn->query($sqlcc) === TRUE  ) {
                  
                } else {
                  echo "Error updating cc: " . $conn->error;
                }  
              
              $sqlvps = "UPDATE vps SET etsyname='".$changeetsyname."' WHERE etsyname='".$etsyname."'";
              
                if ($conn->query($sqlvps) === TRUE  ) {
                  
                } else {
                  echo "Error updating cc: " . $conn->error;
                }  
              } else {
                echo "Error updating etsyname: " . $conn->error;
              }
           
        
          
          
          
        
          mysqli_close($conn);
          header('Location: editetsy.php?etsyname='.$changeetsyname.'');
      }
        

?>
<?php 

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
        
        
        $sql = "UPDATE `cc` SET `ccnumber` = '".$ccnumber."', `month` = '".$month."', `year` = '".$year."', `ccv` = '".$ccv."', `zip` = '".$zip."', `date` = '".$date."' WHERE `cc`.`etsyname` = '".$etsyname."'";

          if ($conn->query($sql) === TRUE) {
            
          } else {
            echo "Error updating record: " . $conn->error;
          }

        }

?>
<?php 
  if (isset($_POST['addvps']))
        {
        include('connectdb.php');
          
        //Lấy dữ liệu nhập vào
        $vpsname = trim(addslashes($_POST['vpsname']));
        $password = trim(addslashes($_POST['password']));
        $dateget = addslashes(trim($_POST['date']));
        $date = date("Y-m-d", strtotime($dateget) );
        $type = addslashes(trim($_POST['type']));
        
        $sql = "UPDATE `vps` SET `vpsname` = '".$vpsname."', `password` = '".$password."', `type` = '".$type."', `date` = '".$date."' WHERE `vps`.`etsyname` = '".$etsyname."';";
          if ($conn->query($sql) === TRUE) {
            
          } else {
            echo "Error updating record: " . $conn->error;
          }

        }

?>
<?php

if (isset($_POST["submit"]))
{
	if ($_FILES['fileupload']['size'] != 0)
       {
         $temp = explode(".", $_FILES["fileupload"]["name"]);
         $newfilename = round(microtime(true)) . '.' . end($temp);
         $target_dir    = "assets/avatars/";
         $target_file   = $target_dir.basename($newfilename);
         $allowUpload   = true;
         $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
         $maxfilesize   = 800000000000;
         $allowtypes    = array('jpg', 'png', 'jpeg', 'gif');
         $check = getimagesize($_FILES["fileupload"]["tmp_name"]);
         if ($_FILES["fileupload"]['error'] != 0)
         {
           
         }
         if($check !== false)
         {
             $allowUpload = true;
         }
         else
         {
             // echo "Không phải file ảnh.";
             $allowUpload = false;
         }
         if (file_exists($target_file))
         {
             // echo "Tên file đã tồn tại trên server, không được ghi đè";
             $allowUpload = false;
         }
   
         if ($_FILES["fileupload"]["size"] > $maxfilesize)
         {
             // echo "Không được upload ảnh lớn hơn $maxfilesize (bytes).";
             $allowUpload = false;
         }
   
   
         // Kiểm tra kiểu file
         if (!in_array($imageFileType,$allowtypes ))
         {
             // echo "Chỉ được upload các định dạng JPG, PNG, JPEG, GIF";
             $allowUpload = false;
         }
   
         if ($allowUpload)
         {
             // Xử lý di chuyển file tạm ra thư mục cần lưu trữ, dùng hàm move_uploaded_file
             if (move_uploaded_file($_FILES["fileupload"]["tmp_name"], $target_file))
             {
                 // echo "File ". basename( $_FILES["fileupload"]["name"]).
                 // " Đã upload thành công.";
   
                 // echo "File lưu tại " . $target_file;
   
             }
             else
             {
                 // echo "Có lỗi xảy ra khi upload file.";
             }
         }
         else
         {
             // echo "Không upload được file, có thể do file lớn, kiểu file không đúng ...";
         }
         include('connectdb.php');
         $email = addslashes(trim($_POST['email']));
         $password = addslashes(trim($_POST['password']));
         $emailkp = addslashes(trim($_POST['emailkp']));
         $passwordpo = addslashes(trim($_POST['passwordpo']));
         $phone = addslashes(trim($_POST['phone']));
         $stk = addslashes(trim($_POST['stk']));
         $cccd = addslashes(trim($_POST['cccd']));
         $ch1 = addslashes(trim($_POST['ch1']));
         $ch2 = addslashes(trim($_POST['ch2']));
         $ch3 = addslashes(trim($_POST['ch3']));
         $tl1 = addslashes(trim($_POST['tl1']));
         $tl2 = addslashes(trim($_POST['tl2']));
         $tl3 = addslashes(trim($_POST['tl3']));
         $bankname = addslashes(trim($_POST['bankname']));
         $bankaddress = addslashes(trim($_POST['bankaddress']));
         $accounttype = addslashes(trim($_POST['accounttype']));
         $routing = addslashes(trim($_POST['routing']));
         $accountnumber = addslashes(trim($_POST['accountnumber']));
         $beneficiaryname = addslashes(trim($_POST['beneficiaryname']));

         if (isset($_POST['used'])) {
         	$used = 1;
         }else{
         	$used = 0;
         }
   
         $sql = "UPDATE `po` SET `email` = '".$email."', `password` = '".$password."', `emailkp` = '".$emailkp."', `passwordpo` = '".$passwordpo."', `phone` = '".$phone."', `cccd` = '".$cccd."', `stk` = '".$stk."', `ch1` = '".$ch1."', `ch2` = '".$ch2."', `ch3` = '".$ch3."', `tl1` = '".$tl1."', `tl2` = '".$tl2."', `tl3` = '".$tl3."', `bankname` = '".$bankname."', `bankaddress` = '".$bankname."', `accounttype` = '".$accounttype."', `routing` = '".$routing."', `accountnumber` = '".$accountnumber."', `beneficiaryname` = '".$beneficiaryname."', `img` = '".$target_file."', `used` = '".$used."' WHERE `po`.`etsyname` = '".$etsyname."'";
   
           if ($conn->query($sql) === TRUE) {
             
           } else {
             echo "Error updating record: " . $conn->error;
           }   
   
         
       }

    else
    {
        include ('connectdb.php');
        $email = addslashes(trim($_POST['email']));
        $password = addslashes(trim($_POST['password']));
        $emailkp = addslashes(trim($_POST['emailkp']));
        $passwordpo = addslashes(trim($_POST['passwordpo']));
        $phone = addslashes(trim($_POST['phone']));
        $stk = addslashes(trim($_POST['stk']));
        $cccd = addslashes(trim($_POST['cccd']));
        $ch1 = addslashes(trim($_POST['ch1']));
        $ch2 = addslashes(trim($_POST['ch2']));
        $ch3 = addslashes(trim($_POST['ch3']));
        $tl1 = addslashes(trim($_POST['tl1']));
        $tl2 = addslashes(trim($_POST['tl2']));
        $tl3 = addslashes(trim($_POST['tl3']));

        $bankname = addslashes(trim($_POST['bankname']));
        $bankaddress = addslashes(trim($_POST['bankaddress']));
        $accounttype = addslashes(trim($_POST['accounttype']));
        $routing = addslashes(trim($_POST['routing']));
        $accountnumber = addslashes(trim($_POST['accountnumber']));
        $beneficiaryname = addslashes(trim($_POST['beneficiaryname']));
        
        if (isset($_POST['used']))
        {
            $used = 1;
        }
        else
        {
            $used = 0;
        }

        $sql = "UPDATE `po` SET `email` = '" . $email . "', `password` = '" . $password . "', `emailkp` = '" . $emailkp . "', `passwordpo` = '" . $passwordpo . "', `phone` = '" . $phone . "', `cccd` = '" . $cccd . "', `stk` = '" . $stk . "', `ch1` = '" . $ch1 . "', `ch2` = '" . $ch2 . "', `ch3` = '" . $ch3 . "', `tl1` = '" . $tl1 . "', `tl2` = '" . $tl2 . "', `tl3` = '" . $tl3 . "', `bankname` = '" . $bankname . "', `bankaddress` = '" . $bankname . "', `accounttype` = '" . $accounttype . "', `routing` = '" . $routing . "', `accountnumber` = '" . $accountnumber . "', `beneficiaryname` = '" . $beneficiaryname . "', `active` = '', `used` = '" . $used . "' WHERE `po`.`etsyname` = '" . $etsyname . "'";

        if ($conn->query($sql) === true)
        {

        }
        else
        {
            echo "Error updating record: " . $conn->error;
        }
    }
}

?>


<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row">
                <div class="col-md-12">
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Change name Etsy</strong>
                    </div>
                    <div class="card-body">
                      <form class="form-inline" action = "" method = "post">
                        <input type="text" name="changeetsyname" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" <?php echo'value="'.$etsyname.'"' ?> placeholder="
                        ec2-13-58-119-150.us-east-2.compute.amazonaws.com"required>
                                                               
                        <button type="submit" type="submit" name="changenameetsy" class="btn btn-primary mb-2">Thay đổi tên</button>
                      </form>

                    </div>

                  </div>
                <?php
                include('connectdb.php');
                                $sqlinfo = "SELECT * FROM `info` WHERE etsyname='".$etsyname."'";
                                $resultinfo = $conn->query($sqlinfo);
                               if ($resultinfo->num_rows > 0) {
                                  
                                  while($rowinfo = $resultinfo->fetch_assoc()) {
                                    
                                    echo '
               
              <h2 class="page-title"><a href="https://www.etsy.com/shop/'.$etsyname.'">'.$etsyname.'</a></h2>
              
              
                  <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">Info <a href="editinfo.php?id='.$rowinfo["id"].'">'.$rowinfo["fullname"].'</a></strong>
                    </div>
                    <div class="card-body">
                      <form class="needs-validation" novalidate action = "" method = "post">
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Fullname</label>
                            <input type="text" class="form-control" id="validationCustom3" name="fullname" value="'.$rowinfo["fullname"].'" required>
                            <div class="valid-feedback"> Looks good! </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom3">Etsy Shop</label>
                            <input type="text" class="form-control" id="validationCustom3" disabled name="fullname" value="'.$rowinfo["etsyname"].'">
                            <div class="valid-feedback"> Looks good! </div>
                          </div>
                          
                        </div> <!-- /.form-row -->
                        <div class="form-row mb-3">
                          <div class="col-md-3 mb-3">
                            <label for="date-input1">Date Picker</label>
                            <div class="input-group">
                              <input type="text" name="date" class="form-control drgpicker" id="date-input1" value="'.date("m/d/Y", strtotime($rowinfo["dob"])).'" aria-describedby="button-addon2">
                              <div class="input-group-append">
                                <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16 mx-2"></span></div>
                              </div>
                            </div>
                          </div>
                          
                          <div class="col-md-2 mb-3">
                            <label for="custom-phone">SSN</label>
                            <input class="form-control " name="ssn" value="'.$rowinfo["ssn"].'" id="custom-phone" maxlength="9" required>
                            <div class="invalid-feedback"> Please enter a correct SSN </div>
                          </div>
                          <div class="col-md-5 mb-3">
                            <label for="exampleInputEmail2">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail2" value="'.$rowinfo["mail"].'" name="email" aria-describedby="emailHelp1" required>
                            <div class="invalid-feedback"> Please use a valid email </div>
                          </div>
                          <div class="col-md-2 mb-3">
                            <label for="custom-phone">US Telephone</label>
                            <input value="'.$rowinfo["phone"].'" class="form-control input-phoneus" name="phone" id="custom-phone" maxlength="14" required>
                            <div class="invalid-feedback"> Please enter a correct phone </div>
                            </div>
                        </div>
                        <!-- /.form-row -->
                        <div class="form-group mb-3">
                          <label for="address-wpalaceholder">Address</label>
                          <input type="text" id="address-wpalaceholder" name="address" class="form-control" value="'.$rowinfo["address"].'" placeholder="Enter your address">
                          <div class="valid-feedback"> Looks good! </div>
                          <div class="invalid-feedback"> Badd address </div>
                        </div>
                        <div class="form-row">
                          <div class="col-md-6 mb-3">
                            <label for="validationCustom33">City</label>
                            <input type="text" value="'.$rowinfo["city"].'" class="form-control" name="city" id="validationCustom33" required>
                            <div class="invalid-feedback"> Please provide a valid city. </div>
                          </div>
                          <div class="col-md-3 mb-3">
                            <label for="validationSelect2">State</label>
                            <select class="form-control select2" name="state" id="validationSelect2" required>
                              <option value="'.$rowinfo["state"].'">'.$rowinfo["state"].'</option>
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
                            <input class="form-control input-zip" value="'.$rowinfo["zipcode"].'" name="zipcode" id="custom-zip" autocomplete="off" maxlength="9" required>
                            <div class="invalid-feedback"> Please provide a valid zip. </div>
                          </div>
                          <div class="form-check">
                          <div class="custom-control custom-switch">';
                          if($rowinfo["used"]=='1'){
                          	echo '<input type="checkbox" name="used" class="custom-control-input" id="c5" checked>';
                          }else{
                          	echo '<input type="checkbox" name="used" class="custom-control-input" id="c5">';
                          }
                        
                        echo'
                        <label class="custom-control-label" for="c5"></label>
                      </div>
                        </div>
                        <button class="btn btn-primary" type="submit" name="addinfo">Cập nhật Info</button>
                        </div>
                        
                        
                        
                       
                        


                      </form>
                    </div> <!-- /.card-body -->
                    ';}
                                } else {
                                  echo "<script> alert('Info không tồn tại, vui lòng thử lại!'); </script>";

                                }
                                $conn->close(); ?>

<?php
include('connectdb.php');
                $sqlpo = "SELECT * FROM `po` WHERE etsyname='".$etsyname."'";
                $resultpo = $conn->query($sqlpo);
               if ($resultpo->num_rows > 0) {
                  
                  while($rowpo = $resultpo->fetch_assoc()) {
                    
                    echo '
                    <div class="card shadow mb-4">
              <div class="card-header">
                <strong class="card-title">PO <a href="editpo.php?id='.$rowpo["id"].'">'.$rowpo["beneficiaryname"].'</a></strong>
              </div>
              <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Email *</label>
                      <input type="email" name="email" value="'.$rowpo["email"].'" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Password *</label>
                      <input type="text" name="password" value="'.$rowpo["password"].'" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label for="inputEmail4">Email khôi phục *</label>
                      <input type="email" name="emailkp" value="'.$rowpo["emailkp"].'" class="form-control" id="inputEmail4" placeholder="Email">
                    </div>
                    <div class="form-group col-md-6">
                      <label for="inputPassword4">Password PO *</label>
                      <input type="password" value="'.$rowpo["passwordpo"].'" name="passwordpo" class="form-control" id="inputPassword4" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    <label for="inputPhoneUS">Phone *</label>
                    <input type="text" name="phone" value="'.$rowpo["phone"].'" class="form-control input-phone" id="inputAddress" placeholder="(124) 035-6451">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputPhoneUS">CCCD *</label>
                    <input type="text" name="cccd" value="'.$rowpo["cccd"].'" class="form-control input-number" id="inputAddress" placeholder="033177000374">
                  </div>
                  <div class="form-group col-md-4">
                    <label for="inputNumber">STK *</label>
                    <input type="text" name="stk" value="'.$rowpo["stk"].'" class="form-control input-number" id="inputAddress" placeholder="8019385039850">
                  </div>
                  </div>
                  
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputState">Câu hỏi 1 *</label>
                      <select id="inputState" name="ch1" class="form-control">
                        <option value="'.$rowpo["ch1"].'" selected>'.$rowpo["ch1"].'</option>
                        <option value="Bà ngoại của bạn được sinh ra tại thành phố nào?">Bà ngoại của bạn được sinh ra tại thành phố nào?</option>
            <option value="Bà nội của bạn được sinh ra tại thành phố nào?">Bà nội của bạn được sinh ra tại thành phố nào?</option>
            <option value="Bạn đã gặp người hôn phối của bạn vào năm nào (NNNN)?">Bạn đã gặp người hôn phối của bạn vào năm nào (NNNN)?</option>
            <option value="Bạn đi nghỉ tuần trăng mật của mình ớ thị trấn nào?">Bạn đi nghỉ tuần trăng mật của mình ớ thị trấn nào?</option>
            <option value="Bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất">Bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất</option>
            <option value="Bạn học trường trung học nào?">Bạn học trường trung học nào?</option>
            <option value="Bạn kết hôn tại thành phố nào?">Bạn kết hôn tại thành phố nào?</option>
            <option value="Bạn kết hôn tại thành phố nào?">Bạn kết hôn tại thành phố nào?</option>
            <option value="Bạn lớn lên ở thành phố nào?">Bạn lớn lên ở thành phố nào?</option>
            <option value="Bố bạn sinh ra ớ thị trấn nào?">Bố bạn sinh ra ớ thị trấn nào?</option>
            <option value="Bố của bạn bao nhiêu tuổi khi bạn được sinh ra?">Bố của bạn bao nhiêu tuổi khi bạn được sinh ra?</option>
            <option value="Chuyên ngành đại học của bạn là gì?">Chuyên ngành đại học của bạn là gì?</option>
            <option value="Con đầu lòng cùa bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất">Con đầu lòng cùa bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất</option>
            <option value="Họ của bạn trai hay bạn gái đầu tiên của bạn?">Họ của bạn trai hay bạn gái đầu tiên của bạn?</option>
            <option value="Họ của giáo sư đại học yêu thích của bạn?">Họ của giáo sư đại học yêu thích của bạn?</option>
            <option value="Họ của giáo viên lớp 1 của bạn là gì?">Họ của giáo viên lớp 1 của bạn là gì?</option>
            <option value="Họ của người bạn thân nhất ở trường trung học của bạn là gì?">Họ của người bạn thân nhất ở trường trung học của bạn là gì?</option>
            <option value="Họ của xếp bạn là gì?">Họ của xếp bạn là gì?</option>
            <option value="Kỷ niệm ngày cưới của bạn là khi nào (MM\DD)?">Kỷ niệm ngày cưới của bạn là khi nào (MM\DD)?</option>
            <option value="Kỷ niệm ngày cưới của bố mẹ bạn là khi nào (MM\DD)?">Kỷ niệm ngày cưới của bố mẹ bạn là khi nào (MM\DD)?</option>
            <option value="Lần đầu tiên bạn ra nước ngoài lúc mây tuổi? (ví dụ">Lần đầu tiên bạn ra nước ngoài lúc mây tuổi? (ví dụ</option>
            <option value="Mẹ bạn sinh ra ở thị trấn nào?">Mẹ bạn sinh ra ở thị trấn nào?</option>
            <option value="Mẹ của bạn bao nhiêu tuổi khi bạn được sinh ra? (ví dụ">Mẹ của bạn bao nhiêu tuổi khi bạn được sinh ra? (ví dụ</option>
            <option value="Ngày sinh của anh chị em ruột lớn tuổi nhất của bạn là ngày">Ngày sinh của anh chị em ruột lớn tuổi nhất của bạn là ngày</option>
            <option value="Ngày sinh của bố bạn là ngày nào (MM\DD)?">Ngày sinh của bố bạn là ngày nào (MM\DD)?</option>
            <option value="Ngày sinh của mẹ bạn là ngày nào (MM\DD)?">Ngày sinh của mẹ bạn là ngày nào (MM\DD)?</option>
            <option value="Nghề nghiệp của ông bạn là gì?">Nghề nghiệp của ông bạn là gì?</option>
            <option value="ông ngoại của bạn được sinh ra tại thành phố nào?">ông ngoại của bạn được sinh ra tại thành phố nào?</option>
            <option value="Ông nội của bạn được sinh ra tại thành phố nào?">Ông nội của bạn được sinh ra tại thành phố nào?</option>
            <option value="Quốc gia nước ngoài đầu tiên bạn đến thăm là gì?">Quốc gia nước ngoài đầu tiên bạn đến thăm là gì?</option>
            <option value="Quốc gia nước ngoài đầu tiên bạn đến thăm là?">Quốc gia nước ngoài đầu tiên bạn đến thăm là?</option>
            <option value="Sinh nhật của chồng/vợ bạn là khi nào (MM\DD)?">Sinh nhật của chồng/vợ bạn là khi nào (MM\DD)?</option>
            <option value="Tên anh chị ruột lớn tuổi nhất của bạn?">Tên anh chị ruột lớn tuổi nhất của bạn?</option>
            <option value="Tên của bà ngoại bạn là gì (mẹ của mẹ)?">Tên của bà ngoại bạn là gì (mẹ của mẹ)?</option>
            <option value="Tên của bà nội (mẹ của bố) của bạn là gì?">Tên của bà nội (mẹ của bố) của bạn là gì?</option>
            <option value="Tên của bạn thân nhất thời thơ ấu của bạn là gì?">Tên của bạn thân nhất thời thơ ấu của bạn là gì?</option>
            <option value="Tên của bệnh viện nơi người con lớn tuổi nhất của bạn được">Tên của bệnh viện nơi người con lớn tuổi nhất của bạn được</option>
            <option value="Tên của giáo viên đầu tiên của bạn là gì?">Tên của giáo viên đầu tiên của bạn là gì?</option>
            <option value="Tên của mẹ chồng mẹ vợ của bạn là gì?">Tên của mẹ chồng mẹ vợ của bạn là gì?</option>
            <option value="Tên của ông nội bạn là gì (bố của bố bạn)?">Tên của ông nội bạn là gì (bố của bố bạn)?</option>
            <option value="Tên của trường đại học mà bạn đã theo học?">Tên của trường đại học mà bạn đã theo học?</option>
            <option value="Tên của trường đại học mà vợ/chồng bạn đã theo học?">Tên của trường đại học mà vợ/chồng bạn đã theo học?</option>
            <option value="Tên giáo viên đầu tiên của bạn là gì?">Tên giáo viên đầu tiên của bạn là gì?</option>
            <option value="Tên người con lớn tuổi nhất?">Tên người con lớn tuổi nhất?</option>
            <option value="Tên phù dâu(phù rể) của bạn là gì?">Tên phù dâu(phù rể) của bạn là gì?</option>
            <option value="Tên trường học đầu tiên của bạn là gì?">Tên trường học đầu tiên của bạn là gì?</option>
            <option value="Tên vật nuôi đầu tiên của bạn là gì?">Tên vật nuôi đầu tiên của bạn là gì?</option>
            <option value="Trường tiểu học đầu tiên của bạn thuộc thành phố nào?">Trường tiểu học đầu tiên của bạn thuộc thành phố nào?</option>
            <option value="Vợ (chồng) bạn học trường trung học nào?">Vợ (chồng) bạn học trường trung học nào?</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">Câu hỏi 2 *</label>
                      <select id="inputState" name="ch2" class="form-control">
                        <option value="'.$rowpo["ch2"].'" selected>'.$rowpo["ch2"].'</option>
                        <option value="Bà ngoại của bạn được sinh ra tại thành phố nào?">Bà ngoại của bạn được sinh ra tại thành phố nào?</option>
            <option value="Bà nội của bạn được sinh ra tại thành phố nào?">Bà nội của bạn được sinh ra tại thành phố nào?</option>
            <option value="Bạn đã gặp người hôn phối của bạn vào năm nào (NNNN)?">Bạn đã gặp người hôn phối của bạn vào năm nào (NNNN)?</option>
            <option value="Bạn đi nghỉ tuần trăng mật của mình ớ thị trấn nào?">Bạn đi nghỉ tuần trăng mật của mình ớ thị trấn nào?</option>
            <option value="Bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất">Bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất</option>
            <option value="Bạn học trường trung học nào?">Bạn học trường trung học nào?</option>
            <option value="Bạn kết hôn tại thành phố nào?">Bạn kết hôn tại thành phố nào?</option>
            <option value="Bạn kết hôn tại thành phố nào?">Bạn kết hôn tại thành phố nào?</option>
            <option value="Bạn lớn lên ở thành phố nào?">Bạn lớn lên ở thành phố nào?</option>
            <option value="Bố bạn sinh ra ớ thị trấn nào?">Bố bạn sinh ra ớ thị trấn nào?</option>
            <option value="Bố của bạn bao nhiêu tuổi khi bạn được sinh ra?">Bố của bạn bao nhiêu tuổi khi bạn được sinh ra?</option>
            <option value="Chuyên ngành đại học của bạn là gì?">Chuyên ngành đại học của bạn là gì?</option>
            <option value="Con đầu lòng cùa bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất">Con đầu lòng cùa bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất</option>
            <option value="Họ của bạn trai hay bạn gái đầu tiên của bạn?">Họ của bạn trai hay bạn gái đầu tiên của bạn?</option>
            <option value="Họ của giáo sư đại học yêu thích của bạn?">Họ của giáo sư đại học yêu thích của bạn?</option>
            <option value="Họ của giáo viên lớp 1 của bạn là gì?">Họ của giáo viên lớp 1 của bạn là gì?</option>
            <option value="Họ của người bạn thân nhất ở trường trung học của bạn là gì?">Họ của người bạn thân nhất ở trường trung học của bạn là gì?</option>
            <option value="Họ của xếp bạn là gì?">Họ của xếp bạn là gì?</option>
            <option value="Kỷ niệm ngày cưới của bạn là khi nào (MM\DD)?">Kỷ niệm ngày cưới của bạn là khi nào (MM\DD)?</option>
            <option value="Kỷ niệm ngày cưới của bố mẹ bạn là khi nào (MM\DD)?">Kỷ niệm ngày cưới của bố mẹ bạn là khi nào (MM\DD)?</option>
            <option value="Lần đầu tiên bạn ra nước ngoài lúc mây tuổi? (ví dụ">Lần đầu tiên bạn ra nước ngoài lúc mây tuổi? (ví dụ</option>
            <option value="Mẹ bạn sinh ra ở thị trấn nào?">Mẹ bạn sinh ra ở thị trấn nào?</option>
            <option value="Mẹ của bạn bao nhiêu tuổi khi bạn được sinh ra? (ví dụ">Mẹ của bạn bao nhiêu tuổi khi bạn được sinh ra? (ví dụ</option>
            <option value="Ngày sinh của anh chị em ruột lớn tuổi nhất của bạn là ngày">Ngày sinh của anh chị em ruột lớn tuổi nhất của bạn là ngày</option>
            <option value="Ngày sinh của bố bạn là ngày nào (MM\DD)?">Ngày sinh của bố bạn là ngày nào (MM\DD)?</option>
            <option value="Ngày sinh của mẹ bạn là ngày nào (MM\DD)?">Ngày sinh của mẹ bạn là ngày nào (MM\DD)?</option>
            <option value="Nghề nghiệp của ông bạn là gì?">Nghề nghiệp của ông bạn là gì?</option>
            <option value="ông ngoại của bạn được sinh ra tại thành phố nào?">ông ngoại của bạn được sinh ra tại thành phố nào?</option>
            <option value="Ông nội của bạn được sinh ra tại thành phố nào?">Ông nội của bạn được sinh ra tại thành phố nào?</option>
            <option value="Quốc gia nước ngoài đầu tiên bạn đến thăm là gì?">Quốc gia nước ngoài đầu tiên bạn đến thăm là gì?</option>
            <option value="Quốc gia nước ngoài đầu tiên bạn đến thăm là?">Quốc gia nước ngoài đầu tiên bạn đến thăm là?</option>
            <option value="Sinh nhật của chồng/vợ bạn là khi nào (MM\DD)?">Sinh nhật của chồng/vợ bạn là khi nào (MM\DD)?</option>
            <option value="Tên anh chị ruột lớn tuổi nhất của bạn?">Tên anh chị ruột lớn tuổi nhất của bạn?</option>
            <option value="Tên của bà ngoại bạn là gì (mẹ của mẹ)?">Tên của bà ngoại bạn là gì (mẹ của mẹ)?</option>
            <option value="Tên của bà nội (mẹ của bố) của bạn là gì?">Tên của bà nội (mẹ của bố) của bạn là gì?</option>
            <option value="Tên của bạn thân nhất thời thơ ấu của bạn là gì?">Tên của bạn thân nhất thời thơ ấu của bạn là gì?</option>
            <option value="Tên của bệnh viện nơi người con lớn tuổi nhất của bạn được">Tên của bệnh viện nơi người con lớn tuổi nhất của bạn được</option>
            <option value="Tên của giáo viên đầu tiên của bạn là gì?">Tên của giáo viên đầu tiên của bạn là gì?</option>
            <option value="Tên của mẹ chồng mẹ vợ của bạn là gì?">Tên của mẹ chồng mẹ vợ của bạn là gì?</option>
            <option value="Tên của ông nội bạn là gì (bố của bố bạn)?">Tên của ông nội bạn là gì (bố của bố bạn)?</option>
            <option value="Tên của trường đại học mà bạn đã theo học?">Tên của trường đại học mà bạn đã theo học?</option>
            <option value="Tên của trường đại học mà vợ/chồng bạn đã theo học?">Tên của trường đại học mà vợ/chồng bạn đã theo học?</option>
            <option value="Tên giáo viên đầu tiên của bạn là gì?">Tên giáo viên đầu tiên của bạn là gì?</option>
            <option value="Tên người con lớn tuổi nhất?">Tên người con lớn tuổi nhất?</option>
            <option value="Tên phù dâu(phù rể) của bạn là gì?">Tên phù dâu(phù rể) của bạn là gì?</option>
            <option value="Tên trường học đầu tiên của bạn là gì?">Tên trường học đầu tiên của bạn là gì?</option>
            <option value="Tên vật nuôi đầu tiên của bạn là gì?">Tên vật nuôi đầu tiên của bạn là gì?</option>
            <option value="Trường tiểu học đầu tiên của bạn thuộc thành phố nào?">Trường tiểu học đầu tiên của bạn thuộc thành phố nào?</option>
            <option value="Vợ (chồng) bạn học trường trung học nào?">Vợ (chồng) bạn học trường trung học nào?</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">Câu hỏi 3 *</label>
                      <select id="inputState" name="ch3" class="form-control">
                        <option value="'.$rowpo["ch3"].'" selected>'.$rowpo["ch3"].'</option>
                        <option value="Bà ngoại của bạn được sinh ra tại thành phố nào?">Bà ngoại của bạn được sinh ra tại thành phố nào?</option>
            <option value="Bà nội của bạn được sinh ra tại thành phố nào?">Bà nội của bạn được sinh ra tại thành phố nào?</option>
            <option value="Bạn đã gặp người hôn phối của bạn vào năm nào (NNNN)?">Bạn đã gặp người hôn phối của bạn vào năm nào (NNNN)?</option>
            <option value="Bạn đi nghỉ tuần trăng mật của mình ớ thị trấn nào?">Bạn đi nghỉ tuần trăng mật của mình ớ thị trấn nào?</option>
            <option value="Bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất">Bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất</option>
            <option value="Bạn học trường trung học nào?">Bạn học trường trung học nào?</option>
            <option value="Bạn kết hôn tại thành phố nào?">Bạn kết hôn tại thành phố nào?</option>
            <option value="Bạn kết hôn tại thành phố nào?">Bạn kết hôn tại thành phố nào?</option>
            <option value="Bạn lớn lên ở thành phố nào?">Bạn lớn lên ở thành phố nào?</option>
            <option value="Bố bạn sinh ra ớ thị trấn nào?">Bố bạn sinh ra ớ thị trấn nào?</option>
            <option value="Bố của bạn bao nhiêu tuổi khi bạn được sinh ra?">Bố của bạn bao nhiêu tuổi khi bạn được sinh ra?</option>
            <option value="Chuyên ngành đại học của bạn là gì?">Chuyên ngành đại học của bạn là gì?</option>
            <option value="Con đầu lòng cùa bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất">Con đầu lòng cùa bạn được sinh ra lúc mấy giờ? (làm tròn tới giờ gần nhất</option>
            <option value="Họ của bạn trai hay bạn gái đầu tiên của bạn?">Họ của bạn trai hay bạn gái đầu tiên của bạn?</option>
            <option value="Họ của giáo sư đại học yêu thích của bạn?">Họ của giáo sư đại học yêu thích của bạn?</option>
            <option value="Họ của giáo viên lớp 1 của bạn là gì?">Họ của giáo viên lớp 1 của bạn là gì?</option>
            <option value="Họ của người bạn thân nhất ở trường trung học của bạn là gì?">Họ của người bạn thân nhất ở trường trung học của bạn là gì?</option>
            <option value="Họ của xếp bạn là gì?">Họ của xếp bạn là gì?</option>
            <option value="Kỷ niệm ngày cưới của bạn là khi nào (MM\DD)?">Kỷ niệm ngày cưới của bạn là khi nào (MM\DD)?</option>
            <option value="Kỷ niệm ngày cưới của bố mẹ bạn là khi nào (MM\DD)?">Kỷ niệm ngày cưới của bố mẹ bạn là khi nào (MM\DD)?</option>
            <option value="Lần đầu tiên bạn ra nước ngoài lúc mây tuổi? (ví dụ">Lần đầu tiên bạn ra nước ngoài lúc mây tuổi? (ví dụ</option>
            <option value="Mẹ bạn sinh ra ở thị trấn nào?">Mẹ bạn sinh ra ở thị trấn nào?</option>
            <option value="Mẹ của bạn bao nhiêu tuổi khi bạn được sinh ra? (ví dụ">Mẹ của bạn bao nhiêu tuổi khi bạn được sinh ra? (ví dụ</option>
            <option value="Ngày sinh của anh chị em ruột lớn tuổi nhất của bạn là ngày">Ngày sinh của anh chị em ruột lớn tuổi nhất của bạn là ngày</option>
            <option value="Ngày sinh của bố bạn là ngày nào (MM\DD)?">Ngày sinh của bố bạn là ngày nào (MM\DD)?</option>
            <option value="Ngày sinh của mẹ bạn là ngày nào (MM\DD)?">Ngày sinh của mẹ bạn là ngày nào (MM\DD)?</option>
            <option value="Nghề nghiệp của ông bạn là gì?">Nghề nghiệp của ông bạn là gì?</option>
            <option value="ông ngoại của bạn được sinh ra tại thành phố nào?">ông ngoại của bạn được sinh ra tại thành phố nào?</option>
            <option value="Ông nội của bạn được sinh ra tại thành phố nào?">Ông nội của bạn được sinh ra tại thành phố nào?</option>
            <option value="Quốc gia nước ngoài đầu tiên bạn đến thăm là gì?">Quốc gia nước ngoài đầu tiên bạn đến thăm là gì?</option>
            <option value="Quốc gia nước ngoài đầu tiên bạn đến thăm là?">Quốc gia nước ngoài đầu tiên bạn đến thăm là?</option>
            <option value="Sinh nhật của chồng/vợ bạn là khi nào (MM\DD)?">Sinh nhật của chồng/vợ bạn là khi nào (MM\DD)?</option>
            <option value="Tên anh chị ruột lớn tuổi nhất của bạn?">Tên anh chị ruột lớn tuổi nhất của bạn?</option>
            <option value="Tên của bà ngoại bạn là gì (mẹ của mẹ)?">Tên của bà ngoại bạn là gì (mẹ của mẹ)?</option>
            <option value="Tên của bà nội (mẹ của bố) của bạn là gì?">Tên của bà nội (mẹ của bố) của bạn là gì?</option>
            <option value="Tên của bạn thân nhất thời thơ ấu của bạn là gì?">Tên của bạn thân nhất thời thơ ấu của bạn là gì?</option>
            <option value="Tên của bệnh viện nơi người con lớn tuổi nhất của bạn được">Tên của bệnh viện nơi người con lớn tuổi nhất của bạn được</option>
            <option value="Tên của giáo viên đầu tiên của bạn là gì?">Tên của giáo viên đầu tiên của bạn là gì?</option>
            <option value="Tên của mẹ chồng mẹ vợ của bạn là gì?">Tên của mẹ chồng mẹ vợ của bạn là gì?</option>
            <option value="Tên của ông nội bạn là gì (bố của bố bạn)?">Tên của ông nội bạn là gì (bố của bố bạn)?</option>
            <option value="Tên của trường đại học mà bạn đã theo học?">Tên của trường đại học mà bạn đã theo học?</option>
            <option value="Tên của trường đại học mà vợ/chồng bạn đã theo học?">Tên của trường đại học mà vợ/chồng bạn đã theo học?</option>
            <option value="Tên giáo viên đầu tiên của bạn là gì?">Tên giáo viên đầu tiên của bạn là gì?</option>
            <option value="Tên người con lớn tuổi nhất?">Tên người con lớn tuổi nhất?</option>
            <option value="Tên phù dâu(phù rể) của bạn là gì?">Tên phù dâu(phù rể) của bạn là gì?</option>
            <option value="Tên trường học đầu tiên của bạn là gì?">Tên trường học đầu tiên của bạn là gì?</option>
            <option value="Tên vật nuôi đầu tiên của bạn là gì?">Tên vật nuôi đầu tiên của bạn là gì?</option>
            <option value="Trường tiểu học đầu tiên của bạn thuộc thành phố nào?">Trường tiểu học đầu tiên của bạn thuộc thành phố nào?</option>
            <option value="Vợ (chồng) bạn học trường trung học nào?">Vợ (chồng) bạn học trường trung học nào?</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                  <div class="form-group col-md-4">
                    
                    <input type="text" name="tl1" class="form-control input-phone" id="inputAddress" value="'.$rowpo["tl1"].'" >
                  </div>
                  <div class="form-group col-md-4">
                    
                    <input type="text" name="tl2" class="form-control input-number" id="inputAddress" value="'.$rowpo["tl2"].'">
                  </div>
                  <div class="form-group col-md-4">
                    
                    <input type="text" name="tl3" class="form-control input-number" id="inputAddress" value="'.$rowpo["tl3"].'">
                  </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputState">Bank name</label>
                      
                      <input type="text" name="bankname" class="form-control" id="example-readonly"  value="First Century Bank">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">Bank Address</label>
                      
                      <input type="text" name="bankaddress" class="form-control" id="example-readonly"  value="525 Federal Street Bluefield, WV–Bluefield, USA">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">Account Type</label>
                      <select id="inputState" name="accounttype" class="form-control">
                        <option selected value="Checking">Checking</option>
                        <option>...</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputState">Routing (ABA) *</label>
                      <input type="text" name="routing" class="form-control input-number" id="inputAddress" value="'.$rowpo["routing"].'">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">Account number *</label>
                      <input type="text" name="accountnumber" class="form-control input-number" id="inputAddress" value="'.$rowpo["accountnumber"].'">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="inputState">Beneficiary name *</label>
                      <input type="text" name="beneficiaryname" class="form-control input-number" id="inputAddress" value="'.$rowpo["beneficiaryname"].'">
                    </div>
                  </div>
                  
                  <div class="form-group mb-3">
                      <label for="customFile">Chọn ảnh</label>
                      <div class="custom-file">
                        <input type="file" name="fileupload" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Chọn file</label>
                      </div>
                    </div>
                    <div class="form-group">
                    <div class="form-check">
                      <div class="custom-control custom-switch">';
                      if($rowpo["used"]== 1){
                        echo'<input type="checkbox" name="used" class="custom-control-input" id="c5" checked>';
                      }else{
                        echo'<input type="checkbox" name="used" class="custom-control-input" id="c5" >';
                      }
                    
                    echo'
                    <label class="custom-control-label" for="c5"></label>
                  </div>
                    </div>
                  </div>
            
                  <button type="submit" value="" name="submit" class="btn btn-primary">Cập nhật PO</button>
                </form>
              </div>
              ';}
            } else {
              echo "<script> alert('PO không tồn tại!') </script>";
            }
            $conn->close(); ?>
            <?php
include('connectdb.php');
$sqlcc = "SELECT * FROM `cc` WHERE etsyname='".$etsyname."'";
$resultcc = $conn->query($sqlcc);
if ($resultcc->num_rows > 0) {
  
  while($rowcc = $resultcc->fetch_assoc()) {
    
    echo '
    <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">CC: <a href="editcc.php?id='.$rowcc["id"].'">'.$rowcc["ccnumber"].'</a></strong>
                    </div>
                    <div class="card-body">
                      <form class="form-inline" action = "" method = "post">
                        <label class="sr-only" for="inlineFormInputName2">CC Name</label>
                        <input type="text" name="ccnumber" value="'.$rowcc["ccnumber"].'" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="CC Number"required>

                        
                        <div class="input-group mb-2 mr-sm-2">
                        

                        <select class="custom-select my-1 mr-sm-2" name="month" id="inlineFormCustomSelectPref">
                          <option value="'.$rowcc["month"].'" selected>'.$rowcc["month"].'</option>
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
                          <option value="'.$rowcc["year"].'"  selected hidden >'.$rowcc["year"].'</option>
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
                          
                          <input type="text" maxlength="4" name="ccv"  class="form-control" value="'.$rowcc["ccv"].'" id="inlineFormInputGroupUsername2" placeholder="CCV" style="width: 80px;" required>
                      </div>
                          <div class="input-group mb-2 mr-sm-2">
                          <input type="text" value="'.$rowcc["zip"].'" class="form-control" name="zip" id="validationCustom05" placeholder="ZIP" required="">
                        </div>
                        <div class="input-group mb-2 mr-sm-2 input-group">
                        <input type="text" name="date" value="'.date("m/d/Y", strtotime($rowcc["date"])).'" class="form-control drgpicker" id="datepicker" value="" aria-describedby="button-addon2">
                        <div class="input-group-append">
                              <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                        </div>
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                          <input type="text" value="'.$rowcc["etsyname"].'" class="form-control" disabled id="validationCustom05" placeholder="ZIP" required="">
                        </div>
                      
                        
                        <button type="submit"  name="addcc" class="btn btn-primary mb-2">Cập nhật CC</button>
                      </form>

                    </div>

                  </div>
                </div>
              </div>
              ';}} else {
                  echo "<script> alert('CC không tồn tại, vui lòng thử lại!'); </script>";

                }

                $conn->close(); ?>
                <?php
include('connectdb.php');
$sql = "SELECT * FROM `vps` WHERE etsyname='".$etsyname."'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    
    echo '
    <div class="card shadow mb-4">
                    <div class="card-header">
                      <strong class="card-title">VPS: <a href="editvps.php?id='.$row["id"].'">'.$row["vpsname"].'</a></strong>
                    </div>
                    <div class="card-body">
                      <form class="form-inline" action = "" method = "post">
                        <label class="sr-only" for="inlineFormInputName2">VPS Name</label>
                        <input style="width:500px" type="text" name="vpsname" value="'.$row["vpsname"].'" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" placeholder="ec2-13-58-119-150.us-east-2.compute.amazonaws.com"required>
                        <label class="sr-only" for="inlineFormInputGroupUsername2">VPS name</label>
                        <div class="input-group mb-2 mr-sm-2">
                          <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                          </div>
                          <input type="text" name="password" value="'.$row["password"].'" class="form-control" id="inlineFormInputGroupUsername2" placeholder="password"required>
                        </div>
                        <div class="input-group mb-2 mr-sm-2">
                        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Loại</label>

                        <select class="custom-select my-1 mr-sm-2" name="type" id="inlineFormCustomSelectPref">
                        <option selected value="'.$row["type"].'">
                          ';
                          if($row["type"] == 0){
                            echo'Thường';
                          }
                          if($row["type"] == 1){
                            echo'Mạnh';
                          }
                          if($row["type"] == 2){
                            echo'Siêu Mạnh';
                          }
                          echo'
                        </option>
                          <option value="0">Thường</option>
                          <option value="1">Mạnh</option>
                          <option value="2">Siêu mạnh</option>
                        </select>
                      </div>
                      <div class="input-group mb-2 mr-sm-2 input-group">
                        <input type="text" name="date" class="form-control drgpicker" id="datepicker" value="" aria-describedby="button-addon2">
                        <div class="input-group-append">
                              <div class="input-group-text" id="button-addon-date"><span class="fe fe-calendar fe-16"></span></div>
                        </div>
                      </div>
                      <div class="input-group mb-2 mr-sm-2">
                          <input type="text" value="'.$row["etsyname"].'" class="form-control" disabled id="validationCustom05" placeholder="ZIP" required="">
                        </div>
                        
                        <button type="submit" type="submit" name="addvps" class="btn btn-primary mb-2">Submit</button>
                      </form>

                    </div>

                  </div>
                </div>
              </div>
              ';}} else {
                  echo "<script> alert('Info không tồn tại, vui lòng thử lại!'); </script>";

                }

                $conn->close(); ?>
                  </div> <!-- /.card -->
                </div> <!-- /.col -->
              </div> <!-- end section -->
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