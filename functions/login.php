

<?php
    include('footer.html');
    function UserLogIN($conn,$username,$password){
        $selectUserQuery="SELECT * FROM users WHERE username= ?";
        $stmt=mysqli_prepare($conn,$selectUserQuery);
        mysqli_stmt_bind_param($stmt,'s',$username);
        $result=mysqli_stmt_get_result($stmt);
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

    function checkEmpty($name,$value){
        if(empty($value)){
            echo "<div class='error'>{$name} is empty!!</div>";
            return false;
        }
        else{
            return true;
        }
    }

    function registerUser($conn,$usernane,$password){
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $loginQuery="INSERT INTO users(username,password) VALUES('$usernane','$hash')";

        if(mysqli_query($conn,$loginQuery)){
            //echo "User created successfully";
        }
        else{
            echo "<div class='error'>Coudnt create a user".mysqli_error($conn)."</div>";
        }
    }
?>