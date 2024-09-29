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
            <h1 class="judul">Daftar Menu</h1>
            <div class="text">
                <a href="page.php?page=tambah-menu-kasir">
                    <button class="tombol-tambah"><i class='bx bx-plus'></i> Tambah Menu</button>
                </a>
                <br>
                <br>

                <?php
                $no = 1;
                ?>
                <table>
                    <tr>
                        <th>No</th>
                        <th>Nama Menu</th>
                        <th>Harga</th>
                        <th>Kelola</th>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY menu_id DESC");

                    while ($r = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['nama_menu']; ?></td>
                            <td><?php echo $r['harga']; ?></td>
                            <td>
                                <a href="page.php?page=ubah-menu-kasir&id=<?php echo $r['menu_id']; ?>"><button style="background-color:green">Ubah</button></a>
                                <a href="action.php?action=hapus-menu-kasir&id=<?php echo $r['menu_id']; ?>"><button style="background-color: var(--red);">Hapus</button></a>
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