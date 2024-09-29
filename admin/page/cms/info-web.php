<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Super Admin') {
    header('Location: ../index.php');
    exit();
}

include 'page/template/sidebar.php';
?>

<body>
    <main class="content">
        <?php include 'page/template/header.php'; ?>
        <div>
            <h1 class="judul">Info Web</h1>
            <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
            <br>
            <br>
            <form method="post" action="action.php?action=info-web" enctype="multipart/form-data" class="news-form" autocomplete="off">

                <input type="hidden" name="id_info" value="<?php echo $id_info; ?>">

                <label for="nama_website">Nama Website</label>
                <input type="text" name="nama_website" id="nama_website" class="form-input" value="<?php echo $nama_website; ?>">

                <label for="whatsapp">No. Whatsapp</label>
                <input type="text" name="whatsapp" id="whatsapp" class="form-input" value="<?php echo $whatsapp; ?>">

                <label for="whatsapp_link">Whatsapp Link</label>
                <input type="text" name="whatsapp_link" id="whatsapp_link" class="form-input" value="<?php echo $whatsapp_link; ?>">

                <label for="facebook">Facebook Link</label>
                <input type="text" name="facebook" id="facebook" class="form-input" value="<?php echo $facebook; ?>">

                <label for="instagram">Instagram Link</label>
                <input type="text" name="instagram" id="instagram" class="form-input" value="<?php echo $instagram; ?>">

                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" class="form-input" value="<?php echo $alamat; ?>">

                <label for="gmaps">Google Maps Frame Link</label>
                <textarea name="gmaps" id="gmaps" class="form-input" style="height: 150px;"><?php echo $gmaps; ?></textarea>

                <label for="gofood">Gofood Link</label>
                <input type="text" name="gofood" id="gofood" class="form-input" value="<?php echo $gofood; ?>">

                <label for="shopeefood">Shopeefood Link</label>
                <input type="text" name="shopeefood" id="shopeefood" class="form-input" value="<?php echo $shopeefood; ?>">

                <label for="grabfood">Grabfood Link</label>
                <input type="text" name="grabfood" id="grabfood" class="form-input" value="<?php echo $grabfood; ?>">

                <label for="sejarah">Sejarah Singkat</label>
                <input type="text" name="sejarah" id="sejarah" class="form-input" value="<?php echo $sejarah; ?>">

                <button type="submit" name="submit" class="form-button">Simpan</button>
            </form>
        </div>
    </main>
</body>