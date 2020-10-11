<?php

include ('../render1.php');



?>

<?php


if(isset($_POST['CourseSubmit'])){	
  $CourseName = $_POST['CourseName'];
  $CourseType = $_POST['CourseType'];
  $CourseYear = $_POST['CourseYear'];
  $CourseLink = $_POST['CourseLink'];
  require('../connection.php');
  $Query=mysqli_query($conn,"SELECT * FROM course WHERE link='$CourseLink'");
  if(mysqli_num_rows($Query)>0){
    $message= 'Link already exsist!';
  //  header('newstudent.php');
  }else{
    $CourseNameERROR="";
    $CourseTypeERROR="";
    $CourseYearERROR="";
    $CourseLinkERROR="";

    if(empty($CourseName) || $CourseName == ""){
        $CourseNameERROR = "Course cannot be empty!";
} 
if(empty($CourseType) || $CourseType == ""){
    $CourseTypeERROR = "Course type cannot be empty!";
} 

if(empty($CourseYear) || $CourseYear == ""){
  $CourseYearERROR = "Course Year cannot be empty!";
}

if(empty($CourseLink) || $CourseLink == ""){
  $CourseLinkERROR = "Course Link cannot be empty!";
}



if(empty($CourseNameERROR) && empty($CourseTypeERROR) && empty($CourseYearERROR) && empty($CourseLinkERROR) ){
require('../connection.php');
$x = mysqli_query($conn,"INSERT INTO course (course_name, course_type, course_year, link) VALUES('".$CourseName."', '".$CourseType."', '".$CourseYear."','".$CourseLink."')");
  if($x){
                  $uspesno="successfully added";
                  
                }
                else{
                    $nesto = "something went wrong!";
                }
}
  }
}




?>

<div class="card-body">
                  <h3 class="card-title">Add Course</h3><br>
                  <p class="card-description">
                    
                  </p>
                  <form class="forms-sample" method="POST">
                    <div class="form-group">
                      <label for="exampleInputUsername1">Name</label>
                      <input type="text" class="form-control" id="exampleInputUsername1" placeholder="CourseName" name="CourseName">
                      <label><?php echo $CourseNameERROR ?></label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Type</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="CourseType" name="CourseType">
                      <label><?php echo $CourseTypeERROR?></label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Year</label>
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="CourseYear" name="CourseYear">
                      <label><?php echo $CourseTypeERROR ?></label>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputConfirmPassword1">Link</label>
                      <input type="text" class="form-control" id="exampleInputConfirmPassword1" placeholder="CourseLink" name="CourseLink"> 
                      <label><?php echo $CourseLinkERROR ?></label>
                    </div>
                  
                    <button type="submit" class="btn btn-primary mr-2" name="CourseSubmit">Submit</button>
                   <label><?php echo $uspesno; echo $nesto ?></label>
                  </form>
                </div>
              </div>
            








<?php

include ('../render2.php');



?>
