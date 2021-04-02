<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: user.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form login">
            <header> ChatApp </header>
            <form action="#">
                <div class="error-txt">
                    Error Message!!
                </div>
                    <div class="field input"> 
                        <label>Email Address:</label>
                        <input type="text" name="email" placeholder="Enter Email">
                    </div>
                    <div class="field input"> 
                        <label>Password:</label>
                        <input type="password" name="pass" placeholder="Enter Password">
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue">
                    </div>
            </form>
            <div class="link">Not Yet Registered?<a href='index.php'>SignUp</div>
        </section>
    </div>
    <script src="Javascript/pass-show.js"></script>
    <script src="Javascript/login.js"></script>
</body>
</html>