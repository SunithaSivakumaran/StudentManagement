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
                    <td>: <input type="text" name="name" class="field"  required></td>
                </tr>
                <tr>
                    <td class="label">Email</td>
                    <td>: <input type="email" name="email" class="field"  required></td>
                </tr>
                <tr>
                    <td class="label">Phone Number</td>
                    <td>: <input type="text" name="pho_no" class="field"  required></td>
                </tr>
                <tr>
                    <td class="label">Department</td>
                    <td>: <input type="text" name="department" class="field"  required></td>
                </tr>
                <tr>
                    <td class="label">Username</td>
                    <td>: <input type="text" name="username" class="field"  required></td>
                </tr>
                <tr>
                    <td class="label">Password</td>
                    <td>: <input type="text" name="password" class="field"  required></td>
                </tr>
            </table>
            <input type="submit" name="register" value="Register" class="btn" >
            </form>
            <?php
                if(isset($_POST["register"])){
                    $username=filter_input(INPUT_POST,"username",FILTER_SANITIZE_SPECIAL_CHARS);
                    $password=$_POST["password"];
                }
            ?>
        </div>
    </div>
</body>
</html>

