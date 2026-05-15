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
                    DOB DATE,
                    gender ENUM('Male','Female') NOT NULL,
                    address VARCHAR(100),
                    reg_Date DATE DEFAULT CURRENT_DATE(),
                    CONSTRAINT fk_stu FOREIGN KEY(u_id) REFERENCES users(u_id) ON DELETE CASCADE)",
                    
                    "CREATE TABLE IF NOT EXISTS courses(course_unit VARCHAR(10) PRIMARY KEY,
                    course_name VARCHAR(50),
                    department ENUM('Computer Science','Physical Science','Biological Science') NOT NULL)",
                    
                    "CREATE TABLE IF NOT EXISTS selections(s_id int NOT NULL,
                    course_unit VARCHAR(10) NOT NULL,
                    CONSTRAINT fk_selStud FOREIGN KEY(s_id) REFERENCES students(s_id) ON DELETE CASCADE,
                    CONSTRAINT fk_selCour FOREIGN KEY(course_unit) REFERENCES courses(course_unit) ON DELETE CASCADE)",
                    
                    "ALTER TABLE students 
                    MODIFY COLUMN department ENUM('Computer Science','Physical Science','Biological Science')",
                    
                    "ALTER TABLE users 
                    MODIFY COLUMN role ENUM('admin','student') DEFAULT 'student'",

                    "ALTER TABLE students 
                    ADD CONSTRAINT unique_email_name UNIQUE(email,name)",
                    
                    "INSERT INTO courses (course_unit, course_name, department) VALUES

-- ======================
-- 30 Computer Science
-- ======================
('CS001', 'Intro to Programming 1', 'Computer Science'),
('CS002', 'Intro to Programming 2', 'Computer Science'),
('CS003', 'Data Structures 1', 'Computer Science'),
('CS004', 'Data Structures 2', 'Computer Science'),
('CS005', 'Algorithms 1', 'Computer Science'),
('CS006', 'Algorithms 2', 'Computer Science'),
('CS007', 'Database Systems 1', 'Computer Science'),
('CS008', 'Database Systems 2', 'Computer Science'),
('CS009', 'Operating Systems 1', 'Computer Science'),
('CS010', 'Operating Systems 2', 'Computer Science'),
('CS011', 'Computer Networks 1', 'Computer Science'),
('CS012', 'Computer Networks 2', 'Computer Science'),
('CS013', 'Software Engineering 1', 'Computer Science'),
('CS014', 'Software Engineering 2', 'Computer Science'),
('CS015', 'Web Development 1', 'Computer Science'),
('CS016', 'Web Development 2', 'Computer Science'),
('CS017', 'AI Basics 1', 'Computer Science'),
('CS018', 'AI Basics 2', 'Computer Science'),
('CS019', 'Machine Learning 1', 'Computer Science'),
('CS020', 'Machine Learning 2', 'Computer Science'),
('CS021', 'Cyber Security 1', 'Computer Science'),
('CS022', 'Cyber Security 2', 'Computer Science'),
('CS023', 'Cloud Computing 1', 'Computer Science'),
('CS024', 'Cloud Computing 2', 'Computer Science'),
('CS025', 'Mobile App Dev 1', 'Computer Science'),
('CS026', 'Mobile App Dev 2', 'Computer Science'),
('CS027', 'Programming Java', 'Computer Science'),
('CS028', 'Programming Python', 'Computer Science'),
('CS029', 'Advanced Databases', 'Computer Science'),
('CS030', 'Final Year Project CS', 'Computer Science'),

-- ======================
-- 30 Physical Science
-- ======================
('PS001', 'Physics I', 'Physical Science'),
('PS002', 'Physics II', 'Physical Science'),
('PS003', 'Mechanics 1', 'Physical Science'),
('PS004', 'Mechanics 2', 'Physical Science'),
('PS005', 'Electromagnetism 1', 'Physical Science'),
('PS006', 'Electromagnetism 2', 'Physical Science'),
('PS007', 'Quantum Physics 1', 'Physical Science'),
('PS008', 'Quantum Physics 2', 'Physical Science'),
('PS009', 'Thermodynamics 1', 'Physical Science'),
('PS010', 'Thermodynamics 2', 'Physical Science'),
('PS011', 'Optics 1', 'Physical Science'),
('PS012', 'Optics 2', 'Physical Science'),
('PS013', 'Nuclear Physics 1', 'Physical Science'),
('PS014', 'Nuclear Physics 2', 'Physical Science'),
('PS015', 'Mathematical Physics', 'Physical Science'),
('PS016', 'Astrophysics 1', 'Physical Science'),
('PS017', 'Astrophysics 2', 'Physical Science'),
('PS018', 'Solid State Physics', 'Physical Science'),
('PS019', 'Wave Theory', 'Physical Science'),
('PS020', 'Laboratory Physics', 'Physical Science'),
('PS021', 'Applied Physics 1', 'Physical Science'),
('PS022', 'Applied Physics 2', 'Physical Science'),
('PS023', 'Computational Physics', 'Physical Science'),
('PS024', 'Modern Physics', 'Physical Science'),
('PS025', 'Engineering Physics', 'Physical Science'),
('PS026', 'Physics Lab Advanced', 'Physical Science'),
('PS027', 'Energy Systems', 'Physical Science'),
('PS028', 'Material Science', 'Physical Science'),
('PS029', 'Physics Research Methods', 'Physical Science'),
('PS030', 'Final Year Project PS', 'Physical Science'),

-- ======================
-- 30 Biological Science
-- ======================
('BS001', 'Biology Basics', 'Biological Science'),
('BS002', 'Cell Biology 1', 'Biological Science'),
('BS003', 'Cell Biology 2', 'Biological Science'),
('BS004', 'Genetics 1', 'Biological Science'),
('BS005', 'Genetics 2', 'Biological Science'),
('BS006', 'Microbiology 1', 'Biological Science'),
('BS007', 'Microbiology 2', 'Biological Science'),
('BS008', 'Human Anatomy 1', 'Biological Science'),
('BS009', 'Human Anatomy 2', 'Biological Science'),
('BS010', 'Physiology 1', 'Biological Science'),
('BS011', 'Physiology 2', 'Biological Science'),
('BS012', 'Biochemistry 1', 'Biological Science'),
('BS013', 'Biochemistry 2', 'Biological Science'),
('BS014', 'Ecology 1', 'Biological Science'),
('BS015', 'Ecology 2', 'Biological Science'),
('BS016', 'Botany 1', 'Biological Science'),
('BS017', 'Botany 2', 'Biological Science'),
('BS018', 'Zoology 1', 'Biological Science'),
('BS019', 'Zoology 2', 'Biological Science'),
('BS020', 'Evolutionary Biology', 'Biological Science'),
('BS021', 'Molecular Biology', 'Biological Science'),
('BS022', 'Biotech Basics', 'Biological Science'),
('BS023', 'Immunology', 'Biological Science'),
('BS024', 'Parasitology', 'Biological Science'),
('BS025', 'Marine Biology', 'Biological Science'),
('BS026', 'Environmental Biology', 'Biological Science'),
('BS027', 'Plant Science', 'Biological Science'),
('BS028', 'Animal Science', 'Biological Science'),
('BS029', 'Research Methods BS', 'Biological Science'),
('BS030', 'Final Year Project BS', 'Biological Science'),

-- ======================
-- 10 RANDOM MIX
-- ======================
('CS031', 'AI Advanced Topics', 'Computer Science'),
('PS031', 'Nano Physics', 'Physical Science'),
('BS031', 'DNA Engineering', 'Biological Science'),
('CS032', 'Game Development', 'Computer Science'),
('PS032', 'Space Physics', 'Physical Science'),
('BS032', 'Marine Ecology', 'Biological Science'),
('CS033', 'DevOps Basics', 'Computer Science'),
('PS033', 'Energy Physics Lab', 'Physical Science'),
('BS033', 'Genetic Research', 'Biological Science'),
('CS034', 'System Design', 'Computer Science');",

                    
                    );

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