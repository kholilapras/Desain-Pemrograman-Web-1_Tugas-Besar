<?php include 'template/header.php'; ?>
<?php
$sql = "SELECT * FROM cms_beranda_carousel";
$result = $koneksi->query($sql);
?>

<main>

    <section class="section black2">
        <h1 class="garisbawah">Pemesanan</h1>
        <p class="penjelasan" style="text-align:center;">Klik logo</p>
        <div class="logofood">
            <a href="<?php echo $whatsapp_link ?>">
                <img src="admin/assets/img/food/wa.png" alt="WhatsApp">
            </a>

            <a href="<?php echo $gofood ?>">
                <img src="admin/assets/img/food/gofood.png" alt="WhatsApp">
            </a>

            <a href="<?php echo $shopeefood ?>">
                <img src="admin/assets/img/food/shopeefood.png" alt="WhatsApp">
            </a>

            <a href="<?php echo $grabfood ?>">
                <img src="admin/assets/img/food/grabfood.png" alt="WhatsApp">
            </a>

        </div>

    </section>


    <section class="section black1">
        <h1 class="garisbawah">Kritik & Saran</h1>
        <p class="penjelasan">Kami senantiasa menghargai pendapat Anda! Berikan kritik, saran, atau masukan Anda untuk membantu kami meningkatkan layanan. Umpan balik Anda adalah langkah menuju pengalaman yang lebih baik.</p>
        <br>
        <br>
        <div>
            <form action="action.php?action=kontak-masuk" method="post" class="contact-form" autocomplete="off">
                <div class="form-group">
                    <input type="text" name="nama" id="nama" placeholder="" required>
                    <label for="nama">Nama Lengkap</label>
                </div>
                <div class="form-group">
                    <input type="email" name="email" id="email" placeholder="" required>
                    <label for="email">Email</label>
                </div>
                <div class="form-group">
                    <input type="tel" name="telp" id="telp" placeholder="" required style="margin-bottom:15px;">
                    <label for="telp">No. Telp</label>
                </div>
                <div class="form-group">
                    <textarea name="pesan" id="pesan" placeholder="" required></textarea>
                    <label for="pesan">Pesan</label>
                </div>
                <button type="submit" name="submit">Kirim</button>
            </form>

        </div>
    </section>


</main>


<?php include 'template/footer.php'; ?>

<style>
    .logofood {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 20px;
        flex-wrap: wrap;
        width: 100%;
        box-sizing: border-box;
        padding: 10px;
    }

    .logofood a {
        flex: 1 1 20%;
        max-width: 20%;
        box-sizing: border-box;
    }

    .logofood img {
        width: 100%;
        height: auto;
        transition: transform 0.3s ease;
        border-radius: 15px;
    }

    .logofood img:hover {
        transform: scale(1.1);
    }


    @media (max-width: 1200px) {
        .logofood a {
            flex: 1 1 25%;
            max-width: 25%;
        }
    }

    @media (max-width: 992px) {
        .logofood a {
            flex: 1 1 33.33%;
            max-width: 33.33%;
        }
    }

    @media (max-width: 768px) {
        .logofood a {
            flex: 1 1 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 576px) {
        .logofood a {
            flex: 1 1 100%;
            max-width: 100%;
        }
    }
</style>

<style>
    :root {
        --white: #F0F0F0;
        --black: #141414;
        --black2: #282828;
        --golden: #F0F0F0;
        --secondary: #2ecc71;
        --error: #e74c3c;
    }



    .contact-form {
        background-color: var(--black);
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.5);
        min-width: 100px;
        max-width: 400px;
        margin: 0 auto;
    }

    .form-group {
        position: relative;
        margin-bottom: 32px;
        margin-top: 20px;
    }

    .form-group input {
        width: 100%;
        padding: 10px;
        background: none;
        border: none;
        border-bottom: 2px solid var(--white);
        color: var(--white);
        outline: none;
        transition: border-color 0.3s;
    }

    .form-group textarea {
        width: 100%;
        padding: 10px;
        background: none;
        border: 2px solid;
        color: var(--white);
        transition: border-color 0.3s;
        height: 150px;
        margin-top: 10px;
    }

    .form-group input:focus {
        border-bottom: 2px solid var(--white);
        color: var(--golden);
    }

    .form-group label {
        position: absolute;
        top: 10px;
        left: 10px;
        color: var(--white);
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-group input:focus+label,
    .form-group input:not(:placeholder-shown)+label,
    .form-group textarea:focus+label,
    .form-group textarea:not(:placeholder-shown)+label {
        top: -20px;
        left: 5px;
        color: var(--golden);
        font-size: 12px;
        font-weight: bold;
    }

    button[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: var(--black2);
        border: none;
        color: var(--white);
        font-size: 16px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    button[type="submit"]:hover {
        background-color: var(--white);
        color: var(--black);
    }

    button[type="submit"]:active {
        background-color: var(--golden);
        transform: scale(0.98);
    }

    button[type="submit"]:focus {
        outline: none;
        box-shadow: 0 0 5px var(--golden);
    }

    .form-group input::placeholder,
    .form-group textarea::placeholder {
        color: transparent;
    }
</style>