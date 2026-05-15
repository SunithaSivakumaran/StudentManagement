

<?php

    include("footer.html");

    function userID($conn,$username){
        $query="SELECT u_id FROM users WHERE username= ?";

        $stmt=mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"s",$username);
        $qurey=mysqli_stmt_execute($stmt);

        $result=mysqli_stmt_get_result($stmt);
        
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

    function createStudent($name,$email,$pho_no,$department,$u_id,$gender,$DOB,$address,$conn){
           
        $query="INSERT INTO students(name,email,pho_no,department,u_id,gender,DOB,address) VALUES(?,?,?,?,?,?,?,?)";

        $stmt=mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"ssssssss",$name,$email,$pho_no,$department,$u_id,$gender,$DOB,$address);
        mysqli_stmt_execute($stmt);
        

        try{
            //echo "student created succesfully";
            mysqli_stmt_execute($stmt);
            return true;
        }
        catch(mysqli_sql_exception){
            //echo "Coudnt create".mysqli_error($conn);
            echo "<div class='error'>Coudnt create".mysqli_error($conn)."</div>";
            return false;

        }
    }

    function getUser($conn){
        $userQuery="SELECT * FROM students";
        $result=mysqli_query($conn,$userQuery);
        if($result){

            $row=mysqli_num_rows($result);
            if($row>0){
                echo "<table  border=1>
                                <tr>
                                    <th>no</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Department</th>
                                    <th>See Profile</th>
                                    
                                </tr>";
                    $i=0;
                //mysqli_fetch_assoc get row one by one
                while($arrayOfResult=mysqli_fetch_assoc($result)){
                    $no =$i+1;
                    echo "<tr>
                            
                            <td>{$no}</td>
                            <td>{$arrayOfResult["name"]}</td>
                            <td>{$arrayOfResult["email"]}</td>
                            <td>{$arrayOfResult["pho_no"]}</td>
                            <td>{$arrayOfResult["department"]}</td>
                            <td>
                            <button name='profile' value='{$arrayOfResult["s_id"]}'>Profile</button></td>
            
                        </tr>";

                    $i++; 
                        
                }
                
            }
            else{
                echo "<div class='error'>Students table is empty</div>";
            }
        }
        else{
            echo "<div class='error'>Coudnt perform query!!". mysqli_error($conn)."</div>";
        }
    }




?>