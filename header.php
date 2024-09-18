<header>
    <div class = "banner">
        <h1>Banner Image</h1>
    </div>
    <div class = "nav">
        <a href = "index.php">Home</a>
        <a href = "">Carnival</a>
        <a href = "">Shop</a>
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
        </ul>
    </div>
</header>