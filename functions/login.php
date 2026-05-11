<?php
    
    function UserLogIN($conn,$username,$password){
        $selectUserQuery="SELECT * FROM users WHERE username='$username'";
        $result=mysqli_query($conn,$selectUserQuery);
        if($result){
            if(mysqli_num_rows($result)>0){
            $user=mysqli_fetch_assoc($result);
            if(password_verify($password,$user["password"])){
                
                echo "Login successful";
                return $user;
            }
            else{
                echo "Wrong password";
            }
        }
        else{
            echo "There is no such username";

        }
        }
        else{
                echo "Coudnt perform query". mysqli_error($conn);
        }
        
        
        
    }
?>