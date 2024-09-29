<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nama_website; ?></title>
    <link rel="stylesheet" href="page/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="page/css/scrollreveal.min.js">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="page/css/style.css">
    <link rel="stylesheet" href="path/to/swiper-bundle.min.css">


<body>
    <header class="header">
        <nav class="nav container flex">
            <a href="#" class="logo-content flex">
                <span class="logo-text"><b><?php echo $nama_website; ?></b></span>
            </a>

            <div class="menu-content">
                <?php
                $page = isset($_GET['page']) ? $_GET['page'] : 'beranda';
                ?>
                <ul class="menu-list flex">
                    <li><a href="beranda" class="nav-link <?php echo $page == 'beranda' ? 'navaktif' : ''; ?>">Beranda</a></li>
                    <li><a href="menu" class="nav-link <?php echo $page == 'menu' ? 'navaktif' : ''; ?>">Menu</a></li>
                    <li><a href="kontak" class="nav-link <?php echo $page == 'kontak' ? 'navaktif' : ''; ?>">Kontak</a></li>
                    <li><a href="tentang" class="nav-link <?php echo $page == 'tentang' ? 'navaktif' : ''; ?>">Tentang</a></li>
                </ul>

                <i class='bx bx-x navClose-btn'></i>
            </div>

            <div class="contact-content flex">

                <i class='bx bx-phone phone-icon'></i>
                <a href="<?php echo $whatsapp_link; ?>">
                    <span class="phone-number"><?php echo $whatsapp; ?></span>
                </a>
            </div>

            <i class='bx bx-menu navOpen-btn'></i>
        </nav>
    </header>

    <div class="wa-widget">
        <div class="wa-icon" id="wa-icon">
            <i class='bx bxl-whatsapp' id="wa-icon-open"></i>
            <i class='bx bx-x' id="wa-icon-close" style="display: none;"></i>
        </div>
        <div class="wa-popup" id="wa-popup">
            <div class="wa-header">
                <h3>Chat dengan kami di WhatsApp</h3>
            </div>
            <div class="wa-body">
                <p>Halo! Ada yang bisa kami bantu?</p>
                <a href="<?php echo $whatsapp_link ?>" target="_blank">Mulai Chat</a>
            </div>
        </div>
    </div>
</body>
</head>

<style>
    .navaktif {
        border-bottom: 2px solid;

    }

    .black1 {
        background-color: #282828;
        color: white;
        text-align: center;
    }

    .black2 {
        background-color: #141414;
        color: white;
        text-align: right;
    }

    .penjelasan {
        margin: 0 auto;
        min-width: 80%;
        width: 90%;
    }
</style>

<script>
    document.getElementById('wa-icon').addEventListener('click', function() {
        var popup = document.getElementById('wa-popup');
        var waIconOpen = document.getElementById('wa-icon-open');
        var waIconClose = document.getElementById('wa-icon-close');

        if (popup.style.display === 'none' || popup.style.display === '') {
            popup.style.display = 'block';
            waIconOpen.style.display = 'none';
            waIconClose.style.display = 'block';
        } else {
            popup.style.display = 'none';
            waIconOpen.style.display = 'block';
            waIconClose.style.display = 'none';
        }
    });
</script>

<style>
    .wa-widget {
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1000;
    }

    .wa-icon {
        background-color: #25D366;
        color: white;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 34px;
    }

    .wa-popup {
        display: none;
        position: absolute;
        bottom: 60px;
        right: 0;
        width: 250px;
        background-color: white;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        overflow: hidden;
    }

    .wa-header {
        background-color: #25D366;
        color: white;
        padding: 10px;
        text-align: center;
    }

    .wa-body {
        padding: 15px;
        text-align: center;
    }

    .wa-body a {
        display: inline-block;
        margin-top: 10px;
        padding: 10px 20px;
        background-color: #25D366;
        color: white;
        border-radius: 5px;
        text-decoration: none;
    }

    .wa-body a:hover {
        background-color: #1DA851;
    }

    .garisbawah {
        border-bottom: 2px solid #f0f0f0;
        padding-bottom: 5px;
        font-weight: bold;
        color: #f0f0f0;
        width: max-content;
        text-align: center;
        align-items: center;
        margin: 0 auto;
    }

    .penjelasan {
        padding-top: 10px;
    }
</style>