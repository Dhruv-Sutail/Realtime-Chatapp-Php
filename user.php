<?php 
    session_start();
    if(!isset($_SESSION['unique_id'])){
        header("location: login.php");
    }

?>

<?php include_once "header.php"; ?>
<body>
    <div class="wrapper">
        <section class="users">
            <header>
            <?php
                include_once "php/config.php";
                $sql =mysqli_query($conn,"select * from users where unique_id = '{$_SESSION['unique_id']}'");
                if(mysqli_num_rows($sql)>0){
                    $row = mysqli_fetch_assoc($sql);
                }
            ?>
                <div class="content">
                    <img src="php/Images/<?php echo $row['image'] ?>" alt="">
                    <div class="details">
                        <span><?php echo $row['fname'] . " " . $row['lname'] ?></span>
                        <p><?php echo $row['status'] ?></p>
                    </div>
                </div>
                <a href="php/logout.php?logout_id=<?php echo $row['unique_id'] ?>" class="logout">Logout</a>
            </header>
            <div class="search">
                <span class="text">Select an User to Start Chat</span>
                <input type="text" placeholder="Enter Name">
                <button><i class="fas fa-search"></i></button>
            </div>
            <div class="user-list">
                
                
            </div>
        </section>
    </div>
    <script src="Javascript/users.js"></script>
</body>
</html>