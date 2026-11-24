<?php
include "./utils/utils.php";
include "./components/ui/alert.php";
include "./utils/db.php";

session_start();

$msg = '';

$type = Type::dng;

if (isset($_POST['login_user'])) {
    $phone = $_POST['phone'];
    $pass = $_POST['password'];

    if (empty($phone)) {
        $msg = "กรุณาเบอร์โทร";
        $type = Type::wrn;

        if (strlen($phone) < 10) {
            $msg = "กรุณาเบอร์โทรให้ครบ 10 หลัก";
            $type = Type::wrn;
        }
    }

    if (empty($pass)) {
        $msg = "กรุณารหัสผ่าน";
        $type = Type::wrn;
    }

    if (!empty($phone) && !empty($pass)) {
        $sql = "SELECT * FROM `users` WHERE phone = '$phone'";
        $result = mysqli_query($conn, $sql);

        if ($row = mysqli_fetch_assoc($result)) {
            if (password_verify($pass, $row['password'])) {
                $msg = "Login Success";
                $type = Type::scs;

                $_SESSION['user'] = $row['firstName'];
                $_SESSION['role'] = $row['role'];

                echo show_alert($msg, $type);
                header("location:index.php");
                exit();
            }
        } else {
            echo show_alert("Login Failed", Type::dng);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body class="body-register">
    <?php include "./components/navbar.php"; ?>
    <?= #Todo : <?= คือ <?php echo
    show_alert($msg, $type)
    ?>
    <div class="form-register">
        <form action="" method="post" class="form-box">
            <h2>
                Login
            </h2>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" minlength="10" maxlength="12" placeholder="Enter Phone">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" minlength="8" placeholder="Enter Password more 8 char">
            </div>

            <button type="submit" name="login_user">Register</button>


        </form>
    </div>
</body>

<script>
    console.log("Hello World")
</script>

</html>