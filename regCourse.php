<?php
    include("db_conn.php");
    include("./functions/studentFunc.php");
    include("./functions/adminFunc.php");

    session_start();

    $s_id = $_SESSION["s_id"];

    if(isset($_POST["back"])){
        header("Location: course.php");
        exit();
    }

    if(isset($_POST["drop"])){
        $course_unit=$_POST["drop"];
        $status=dropCourse($conn,$s_id,$course_unit);
    
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
                 <div class="wrapper">
        
                <h2 class="heading" >
                    Registered Courses
                </h2>

                 <div class="btn-grp2" >
                    <button name="back" >Back</button>
                    
                </div>
    </div>
                <div class="wrapper-1">
                <div class="table">
                
                <?php registeredCourses($conn,$s_id,$_SESSION['role']);?>
                </div>
               </div>
            </form>
        
</body>
</html>