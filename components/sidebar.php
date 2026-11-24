<?php
$currentPage = basename($_SERVER['PHP_SELF']); // ดึงชื่อไฟล์ปัจจุบัน
// echo $currentPage;

$menus = [
    ['redirect' => 'admin_dashboard.php', 'name' => '📊 Dashboard'],
    ['redirect' => '../admin/manage-users.php',    'name' => '👥 จัดการสมาชิก'],
    ['redirect' => 'manage_waste.php',    'name' => '♻️ จัดการประเภทขยะ'],
    ['redirect' => 'manage_rewards.php',  'name' => '🎁 จัดการของรางวัล']
];
?>

<link rel="stylesheet" href="../components/sidebar.css">

<aside class="sidebar">
    <h3>🌱 Green Admin</h3>
    <div class="menu-list">
        <?php foreach ($menus as $m): ?>
            <a href="<?= $m['redirect'] ?>"
                class="menu-item <?= ($currentPage === $m['redirect']) ? 'active' : '' ?>">
                <?= $m['name'] ?>
            </a>
        <?php endforeach; ?>
    </div>
    <a href="../utils/logout.php" class="menu-item logout">🚪 ออกจากระบบ</a>
</aside>