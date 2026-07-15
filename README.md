# Ambiverse - Platform Tryout Online

Ambiverse adalah sebuah aplikasi berbasis web (PHP & MySQL) yang berfungsi sebagai platform tryout atau ujian online. Aplikasi ini memiliki dua peran utama: **Admin** dan **Student** (Siswa), dengan berbagai fitur interaktif untuk mempermudah simulasi ujian.

## 🚀 Fitur Utama

### 🔐 Keamanan & Autentikasi (Login/Register)
- **Validasi Input:** Terdapat batas minimal karakter untuk username/password, serta validasi format email.
- **Username Unik:** Pendaftaran akun baru tidak bisa dilakukan jika username sudah terpakai.
- **Hashing Password:** Password dienkripsi di dalam database untuk keamanan data.
- **Toggle Password:** Pengguna dapat melihat/menyembunyikan password yang diketik saat register.
- **Sesi (Session):** Pengguna tidak perlu login berulang kali selama browser belum ditutup atau sebelum menekan tombol logout.

### 👑 Fitur Admin
- **Manajemen Paket Soal (CRUD):** Admin dapat membuat, mengubah, dan menghapus paket soal tryout. 
  - Dilengkapi validasi agar input data tidak salah (misal: judul tidak boleh terlalu pendek).
  - Menggunakan **DataTables** untuk kemudahan pencarian, penyortiran, dan melihat data dengan rapi.
- **Manajemen Soal & Jawaban (CRUD):** Admin dapat menambahkan, mengedit, dan menghapus soal di dalam paket ujian. Form pembuatan soal sudah menggunakan **WYSIWYG editor**.
- **Hasil Tryout:** Menampilkan rekap hasil ujian dari seluruh pengguna. Menggunakan **Bootstrap Accordion** agar informasi lebih rapi saat dibuka.
- **Manajemen Pengguna:** Admin dapat melihat daftar siswa yang terdaftar dan menghapus akun pengguna jika diperlukan.
- **Kritik & Saran:** Admin dapat melihat umpan balik yang dikirim oleh siswa, serta menghapusnya.

### 🎓 Fitur Student (Siswa)
- **Dashboard Terbaru:** Menampilkan 5 paket soal terbaru secara langsung di halaman utama siswa.
- **Pengerjaan Tryout:** Siswa dapat memilih dan mengerjakan paket soal yang tersedia (hanya bisa dikerjakan jika paket sudah memiliki isi soal).
- **Simulasi Pengerjaan (AJAX):**
  - Tampilan soal diload secara dinamis tanpa reload halaman (AJAX).
  - Terdapat tombol **Previous** dan **Next**.
  - Dilengkapi dengan **Countdown Timer** (waktu mundur) via AJAX.
- **Leaderboard:** Siswa dapat melihat peringkat nilai dari seluruh siswa yang mengerjakan paket soal tersebut, diurutkan dari skor tertinggi.
- **Riwayat & Hasil Tryout:** Daftar riwayat pengerjaan diurutkan dari yang terbaru, agar siswa dapat melihat progress nilai yang diperoleh.
- **Kirim Kritik & Saran:** Fitur komunikasi bagi siswa untuk memberikan feedback langsung ke admin.

## 🛠️ Teknologi yang Digunakan
- **Backend:** PHP 
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript (AJAX)
- **Framework UI:** Bootstrap 5.2.2

## ⚙️ Persyaratan Sistem & Instalasi
1. Pastikan Anda telah menginstal web server seperti XAMPP / MAMP / LAMP.
2. Masukkan folder proyek `ambiverse` ke dalam folder root web server Anda (`htdocs` untuk XAMPP).
3. Buat database baru di MySQL (misalnya melalui phpMyAdmin) dengan nama **`ambiverse`**.
4. Import file database bawaan aplikasi ke dalam database tersebut: `ambiverse.sql`.
5. Buka proyek ini di browser: `http://localhost/ambiverse`

## 🔑 Akun Uji Coba (Demo)
Anda bisa mencoba masuk ke aplikasi menggunakan akun-akun default berikut:

**Sebagai Admin:**
- Username: `admin`
- Password: `ambiverse`

**Sebagai Student (Siswa):**
- Username: `indry` | Password: `indry123`
- Username: `patris` | Password: `patris2004`
