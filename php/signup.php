<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn ,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn ,$_POST['lname']);
    $email = mysqli_real_escape_string($conn ,$_POST['email']);
    $password = mysqli_real_escape_string($conn ,$_POST['pass']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email , FILTER_VALIDATE_EMAIL)){
            $sql = mysqli_query($conn , "select email from users where email = '{$email}' ");
            if(mysqli_num_rows($sql)>0){
                echo " $email - Already Exists!";
            }
            else{
                if(isset($_FILES['image'])){
                    $img_name = $_FILES['image']['name'];
                    $tmp_name = $_FILES['image']['tmp_name'];

                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);

                    $extensions = ['png','jpeg','JPG','jpg'];
                    if(in_array($img_ext , $extensions) === true){
                        $time = time();
                        $new_img_name = $time.$img_name;
                        if(move_uploaded_file($tmp_name,"Images/".$new_img_name)){
                            $status = "Active now";
                            $random_id = rand(time(),10000000);

                            $sql1 = mysqli_query($conn, "insert into users (unique_id, fname, lname, email, password, image, status)
                                                 values({$random_id},'{$fname}','{$lname}','{$email}','{$password}','{$new_img_name}','{$status}')");
                            if($sql1){
                                $sql2 = mysqli_query($conn,"select * from users where email = '{$email}'");
                                if(mysqli_num_rows($sql2)>0){
                                    $row = mysqli_fetch_assoc($sql2);
                                    $_SESSION['unique_id'] = $row['unique_id'];
                                    echo "success!!";
                                }
                            }
                            else{
                                echo "Something went Wrong!!";
                            }
                        }
                    }else{
                        echo "Please Select Image File - jpeg, jpg, png!!";
                    }
                }
                else{
                    echo "Please Select Another Image File!!";
                }
            }
        }
        else{
            echo "$email This is not Valid Email!";
        }
    }else{
        echo "All input Fields are Required!!";
    }
?>