<?php
    include("db_conn.php");
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
    <form action="<?php $_SERVER["PHP_SELF"]?>" method="post">
        <input type="submit" name="register" value="Register Student" class="btn">
    </form>
</body>
</html>
<?php

?>