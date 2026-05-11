<?php
    include("db_conn.php");
   

    $tableQuery=array("CREATE TABLE IF NOT EXISTS users(u_id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(25) UNIQUE,
                    password VARCHAR(255),
                    role ENUM('admin','student') DEFAULT 'student')",

                    "CREATE TABLE IF NOT EXISTS students(s_id INT AUTO_INCREMENT PRIMARY KEY,
                    name VARCHAR(25),
                    u_id int,
                    department VARCHAR(25),
                    pho_no VARCHAR(10),
                    email VARCHAR(100),
                    CONSTRAINT fk_stu FOREIGN KEY(u_id) REFERENCES users(u_id) ON DELETE CASCADE)",
                    
                    "CREATE TABLE IF NOT EXISTS courses(course_unit VARCHAR(10) PRIMARY KEY,
                    course_name VARCHAR(50),
                    department ENUM('Computer Science','Physical Science','Biological Science') NOT NULL)",
                    
                    "CREATE TABLE IF NOT EXISTS selections(s_id int NOT NULL,
                    course_unit VARCHAR(10) NOT NULL,
                    CONSTRAINT fk_selStud FOREIGN KEY(s_id) REFERENCES students(s_id),
                    CONSTRAINT fk_selCour FOREIGN KEY(course_unit) REFERENCES courses(course_unit))",
                    
                    "ALTER TABLE students 
                    MODIFY COLUMN department ENUM('Computer Science','Physical Science','Biological Science')" );

    foreach($tableQuery as $query){
        if(mysqli_query($conn,$query)){
            echo "table created succesfully <br>";
        }
        else{
            echo "coudnt create a table".mysqli_error($conn)."<br>";
        }
    }
    
    $admin=array("Sunitha"=>"Suki1203#");

    foreach($admin as $user=>$pwd){
        $insertTable=null;
        $hash=password_hash($pwd,PASSWORD_DEFAULT);
        $insertTable="INSERT INTO users(username,password,role)
                        values('$user','$hash','admin')";
        if(mysqli_query($conn,$insertTable)){
            echo "{$user} created succesfully<br>";
        }
        else{
            echo "Coudnt create a {$user}".mysqli_error($conn)."<br>";
        }
    }
?>