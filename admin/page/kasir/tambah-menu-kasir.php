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
            <h1 class="judul">Tambah Menu</h1>
            <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
            <br>
            <br>
            <form action="action.php?action=tambah-menu-kasir" method="POST">
                <label for="Nama_Menu">Nama Menu</label>
                <input type="text" name="Nama_Menu" id="Nama_Menu" placeholder="Masukkan Nama Menu" class="form-input" maxlength="100" required autocomplete="off">

                <label for="Harga">Harga</label>
                <input type="text" name="Harga" id="Harga" placeholder="Masukkan Harga" class="form-input" pattern="^[0-9]+$" required autocomplete="off">
                <br>
                <br>
                <button style="color: white;" type="submit" name="submit" class="form-button">Simpan</button>
            </form>

        </div>
    </main>
</body>