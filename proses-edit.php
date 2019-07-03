<?php

include("koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    // ambil data dari formulir
    $id = $_POST['id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);   // buat query update
    $sql = "UPDATE user SET username='$username', email='$email', password='$pass' WHERE id=$id";
    $query = mysqli_query($connect_db, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: index.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>