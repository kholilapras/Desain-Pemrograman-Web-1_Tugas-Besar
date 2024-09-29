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
            <h1 class="judul">Banner Teks</h1>
            <br>
            <div class="text">
                <a href="page.php?page=tambah-banner-teks">
                    <button class="tombol-tambah"><i class='bx bx-plus'></i> Tambah Banner Teks</button>
                </a>
                <br>

                <?php
                $no = 1;
                ?>
                <table>
                    <h4>Banner Teks</h4>
                    <tr>
                        <th>No</th>
                        <th>Kalimat</th>
                        <th>Penjelasan</th>
                        <th>Hapus</th>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM cms_banner_teks ORDER BY banner_id DESC");

                    while ($r = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['kalimat']; ?></td>
                            <td><?php echo $r['penjelasan']; ?></td>
                            <td>
                                <a href="action.php?action=hapus-banner-teks&id=<?php echo $r['banner_id']; ?>"><button style="background-color: var(--red);">Hapus</button></a>
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