<?php include 'template/header.php'; ?>
<?php
$sql = "SELECT * FROM cms_beranda_carousel";
$result = $koneksi->query($sql); ?>

<main>
    <section class="home" id="home">
        <div class="home-content">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="swiper-slide">';
                            echo '<img src="admin/' . $row['gambar'] . '" alt="' . $row['judul'] . '" class="home-img">';
                            echo '<div class="home-details">';
                            echo '<div class="home-text">';
                            echo '<h2 class="homeTitle">' . $row['judul'] . '</h2>';
                            echo '<p class="homeSubtitle">' . $row['subjudul'] . '</p>';
                            echo '</div>';
                            echo '<a href="menu"><button class="button" style="background-color:#f0f0f0; color:black;">Selengkapnya</button></a>';
                            echo '</div>';
                            echo '</div>';
                        }
                    } else {
                        echo '';
                    }
                    ?>
                </div>


                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
            </div>

            <script src="path/to/swiper-bundle.min.js"></script>
            <script>
                var swiper = new Swiper('.mySwiper', {
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                });
            </script>
        </div>
    </section>

    <?php
    $sql = "SELECT * FROM cms_banner_teks";
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
    <section class="section black2">
        <div class="tesitmonial swiper mySwiper">
            <div class="swiper-wrapper promosi">
                <?php foreach ($menu_items as $item) : ?>
                    <div class="testi-content swiper-slide flex">
                        <h3 class="garis"><?php echo $item['kalimat']; ?></h3>
                        <p style="font-weight: lighter;" class="review-quote"><?php echo $item['penjelasan']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next swiper-navBtn"></div>
            <div class="swiper-button-prev swiper-navBtn"></div>
        </div>
    </section>

    <section class="section black1">
        <h1>Maps</h1>
        <br>
        <div style="width:100%;"><?php echo $gmaps; ?></div>
    </section>


</main>

<?php include 'template/footer.php'; ?>

<style>
    .garis {
        border-bottom: 5px solid #282828;
        padding-bottom: 5px;
        font-weight: bold;
        color: #f0f0f0
    }
</style>
<script>
    var swiper = new Swiper('.mySwiper', {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
    });
</script>