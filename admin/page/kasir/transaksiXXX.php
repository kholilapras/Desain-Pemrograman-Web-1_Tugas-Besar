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
            <h1 class="judul">Transaksi</h1>

            <div class="text">
                <form id="pesananForm" action="">
                    <label for="menu">Pilih Menu : </label>
                    <select name="menu" id="menu">
                        <?php
                        $sql = "SELECT * FROM Menu";
                        $result = $koneksi->query($sql);

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
                    <input type="number" id="jumlah" name="jumlah" min="1" value="1" required>
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

                    <td><input type="text" id="diskon" name="diskon" min="0" step="0.01" placeholder="Masukkan Angka"></td>
                    <td><input type="text" id="uangBayar" name="uangBayar" min="0" step="0.01" placeholder="Masukkan Angka"></td>
                    <td><input type="text" id="kembalian" name="kembalian" readonly placeholder="0"></td>
                </table>
                <br>
                <button type="button" id="simpanTransaksi" style="background-color:green; color:white;"> <i class='bx bx-save'></i> Simpan Transaksi</button>
                <button type="button" id="btnCetak" style="display: none;">Cetak</button>

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
                    var data = JSON.parse(response);
                    if (data.status === 'success') {
                        alert('Transaksi berhasil disimpan. Total: Rp ' + formatNumber(data.total) + ', Kembalian: Rp ' + formatNumber(data.kembalian));
                        $('#kembalian').val(formatNumber(data.kembalian));
                        daftarPesanan = [];
                        renderTable();
                        // Tampilkan tombol cetak
                        $('#btnCetak').show();
                    } else {
                        alert('Error: ' + data.message);
                    }
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
                    '<td><button type="button" onclick="removeItem(' + index + ')" style="background-color: var(--red); color:white;">Hapus</button></td>' +
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
        }

        function formatNumber(number) {
            return new Intl.NumberFormat('id-ID').format(number);
        }

        function formatInput(element) {
            var value = element.value.replace(/\./g, '');
            if (!isNaN(value) && value.length > 0) {
                element.value = formatNumber(parseFloat(value));
            } else {
                element.value = '';
            }
        }

        // Fungsi untuk mencetak transaksi
        $('#btnCetak').click(function() {
            window.print();
        });
    });
</script>


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