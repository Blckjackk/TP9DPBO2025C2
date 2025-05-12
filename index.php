    <?php

    /******************************************
     Asisten Pemrograman 13 & 14
    ******************************************/

    include("view/TampilMahasiswa.php");

        $tp = new TampilMahasiswa();


    if (isset($_GET['add'])) {
        // Menampilkan form tambah data
        $tp->tampilAdd();

    } elseif (isset($_POST['submit'])) {
        // Proses tambah data
        $tp = new TampilMahasiswa();
        $tp->addData(); // Panggil fungsi untuk menambah data

        // Setelah data ditambahkan, redirect ke halaman index.php
        header("Location: index.php");
        exit();
    } elseif (isset($_GET['add'])) {
        // Menampilkan form tambah data
        $tp = new TampilMahasiswa();
        $tp->tampilAdd(); // Panggil tampilAdd() untuk menampilkan form
        
    } elseif (isset($_GET['id'])) {  // Cek jika ada parameter id di URL
            
        $id = $_GET['id'];  // Ambil id dari URL
        $tp->tampilUpdate($id);  // Panggil fungsi tampilUpdate dengan parameter id
    } else {    
        // Menampilkan daftar mahasiswa
        $tp = new TampilMahasiswa();
        $tp->tampil();
    }
