<?php

include ('../render1.php');

?>
<?php


if(isset($_POST['AddButton'])){	
    $UserEmail = $_POST['UserEmail'];
    $UserName = $_POST['UserName'];
    $UserPassword = $_POST['UserPassword'];
    $UserType=$_POST['UserType'];
    require('../connection.php');
    
    $Query=mysqli_query($conn,"SELECT * FROM users WHERE user_email='$UserEmail'");
    
    if(mysqli_num_rows($Query)>0){
      $message= 'Email already registred!';
    //  header('newstudent.php');
    }else{
      $UserEmailERROR="";
      $UserNameERROR="";
      $UserPasswordERROR="";
      if(empty($UserEmail) || $UserEmail == ""){
          $UserEmailERROR = "Email cannot be empty!";
  } else {
      if (!filter_var($UserEmail, FILTER_VALIDATE_EMAIL)) {
           $UserEmailERROR = "Invalid email format!";
     }
  }
  if(empty($UserName) || $UserName == ""){
      $UserNameERROR = "Name cannot be empty!";
} else {
   if (!preg_match("/^[- '\p{L}]+$/u",$UserName)) {
        $UserNameERROR = "Only letters in name are allowed!";

  }
}
if(empty($UserPassword) || $UserPassword == ""){
  $UserPasswordERROR = "Password cannot be empty!";
}


  if(empty($UserEmailERROR) && empty($UserNameERROR) && empty($UserPasswordERROR)){
  require('../connection.php');
  $x = mysqli_query($conn,"INSERT INTO users (user_type, user_name, user_email, user_password) VALUES ('".$UserType."', '".$UserName."', '".$UserEmail."', '".$UserPassword."')");
    if($x){
                    $uspesno="successfully added";
                    // header('Location: addnewuser.php');
                  }
                  else{
                     $nesto =  "something went wrong!";
                  }
}
}
  }

?>

<div class="card-body">
                  <h3 class="card-title">Add Student</h3><br>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="Name" name = "UserName" value="<?php echo $_POST['UserName'] ?? ''; ?>">
                      <label><?php echo $UserNameERROR ?></label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="UserEmail" value="<?php echo $_POST['UserEmail'] ?? ''; ?>">
                      <label><?php echo $UserEmailERROR; echo $message; ?></label>
                    </div>
                    <div class="form-group">
                      <!-- <label for="exampleInputPassword1">Type</label> -->
                      <input type="hidden" class="form-control" id="exampleInputPassword1" placeholder="UserType" value="2" name="UserType"> 
                     </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Password</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="Password" name="UserPassword" value="default" readonly>
                      <label><?php echo $uspesno; echo $nesto ?></label>
                    </div>
                  
                    <button type="submit" class="btn btn-primary mr-2" name= "AddButton">Submit</button>
                   
                  </form>
                </div>
              </div>
            














<?php

include ('../render2.php');

?>
