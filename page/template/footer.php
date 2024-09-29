<footer class="section footer">

    <div class="footer-location flex">
        <div class="tempat">
            <div class="location-text"><i class='bx bx-map map-icon'></i>
                <?php echo $alamat; ?>
            </div>
        </div>
    </div>

    <style>
        .tempat {
            display: flex;
            align-items: center;
            margin: 0 auto;
            max-width: 90%;
        }

        .location-text {
            display: flex;
            align-items: center;
        }

        .map-icon {
            margin-right: 8px;
        }

        .location {
            display: block;
        }
    </style>
    <br>
    <div class="media-sosial">
        <a href="<?php echo $facebook; ?>" target="_blank" aria-label="Facebook">
            <i class='bx bxl-facebook'></i>
        </a>
        <a href="<?php echo $instagram; ?>" target="_blank" aria-label="Instagram">
            <i class='bx bxl-instagram'></i>
        </a>
    </div>
    <div class="footer-copyRight">&copy; <?php echo date('Y') ?> | All rigths reserved</div>
    <p class="admin">Managed By <a href="Admin" style="color:gray;">Admin</a> </p>
</footer>

<script src="page/js/swiper-bundle.min.js"></script>

<script src="page/js/scrollreveal.js"></script>

<script src="page/js/script.js"></script>

<style>
    .admin {
        text-align: center;
        font-size: 1rem;
    }

    .media-sosial {
        margin: 0 auto;
        display: flex;
        justify-content: center;
        gap: 15px;
    }

    .media-sosial a {
        color: white;
        text-decoration: none;
        transition: transform 0.3s ease;
    }

    .media-sosial i {
        font-size: 4rem;
        transition: transform 0.3s ease;
    }

    .media-sosial a:hover {
        transform: scale(1.4);
    }
</style>