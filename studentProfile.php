<?php
session_start();

include ("db_conn.php");
include ("./functions/studentFunc.php");

    if(isset($_SESSION["s_id"])) {
    $s_id = $_SESSION["s_id"];
} else {
    echo "No session value found";
}

    
        if($_SESSION['role']=='student'){
            $s_id=getStudent($conn,$_SESSION["id"]);
            
        }
        
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stlyle.css">
    <title>Student Profile</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="wrapper-2 ">
            <?php profile($conn,$s_id);?>
            
            
        </div>
    </form>
</body>
</html>

