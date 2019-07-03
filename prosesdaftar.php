<?php
   require_once("koneksi.php");
   $username = $_POST['username'];
   $email = $_POST['email'];
   $pass = password_hash($_POST["password"], PASSWORD_DEFAULT);
   $sql = "SELECT * FROM user WHERE email = '$email'";
   $query = $connect_db->query($sql);
   if($query->num_rows != 0) {
     echo "<div align='center'>Email Sudah Terdaftar! <a href='daftar.php'>Back</a></div>";
   } else {
       $data = "INSERT INTO user VALUES (NULL, '$username', '$email', '$pass')";
       $simpan = $connect_db->query($data);
       if($simpan) {
         echo "<div align='center'>Pendaftaran Sukses, Silahkan <a href='login.php'>Login</a></div>";
       } else {
         echo "<div align='center'>Proses Gagal!</div>";
       }
     }
?>