<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Super Admin') {
    header('Location: ../index.php');
    exit();
}



if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM cms_menu WHERE id='$id'");
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
            <form method="post" action="action.php?action=ubah-menu" enctype="multipart/form-data" class="news-form" autocomplete="off">
                <div class="gambar-lama" id="gambar-lama">
                    <img src="<?php echo $data['gambar']; ?>" alt="gambar">
                </div>

                <div class="preview" id="preview">
                </div>

                <br>

                <input type="hidden" name="id" value="<?php echo $data['id']; ?>">

                <label for="gambar">Upload Gambar</label>
                <input type="file" name="gambar" id="gambar" class="form-file" accept=".jpg, .jpeg, .png">

                <label for="nama_menu">Nama Menu</label>
                <input type="text" name="nama_menu" id="nama_menu" placeholder="Maksimal 250 karakter" class="form-input" maxlength="250" value="<?php echo $data['nama_menu']; ?>">

                <label for="detail">Detail</label>
                <input type="text" name="detail" id="detail" placeholder="Maksimal 250 karakter" class="form-input" maxlength="250" value="<?php echo $data['detail']; ?>">

                <label for="harga">Harga</label>
                <input type="text" name="harga" id="harga" placeholder="Maksimal 20 karakter" class="form-input" maxlength="20" value="<?php echo $data['harga']; ?>">

                <button type="submit" name="submit" class="form-button">Submit</button>
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

                        const oldImageDiv = document.getElementById('gambar-lama');
                        if (oldImageDiv) {
                            oldImageDiv.style.display = 'none';
                        }
                    };
                    reader.readAsDataURL(file);
                }
            });
        </script>
    </main>
</body>

<style>
    .gambar-lama img {
        width: 40%;
        height: auto;
    }
</style>