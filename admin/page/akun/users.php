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
            <h1 class="judul">Users</h1>
            <br>
            <div class="text">
                <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
                <br>
                <br>

                <?php
                $no = 1;
                ?>
                <table>
                    <h4>List Akun Pengguna</h4>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>No. Telp</th>
                        <th>Email</th>
                        <th>role</th>
                        <th>Waktu Registrasi</th>
                        <?php if ($role == 'Super Admin') : ?>
                            <th>Hapus Akun</th>
                        <?php endif; ?>
                    </tr>
                    <?php
                    $data = mysqli_query($koneksi, "SELECT * FROM akun ORDER BY id DESC");

                    while ($r = mysqli_fetch_array($data)) {
                    ?>
                        <tr>
                            <td><?php echo $no; ?></td>
                            <td><?php echo $r['nama_lengkap']; ?></td>
                            <td><?php echo $r['no_telp']; ?></td>
                            <td><?php echo $r['email']; ?></td>
                            <td><?php echo $r['role']; ?></td>
                            <td><?php echo $r['created_at']; ?></td>
                            <td><?php if ($role == 'Super Admin') : ?>
                                    <a href="action.php?action=hapus-akun&id=<?php echo $r['id']; ?>">
                                        <button style="background-color: var(--red);">Hapus</button>
                                    </a>
                                <?php endif; ?>
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