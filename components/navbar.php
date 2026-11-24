<link rel="stylesheet" href="components/navbar.css">

<nav class="navbar">
    <div class="logo">
        <div class="img-logo">
            <img src="assets/images/light.png" alt="" width="50" height="50">
        </div>
        <div class="text-logo">
            <span class="first">
                Green
            </span>
            <span class="second">
                Life
            </span>
        </div>
    </div>


    <div class="menu">
        <a class="a-group" href="index.php">Home</a>
        <a class="a-group" href="#">About</a>
        <a class="a-group" href="#">Reward</a>
        <a class="a-group" href="#">Annouce</a>

        <?php
        if (isset($_SESSION['role']) && ($_SESSION['role'] === "admin")) {
            echo "<a class='a-group' href='#'>Admin</a>";
        }
        ?>

    </div>


    <?php if (isset($_SESSION['user'])): ?>
        <div class="accout-box">
            <div class="accout-btn">
                👤 :
                <?= $_SESSION['user'] ?>
            </div>
            <a class="logout-btn" href="utils/logout.php">Logout</a>
        </div>
    <?php else: ?>
        <div class="user-check">
            <a class="a-group" href="login.php">Sign In</a>
            <a class="a-group" href="register.php">Sign Up</a>
        </div>
    <?php endif ?>
</nav>