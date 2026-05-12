<?php
    include("db_conn.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stlyle.css">
    <title>Student Registration</title>
</head>
<body>
    <div class="wrapper">
        <div class="box">
            <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
            <h2 class="heading">Student Registration</h2>
            <hr>
            <table>
                <tr>
                    <td class="label">Name</td>
                    <td>: <input type="text" name="name" class="field" ></td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td>: <input type="email" name="email" class="field"  ></td>
                </tr>
                <tr>
                    <td class="label">Phone Number</td>
                    <td>:<input type="text" name="pho_no" class="field"  ></td>
                </tr>
                <tr>
                    <td class="label">Department</td>
                    <td>
                        :<select name="department" class="field" >
                            <option value="">Choose Department</option>
                            <option value="Computer Science">
                                Computer Science
                            </option>
                            <option value="Physical Science">
                                Physical Science 
                            </option>
                            <option value="Biological Science">
                                Biological Science
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="label">Username</td>
                    <td>: <input type="text" name="username" class="field"  ></td>
                </tr>
                <tr>
                    <td class="label">Password</td>
                    <td>: <input type="text" name="password" class="field" ></td>
                </tr>
            </table>
            <input type="submit" name="register" value="Register" class="btn" >
            <input type="submit" name="back" value="Back" class="btn">
            </form>
            <?php
            include("functions/login.php");
            include("functions/adminFunc.php");
                if(isset($_POST["register"])){
                    if(checkEmpty('username',$_POST['username']) && checkEmpty('password',$_POST['password']) && checkEmpty('name',$_POST['name']) && checkEmpty('department',$_POST['department']) ){
                        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
                        $password=$_POST["password"];
                        if(!userID($conn,$username) || userID($conn,$username)==null){
                            registerUser($conn,$username,$password);
                        }
                        else{
                            echo "<div class='error'>Username already exists!!</div>";
                        }
                        
                        
                    }
                    
                }
                else if(isset($_POST["back"])){
                    header("Location: adminHome.php");
                    exit();
                }
            ?>
        </div>
    </div>
</body>
</html>

