<?php
    include ("db_conn.php");
    include ("./functions/studentFunc.php");

    session_start();

    $s_id = $_SESSION["s_id"];

    if(isset($_POST["back"])){
        header("Location: studentProfile.php");
        exit();

    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="wrapper-2">
        <div class="box2">
            
            <h2 class="heading">Update Student Details</h2>
            <hr>
    <form action="<?php $_SERVER['PHP_SELF']?>" method="post">
        <table>
            <tr>
                <td>
                    <label for="">Full Name</label>
                </td>
                <td>
                    :<input type="text" name="name" value="<?php echo infoStudent($conn,$s_id,'name')?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Gender</label>
                </td>
                <td>
                    :<input type="text" name="gender" value="<?php echo infoStudent($conn,$s_id,'gender')?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Date Of Birth</label>
                </td>
                <td>
                    :<input type="date" name="DOB" value="<?php echo infoStudent($conn,$s_id,'DOB')?>">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Email</label>
                </td>
                <td>
                    :<input type="email" name="email" value="<?php echo infoStudent($conn,$s_id,'email')?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Phone Number</label>
                </td>
                <td>
                    :<input type="text" name="pho_no" value="<?php echo infoStudent($conn,$s_id,'pho_no')?>" >
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Address</label>
                </td>
                <td>
                    :<input type="text" name="address" value="<?php echo infoStudent($conn,$s_id,'address')?>" style="width: 300px;">
                </td>
            </tr>
        </table>
            
            <div class="btn-grp">
                <button name="submit">Submit</button>
                <button name="back">Back</button>
            </div>
        
    </form>
    <?php
        if(isset($_POST['submit'])){
            $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
            $pho_no = filter_input(INPUT_POST, 'pho_no', FILTER_SANITIZE_NUMBER_INT);
            $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $DOB=$_POST['DOB'];
            $gender=$_POST['gender'];

            if($gender == "Male" || $gender == "Female"){
                  $array=[
                "name"=>$name,
                "email"=>$email,
                "pho_no"=>$pho_no,
                "address"=>$address,
                "DOB"=>$DOB,
                "gender"=>$gender
            ];

            $count=0;
            
            foreach($array as $key=>$value){
                if(empty($value)){
                    echo "<div class='error'>All fields are required!!</div>";
                    break;
                }
                $result = updateStudent($conn,$s_id,$key,$value);
                if(!$result){
                    echo "<div class='error'>Coudnt update student details</div> for $key";
                }

                
                
                $count++;
            }

            if($count==6){
                echo "<div class='success'>Student details updated successfully</div>";
            }
        }

            else{
                echo "<div class='error'>Gender should be either Male or Female</div>";
            }
            }

            

          
    ?>
    </div>
    </div>
    </form>
</body>
</html>