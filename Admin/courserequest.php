<?php

include ('../render1.php');

?>

<?php

    require ('../connection.php');
        if(isset($_POST['ApproveCourse'])){
            $ApproveValue = $_POST ['ApproveValue'];
            $request_id = $_POST ['RequestId'];
                $UpdateQuery = "UPDATE courserequests SET isaccepted = '$ApproveValue' WHERE request_id = '$request_id'";
                $result = mysqli_query($conn, $UpdateQuery);
                if($result){
                    $PS = "sucessfully!";
                }
                else {
                    echo "something went wrong!";
                }
            
        }
        else if(isset($_POST['DeclineCourse'])){
            $DeclineValue = $_POST ['DeclineValue'];
            $request_id = $_POST ['RequestId'];
                $UpdateQuery = "UPDATE courserequests SET isaccepted = '$DeclineValue' WHERE request_id = '$request_id'";
                $result = mysqli_query($conn, $UpdateQuery);
                if($result){
                    $PS = "sucessfully!";
                }
                else {
                    echo "something went wrong!";
                }
            
        }        



?>





<?php

require('../Credentials/AdminCredentials.php');
require('../connection.php');
$query="SELECT request_id ,course_name, course_type, course_year, user_name, user_email FROM courserequests INNER JOIN course ON courserequests.course_fk = course.course_id INNER JOIN users ON courserequests.user_fk= users.user_id WHERE isaccepted !=1 && isaccepted !=2 ";
$result=mysqli_query($conn,$query);
echo "<table style='background-color: white' class='table table-bordered'>";
echo "<thead><tr><th>num.</th><th>course name</th><th>course type</th><th>year</th><th>name</th><th>email</th><th style='text-align: center'>request</th><th></thead><tbody>";
while($podaci=mysqli_fetch_array($result)){
  $request_id=$podaci['request_id'];
  $course_id=$podaci['course_id'];
  $course_name=$podaci['course_name'];
  $course_type=$podaci['course_type'];
  $course_year=$podaci['course_year'];
  $user_name=$podaci['user_name'];
  $user_email=$podaci['user_email'];
  $user_id=$GLOBALS['GLOBAL_USER_ID'];
  echo "<tr>
  </td>
  <td>$request_id.</td>
  <td>$course_name</td>
  <td>$course_type</td>
  <td>$course_year</td>
  <td>$user_name</td>
  <td>$user_email</td></td>
  <form method='POST'><td>
  <button  type='submit' class='btn btn-success' name='ApproveCourse'>Approve</button>
  <button  type='submit' class='btn btn-danger' name='DeclineCourse'>Decline</button>
  <input type='hidden' value='1' name='ApproveValue'>
  <input type='hidden' value='2' name='DeclineValue'>
  <input type='hidden' value='$request_id' name='RequestId'>
  </form></td>";
}
echo "</tbody></table>";



?>


<?php

include ('../render2.php');

?>

