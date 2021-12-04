<?php
session_start();
// echo "This data came from php file";
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){ // if email is valid
               // check that email already exists in the database or not
            $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '{$email}' ");
            if(mysqli_num_rows($sql) > 0){ //if email already exist
                echo "$email - This email already exist!";
            }else{
                // check user upload file or not
             if(isset($_FILES['image'])){ // if file is uploaded
                $img_name = $_FILES['image']['name']; //getting user uploaded img name
                $tmp_name = $_FILES['image']['tmp_name']; //this temporary name is used to save/move file in our folder
                
            // explode image and get last extension like jpg png
            $img_explode = explode('.', $img_name);
            $img_ext = end($img_explode); //here we get the extension of an user uploaded img file
            
            $extensions = ['png', 'jpeg', 'jpg']; //these are some valid img ext and stored them in array
                if(in_array($img_ext, $extensions) ===true){  //if user uploaded image ext is matched with any array extensions
                $time = time(); // returns current time / needed since after uplading user img to our folder we rename user file with current time / so each image file has a unique name
                //move user uplaoded img to our partiular folder
                $new_img_name = $time.$img_name;
                if(move_uploaded_file($tmp_name, "images/".$new_img_name)){ // if user uplaed img move to our folder successfullt
                $status="Active now"; // once user signed up then his status will be activew now
                $random_id = rand(time(), 10000000); //creating random id for user
                
                // insert all user data inside table
                $sql2 = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                    VALUES ({$random_id}, '{$fname}', '{$lname}', '{$email}', '{$password}','{$new_img_name}', '{$status}')");
            
                    if($sql2){ //if these data inserted
                        $sql3= mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                        if(mysqli_num_rows($sql3) > 0){
                            $row = mysqli_fetch_assoc($sql3);
                            $_SESSION['unique_id']= $row['unique_id']; //using this session we used user unique id in another php file
                            echo "success";
                        }
                    }else{
                        echo "Something went wrong!";
                    }
        }
            }else{
                    echo "Please select an Image file - jpeg, jpg,png!";
                }
            }else{ 
                    echo "Please select an Image file!";
                }
            }
    }else{
        echo "$email - This email is not a valid email";
    }
}else{
        echo "All input field are required";
    }

?>