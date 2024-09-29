<div class="header">
    <h4><?php echo htmlspecialchars($_SESSION['nama_lengkap']); ?></h4>
    <p><?php echo htmlspecialchars($_SESSION['email']); ?> |
        <?php echo htmlspecialchars($_SESSION['role']); ?></p>
</div>
<div class="waktuu">
    <div id="clock"></div>
</div>
<br>
<style>
    .header {
        padding-bottom: 10px;
        border-bottom: 2px solid #404040;
    }

    .clock {
        width: max-content;
        padding: 4px;
        border-radius: 5px;
        color: 141414;
    }
</style>

<script>
    // Fungsi untuk mengubah angka menjadi dua digit
    function padZero(number) {
        return number < 10 ? '0' + number : number;
    }

    // Fungsi untuk mengupdate waktu setiap detik
    function updateTime() {
        const hariIndonesia = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
        const bulanIndonesia = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];

        const now = new Date();
        const hari = hariIndonesia[now.getDay()];
        const tanggal = padZero(now.getDate());
        const bulan = bulanIndonesia[now.getMonth()];
        const tahun = now.getFullYear();
        const jam = padZero(now.getHours());
        const menit = padZero(now.getMinutes());
        const detik = padZero(now.getSeconds());

        const waktuSekarang = `${hari}, ${tanggal} ${bulan} ${tahun} | ${jam}.${menit}.${detik} WIB`;
        document.getElementById('clock').innerHTML = waktuSekarang;
    }

    // Set interval untuk update waktu setiap detik
    setInterval(updateTime, 1000);

    // Memanggil fungsi updateTime saat halaman pertama kali dimuat
    window.onload = updateTime;
</script>