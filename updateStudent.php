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
            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
            <h2 class="heading">Student Registration</h2>
            <hr>
            <table>
                <tr>
                    <td class="label">Name</td>
                    <td>: <input type="text" name="name" class="field" placeholder="John"></td>
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
            <input type="submit" name="update" value="Update" class="btn" >
            <input type="submit" name="back" value="Back" class="btn">
            </form>
             </div>
    </div>
</body>
</html>
