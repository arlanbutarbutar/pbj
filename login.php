<?php
require 'function.php';

//cek login
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password =$_POST['password'];
//cocokin dengan database
    $cekdatabase = mysqli_query ($conn, "SELECT * FROM login where email='$email' and password='$password'");

    $hitung = mysqli_num_rows ($cekdatabase);

    //kalau data ditemukan
    
      
    if($hitung>0){
        $data = mysqli_fetch_assoc($cekdatabase);

        // cek jika user login sebagai admin
        if($data['level']=="Admin"){
       
         // buat session login dan email
         $_SESSION['email'] = $email;
         $_SESSION['level'] = "Admin";
         // alihkan ke halaman dashboard admin
         echo '
        <script>
            alert("Anda Berhasil Login");
            window.location.href="home.php";
        </script>
        ';
       
        // cek jika user login sebagai pegawai
        }else if($data['level']=="Pimpinan"){
         // buat session login dan username
         $_SESSION['email'] = $email;
         $_SESSION['level'] = "Pimpinan";
         // alihkan ke halaman dashboard pegawai
         echo '
        <script>
            alert("Anda Berhasil Login");
            window.location.href="home.php";
        </script>
        ';
       
        }else{
       
         // alihkan ke halaman login kembali
         echo '
        <script>
            alert("Username atau Password Salah");
            window.location.href="login.php";
        </script>
        ';
        } 
       }else{
        echo '
        <script>
            alert("Username atau Password Salah");
            window.location.href="login.php";
        </script>
        ';
       }
    }
       

if(!isset($_SESSION['level'])){

} else {
    echo '
    <script>
        alert("Anda Sudah Login");
        window.location.href="home.php";
    </script>
    ';
} 



?>






<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> Sistem Pendataan Barang Biro PBJ </title>

    <!-- gambar title -->

    <link rel="icon" type="image/png" href="img/logo-removebg-preview.png">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
     .img-logo{
        max-height: 160px;
        margin-bottom: 20px;

        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-md-5">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            
                            <div class="col-md-12">
                                <div class="p-5">
                                    <div class="text-center">  
                                    <img src="img/logo-removebg-preview.png" alt="" class="img-logo">              
                                        <h2 class="h4 text-gray-900 mb-4"><b>Login SI Pendataan Barang</b></h2>
                                        
                                    </div>
                                    <hr class="sidebar-divider">
                                    <form method="post">
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address...">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password"
                                                id="exampleInputPassword" placeholder="Password">
                                        </div>
                                        <hr class="sidebar-divider">
                                        <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                                                
                                        <button name="login" class="btn btn-primary btn-user btn-block">
                                            <b>Login</b>
                                            </button>
                                    </form>
                                    
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>


</body>

</html>