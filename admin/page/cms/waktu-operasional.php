<?php
session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'Super Admin') {
    header('Location: ../index.php');
    exit();
}


$id = 1;
$sql = "SELECT * FROM waktu_operasional WHERE id = $id";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    // Fetch the record
    $row = $result->fetch_assoc();
    $senin = $row['senin'];
    $selasa = $row['selasa'];
    $rabu = $row['rabu'];
    $kamis = $row['kamis'];
    $jumat = $row['jumat'];
    $sabtu = $row['sabtu'];
    $minggu = $row['minggu'];
} else {
    echo "No records found";
    $senin = $selasa = $rabu = $kamis = $jumat = $sabtu = $minggu = "";
}

$koneksi->close();

include 'page/template/sidebar.php';
?>

<body>
    <main class="content">
        <?php include 'page/template/header.php'; ?>
        <div>
            <h1 class="judul">Waktu Operasional</h1>
            <button onclick="window.history.back()"><i class='bx bx-arrow-back'></i> Kembali</button>
            <br>
            <br>
            <form method="post" action="action.php?action=waktu-operasional" enctype="multipart/form-data" class="news-form" autocomplete="off">

                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <label for="senin">Senin</label>
                <input type="text" name="senin" id="senin" class="form-input" value="<?php echo $senin; ?>">

                <label for="selasa">Selasa</label>
                <input type="text" name="selasa" id="selasa" class="form-input" value="<?php echo $selasa; ?>">

                <label for="rabu">Rabu</label>
                <input type="text" name="rabu" id="rabu" class="form-input" value="<?php echo $rabu; ?>">

                <label for="kamis">Kamis</label>
                <input type="text" name="kamis" id="kamis" class="form-input" value="<?php echo $kamis; ?>">

                <label for="jumat">Jum'at</label>
                <input type="text" name="jumat" id="jumat" class="form-input" value="<?php echo $jumat; ?>">

                <label for="sabtu">Sabtu</label>
                <input type="text" name="sabtu" id="sabtu" class="form-input" value="<?php echo $sabtu; ?>">

                <label for="minggu">Minggu</label>
                <input type="text" name="minggu" id="minggu" class="form-input" value="<?php echo $minggu; ?>">


                <button type="submit" name="submit" class="form-button">Simpan</button>
            </form>
        </div>
    </main>
</body>