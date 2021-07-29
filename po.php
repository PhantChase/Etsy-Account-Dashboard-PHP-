
<?php 
  include('header.php');
  function remote_file_exists($url)
  {
      $ch = curl_init($url);
      curl_setopt($ch, CURLOPT_NOBODY, true);
      curl_exec($ch);
      $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
      curl_close($ch);
      if( $httpCode == 200 ){return true;}
  }
?>


<main role="main" class="main-content">
        <div class="container-fluid">
          <div class="row justify-content-center">
            <div class="col-12">
              <div class="row align-items-center my-4">
                <div class="col">
                  <h2 class="h3 mb-0 page-title">PO</h2>
                </div>
                <div class="col-auto">
                  <button type="button" class="btn btn-secondary"><span class="fe fe-trash fe-12 mr-2"></span>Delete</button>
                  <button type="button" class="btn btn-primary"><span class="fe fe-filter fe-12 mr-2"></span>Create</button>
                </div>
              </div>
              <div class="row">
                <?php 
                include('connectdb.php');
       $sql = "SELECT * FROM `po`";
                                $result = $conn->query($sql);
                               if ($result->num_rows > 0) {
                                  
                                  while($row = $result->fetch_assoc()) {
                                    
                                    echo '
                <div class="col-md-3">
                  <div class="card shadow mb-4">
                    <div class="card-body text-center">
                      <div class="avatar avatar-lg mt-4">
                        <a href="editpo.php?id='.$row["id"].'">';
                        if (!remote_file_exists('./'.$row["img"])) {
                          echo'
                          <img src="./assets/avatars/image-not-found.jpg" alt="..." class="avatar-img rounded-circle">';
                        }else{
                          echo '<img src="./'.$row["img"].'" alt="..." class="avatar-img rounded-circle">';
                        }
                          
                          echo'
                        </a>
                      </div>
                      <div class="card-text my-2">
                        <strong class="card-title my-0">'.$row["beneficiaryname"].'</strong>
                        <strong class="card-title my-0"><a href="editetsy.php?id='.$row["id"].'">'.$row["etsyname"].'</a></strong>
                        <p class="small text-muted mb-0">'.$row["accountnumber"].'</p>
                        <p class="small"><span class="badge badge-light text-muted">'.$row["routing"].'</span></p>
                      </div>
                    </div> <!-- ./card-text -->
                    <div class="card-footer">
                      <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                          <small>';

                          if($row["used"] == 0){
                            echo'
                            <span class="dot dot-lg bg-success mr-1"></span>'.$row["active"].'</small>';
                          }else{
                            echo'
                            <span class="dot dot-lg bg-danger mr-1"></span>'.$row["active"].'</small>';
                          }
                        echo'
                        </div>
                        <div class="col-auto">
                          <div class="file-action">
                            <button type="button" class="btn btn-link dropdown-toggle more-vertical p-0 text-muted mx-auto" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="text-muted sr-only">Action</span>
                            </button>
                            <div class="dropdown-menu m-2">
                              <a class="dropdown-item" href="editpo.php?id='.$row["id"].'"><i class="fe fe-meh fe-12 mr-4"></i>Info Po</a>
                              <a class="dropdown-item" href="#"><i class="fe fe-edit fe-12 mr-4"></i>Edit</a>
                              <a class="dropdown-item" href="#"><i class="fe fe-download fe-12 mr-4"></i>Download</a>
                              <a class="dropdown-item" href="#"><i class="fe fe-delete fe-12 mr-4"></i>Delete</a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div> <!-- /.card-footer -->
                  </div>
                </div> <!-- .col -->
                '



                        ;
                        
                      }
                    } else {
                      echo "<script> alert('Tài khoản hoặc mật khẩu không đúng, xin vui lòng thử lại!') </script>";
                    }
                    $conn->close();

                ?>

                <div class="col-md-9">
                </div> <!-- .col -->
              </div> <!-- .row -->
              <nav aria-label="Table Paging" class="my-3">
                <ul class="pagination justify-content-end mb-0">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item active"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </nav>
            </div> <!-- .col-12 -->
          </div> <!-- .row -->
        </div> <!-- .container-fluid -->
        
        
      </main> <!-- main -->
    
<?php
  include('footer.php')
?>