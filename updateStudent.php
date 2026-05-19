<?php
    include('db_conn.php');

    if(isset($_POST["back"])){
        header("Location: studentProfile.php");
        exit();

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <div class="box2">
            <label for=""></label>
            <button name="back">Back</button>
        </div>
    </form>
</body>
</html>