# Proyek CRUD Mahasiswa dengan Pola MVP

## Janji
Saya Ahmad Izzuddin Azzam dengan NIM 2300492 mengerjakan Tugas Praktikum 9 dalam mata kuliah Desain dan Pemrograman Berorientasi Objek untuk keberkahanNya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Deskripsi Proyek
Proyek ini adalah aplikasi berbasis web sederhana untuk mengelola data mahasiswa menggunakan pola desain Model-View-Presenter (MVP). Aplikasi ini memungkinkan pengguna untuk melakukan operasi CRUD (Create, Read, Update, Delete) pada data mahasiswa yang disimpan dalam database MySQL.

## Desain Program
Program ini dirancang dengan pola MVP untuk memisahkan logika bisnis, antarmuka pengguna, dan pengelolaan data. Berikut adalah pembagian komponen utama:

### 1. **Model**
Komponen Model bertanggung jawab untuk mengelola data dan berinteraksi dengan database. File-file yang termasuk dalam komponen ini adalah:
- `DB.class.php`: Mengelola koneksi ke database dan eksekusi query.
- `Mahasiswa.class.php`: Representasi data mahasiswa sebagai objek.
- `TabelMahasiswa.class.php`: Berisi operasi CRUD untuk tabel mahasiswa di database.

### 2. **View**
Komponen View bertanggung jawab untuk menampilkan data kepada pengguna dan menerima input dari pengguna. File-file yang termasuk dalam komponen ini adalah:
- `TampilMahasiswa.php`: Mengelola tampilan daftar mahasiswa, form tambah, dan form edit.
- Template HTML:
  - `templates/skin.html`: Template utama untuk menampilkan tabel mahasiswa.
  - `templates/addpage.html`: Template untuk halaman tambah data mahasiswa.
  - `templates/updatepage.html`: Template untuk halaman edit data mahasiswa.

### 3. **Presenter**
Komponen Presenter bertanggung jawab untuk menghubungkan Model dan View. File-file yang termasuk dalam komponen ini adalah:
- `KontrakPresenter.php`: Interface untuk mendefinisikan kontrak antara Presenter dan View.
- `ProsesMahasiswa.php`: Implementasi Presenter untuk mengelola data mahasiswa.

## Alur Kerja Program
1. **Menampilkan Data Mahasiswa**
   - Saat halaman utama diakses, `index.php` memanggil metode `tampil()` dari `TampilMahasiswa`.
   - Presenter (`ProsesMahasiswa`) mengambil data dari database melalui `TabelMahasiswa` dan mengirimkannya ke View untuk ditampilkan.

2. **Menambah Data Mahasiswa**
   - Pengguna mengklik tombol tambah, dan form tambah ditampilkan melalui metode `tampilAdd()`.
   - Setelah form diisi dan disubmit, data dikirim ke metode `addData()` di Presenter untuk disimpan ke database.

3. **Mengedit Data Mahasiswa**
   - Pengguna mengklik tombol edit pada salah satu data mahasiswa.
   - Form edit ditampilkan melalui metode `tampilUpdate($id)`.
   - Setelah form diisi dan disubmit, data diperbarui melalui metode `updateData()` di Presenter.

4. **Menghapus Data Mahasiswa**
   - Pengguna mengklik tombol hapus pada salah satu data mahasiswa.
   - Data dihapus dari database melalui metode `deleteData()` di Presenter.

## Struktur Database
Tabel `mahasiswa` memiliki struktur sebagai berikut:
- `id` (int, primary key, auto increment)
- `nim` (varchar)
- `nama` (varchar)
- `tempat` (varchar)
- `tl` (date)
- `gender` (varchar)
- `email` (varchar)
- `telp` (varchar)
