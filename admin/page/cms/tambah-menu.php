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
            <h1 class="judul">Tambah Menu</h1>
            <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
            <br>
            <br>
            <form method="post" action="action.php?action=tambah-menu" enctype="multipart/form-data" class="news-form" autocomplete="off">
                <div class="preview" id="preview">
                </div>

                <br>

                <label for="gambar">Upload Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-file" accept=".jpg, .jpeg, .png" required>

                <label for="nama_menu">Nama Menu</label>
                <input type="text" name="nama_menu" id="nama_menu" placeholder="Maksimal 250 karakter" class="form-input" maxlength="250">

                <label for="detail">Detail</label>
                <input type="text" name="detail" id="detail" placeholder="Maksimal 250 karakter" class="form-input" maxlength="250">

                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" placeholder="Maksimal 20 karakter" class="form-input" maxlength="20">

                <button type="submit" name="submit" class="form-button">Simpan</button>
            </form>

        </div>
        <script>
            document.getElementById('gambar').addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.getElementById('preview');
                        preview.innerHTML = '<img src="' + e.target.result + '" alt="Image Preview">';
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </main>
</body>