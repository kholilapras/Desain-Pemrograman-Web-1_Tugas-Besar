<?php
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
} else {
    $role = 'Kasir'; // atau lakukan redirection ke halaman login
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin | <?php echo $nama_website ?></title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/style_sidebar.css">
    <link rel="stylesheet" href="assets/css/style_table.css">
    <script src="assets/js/script_tambahan.js"></script>
</head>

<body>



    <aside class="sidebar">
        <ul class="sidebar-links">
            <?php if ($role == 'Super Admin') : ?>
                <h4>
                    <span>CMS</span>
                    <div class="menu-separator"></div>
                </h4>
                <li>
                    <a href="page.php?page=info-web"><span class="material-symbols-outlined"> info </span>Info Web</a>
                </li>
                <li>
                    <a href="page.php?page=beranda"><span class="material-symbols-outlined"> wallpaper_slideshow </span>Image Slider</a>
                </li>
                <li>
                    <a href="page.php?page=banner-teks"><span class="material-symbols-outlined"> text_fields </span>Banner Teks</a>
                </li>
                <li>
                    <a href="page.php?page=menu"><span class="material-symbols-outlined"> restaurant </span>Kelola Menu</a>
                </li>
                <li>
                    <a href="page.php?page=kontak-masuk"><span class="material-symbols-outlined"> mail </span>Pesan Masuk</a>
                </li>
                <li>
                    <a href="page.php?page=waktu-operasional"><span class="material-symbols-outlined"> event_available </span>Waktu Operasional</a>
                </li>
                <li>
                    <a href="page.php?page=gallery"><span class="material-symbols-outlined"> image </span>Gallery</a>
                </li>
                <h4>
                    <span>Kasir</span>
                    <div class="menu-separator"></div>
                </h4>
            <?php endif; ?>

            <?php if ($role == 'Super Admin' || $role == 'Kasir') : ?>
                <li>
                    <a href="page.php?page=daftar-menu"><span class="material-symbols-outlined"> brunch_dining </span>Menu Transaksi</a>
                </li>
                <li>
                    <a href="page.php?page=transaksi"><span class="material-symbols-outlined"> receipt_long </span>Transaksi</a>
                </li>
                <li style="display:none;">
                    <a href="page.php?page=laporan"><span class="material-symbols-outlined"> description </span>Laporan</a>
                </li>
            <?php endif; ?>

            <?php if ($role == 'Super Admin' || $role == 'Kasir') : ?>
                <h4>
                    <span>Akun</span>
                    <div class="menu-separator"></div>
                </h4>
                <li>
                    <a href="page.php?page=users"><span class="material-symbols-outlined"> account_circle </span>Users</a>
                </li>
                <li>
                    <a href="page.php?page=logout"><span class="material-symbols-outlined"> logout </span>Logout</a>
                </li>
            <?php endif; ?>
        </ul>
    </aside>



</body>

<style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    :root {
        --background-color: #141414;
        --sidebar-background: #282828;
        --sidebar-hover-background: #F0F0F0;
        --text-color: #F0F0F0;
        --text-hover-color: #123123;
        --separator-color: #2878F0;
        --user-profile-border: #F0F0F0;
        --user-detail-background: #F0F0F0;

        --gold: #F0A014;
        --blue_dark: #1450A0;
        --blue_light: #2878F0;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        min-height: 100vh;
        background: var(--background-color);
        display: flex;
        margin: 0;
        padding: 0;
        color: var(--text-color)
    }

    .sidebar {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 80px;
        display: flex;
        overflow-x: hidden;
        flex-direction: column;
        background: var(--sidebar-background);
        padding: 25px 20px;
        transition: all 0.4s ease;
    }

    .sidebar:hover {
        width: max-content;
    }

    .sidebar .sidebar-header img {
        width: 42px;
        border-radius: 50%;
    }

    .sidebar .sidebar-header h2 {
        color: var(--text-color);
        font-size: 1.25rem;
        font-weight: 600;
        white-space: nowrap;
        margin-left: 23px;
    }

    .sidebar-links h4 {
        color: var(--text-color);
        font-weight: 500;
        white-space: nowrap;
        margin: 10px 0;
        position: relative;
    }

    .sidebar-links h4 span {
        opacity: 0;
    }

    .sidebar:hover .sidebar-links h4 span {
        opacity: 1;
    }

    .sidebar-links .menu-separator {
        position: absolute;
        left: 0;
        top: 50%;
        width: 100%;
        height: 1px;
        transform: scaleX(1);
        transform: translateY(-50%);
        background: var(--separator-color);
        transform-origin: right;
        transition-delay: 0.2s;
    }

    .sidebar:hover .sidebar-links .menu-separator {
        transition-delay: 0s;
        transform: scaleX(0);
    }

    .sidebar-links {
        list-style: none;
        margin-top: 20px;
        height: 100%;
        overflow-y: auto;
        scrollbar-width: none;
    }

    .sidebar-links::-webkit-scrollbar {
        display: none;
    }

    .sidebar-links li a {
        display: flex;
        align-items: center;
        gap: 0 20px;
        color: var(--text-color);
        font-weight: 500;
        white-space: nowrap;
        padding: 15px 10px;
        text-decoration: none;
        transition: 0.2s ease;
    }

    .sidebar-links li a:hover {
        color: var(--text-hover-color);
        background: var(--sidebar-hover-background);
        border-radius: 4px;
    }

    .user-account {
        margin-top: auto;
        padding: 12px 10px;
        margin-left: -10px;
    }

    .user-profile {
        display: flex;
        align-items: center;
        color: var(--text-hover-color);
    }

    .user-profile img {
        width: 42px;
        border-radius: 50%;
        border: 2px solid var(--user-profile-border);
    }

    .user-profile h3 {
        font-size: 1rem;
        font-weight: 600;
    }

    .user-profile span {
        font-size: 0.775rem;
        font-weight: 600;
    }

    .user-detail {
        margin-left: 23px;
        white-space: nowrap;
    }

    .sidebar:hover .user-account {
        background: var(--user-detail-background);
        border-radius: 4px;
    }

    .content {
        margin-left: 85px;
        padding: 20px;
        transition: margin-left 0.4s ease;
        width: 100vw;
    }

    .sidebar:hover~.content {
        margin-left: 200px;
    }


    .judul {
        color: var(--gold);
    }

    button {
        background-color: var(--blue_dark);
    }

    button:hover {
        background-color: var(--blue_light);
    }

    .preview {
        margin-top: 10px;
    }

    .preview img {
        max-width: 40%;
        height: auto;
    }

    label {
        margin-top: 10px;
        color: var(--gold);
    }
</style>

</html>