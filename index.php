<?php 
include("koneksi.php");
include('auth.php');
 ?>

<title>Halaman Sukses Login</title>
        <script type="text/javascript" src="dist/sweetalert.min.js"></script>
<div align='center'>
   Selamat Datang, <b><?php echo $username;?></b> <button onclick="sweet()">Logout</button>
<script type="text/javascript">
    function sweet() {
        swal({
            title: "OOPS",
            text: "Apakah Anda yakin Mau Keluar?",
            icon: "warning",
            dangerMode: false,
            buttons: [true, "OK"],
          }).then(
          function() {
            window.location.href="logout.php";
          });
    }
        </script>
</div>