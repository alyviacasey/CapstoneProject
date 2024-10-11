<header>
    <div class = "banner">
    </div>
    <div class = "nav">
            <a href = "index.php">Home</a>
            <a href = "carnival.php">Carnival</a>
            <a href = "store.php">Shop</a>
            <?php
                if(isset($_SESSION["userid"]))
                {
            ?>
                <a href = "profile.php"><?php echo $_SESSION["username"]; ?></a>
                <a href = "includes/logout.inc.php">LOGOUT</a>
            <?php
                }
                else
                {
            ?>
                <a href = "signup.php">SIGN UP</a>
                <a href = "signup.php">LOGIN</a>
            <?php
                }
            ?>
    </div>
</header>