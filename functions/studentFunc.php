


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
                    
                    echo "<tr>";
                    echo "<td>{$arrayOfResult['course_unit']}</td>";
                    echo "<td>{$arrayOfResult['course_name']}</td>";
                    echo "<td><button name='enroll'>Enroll</button></td>";
                
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

?>