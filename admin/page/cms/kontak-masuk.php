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
            <h1 class="judul">Pesan Masuk</h1>
            <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
            <br>
            <div class="text">

                <br>

                <?php
                $no = 1;
                ?>
                <table>
                    <h4>Daftar Pesan Masuk</h4>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. Telp</th>
                        <th>Pesan</th>
                        <th>Timestamp</th>
                        <th>Hapus</th>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM kontak_masuk ORDER BY id DESC");

                    while ($r = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['nama']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['telp']; ?></td>
                            <td><?php echo $r['pesan']; ?></td>
                            <td><?php echo $r['timestamp']; ?></td>
                            <td>
                                <a href="action.php?action=hapus-pesan&id=<?php echo $r['id']; ?>"><button style="background-color: var(--red);">Hapus</button></a>
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