<?php
include "../utils/utils.php";
include "../utils/db.php";
include "../components/ui/alert.php";
// console_log_text("Hello World");

enum TYPE_ROLE: string
{
    case admin = 'admin';
    case user = 'user';
}

if (isset($_POST['role'], $_POST['user_id'])) {
    $role = $_POST['role'];
    $user_id = $_POST['user_id'];

    $update_sql = "UPDATE `users` SET `role`='$role' WHERE user_id = '$user_id'";
    if (mysqli_query($conn, $update_sql)) {
        echo show_alert("Update Success", Type::scs);
    } else {
        echo show_alert("Update Failed", Type::dng);
    }
}

$sql = "SELECT * FROM `users`";
$result = mysqli_query($conn, $sql);

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
                            <th>Phone num.</th>
                            <th style="width: 15%;">Role</th>
                            <th style="width: 20%;">Actions</th>
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
                                    <form method="post">
                                        <input type="hidden"
                                            name="user_id"
                                            value="<?= $row['user_id'] ?>">


                                        <select
                                            onchange="this.form.submit()"
                                            name="role"
                                            class="content-role content-<?= $row['role'] ?>">
                                            <option value="admin" <?= ($row['role']  === 'admin')
                                                                        ? 'selected'
                                                                        : ''; ?>>ADMIN</option>
                                            <option value="user" <?= ($row['role']  === 'user')
                                                                        ? 'selected'
                                                                        : ''; ?>>USER</option>
                                        </select>
                                    </form>
                                </td>
                                <td>
                                    <div class="action-box">
                                        <div class="action-group">
                                            🛠️ <p>Edit</p>
                                        </div>
                                        <div class="action-group delete">
                                            🗑️ <p>Delete</p>
                                        </div>
                                    </div>
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