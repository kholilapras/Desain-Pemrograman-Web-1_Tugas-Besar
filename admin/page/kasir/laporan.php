<?php
session_start();

if (!isset($_SESSION['role'])) {
    header('Location: index.php');
    exit();
}

include 'page/template/sidebar.php';
?>

<body>
    <main class="content">
        <?php include 'page/template/header.php'; ?>
        <div>
            <h1 class="judul">Laporan</h1>
            <div class="text">
                ee

            </div>
        </div>
    </main>
</body>