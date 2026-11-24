<?php
include "./utils/utils.php";
include "./components/ui/alert.php";
include "./utils/db.php";

$msg = '';

$type = Type::dng;

if (isset($_POST['reg_user'])) {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];

    // console_log_text($_POST['phone']);
    if (empty($firstName) || empty($lastName)) {
        $msg = "กรุณากรอกชื่อ-นามสกุล";
        $type = Type::wrn;
    }

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

    if (!(empty($firstName) || empty($lastName) && !empty($phone) && !empty($pass))) {
        $hashPassword = password_hash($pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users`(`firstName`, `lastName`, `phone`, `password`) 
        VALUES ('$firstName','$lastName','$phone','$hashPassword')";

        if (mysqli_query($conn, $sql)) {
            echo show_alert("Register Success", Type::scs);

            header('location:login.php');
            exit();
        } else {
            echo show_alert("Failed Regis", Type::dng);
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
                Register
            </h2>
            <div class="form-group">
                <label for="First Name">First Name</label>
                <input type="text" name="firstName" placeholder="Enter First Name">
            </div>

            <div class="form-group">
                <label for="Last Name">Last Name</label>
                <input type="text" name="lastName" placeholder="Enter Last Name">
            </div>

            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" name="phone" minlength="10" maxlength="12" placeholder="Enter Phone">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" minlength="8" placeholder="Enter Password more 8 char">
            </div>

            <button type="submit" name="reg_user">Register</button>


        </form>
    </div>
</body>

<script>
    console.log("Hello World")
</script>

</html>