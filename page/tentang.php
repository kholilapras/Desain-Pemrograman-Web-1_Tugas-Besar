<?php include 'template/header.php'; ?>
<?php
$sql = "SELECT * FROM cms_beranda_carousel";
$result = $koneksi->query($sql); ?>

<?php
$sql = "SELECT * FROM waktu_operasional WHERE id = 1"; // Sesuaikan id sesuai kebutuhan
$result = $koneksi->query($sql);


// Query pertama untuk waktu operasional
$sql = "SELECT * FROM waktu_operasional WHERE id = 1"; // Sesuaikan id sesuai kebutuhan
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
} else {
    $row = []; // Pastikan $row tidak null jika query tidak menghasilkan hasil
}

?>

<?php
// Query kedua untuk gallery
$sql = "SELECT * FROM cms_gallery";
$hasil = $koneksi->query($sql);

$menu_items = [];
if ($hasil->num_rows > 0) {
    while ($item = $hasil->fetch_assoc()) { // Perbaiki variabel dari $result menjadi $hasil
        $menu_items[] = $item;
    }
} else {
    echo "0 results";
}

$koneksi->close(); // Pindahkan ini setelah semua query selesai
?>

<main>
    <section class="section black1">

        <h1 class="garisbawah">Waktu Operasional</h1>
        <p class="penjelasan">Kami siap melayani Anda pada hari dengan waktu sebagai berikut</p>
        <div class="section card-container">

            <div class="card">
                <div class="card-hari">Senin</div>
                <div class="card-waktu"><?php echo isset($row['senin']) ? $row['senin'] : 'Data tidak tersedia'; ?></div>
            </div>

            <div class="card">
                <div class="card-hari">Selasa</div>
                <div class="card-waktu"><?php echo isset($row['selasa']) ? $row['selasa'] : 'Data tidak tersedia'; ?></div>
            </div>

            <div class="card">
                <div class="card-hari">Rabu</div>
                <div class="card-waktu"><?php echo isset($row['rabu']) ? $row['rabu'] : 'Data tidak tersedia'; ?></div>
            </div>

            <div class="card">
                <div class="card-hari">Kamis</div>
                <div class="card-waktu"><?php echo isset($row['kamis']) ? $row['kamis'] : 'Data tidak tersedia'; ?></div>
            </div>

            <div class="card">
                <div class="card-hari">Jum'at</div>
                <div class="card-waktu"><?php echo isset($row['jumat']) ? $row['jumat'] : 'Data tidak tersedia'; ?></div>
            </div>

            <div class="card">
                <div class="card-hari">Sabtu</div>
                <div class="card-waktu"><?php echo isset($row['sabtu']) ? $row['sabtu'] : 'Data tidak tersedia'; ?></div>
            </div>

            <div class="card">
                <div class="card-hari">Minggu</div>
                <div class="card-waktu"><?php echo isset($row['minggu']) ? $row['minggu'] : 'Data tidak tersedia'; ?></div>
            </div>

        </div>
    </section>

    <section class="section black2">
        <h1 class="garisbawah">Gallery</h1>
        <br>
        <?php foreach ($menu_items as $item) : ?>
            <div class="kartu" style="margin: 0 auto;">
                <img src="admin/<?php echo $item['gambar']; ?>" alt="gambar">
            </div>
            <br>
        <?php endforeach; ?>
    </section>

    <section class="section black1">
        <h1 class="garisbawah">Sejarah Singkat</h1>
        <p class="penjelasan"><?php echo $sejarah ?></p>
        <br>
    </section>
</main>

<?php include 'template/footer.php'; ?>

<style>
    .black1 {
        background-color: #282828;
        color: white;
        text-align: center;
    }

    .black2 {
        background-color: #141414;
        color: white;
        text-align: center;
    }
</style>

<style>
    :root {
        --blue_dark: #1450A0;
        --blue_light: #2878F0;
        --gold: #F0A014;
        --white: #F0F0F0;
        --black: #141414;
        --black2: #282828;
    }

    .card-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;

    }

    .card {
        background-color: var(--black);
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px;
        max-width: 300px;
        overflow: hidden;
        transition: transform 0.3s;
        display: flex;
        flex-direction: column;
        width: 320px;
    }

    .kartu {
        width: 80%;
    }

    .card img {
        width: 100%;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-hari {
        font-size: 1.2em;
        margin: 10px 0 0;
        color: var(--white);
        background-color: var(--black);
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
    }

    .card-waktu {
        font-size: 1.2em;
        margin: 10px 0 0;
        background-color: var(--white);
        color: var(--black);
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
    }
</style>