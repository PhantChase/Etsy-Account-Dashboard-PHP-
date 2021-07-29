<?php 
    session_start();
    if (isset($_SESSION['username']) or isset($_SESSION['role'])){
        header('Location: index.php');
    }
    else{
        header('Content-Type: text/html; charset=UTF-8');

        if (isset($_POST['dangnhap']))
        {
        include('connectdb.php');
          
        //Lấy dữ liệu nhập vào
        $username = addslashes($_POST['username']);
        $password = addslashes($_POST['password']);
          
        //Kiểm tra đã nhập đủ tên đăng nhập với mật khẩu chưa
        if (!$username || !$password) {
        echo "Vui lòng nhập đầy đủ tên đăng nhập và mật khẩu. <a href='javascript: history.go(-1)'>Trở lại</a>";
        exit;
        }
          
        // mã hóa pasword
        $password = md5($password);
          
        $sql = "SELECT * FROM user Where username = '".$username."' and pass='".$password."'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
          // output data of each row
          while($row = $result->fetch_assoc()) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row["role"];
            header('Location: index.php');
            exit;
            
          }
        } else {
          echo "<script> alert('Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!') </script>";
        }
        $conn->close();
        }

    }
    
    
?>
<!doctype html>
<html lang="en">
  <style>

</style>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/images/logo.png">
    <title>Etsy Account Dashboard</title>
    <!-- Simple bar CSS -->
    <link rel="stylesheet" href="css/simplebar.css">
    <!-- Fonts CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Overpass:ital,wght@0,100;0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Icons CSS -->
    <link rel="stylesheet" href="css/feather.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme">
  </head>
  <body class="dark ">
    <div class="wrapper vh-100">
      <div class="row align-items-center h-100">
        <form class="col-lg-3 col-md-4 col-10 mx-auto text-center" action = "" method = "post">
          <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.html">
            
            <img src="assets/images/logo.png" width="70" height="70"/>
          </a>
          <h1 class="h6 mb-3">Đăng nhập</h1>
          <div class="form-group">
            <label for="inputEmail" class="sr-only">Tài khoản</label>
            <input type="text" name="username" id="inputEmail" class="form-control form-control-lg" placeholder="Tài khoản" required="" autofocus="">
          </div>
          <div class="form-group">
            <label for="inputPassword" class="sr-only">Mật khẩu</label>
            <input type="password" name="password" id="inputPassword" class="form-control form-control-lg" placeholder="Mật khẩu" required="">
          </div>
          <div class="checkbox mb-3">
            <label>
              <input type="checkbox" value="remember-me"> Lưu mật khẩu </label>
          </div>
          <button  class="btn btn-lg btn-primary btn-block" type="submit" name="dangnhap">Đăng nhập</button>
          
          <p class="mt-5 mb-3 text-muted">© 2021</p>
        </form>
      </div>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/simplebar.min.js"></script>
    <script src='js/daterangepicker.js'></script>
    <script src='js/jquery.stickOnScroll.js'></script>
    <script src="js/tinycolor-min.js"></script>
    <script src="js/config.js"></script>
    <script src="js/apps.js"></script>
    
    <script>
      window.dataLayer = window.dataLayer || [];

      function gtag()
      {
        dataLayer.push(arguments);
      }
      gtag('js', new Date());
      gtag('config', 'UA-56159088-1');
    </script>
  </body>
</html>
</body>
</html>