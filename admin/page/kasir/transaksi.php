<?php
session_start();

if (!isset($_SESSION['role'])) {
    header('Location: index.php');
    exit();
}

$sql = "SELECT * FROM info_web";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_info = $row['id_info'];
    $nama_website = $row['nama_website'];
    $whatsapp = $row['whatsapp'];
    $whatsapp_link = $row['whatsapp_link'];
    $facebook = $row['facebook'];
    $instagram = $row['instagram'];
    $alamat = $row['alamat'];
    $gmaps = $row['gmaps'];
    $gofood = $row['gofood'];
    $shopeefood = $row['shopeefood'];
    $grabfood = $row['grabfood'];
    $sejarah = $row['sejarah'];
}

include 'page/template/sidebar.php';
?>

<body>
    <main class="content">
        <?php include 'page/template/header.php'; ?>
        <div>
            <h1 class="judul">Transaksi</h1>

            <div class="text">
                <form id="pesananForm" action="">
                    <label for="menu">Pilih Menu : </label>
                    <select name="menu" id="menu">
                        <?php
                        $sql2 = "SELECT * FROM Menu";
                        $result = $koneksi->query($sql2);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='" . $row["menu_id"] . "'>" . $row["nama_menu"] . " - Rp " . number_format($row["harga"], 0, ',', '.') . "</option>";
                            }
                        } else {
                            echo "<option value=''>Tidak ada menu tersedia</option>";
                        }
                        ?>
                    </select>

                    <br>
                    <label for="jumlah">Jumlah : </label>
                    <input type="number" id="jumlah" name="jumlah" min="1" required>
                    <button type="button" id="tambahPesanan" style="background-color:var(--blue_dark); color:white;"><i class='bx bx-plus'></i> Tambah Pesanan</button>
                    <br>
                    <br>
                </form>

                <table id="daftarPesanan">
                    <thead>
                        <tr>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Subtotal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                <div style="color:var(--gold);">
                    <p>Total : Rp <input type="text" id="total" name="total" readonly placeholder="0" style="background-color: transparent; color:var(--gold);"></p>
                </div>
                <br>
                <br>

                <table>
                    <tr>
                        <th>Diskon</th>
                        <th>Uang Bayar</th>
                        <th>Uang Kembali</th>
                    </tr>

                    <td><input type="text" id="diskon" name="diskon" min="0" step="0.01" placeholder="Masukkan Angka" value="0"></td>
                    <td><input type="text" id="uangBayar" name="uangBayar" min="0" step="0.01" placeholder="Masukkan Angka"></td>
                    <td><input type="text" id="kembalian" name="kembalian" readonly placeholder="0"></td>
                </table>
                <br>
                <div>
                    <button type="button" id="btnCetak" style="background-color:green; color:white;"> <i class='bx bx-printer'></i> Cetak Transaksi</button>
                    <button type="button" id="simpanTransaksi" style="display:none; background-color:green; color:white;"> <i class='bx bx-save'></i> Simpan Transaksi</button>

                </div>

                <?php
                date_default_timezone_set('Asia/Jakarta');
                $date = date('d-m-Y H:i:s');
                ?>

                <!-- Div untuk Cetak -->
                <div id="printArea" style="visibility: hidden;">
                    <h4><?php echo $nama_website ?></h4>
                    <p><?php echo $alamat ?></p>
                    <p>===============</p>
                    <p>Waktu : <?php echo $date ?></p>
                    <p>Kasir : <?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?></p>
                    <p>===============</p>
                    <div id="printPesanan"></div>
                    <p>===============</p>
                    <p>Total: Rp <span id="printTotal"></span></p>
                    <p>Diskon: Rp <span id="printDiskon"></span></p>
                    <p>Uang Bayar: Rp <span id="printUangBayar"></span></p>
                    <p>Kembalian: Rp <span id="printKembalian"></span></p>
                    <p>===============</p>
                    <p>Terima Kasih !</p>

                </div>
            </div>
        </div>
    </main>
</body>

<script>
    document.getElementById('jumlah').addEventListener('input', function(e) {
        if (this.value === '' || parseInt(this.value) < 1) {
            this.value = 1;
        }
    });
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        var daftarPesanan = [];

        $('#tambahPesanan').click(function() {
            var menuId = $('#menu').val();
            var namaMenu = $('#menu option:selected').text().split(' - ')[0];
            var harga = parseFloat($('#menu option:selected').text().split(' - Rp ')[1].replace(/\./g, ''));
            var jumlah = parseInt($('#jumlah').val());
            var subtotal = harga * jumlah;

            daftarPesanan.push({
                menu_id: menuId,
                nama_menu: namaMenu,
                harga: harga,
                jumlah: jumlah,
                subtotal: subtotal
            });

            renderTable();
            calculateTotal();
        });

        $('#simpanTransaksi').click(function() {
            var diskon = parseFloat($('#diskon').val().replace(/\./g, '')) || 0;
            var uangBayar = parseFloat($('#uangBayar').val().replace(/\./g, ''));

            if (daftarPesanan.length === 0) {
                displayMessage('Daftar pesanan kosong.', 'error');
                return;
            }

            $.ajax({
                url: 'proses_pesanan.php',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    pesanan: daftarPesanan,
                    diskon: diskon,
                    uangBayar: uangBayar
                }),
                success: function(response) {
                    if (response.status === 'success') {
                        $('#kembalian').val(formatNumber(response.kembalian));
                        daftarPesanan = [];
                        renderTable();
                        updatePrintArea(response);
                        $('#btnCetak').show();
                    } else {
                        displayMessage('Error: ' + response.message, 'error');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.error("AJAX Error: ", textStatus, errorThrown);
                    displayMessage('Terjadi kesalahan saat menyimpan transaksi. Silakan coba lagi.', 'error');
                }
            });
        });

        $('#uangBayar, #diskon').on('input', function() {
            formatInput(this);
            calculateTotal();
        });

        function renderTable() {
            var tbody = $('#daftarPesanan tbody');
            tbody.empty();
            daftarPesanan.forEach(function(item, index) {
                tbody.append(
                    '<tr>' +
                    '<td>' + item.nama_menu + '</td>' +
                    '<td>' + item.jumlah + '</td>' +
                    '<td>Rp ' + formatNumber(item.harga) + '</td>' +
                    '<td>Rp ' + formatNumber(item.subtotal) + '</td>' +
                    '<td><button type="button" onclick="removeItem(' + index + ')">Hapus</button></td>' +
                    '</tr>'
                );
            });
            calculateTotal();
        }

        function calculateTotal() {
            var total = daftarPesanan.reduce(function(acc, item) {
                return acc + item.subtotal;
            }, 0);
            var diskon = parseFloat($('#diskon').val().replace(/\./g, '')) || 0;
            total -= diskon;
            $('#total').val(formatNumber(total));
            calculateChange();
        }

        function calculateChange() {
            var total = parseFloat($('#total').val().replace(/\./g, '')) || 0;
            var uangBayar = parseFloat($('#uangBayar').val().replace(/\./g, '')) || 0;
            var kembalian = uangBayar - total;
            $('#kembalian').val(formatNumber(kembalian));
        }

        window.removeItem = function(index) {
            daftarPesanan.splice(index, 1);
            renderTable();
            calculateTotal();
        };

        function formatNumber(number) {
            return number.toLocaleString('id-ID');
        }

        function formatInput(input) {
            var value = input.value.replace(/\D/g, '');
            input.value = value ? parseInt(value).toLocaleString('id-ID') : '';
        }

        function updatePrintArea(data) {
            $('#printPesanan').empty();
            data.pesanan.forEach(function(item) {
                $('#printPesanan').append(
                    '<li>' +
                    '<strong></strong> ' + item.nama_menu + '<br>' +
                    '<strong>(</strong> Rp ' + formatNumber(item.harga) + ' x' +
                    '<strong></strong> ' + item.jumlah + ')<br>' +
                    '<strong>=</strong> Rp ' + formatNumber(item.subtotal) +
                    '</li><br>'
                );
            });
            $('#printTotal').text(formatNumber(data.total));
            $('#printDiskon').text(formatNumber(data.diskon));
            $('#printUangBayar').text(formatNumber(data.uangBayar));
            $('#printKembalian').text(formatNumber(data.kembalian));
        }

        $('#btnCetak').click(function() {
            updatePrintArea({
                pesanan: daftarPesanan,
                total: parseFloat($('#total').val().replace(/\./g, '')),
                diskon: parseFloat($('#diskon').val().replace(/\./g, '')) || 0,
                uangBayar: parseFloat($('#uangBayar').val().replace(/\./g, '')) || 0,
                kembalian: parseFloat($('#kembalian').val().replace(/\./g, ''))
            });
            $('#printArea').show(); // Ensure printArea is visible
            window.print();
        });

        function displayMessage(message, type) {
            var messageBox = $('#messageBox');
            if (!messageBox.length) {
                messageBox = $('<div id="messageBox"></div>').appendTo('body');
            }
            messageBox.removeClass().addClass(type).text(message).show();
            setTimeout(function() {
                messageBox.fadeOut();
            }, 3000);
        }
    });
</script>

<style>
    /* Gaya khusus untuk tampilan cetak */
    @media print {
        body * {
            visibility: hidden;
        }

        #printArea,
        #printArea * {
            visibility: visible;
        }

        #printArea {
            position: absolute;
            left: 0;
            top: 0;
            width: 80mm;
            height: auto;
            color: black;
            border: solid 2px;
        }
    }

    /* Gaya untuk pesan */
    #messageBox {
        position: fixed;
        top: 20px;
        right: 20px;
        padding: 10px;
        border-radius: 5px;
        display: none;
    }

    .success {
        background-color: #4CAF50;
        color: white;
    }

    .error {
        background-color: #f44336;
        color: white;
    }
</style>

<style>
    input {
        border: none;
        background-color: var(--black2);
        height: 2rem;
        color: var(--white);
        font-size: 1rem;
        width: auto;

    }

    button {
        background-color: var(--gold);
        color: var(--black);
    }

    #menu {
        border: none;
        background-color: 1rem;
        font-size: 1rem;
        border-radius: 10px;
    }

    p {
        font-size: 1rem;
    }

    #jumlah {
        font-size: 1rem;
        height: 40px;
        width: 75px;
        text-align: center;
        border-radius: 8px;
    }

    select {
        background-color: var(--white);
        height: 40px;
        width: max-content;
    }
</style>

</html>