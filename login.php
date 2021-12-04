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
    <section class="form login" style="color: blanchedalmond;">
    <center> <header>CsBuddy</header></center>
        <form action="#">
            <div class="error-txt" style="font-weight: bolder;"></div>
        <div class="field input" style="color: blanchedalmond;">
            <label>Email Address</label>
            <input type="text" name="email" placeholder="Enter your email">
        </div>

        <div class="field input" style="color: blanchedalmond;">
            <label>password</label>
            <input type="password" name="password" placeholder="Enter your password">
            <i class="fas fa-eye"></i>
        </div>
        <div class="field button">
            <input type="submit" style="background-color:chartreuse; color:black ;" value="Continue to Chat">
        </div>
        </form>
        <div class="link" style="color: blanchedalmond;">Not yet signed up? <a href="index.php" style="color: white; font-weight:900px;">Signup now</a></div>
    </section>
</div>
<script src="JavaScript/pass-show-hide.js"></script>
<script src="JavaScript/login.js"></script>
</body>
</html>