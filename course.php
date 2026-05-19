<?php
    include("db_conn.php");
    include("./functions/studentFunc.php");

    session_start();

    $s_id = $_SESSION["s_id"];

    if(isset($_POST["back"])){
        header("Location: studentProfile.php");
        exit();

    }

    if(isset($_POST["reg-course"])){
        header("Location: regCourse.php");
        exit();
    }

    if(isset($_POST["enroll"])){
        $status=enrollCourse($conn,$s_id,$_POST["enroll"]);
        if($status){
            
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Course selection</title>
</head>
<body>
   
            <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                 <div class="wrapper">
        
                <h2 class="heading" >
                    Available Courses
                </h2>

                 <div class="btn-grp2" >
                    <button name="back" >Back</button>
                    <button name="reg-course">Registered Courses</button>
                </div>
    </div>
                <div class="wrapper-1">
                <div class="table">
                
                <?php availableCourses($conn,$s_id)?>
                </div>
               </div>
            </form>
        
           
    </div>
</body>
</html>