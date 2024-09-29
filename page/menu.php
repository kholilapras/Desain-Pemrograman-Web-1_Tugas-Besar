<?php include 'template/header.php'; ?>
<?php
$sql = "SELECT * FROM cms_beranda_carousel";
$result = $koneksi->query($sql);


$sql = "SELECT * FROM cms_menu";
$result = $koneksi->query($sql);

$menu_items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $menu_items[] = $row;
    }
} else {
    echo "0 results";
}

$koneksi->close();
?>

<main>
    <section class="section black1">
        <h1 class="garisbawah">Menu</h1>
        <p class="penjelasan">Jelajahi beragam pilihan makanan dan minuman yang kami tawarkan untuk memenuhi selera Anda. Dari hidangan lezat yang siap menggugah selera hingga minuman segar yang menyegarkan, nikmati pengalaman kuliner yang tak terlupakan bersama kami</p>

        <div class="section card-container">
            <?php foreach ($menu_items as $item) : ?>
                <div class="card">
                    <img src="admin/<?php echo $item['gambar']; ?>" alt="<?php echo $item['nama_menu']; ?>">
                    <div class="card-title"><?php echo $item['nama_menu']; ?></div>
                    <div class="card-text"><?php echo $item['detail']; ?></div>
                    <div class="card-price"><?php echo $item['harga']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>
</main>

<?php include 'template/footer.php'; ?>

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
        padding: 20px;
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
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card img {
        width: 100%;
        height: auto;
    }

    .card-content {
        padding: 20px;
        text-align: center;
        flex-grow: 1;
        display: flex;
        flex-direction: column;
    }

    .card-title {
        font-size: 2.2rem;
        margin: 10px 0;
        color: var(--white);
        font-weight: bold;
    }

    .card-text {
        font-size: 1em;
        margin: 10px 0;
        color: #777;
        flex-grow: 1;
        width: 90%;
        margin: 0 auto;
    }

    .card-price {
        font-size: 1.2em;
        margin: 10px 0 0;
        background-color: var(--white);
        color: var(--black);
        padding-top: 10px;
        padding-bottom: 10px;
        font-weight: bold;
    }
</style>