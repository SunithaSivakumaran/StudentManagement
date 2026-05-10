<?php
    include("conn.php");
    function UserLogIN($username,$password){
        $selectUserQuery="SELECT * FROM users WHERE username=?";
        $stmt=$conn->prepare($selectUserQuery);
        $stmt->bind_param("s",$username);
        $stmt->execute();
    }
?>