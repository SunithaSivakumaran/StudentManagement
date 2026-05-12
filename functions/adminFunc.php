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

    function userID($conn,$username){
        $query="SELECT u_id FROM users WHERE username= '$username'";

        $result=mysqli_query($conn,$query);
        
        if($result){
            $rows=mysqli_num_rows($result);
            if($rows>0){
                $result_array=mysqli_fetch_assoc($result);
                return $result_array['u_id'];
            }
            else{
                return false;
            }
        }
        else{
            echo "<div class='error'>Coudnt perform query!!". mysqli_error($conn)."</div>";
        }
    }

    function createStudent($name,$email,$pho_no,$department,$u_id,$conn){
           
        $query="INSERT INTO students(name,email,pho_no,department,u_id) VALUES('$name','$email','$pho_no','$department','$u_id')";

        if(mysqli_query($conn,$query)){
            //echo "student created succesfully";
            return true;
        }
        else{
            //echo "Coudnt create".mysqli_error($conn);
            return false;

        }
    }


?>