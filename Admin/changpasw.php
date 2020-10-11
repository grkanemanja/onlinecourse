
<?php

include ('../render1.php');



?>

<?php
    require ('../connection.php');
        if(isset($_POST['ChangePasswordButton'])){
            $Password1 = $_POST ['Password1'];
            $Password2 = $_POST ['Password2'];
            $PasswordError = "";
            if(empty($Password1) || $Password2=="")
            {
                $PasswordError = "All fields are required!";
            }
            else if ($_POST['Password1'] != $_POST['Password2'])
            {
                $PasswordError2 = 'Password do not match';
            }
            if(empty($PasswordError || $PasswordError2)){
                $UpdateQuery = "UPDATE users SET user_password= $Password2 WHERE user_email = '".$_SESSION['AdminEmail']. "' ";
                $result = mysqli_query($conn, $UpdateQuery);
                if($result){
                    $PasswordSuccess = "Password changed sucessfully!";
                }
                else {
                    echo "something went wrong!";
                }
            }
        }

?>

<form method="POST">
<div class="card-body">
<h3 class="card-title">Change Password</h4><br>
    <form class="forms-sample">

      <div class="form-group">
        <label for="exampleInputPassword1">Current Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Current Password" name="Password1" maxlength="10">
        
      </div>
      <div class="form-group">
        <label for="exampleInputConfirmPassword1">New Password</label>
        <input type="password" class="form-control" id="exampleInputConfirmPassword1" placeholder="New Password" name="Password2" maxlength="10">
        <label><?php echo $PasswordError; echo $PasswordError2; echo $PasswordSuccess  ?></label>
</div>
      <button type="submit" class="btn btn-primary mr-2" name="ChangePasswordButton">Submit</button>
    </form>
  </div>
</form>
<?php

include ('../render2.php');

?>

