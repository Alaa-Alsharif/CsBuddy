<?php 
session_start();
if(isset($_SESSION['unique_id'])){ // if user is logged in 
    header("location: users.php");
}
?>

<?php include_once "header.php"; ?>
<body style="background-color: black;">
<div class="wrapper" style="background-color: black; background: rgba(255, 255, 255, 0.1);
                box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
                border: 0.5px solid rgba(255, 255, 255, 0.5);
                border-radius: 10px;">
    <section class="form signup">
        <center><header style="color: blanchedalmond;">CsBuddy</header></center>
        <form action="#" enctype="multipart/form-data">
            <div class="error-txt" style="font-weight: bolder;"></div>
        <div class="name-details"  style="color: blanchedalmond;">
            <div class="field input">
                <label>First Name</label>
                <input type="text" name="fname" placeholder="First Name" required>
            </div>
            <div class="field input">
                <label>Last Name</label>
                <input type="text" name="lname" placeholder="Last Name" required>
            </div>
        </div>
        <div class="field input" style="color: blanchedalmond;">
            <label>Email Address</label>
            <input type="text" name="email"placeholder="Enter your email" required>
        </div>
        <div class="field input" style="color: blanchedalmond;">
            <label>password</label>
            <input type="password" name="password" placeholder="Enter new password" required>
            <i class="fas fa-eye"></i>
        </div>
        <div class="field image" style="color: blanchedalmond;">
            <label>Select Image</label>
            <input type="file" name="image" required>
        </div>
        <div class="field button">
            <input type="submit"  style=" background-color:chartreuse; color:black ;" value="Continue to Chat">
        </div>
        </form>
        <div class="link" style="color: blanchedalmond;">Already signed up? <a href="login.php" style="color: white; font-weight:900px;">Login now</a></div>
    </section>
</div>
<script src="JavaScript/pass-show-hide.js"></script>
<script src="JavaScript/signup.js"></script>
</body>
</html>