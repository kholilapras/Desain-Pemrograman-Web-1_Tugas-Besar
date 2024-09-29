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
            <h1 class="judul">Gallery</h1>
            <br>
            <div class="text">
                <a href="page.php?page=tambah-gallery">
                    <button class="tombol-tambah"><i class='bx bx-plus'></i> Tambah Gallery</button>
                </a>
                <br>

                <?php
                $no = 1;
                ?>
                <table>
                    <h4>Gallery Image</h4>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Kelola</th>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM cms_gallery ORDER BY id DESC");

                    while ($r = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><img width="200px" height="auto" src="<?php echo $r['gambar']; ?>"></td>
                            <td>
                                <a href="action.php?action=hapus-gallery&id=<?php echo $r['id']; ?>"><button style="background-color: var(--red);">Hapus</button></a>
                            </td>
                        </tr>
                    <?php
                        $no++;
                    }
                    ?>
                </table>

            </div>
        </div>
    </main>
</body>