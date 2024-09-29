<?php
session_start();

if (!isset($_SESSION['role'])) {
    header('Location: index.php');
    exit();
}


if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE menu_id = '$id'");
    $data = mysqli_fetch_array($query);
} else {
    header("Location: index.php");
}

include 'page/template/sidebar.php';
?>

<body>
    <main class="content">
        <?php include 'page/template/header.php'; ?>
        <div>
            <h1 class="judul">Ubah Menu</h1>
            <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
            <br>
            <br>
            <form action="action.php?action=ubah-menu-kasir" method="POST">
                <input type="hidden" name="id" value="<?php echo $data['menu_id']; ?>">

                <label for="Nama_Menu">Nama Menu</label>
                <input type="text" name="nama_menu" id="nama_menu" class="form-input" maxlength="100" required autocomplete="off" value="<?php echo $data['nama_menu']; ?>">

                <label for="Harga">Harga</label>
                <input type="text" name="harga" id="harga" placeholder="Masukkan Harga" class="form-input" pattern="^[0-9]+$" required autocomplete="off" value="<?php echo $data['harga']; ?>"><br>
                <br>
                <button style="color: white;" type="submit" name="submit" class="form-button">Simpan</button>
            </form>

        </div>
    </main>
</body>