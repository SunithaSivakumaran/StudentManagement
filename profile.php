<?php
session_start();
    if(isset($_SESSION["s_id"])) {
    echo $_SESSION["s_id"];
} else {
    echo "No session value found";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stlyle.css">
    <title>Student Profile</title>
</head>
<body>
    <form action="<?php $_SERVER['PHP_SELF']?>">
        
    </form>
</body>
</html>