<?php
include('auth.php');
include("koneksi.php");
$id = $_GET['id']; 
$sql = "SELECT * FROM user WHERE id = $id"; 
$query = $connect_db->query($sql);
$data  = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edit Profil</title>
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
                height: 250px;
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
                <h2>Edit Profil</h2>
                <form action="proses-edit.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    <div class="form-group">
                        <label>Username :</label><br>
                        <input type="text" name="username" value="<?php echo $data['username']; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Email :</label><br>
                        <input type="text" name="email" value="<?php echo $data['email']; ?>" >
                    </div>
                    <div class="form-group">
                        <label>Password :</label><br>
                        <input type="password" name="password" value="<?php echo $data['password']; ?>">
                    </div>
                    <button type="submit" value="simpan" name="simpan">Simpan</button>
                </form>
            </div>
        </div>
    </body>
</html>