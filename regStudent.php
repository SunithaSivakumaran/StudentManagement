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
            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post" >
            <h2 class="heading">Student Registration</h2>
            <hr>
            <table>
                <tr>
                    <td class="label">Full Name:</td>
                    <td>: <input type="text" name="name" class="field" placeholder="John"></td>
                </tr>
                <tr>
                    <td class="label">Date Of Birth</td><td> :<input type="date" name="dob" class="field" ></td>
                </tr>
                <tr>
                    <td class="label">Gender</td>
                    <td>:<input type="text" name="gender" class="field" placeholder="Male/Female"></td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td>: <input type="email" name="email" class="field"  placeholder="1aA4o@example.com"></td>
                </tr>
                <tr>
                    <td class="label">Phone Number</td>
                    <td>:<input type="text" name="pho_no" class="field"  placeholder=" 0123456789"></td>
                </tr>
                <tr>
                    <td class="label">Address</td>
                    <td>: <input type="text" name="address" class="field" placeholder="House no, Road name, City"></td>
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
                    <td>: <input type="text" name="username" class="field" placeholder="john_123" ></td>
                </tr>
                <tr>
                    <td class="label">Password</td>
                    <td>: <input type="text" name="password" class="field" placeholder="Happy125%" ></td>
                </tr>
            </table>
            <input type="submit" name="register" value="Register" class="btn" >
            <input type="submit" name="back" value="Back" class="btn">
            </form>
            <?php
            include("functions/login.php");
            include("functions/adminFunc.php");
                if(isset($_POST["register"])){
                    
                    if( checkEmpty('name',$_POST['name']) && checkEmpty('department',$_POST['department']) && checkEmpty('username',$_POST['username']) && checkEmpty('password',$_POST['password']) && checkempty('gender',$_POST['gender'])) {

                        $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
                        $password=$_POST["password"];

                        if(!userID($conn,$username) || userID($conn,$username)==null){
                            
                            registerUser($conn,$username,$password);
                            $u_id=userID($conn,$username);
                            $name=filter_input(INPUT_POST,"name",FILTER_SANITIZE_SPECIAL_CHARS);
                            $email=filter_input(INPUT_POST,"email",FILTER_SANITIZE_EMAIL);//will return empty string if email has the character that should be not There
                            $pho_no=filter_input(INPUT_POST,"pho_no",FILTER_SANITIZE_NUMBER_INT);
                            $address=filter_input(INPUT_POST,"address",FILTER_SANITIZE_SPECIAL_CHARS);
                            $gender=$_POST["gender"];
                            $DOB=$_POST["dob"];
                            $department=$_POST["department"];

                            if(createStudent($name,$email,$pho_no,$department,$u_id,$gender,$DOB,$address,$conn)){
                                echo "<div style='color:#28a745;'>Registration succesfull</div>";
                            }
                            else{
                                deleteUser($conn,userID($conn,$username));
                                echo "<div class='error'>Registration failed</div>";
                            }
                    //         echo "<script>
                    //     document.getElementById('regForm').reset();
                    // </script>";

                        }
                        else{
                            
                            echo "<div class='error'>Username already exists, So change the username</div>";
                        }
                    }
                }
                else if(isset($_POST["back"])){
                    // echo "<script>
                    //     document.getElementById('regForm').reset();
                    // </script>";
                    header("Location: adminHome.php");
                    exit();
                }
            ?>
        </div>
    </div>
</body>
</html>

