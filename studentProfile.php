<?php
session_start();

include ("db_conn.php");
include ("./functions/studentFunc.php");

    if(isset($_SESSION["s_id"])) {
    $s_id = $_SESSION["s_id"];
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
    <div class="wrapper-2">
        <div class="box2">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <table>
            <tr>
                <td><label for="">Full Name</label></td>
                <td>:<input type="text" name="name" value="<?php echo infoStudent($conn,$s_id,'name')?>"></td>
            </tr>
        </table>
            
            
        
    </form>
    </div>
</div>
</body>
</html>

