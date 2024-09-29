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
            <h1 class="judul">Beranda</h1>
            <br>
            <div class="text">
                <a href="page.php?page=tambah-carousel">
                    <button class="tombol-tambah"><i class='bx bx-plus'></i> Tambah Carousel</button>
                </a>
                <br>

                <?php
                $no = 1;
                ?>
                <table>
                    <h4>Carousel Image</h4>
                    <tr>
                        <th>No</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Subjudul</th>
                        <th>Kelola</th>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM cms_beranda_carousel ORDER BY id DESC");

                    while ($r = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><img width="50px" height="auto" src="<?php echo $r['gambar'];?>" ></td>
                            <td><?php echo $r['judul']; ?></td>
                            <td><?php echo $r['subjudul']; ?></td>
                            <td>
                                <a href="page.php?page=ubah-carousel&id=<?php echo $r['id']; ?>"><button style="background-color:green">Ubah</button></a>
                                <a href="action.php?action=hapus-carousel&id=<?php echo $r['id']; ?>"><button style="background-color: var(--red);">Hapus</button></a>
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
