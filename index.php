<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        header("location: user.php");
    }
?>
<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="form signup">
            <header> ChatApp </header>
            <form action="#" enctype="multipart/form-data">
                <div class="error-txt">
                    Error Message!!
                </div>
                <div class="name-details">
                    <div class="field input"> 
                        <label>First Name:</label>
                        <input type="text" name='fname' placeholder="Enter First Name" required>
                    </div>
                    <div class="field input"> 
                        <label>Last Name:</label>
                        <input type="text" name='lname' placeholder="Enter Last Name" required>
                    </div>
                </div>
                    <div class="field input"> 
                        <label>Email Address:</label>
                        <input type="text" name='email' placeholder="Enter Email" required>
                    </div>
                    <div class="field input"> 
                        <label>Password:</label>
                        <input type="password" name='pass' placeholder="Enter Password" required>
                        <i class="fas fa-eye"></i>
                    </div>
                    <div class="field image"> 
                        <label>Select Image:</label>
                        <input type="file" name='image' required>
                    </div>
                    <div class="field button">
                        <input type="submit" value="Continue">
                    </div>
            </form>
            <div class="link">Already Registered?<a href='Login.php'>Login</div>
        </section>
    </div>
    <script src="Javascript/pass-show.js"></script>
    <script src="Javascript/signup.js"></script>
</body>
</html>