<?php
    session_start();
    if(!isset($_SESSION['username']) || $_SESSION['role'] == '') {
        
       header('Location: auth-login.php');
    }else{
        // echo '<script>alert("bạn đăng nhập với tài khoản '.$_SESSION['username'].'")</script>';
    }
?>
<!doctype html>
<html lang="en">
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
    <link rel="stylesheet" href="css/select2.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/uppy.min.css">
    <link rel="stylesheet" href="css/jquery.steps.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">
    <link rel="stylesheet" href="css/quill.snow.css">
    <!-- Date Range Picker CSS -->
    <link rel="stylesheet" href="css/daterangepicker.css">
    <!-- App CSS -->
    <link rel="stylesheet" href="css/app-light.css" id="lightTheme" disabled>
    <link rel="stylesheet" href="css/app-dark.css" id="darkTheme">
  </head>
  <body class="vertical  dark  ">
    <div class="wrapper">
      <nav class="topnav navbar navbar-light">
        <button type="button" class="navbar-toggler text-muted mt-2 p-0 mr-3 collapseSidebar">
          <i class="fe fe-menu navbar-toggler-icon"></i>
        </button>
        <form class="form-inline mr-auto searchform text-muted">
          <input class="form-control mr-sm-2 bg-transparent border-0 pl-4 text-muted" type="search" placeholder="Type something..." aria-label="Search">
        </form>
        <ul class="nav">
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="#" id="modeSwitcher" data-mode="dark">
              <i class="fe fe-sun fe-16"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-shortcut">
              <span class="fe fe-grid fe-16"></span>
            </a>
          </li>
          <li class="nav-item nav-notif">
            <a class="nav-link text-muted my-2" href="./#" data-toggle="modal" data-target=".modal-notif">
              <span class="fe fe-bell fe-16"></span>
              <span class="dot dot-md bg-success"></span>
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-muted pr-0" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <span class="avatar avatar-sm mt-2">
                <img src="./assets/avatars/face-1.jpg" alt="..." class="avatar-img rounded-circle">
              </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="#">Profile</a>
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activities</a>
            </div>
          </li>
        </ul>
      </nav>
      <aside class="sidebar-left border-right bg-white shadow" id="leftSidebar" data-simplebar>
        <a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
          <i class="fe fe-x"><span class="sr-only"></span></i>
        </a>
        <nav class="vertnav navbar navbar-light">
          <!-- nav bar -->
          <div class="w-100 mb-4 d-flex">
            <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="./index.php">
              <img src="assets/images/logo.png" width="50" height="50"/>
            </a>
          </div>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-home fe-16"></i>
                <span class="ml-3 item-text">Tổng quan</span><span class="sr-only">(current)</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="dashboard">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./index.php"><span class="ml-1 item-text">Etsy</span></a>
                </li>
              	
                <li class="nav-item active">
                  <a class="nav-link pl-3" href="./info.php"><span class="ml-1 item-text">Info</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./po.php"><span class="ml-1 item-text">PO</span></a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./dashboard-saas.html"><span class="ml-1 item-text">CC</span></a>
                </li>
                
              </ul>
            </li>
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Chức năng</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item dropdown">
              <a href="#etsy" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-shopping-bag fe-16"></i>
                <span class="ml-3 item-text">Etsy</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="etsy">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./alletsy.php"><span class="ml-1 item-text">All Etsy</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./addetsy.php"><span class="ml-1 item-text">Add Etsy</span>
                  </a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#info" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-info fe-16"></i>
                <span class="ml-3 item-text">Info</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="info">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./addinfo.php"><span class="ml-1 item-text">Add Info</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./info.php"><span class="ml-1 item-text">Full Info</span></a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#po" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-circle fe-16"></i>
                <span class="ml-3 item-text">PO</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="po">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./po.php"><span class="ml-1 item-text">Full PO</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./addpo.php"><span class="ml-1 item-text">Add PO</span></a>
                </li>
                
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#cc" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-credit-card fe-16"></i>
                <span class="ml-3 item-text">CC</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="cc">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./allcc.php"><span class="ml-1 item-text">All CC</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./addcc.php"><span class="ml-1 item-text">Add CC</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./table_datatables.html"><span class="ml-1 item-text">Add CC Xịn
                    <span class="badge badge-pill badge-primary">Hot</span>
                  </span></a>

                </li>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#vps" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-airplay fe-16"></i>
                <span class="ml-3 item-text">VPS</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="vps">
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./allvps.php"><span class="ml-1 item-text">All VPS</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./addvps.php"><span class="ml-1 item-text">Add VPS</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link pl-3" href="./table_datatables.html"><span class="ml-1 item-text">Data Tables</span></a>
                </li>
              </ul>
            </li>
            
          </ul>
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Apps</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
           
            
            <li class="nav-item dropdown">
              <a href="#profile" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-user fe-16"></i>
                <span class="ml-3 item-text">Thành viên</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="profile">
                <a class="nav-link pl-3" href="./profile.html"><span class="ml-1">Overview</span></a>
                <a class="nav-link pl-3" href="./profile-settings.html"><span class="ml-1">Settings</span></a>
                <a class="nav-link pl-3" href="./profile-security.html"><span class="ml-1">Security</span></a>
                <a class="nav-link pl-3" href="./profile-notification.html"><span class="ml-1">Notifications</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#fileman" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-folder fe-16"></i>
                <span class="ml-3 item-text">Quản lí File</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="fileman">
                <a class="nav-link pl-3" href="./files-list.html"><span class="ml-1">Files List</span></a>
                <a class="nav-link pl-3" href="./files-grid.html"><span class="ml-1">Files Grid</span></a>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a href="#support" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle nav-link">
                <i class="fe fe-compass fe-16"></i>
                <span class="ml-3 item-text">Help Desk</span>
              </a>
              <ul class="collapse list-unstyled pl-4 w-100" id="support">
                <a class="nav-link pl-3" href="./support-center.html"><span class="ml-1">Home</span></a>
                <a class="nav-link pl-3" href="./support-tickets.html"><span class="ml-1">Tickets</span></a>
                <a class="nav-link pl-3" href="./support-ticket-detail.html"><span class="ml-1">Ticket Detail</span></a>
                <a class="nav-link pl-3" href="./support-faqs.html"><span class="ml-1">FAQs</span></a>
              </ul>
            </li>
          </ul>
          
          <p class="text-muted nav-heading mt-4 mb-1">
            <span>Documentation</span>
          </p>
          <ul class="navbar-nav flex-fill w-100 mb-2">
            <li class="nav-item w-100">
              <a class="nav-link" href="../docs/index.html">
                <i class="fe fe-help-circle fe-16"></i>
                <span class="ml-3 item-text">Hướng dẫn</span>
              </a>
            </li>
          </ul>
          <div class="btn-box w-100 mt-4 mb-1">
            <a href="logout.php" target="_blank" class="btn mb-2 btn-primary btn-lg btn-block">
              <i class="fe fe-log-out fe-12 mx-2"></i><span class="small">Log out</span>
            </a>
          </div>
        </nav>
      </aside>