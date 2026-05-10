<?php
    include("conn.php");
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
        <form action="<?php $_SERVER["PHP_SELF"]?>">
        <h2 class="heading">Log in</h2>
        <table>
            <tr>
                <td class="label">Username</td>
                <td>: <input type="text" name="username" class="field"></td>
            </tr>
            <tr>
                <td class="label">Password</td>
                <td>: <input type="password" name="password" class="field"></td>
            </tr>
        </table>
        <input type="submit" name="login" value="Log in" class="btn">
        <input type="submit" name="register" value="Register" class="btn">
        </form>
    </div>
    </div>
</body>
</html>
<?php
    include("./functions/login.php");
    UserLogIN($_POST["usename"])

?>