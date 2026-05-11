<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .error{
            color: rgb(201, 0, 0);
            font-size: 17px;
            text-align: center;
            font-weight:normal;
            font-family:sans-serif;
        }
    </style>
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php
    
    function UserLogIN($conn,$username,$password){
        $selectUserQuery="SELECT * FROM users WHERE username='$username'";
        $result=mysqli_query($conn,$selectUserQuery);
        if($result){
            if(mysqli_num_rows($result)>0){
            $user=mysqli_fetch_assoc($result);
            if(password_verify($password,$user["password"])){
                
                //echo "Login successful";
                return $user;
            }
            else{
                echo "<div class='error'>Wrong password!!!</div>";
            }
        }
        else{
            echo "<div class='error'>There is no such a user !!</div>";

        }
        }
        else{
                echo "</div class='error'>Coudnt perform query!!". mysqli_error($conn)."</div>";
        }
        
        
        
    }

    function fieldEmpty($name,$value){
        if(empty($value)){
            echo "<div class='error'>{$name} is empty!!</div>";
        }
        else{
            return true;
        }
    }
?>