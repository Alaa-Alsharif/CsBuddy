<?php
    session_start();
    include_once "config.php";
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    // echo "Hello from login.php file";

    if(!empty($email) && !empty($password)){
        // check user entered email and password matched to database any table row email and password
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}' AND password = '{$password}'");
        if(mysqli_num_rows($sql) > 0){ //if users credentials matched 
                $row = mysqli_fetch_assoc($sql);
                $status = "Active now";

                //updating user status to active now if user logs in
                $sql2 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE unique_id = {$row['unique_id']}");
                if($sql2){
                    $_SESSION['unique_id'] = $row['unique_id']; //using this session we used user unique id in another php file
                    echo "success";
                }
        }else{
            echo "Email or password is incorrect";
        }
    }else{
        echo "All input fields are required";
    }