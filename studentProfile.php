<?php
session_start();

include ("db_conn.php");
include ("./functions/studentFunc.php");

    

    
        if($_SESSION['role']=='student'){
            $s_id=getStudent($conn,$_SESSION["id"]);
            
        }
        elseif($_SESSION['role']=='admin'){
              $s_id = $_SESSION["s_id"];
        }
        
        if(isset($_POST["back"])){
            unset($_SESSION["s_id"]);
            header("Location: adminHome.php");
            exit();
        }
    
        if(isset($_POST['logout'])){
            $_SESSION[]=array();
            session_destroy();
            header("Location: index.php");
            exit();
        }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Student Profile</title>
</head>
<body>
    <div class="wrapper-2">
        <div class="box2">
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="btn"><button>Registered Courses</button></div>
        <table>
            <tr>
                <td>
                    <label for="">Full Name</label>
                </td>
                <td>
                    :<input type="text" name="name" value="<?php echo infoStudent($conn,$s_id,'name')?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Gender</label>
                </td>
                <td>
                    :<input type="text" name="gender" value="<?php echo infoStudent($conn,$s_id,'gender')?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Date Of Birth</label>
                </td>
                <td>
                    :<input type="date" name="DOB" value="<?php echo infoStudent($conn,$s_id,'DOB')?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Email</label>
                </td>
                <td>
                    :<input type="email" name="email" value="<?php echo infoStudent($conn,$s_id,'email')?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Phone Number</label>
                </td>
                <td>
                    :<input type="text" name="pho_no" value="<?php echo infoStudent($conn,$s_id,'pho_no')?>" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Address</label>
                </td>
                <td>
                    :<input type="text" name="address" value="<?php echo infoStudent($conn,$s_id,'address')?>" style="width: 300px;" readonly>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Department</label>
                </td>
                <td>
                    :<input type="text" name="department" value="<?php echo infoStudent($conn,$s_id,'department')?>" readonly><br>
                </td>
            </tr>
           <tr>
            
        </table>
            
            <div class="btn-grp">
                <?php  btn($_SESSION['role']);?>
            </div>
        
    </form>
    </div>
</div>

</body>
</html>

