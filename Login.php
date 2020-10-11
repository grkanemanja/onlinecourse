<?php

session_start();

?>


<?php

  error_reporting( E_ALL & ~E_NOTICE ^ E_DEPRECATED ) ;

?>


<?php

if (isset($_POST ['LoginButton'] )){
    $UserEmail = $_POST ['inputUserEmail'];
    $UserPassword = $_POST ['inputPassword'];

    require('connection.php');
    $GetUserQuery = "SELECT * FROM users WHERE user_email='".$UserEmail."' AND user_password = '".$UserPassword."' AND user_type='1'" ;
    $GetUserQuery2 = "SELECT * FROM users WHERE user_email='".$UserEmail."' AND user_password = '".$UserPassword."' AND user_type='2'" ;
    if($conn) {
        $y = mysqli_query($conn, $GetUserQuery);
        if(mysqli_num_rows($y) ==1) {
            $_SESSION['AdminEmail'] = $UserEmail;
            header('location: admin/index');
        }
        $z  = mysqli_query($conn, $GetUserQuery2);
        if(mysqli_num_rows($z) ==1) {
            $_SESSION['UserEmail'] = $UserEmail;
            header('location: User/index2');
        }
        else {
            $errorMessage = "check input again!";
        }
    }

    

    else {
        $UserEmailError = "";
        $UserPasswordError = "";

        if(empty($UserEmail) || $UserEmail="") {
            $UserEmailError = "Email cannot be empty!";
        }
        else{
            if(!filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
                $UserEmailError = "Invalid Email Format!";
            }

        }
        if(empty($UserPassword) || $UserPassword= "") {
            $UserPasswordError = "Password cannot be empty!";
        }
    }
    if(empty($UserEmailError) && empty($UserPasswordError)) {
       // require ('connection.php');
        
    }
    

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Majestic Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../vendors/base/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link  href="../../css/style.css" type="text/css" rel="stylesheet">
  <link  href="css/style.css" type="text/css" rel="stylesheet">
  <!-- endinject -->
  <link rel="shortcut icon" href="../../images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-stretch auth auth-img-bg">
        <div class="row flex-grow">
          <div class="col-lg-6 d-flex align-items-center justify-content-center">
            <div class="auth-form-transparent text-left p-3">
              <div class="brand-logo">
                <!-- <img src="../../images/favicon.png" alt="logo"> -->
              </div>
              <h4>Welcome back!</h4>
              <h6 class="font-weight-light">Happy to see you again!</h6>
              <form class="pt-3" method="POST">
                <div class="form-group">
                  <label for="exampleInputEmail">Username</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-account-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="email" class="form-control form-control-lg border-left-0" id="exampleInputEmail" placeholder="Username" name="inputUserEmail" value="<?php echo $_POST['inputUserEmail'] ?? ''; ?>">
                    
                  </div>
                  <?php 
                   echo $errorMessage ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword">Password</label>
                  <div class="input-group">
                    <div class="input-group-prepend bg-transparent">
                      <span class="input-group-text bg-transparent border-right-0">
                        <i class="mdi mdi-lock-outline text-primary"></i>
                      </span>
                    </div>
                    <input type="password" class="form-control form-control-lg border-left-0" id="exampleInputPassword" placeholder="Password" name="inputPassword">                        
                  </div>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <div class="form-check">
                  
                  </div>
                  
                </div>
                <div class="my-3">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="LoginButton">LOGIN</button>
                </div>
                
              </form>
            </div>
          </div>
          <div class="col-lg-6 login-half-bg d-flex flex-row">
           
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../vendors/base/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="../../js/off-canvas.js"></script>
  <script src="../../js/hoverable-collapse.js"></script>
  <script src="../../js/template.js"></script>
  <!-- endinject -->
</body>

</html>
