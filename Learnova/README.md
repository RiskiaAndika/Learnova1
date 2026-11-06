# Learnova — Versi Fitur Lengkap (Pengembangan)

Versi ini menambahkan alur kelas, pendaftaran murid, jadwal, kuis, reward, leaderboard bulanan, dan penukaran voucher.

## Teknologi
- PHP Native + PDO
- MySQL / MariaDB
- HTML, CSS, JavaScript
- XAMPP

## Cara memasang dengan project lama
1. Backup folder `Learnova` dan database `learnova` terlebih dahulu.
2. Ekstrak folder `Learnova` dari ZIP ini ke `C:/xampp/htdocs/`.
3. Jika kamu sudah memakai database lama, buka phpMyAdmin → database `learnova` → tab Import → impor `database-upgrade.sql` **satu kali saja**.
4. Jika database belum pernah dibuat, impor `database.sql` terlebih dahulu, lalu impor `database-upgrade.sql`.
5. Pastikan Apache dan MySQL aktif.
6. Buka `http://localhost/Learnova/index.html`.
7. Login menggunakan akun murid atau pengajar yang sudah terdaftar.

## Alur Pengajar
- Kelola Kelas: buat/edit/hapus kelas, tentukan gratis/berbayar dan harga, atur jadwal, publikasikan.
- Jadwal Kelas: melihat jadwal semua kelas yang dibuat.
- Kelola Kuis: pilih kelas, buat soal pilihan ganda, tentukan jawaban benar, lalu publikasikan kuis.

## Alur Murid
- Academy: melihat kelas terpublikasi, bergabung ke kelas gratis atau membuat pesanan kelas berbayar.
- Jadwal: melihat jadwal kelas yang sudah diikuti dan pembayaran yang sudah aktif.
- Quiz: mengerjakan kuis kelas yang diikuti. Satu jawaban benar bernilai 10 poin; satu kuis hanya dapat dikerjakan satu kali.
- Leaderboard: peringkat 50 teratas berdasarkan poin yang diperoleh pada bulan berjalan.
- Penukaran: menukar poin dengan voucher dan melihat riwayat voucher.

## Aturan poin bawaan
- Bergabung kelas: +20 poin (satu kali per kelas).
- Jawaban kuis benar: +10 poin.
- Bonus leaderboard bulanan: #1 +200, #2 +150, #3 +100, #4–50 +50.
- Voucher: 500 poin = Rp10.000; 1.000 poin = Rp25.000; 2.000 poin = Rp50.000.

Bonus leaderboard bulan sebelumnya diproses saat halaman leaderboard pertama kali dibuka pada bulan baru. Poin aktivitas bulan berjalan dipakai untuk menghitung peringkat bulan tersebut. Bonus leaderboard tidak dihitung sebagai poin aktivitas untuk peringkat bulan berikutnya.

## Pembayaran kelas berbayar — penting
Pembayaran pada versi ini masih **MODE DEMO**. Murid dapat membuat pesanan lalu menekan “Konfirmasi pembayaran demo” untuk menguji alur pendaftaran. Tombol demo tidak memproses uang sungguhan. Sebelum dipakai secara nyata, hubungkan `demo_pay` dengan payment gateway (misalnya Midtrans atau Xendit), verifikasi callback/webhook dari server, dan jangan mengaktifkan konfirmasi demo pada produksi.

## Catatan migrasi
`database-upgrade.sql` menggunakan perintah ALTER TABLE dan hanya boleh dijalankan satu kali pada database lama. Jika muncul pesan bahwa kolom sudah ada, jangan jalankan berulang; periksa struktur tabel terlebih dahulu. Selalu backup sebelum migrasi.

## Batasan versi ini
- Kuis pilihan ganda, satu percobaan per murid.
- Voucher dibuat otomatis dan berstatus approved; pemakaian kode voucher pada checkout kelas belum diintegrasikan.
- Bonus leaderboard diproses saat ada kunjungan ke leaderboard pada bulan baru. Untuk produksi, sebaiknya jalankan proses penutupan bulan melalui cron job.
- Belum ada integrasi pembayaran nyata, email notifikasi, upload gambar kelas, atau panel admin untuk verifikasi transaksi.

