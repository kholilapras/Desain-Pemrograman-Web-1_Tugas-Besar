Langkah 1 : Membuat Database di phpMyAdmin
-----------
1.1 Buka phpMyAdmin:
Akses phpMyAdmin melalui browser Anda. Biasanya URL-nya adalah http://localhost/phpmyadmin jika Anda menggunakan server lokal seperti XAMPP, WAMP, atau MAMP.

1.2 Membuat Database:
- Pada antarmuka phpMyAdmin, klik pada tab "Databases".
- Pada kolom "Create database", masukkan nama database: warungbakso
- Klik tombol "Create".



Langkah 2 : Mengimpor File SQL
-----------
2.1 Pilih Database:
Pada daftar database, klik nama database warungbakso yang baru saja Anda buat.

2.2 Impor File SQL:
- Setelah berada di dalam database warungbakso, klik pada tab "Import".
- Klik tombol "Choose File" dan pilih file warungbakso.sql dari komputer Anda.
- Pastikan format file yang dipilih adalah SQL.
- Klik tombol "Go" untuk memulai proses impor.
- Tunggu hingga proses impor selesai. Jika berhasil, Anda akan melihat pesan sukses.


Langkah 3: Membuka Proyek
----------
3.1 Setup Server Lokal:
- Pastikan Anda memiliki server lokal seperti XAMPP, WAMP, atau MAMP yang terinstal di komputer Anda.
- Pastikan server Apache dan MySQL sedang berjalan.

3.2 Copy Project ke Direktori Server:
Salin folder proyek Anda ke dalam direktori root server lokal. Untuk XAMPP, biasanya berada di C:\xampp\htdocs\. Buat folder baru di dalam direktori tersebut, misalnya C:\xampp\htdocs\warungbakso.