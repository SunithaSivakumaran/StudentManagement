<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error{
            color: red;
            font-size: 15px;
            text-align: center;
            font-weight: normal;
        }
    </style>
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
    function regStudent($conn,$name,$u_id,$department,$pho_no,$email){
        $insertQuery="INSERT INTO students(name,u_id,department,pho_no,email)
        values('$name','$u_id','$department','$pho_no','$email')";
        if(mysqli_query($conn,$insertQuery)){
            echo "student registered successfully";
        }
        else{
            echo "<div class='error'>student registration failed".mysqli_error($conn)."</div>";
        }
    }

    function 
?>