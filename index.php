<?php

    /******************************************
     Asisten Pemrograman 13 & 14
    ******************************************/

    include("view/TampilMahasiswa.php");

    $tp = new TampilMahasiswa();

    if (isset($_GET['add'])) {
        // Menampilkan form tambah data
        $tp->tampilAdd();

    } elseif (isset($_POST['submit']) && isset($_POST['id'])) {
        // Proses update data
        $tp->updateData(); // Fungsi update data
        header("Location: index.php");
        exit();
    } elseif (isset($_POST['submit'])) {
        // Proses tambah data
        $tp->addData(); // Panggil fungsi untuk menambah data
        header("Location: index.php");
        exit();
    } elseif (isset($_GET['delete'])) {
        // Proses hapus data
        $tp->tampilDelete($_GET['delete']);
        header("Location: index.php");
        exit();
    } elseif (isset($_GET['id'])) {  // Cek jika ada parameter id di URL
        $id = $_GET['id'];  // Ambil id dari URL
        $tp->tampilUpdate($id);  // Panggil fungsi tampilUpdate dengan parameter id
    } else {    
        // Menampilkan daftar mahasiswa
        $tp->tampil();
    }
