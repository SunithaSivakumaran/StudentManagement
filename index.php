<?php
    include("db_conn.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stlyle.css">
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
    <div class="box">
        <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <h2 class="heading">Log in</h2>
        <hr>
        <table>
            <tr>
                <td class="label">Username</td>
                <td>: <input type="text" name="username" class="field"  ></td>
            </tr>
            <tr>
                <td class="label">Password</td>
                <td>: <input type="password" name="password" class="field"  ></td>
            </tr>
        </table>
        <input type="submit" name="login" value="Log in" class="btn" >
        </form>


        <?php
    
    include("./functions/login.php");
    if(isset($_POST["login"])){
        if(checkEmpty('username',$_POST["username"]) && checkEmpty('password',$_POST["password"])){
            $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
            $password=$_POST["password"];
            $user=UserLogIN($conn,$username,$password);
            if($user){
                $_SESSION["user"]=$user["username"];
                $_SESSION["id"]=$user["u_id"];

            if($user["role"]=='admin'){
                header("Location: adminHome.php");
                exit();
            }
        }
        
        }
        
            
        
         
        
         }
        ?>

    </div>
    </div>
</body>
</html>
