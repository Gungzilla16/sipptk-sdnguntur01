<?php

session_start();

include 'config/database.php';
include 'config/function.php';

//cek jika tombol login sudah ditekan
if(isset($_POST['login'])) {
    //ambil inputan username dan password
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    //cek username terdaftar atau tidak
    $result = mysqli_query($conn, "SELECT * FROM akun WHERE username = '$username'");

    //jika username terdaftar
    if(mysqli_num_rows($result) == 1){
        //cek password
        $hasil = mysqli_fetch_assoc($result);

        if(password_verify($password, $hasil['password'])) {
            //set session login
            $_SESSION['login'] = true;
            $_SESSION['id_akun'] = $hasil['id_akun'];
            $_SESSION['nama'] = $hasil['nama'];
            $_SESSION['username'] = $hasil['username'];
            $_SESSION['email'] = $hasil['email'];
            $_SESSION['level_akses'] = $hasil['level_akses'];

            //jika kondisi terpenuhi arahkan ke index.php
            header("Location: index.php");
            exit;
        }
    }
    //jika kondisi tidak terpenuhi atau user tidak terdaftar
    $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Sistem Informasi Pendataan Pendidik dan Tenaga Kependidikan SDN Guntur 01</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <link href="/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

          <!-- Favicons -->
      <link rel="apple-touch-icon" href="/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
      <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
      <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
      <link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
      <link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
      <link rel="icon" href="/docs/5.0/assets/img/favicons/favicon.ico">
      <meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        } 
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="assets/css/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin">
  <form action="" method="post">
    <img class="mb-4" src="assets/img/logo.png" alt="" width="150" height="150">
    <h3 class="h4 mb-3 fw-bold">SIP-PTK SDN GUNTUR 01</h3>
      
    <?php if (isset($error)) : ?>
      <div class="alert alert-danger text-center">
        <p>Username & Password Salah</p>
      </div>
    <?php endif; ?>

    <div class="form-floating">
      <input type="text" class="form-control" name="username" placeholder="Username"  id="floatingInput" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" placeholder="Password" id="floatingPassword" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Login</button>
    <p class="mt-5 mb-3 text-muted">&copy; SDN Guntur 01 <?= date('Y') ?> &trade;</p>
  </form>
</main>


    
  </body>
</html>
