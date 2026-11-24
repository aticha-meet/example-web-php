<?php
include "../utils/utils.php";
include "../utils/db.php";
// console_log_text("Hello World");

$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);

// console_log($result)

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../styles.css">
    <link rel="stylesheet" href="manage-user.css">
</head>

<body>
    <div class="components-box">
        <?php include "../components/sidebar.php" ?>

        <div class="content-box">
            <div class="title-box">
                <div>
                    <h1>
                        Manage User
                    </h1>
                    <p>จัดการผู้ใช้งาน</p>
                </div>

                <div class="btn-user">
                    <button type="button">ADD USER</button>
                </div>
            </div>


            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Last Name</th>
                            <th>Role</th>
                            <th>Phone num.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = mysqli_fetch_assoc($result)): ?>
                            <!-- <?= $row['firstName'] ?> -->
                            <tr>
                                <td>
                                    <?= $row['firstName'] ?>
                                </td>
                                <td>
                                    <?= $row['lastName'] ?>
                                </td>
                                <td>
                                    <?= $row['phone'] ?>
                                </td>
                                <td>
                                    <?= $row['role'] ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>