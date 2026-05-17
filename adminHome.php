<?php
    session_start();
    include("db_conn.php");
    include("functions/adminFunc.php");
    
    if(isset($_POST["register"])){
        header("Location: regStudent.php");
        exit();
    }
    
     if(isset($_POST["profile"])){
        $sid=$_POST["profile"];
        $_SESSION["s_id"]=$sid;
        header("Location: studentProfile.php");
        exit();
    }

    if(isset($_POST["logout"])){
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
    <link rel="stylesheet" href="./stlyle.css" >
    <title>Home</title>
</head>
<body>
    <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
        <div class="header-wrapper">

            <h2 class="title">Student Details</h2>
            
           <div class=" reg">
                <input type="submit" name="register" value="Register Student" class="btn">
                <input type="submit" name='logout' value='Logout' class='btn'>
           </div>
        </div>
    
        <div class="wrapper-1">
                <div class="table" >
                    <?php
                        getUser($conn);
                    ?>
                    
                </div>
                
                    
                
        </div>
        
    </form>

</body>
</html>


