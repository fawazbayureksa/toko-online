<?php 
session_start();
require_once 'koneksi.php';



 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Aimhi Shop - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-sm-10">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" name="username" aria-describedby="emailHelp"
                                                placeholder="Masukkan Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password"  placeholder="Kata Sandi">
                                        </div>
                                      
                                        <hr>
                                         <button type="submit" name="masuk" class="btn btn-facebook btn-user btn-block">
                                            <i class="fas fa-sign-in-alt"></i> Masuk
                                        </buttoon>
                                         <button type="submit" class="btn btn-google btn-user btn-block">
                                            <i class="fas fa-sign-out-alt"></i> Keluar
                                        </button>
                                    </form>
                                    <hr>
                                   
                                    <div class="text-center">
                                        <a class="btn btn-success btn-xs href="register.html"><i class="fas fa-registered"></i> Registrasi</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>


    <?php 

    if (isset($_POST['masuk'])) {
   
  
    $name=$_POST['username'];
    $pass = $_POST['password'];

    $query = mysqli_query($koneksi,"SELECT * FROM admin WHERE username='$name' and password ='$pass' ");
    $cek = mysqli_num_rows($query);

        if ($cek == 1) {
            
            $_SESSION['login'] = mysqli_fetch_assoc($query);
            echo "<script>alert('Login Admin Berhasil');</script>";
            echo "<script>location='index.php?page=dashboard';</script>";


        }else{
            
            echo "<script>alert('Login Admin Gagal , Periksa Username dan Password anda');</script>";
            echo "<script>location='login.php';</script>";

        }

    }
     ?>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
</body>

</html>


