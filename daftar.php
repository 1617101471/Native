<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }
?>

<title>Form Pendaftaran</title>
<script type="text/javascript" src="dist/sweetalert.min.js"></script>
<div align='center'>
  <form action="prosesdaftar.php" method="post">
    <table>
      <tbody>
        <tr>
          <td colspan="2" align="center"><h1>Daftar Baru</h1></td>
        </tr>
        <tr>
          <td>Username</td>
          <td> : <input name="username" type="text" required=""></td>
        </tr>
        <tr>
          <td>Email</td>
          <td> : <input name="email" type="email" required=""></td>
        </tr>
        <tr>
          <td>Password</td>
          <td> : <input name="password" type="password" required=""></td>
        </tr>
        <tr>
          <td colspan="2" align="right">
            <input value="Daftar" onclick="sweet()" type="submit">
             <input value="Batal" type="reset"></td>
             <script>
              function sweet (){
              swal("Good job!", "You clicked the button!", "success");
              }
            </script>
          </tr>
        <tr>
          <td colspan="2" align="center">Sudah Punya akun ? <a href="login.php" onclick="sweet()">
            <b>Login</b></a>
          </td>
        </tr>
      </tbody>
    </table>
  </form>
</div>