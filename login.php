<?php
// Memulai session.
session_start();

// Jika ditemukan session, maka user akan otomatis dialihkan ke halaman admin.
if (isset($_SESSION['username'])) {
    header("location: index.php");
}

// Include koneksi database.
require_once "koneksi.php";

// Jika tombol login ditekan, maka akan mengirimkan variabel yang berisi username dan password.
if (isset($_POST['login'])) {

    $username = $_POST['username'];
    $email = $_POST['email'];
    $userpass = $_POST['password']; // password yang di inputkan oleh user lewat form login.

    // Query ke database.
    $sql = mysqli_query($connect_db, "SELECT username, password, email FROM user WHERE email = '$email' OR username = '$username'");

    list($username, $password, $email) = mysqli_fetch_array($sql);

    // Jika data ditemukan dalam database, maka akan melakukan validasi dengan password_verify.
    if (mysqli_num_rows($sql) > 0) {

        /*
            Validasi login dengan password_verify
            $userpass -----> diambil dari password yang diinputkan user lewat form login
            $password -----> diambil dari password dalam database
        */
        if (password_verify($userpass, $password)) {

            // Buat session baru.
            session_start();
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            // Jika login berhasil, user akan diarahkan ke halaman admin.
            header("location: index.php");
            die();
        } else {
            echo '<script language="javascript">
                    window.alert("Pastikan Password dan username anda benar ATUH EYY");
                    window.location.href="./";
                  </script>';
        }
    } else {
       echo '<script language="javascript">
                window.alert("LOGIN GAGAL EYY! Silakan coba lagi");
                window.location.href="./";
             </script>';
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Login</title>
        <script type="text/javascript" src="dist/sweetalert.min.js"></script>
        <style type="text/css">
            body {
                font-family: Arial, serif;
                margin: 0;
            }
            .container {
                display: table;
                margin: 0 auto;
                height: 100vh;
            }
            .box {
                background: #eee;
                border-radius: 3px;
                padding: 20px;
                top: 30vh;
                position: relative;
                vertical-align: middle;
                margin: 0 auto;
                width: 275px;
                height: 200px;
            }
            .form-group {
                margin-bottom: 10px;
            }
            button {
                cursor: pointer;
                font-size: 16px;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="box">
                <h2>Login</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label>Email :</label><br>
                        <input type="text" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Password :</label><br>
                        <input type="password" name="password" required>
                    </div>
                    <button onclick="sweet()" type="submit" name="login">Login</button>
                    <script>
                      function sweet (){
                      swal("Good job!", "You clicked the button!", "success");
                      }
                    </script>
                </form>
            </div>
        </div>
    </body>
</html>