


<?php

    include("footer.html");



    function getStudent($conn,$u_id){
        $query="SELECT * FROM students WHERE u_id=?";
        $prepare=mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($prepare,"i",$u_id);
        mysqli_stmt_execute($prepare);

        $result=mysqli_stmt_get_result($prepare);

        if($result){
            $row=mysqli_num_rows($result);
            if($row>0){
                $arrayOfResult=mysqli_fetch_assoc($result);
                return $arrayOfResult['s_id'];
            }
            else{
                return false;
            }
        }
        else{
            echo "<div class='error'>Coudnt perform query!!". mysqli_error($conn)."</div>";
        }
    }
    // function profile($conn,$s_id){
    //     $query="SELECT * FROM students WHERE s_id=?";

    //     $prepare=mysqli_prepare($conn,$query);
    //     mysqli_stmt_bind_param($prepare,"i",$s_id);
    //     mysqli_stmt_execute($prepare);

    //     $result=mysqli_stmt_get_result($prepare);

    //     $row=mysqli_num_rows($result);
    //     if($row>0){
    //         $result_array=mysqli_fetch_assoc($result);
    //         echo "<table>
    //                    <tr>
    //                        <td><label>Name</label></td>
    //                        <td>:{$result_array["name"]}</td>
    //                    </tr> 
    //                    <tr>
    //                         <td><label>Department</label></td><td>:{$result_array["department"]}</td></tr>
    //                    <tr>
    //                         <td><label>Email</label></td>
    //                         <td>:{$result_array["email"]}</td>
    //                     </tr>
    //                     <tr>
    //                         <td><label>Phone Number</label></td>
    //                         <td>:{$result_array["pho_no"]}</td>
    //                     </tr>
                       
    //             </table>";
    //     }
    //     else{
    //         echo "<div class='error'>Coudnt perform query!!". mysqli_error($conn)."</div>";
    //     }

       
    // }

    function infoStudent($conn,$s_id,$column){
        $allowed=["name","email","pho_no","department","gender","DOB","address"];

        if(in_array($column,$allowed)){
            $query="SELECT $column FROM students WHERE s_id=?";
            $stmt=mysqli_prepare($conn,$query);
            mysqli_stmt_bind_param($stmt,"s",$s_id);
            mysqli_stmt_execute($stmt);
            $result=mysqli_stmt_get_result($stmt);
            if($result){

                    $value=mysqli_fetch_assoc($result);
                    return $value[$column];
                }
                else{
                    return null;
                }

            }
        }

        function btn($role){
            if($role=='student'){
                echo "  <button name='update'>Update</button>
                        <button name='logout'>Logout</button>
                        ";
            }
            elseif($role=='admin'){
                echo "
                    <button name='update'>Update</button>
                    <button name='back'>Back</button>
                        ";
            }
            else{
                echo "<div class='error'>There is no such a role</div>";
            }
        }
    
    function updateStudent($conn,$s_id,$column,$value){
        $allowed=["name","email","pho_no","gender","DOB","address"];
        if(in_array($column,$allowed)){

            $query="UPDATE students SET $column=? WHERE s_id=?";
            $stmt=mysqli_prepare($conn,$query);
            mysqli_stmt_bind_param($stmt,"si",$value,$s_id);

            if(mysqli_stmt_execute($stmt)){
                return true;
            }
            else{
                return false;
            }
        }
        

    }

    function availableCourses($conn,$s_id){
        $department=infoStudent($conn,$s_id,'department');
        $query="SELECT * FROM courses WHERE department=?";
        $stmt=mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"s",$department);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if($result){
            $row=mysqli_num_rows($result);
            if($row>0){
                echo "<table>
                        <tr>
                        <th style='padding:10px 40px'>Course Unit</th>
                        <th style='padding:10px 40px'>Course Name</th>
                        <th style='padding:10px 40px'>Preference</th>
                        </tr>
                        ";
               
                while($arrayOfResult=mysqli_fetch_assoc($result)){
                    $status="SELECT * FROM selections WHERE s_id=? AND course_unit=?";
                    $stmt2=mysqli_prepare($conn,$status);
                    mysqli_stmt_bind_param($stmt2,"is",$s_id,$arrayOfResult['course_unit']);
                    mysqli_stmt_execute($stmt2);
                    $result2=mysqli_stmt_get_result($stmt2);
                    if($result2){
                        $row2=mysqli_num_rows($result2);
                        if($row2>0){
                            echo "<tr style='background-color: #28A745'>";
                            echo "<td>{$arrayOfResult['course_unit']}</td>";
                            echo "<td>{$arrayOfResult['course_name']}</td>";
                            echo "<td style='padding:10px 40px;color:white;'>Enrolled</td>";
                        }
                        else{
                            echo "<tr>";
                            echo "<td>{$arrayOfResult['course_unit']}</td>";
                            echo "<td>{$arrayOfResult['course_name']}</td>";
                            echo "<td><button name='enroll' value='{$arrayOfResult['course_unit']}' '>Enroll</button></td>";
                        }
                        echo "</tr>";
                    }
            }
                echo "</table>";
            }
            else{
                echo "<div class='error'>There is no course available </div>";
            }
        }
            else{
                return false;
            }

    }

   

    function enrollCourse($conn,$s_id,$course_unit){
        $query="INSERT INTO selections (s_id,course_unit) VALUES (?,?)";
        $stmt=mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"is",$s_id,$course_unit);
        try{
            mysqli_stmt_execute($stmt);
            return true;
        }
        catch(mysqli_sql_exception){
            echo "<div class='error'>You have already enrolled in this course</div>";
            return false;
        }

    }

    function registeredCourses($conn,$s_id,$role){
        $query="SELECT course_unit FROM selections WHERE s_id=?";
        $stmt=mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($stmt,"i",$s_id);
        mysqli_stmt_execute($stmt);
        $result=mysqli_stmt_get_result($stmt);
        if($result){
            $row=mysqli_num_rows($result);
            if($row>0){

                    echo "<table>
                            <tr>
                            <th style='padding:10px 40px'>Course Unit</th>
                            <th style='padding:10px 40px'>Course Name</th>";

                    if($role=='admin'){
                        echo "<th style='padding:10px 40px'>Drop</th>";
                    }


                    while($arrayOfResult=mysqli_fetch_assoc($result)){

                        $course_name="SELECT course_name FROM courses WHERE course_unit=?";
                        $stmt2=mysqli_prepare($conn,$course_name);
                        mysqli_stmt_bind_param($stmt2,"s",$arrayOfResult['course_unit']);
                        mysqli_stmt_execute($stmt2);
                        $result2=mysqli_stmt_get_result($stmt2);
                        if($result2){
                            $arrayOfResult2=mysqli_fetch_assoc($result2);
                            echo "<tr>";
                            echo "<td style='padding:10px 40px'>{$arrayOfResult['course_unit']}</td>";
                            echo "<td style='padding:10px 40px'>{$arrayOfResult2['course_name']}</td>";
                            if($role=='admin'){
                                echo "<td style='padding:10px 40px'><button name='drop' value='{$arrayOfResult['course_unit'] }'  style='background-color:red;color:white;border-color:red'>Drop</button></td>";
                            }
                            echo "</tr>";
                        }

                    }
                }
                else{
                    if($role=='admin'){
                        echo "<div class='error'>This student has not enrolled in any course yet</div>";
                    }
                    else{
                        echo "<div class='error'>You have not enrolled in any course yet</div>";
                    }
                    
                }           
                
                
            
            }
            else{
                echo "<div class='error'>You have not enrolled in any course yet</div>";
            }
        }
       

?>