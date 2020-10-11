<?php

include ('../render1.php');

?>

<?php
//delete button

if (isset($_POST ['DeleteStudent'] )){
    $user_id = $_POST ['user_id'];
    require('../connection.php');
    $GetUserQuery = "DELETE  FROM users WHERE user_id ='".$user_id."'";
    $result = mysqli_query($conn, $GetUserQuery);
        if($result){
            echo 'success';
        }
}

?>


<?php
require('../connection.php');
$query="SELECT users.user_id,users.user_type, users.user_name, users.user_email FROM users WHERE user_type = '2' ";
$result=mysqli_query($conn,$query);
echo "<table style='background-color: white' class='table table-bordered'>";
echo "<thead><tr><th>User_id</th><th>User_type</th><th>User_Name</th><th>User_Email</th><th></thead><tbody>";
while($podaci=mysqli_fetch_array($result)){
  $user_id=$podaci['user_id'];
  $user_type=$podaci['user_type'];
  $user_name=$podaci['user_name'];
  $user_email=$podaci['user_email'];
  $course_name=$podaci['course_name'];
  echo "<tr></td><td>$user_id</td><td>$user_type</td><td>$user_name</td><td>$user_email</td></td>
  <form method='POST'><td>
  <button type='submit' class='btn btn-danger' name='DeleteStudent'>Delete Student</td>
  <input type='hidden' name='user_id' value='$user_id'>
  </form></td>";
}
echo "</tbody></table>";

?>



<?php

include ('../render2.php');

?>
