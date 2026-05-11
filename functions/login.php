<?php
    include("db_conn.php");
    function UserLogIN($username,$password){
        $selectUserQuery="SELECT * FROM users WHERE username=?";
        $stmt=$conn->prepare($selectUserQuery);
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $result=$stmt->get_result();
    }
?>