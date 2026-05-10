<?php
    $host="localhost";
    $host_name="root";
    $host_pwd="";
    $db_name="student_management";

    try {
        mysqli_connect($host,$host_name,$host_pwd,$db_name);
        echo "Connection succesful.<br>";
    }
    catch(mysqli_sql_exception){
        echo "Codn't connect to the database ";
    }
?>