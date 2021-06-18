<?php
    session_start();
    //pemeriksaan akses ke halaman
    //mencegah user yang telah login melakukan registrasi lagi
    if(isset($_SESSION['login'])){
        header('Location: Home2.php');
        exit;
    }
    //akhir pemeriksaan 

    
    include("fungsi.php");
    if(isset($_POST["registrasi"])){
        
        //menampung inputan user
        $namaLengkap = htmlspecialchars($_POST["namaLengkap"]);
        $username = htmlspecialchars($_POST["username"]);
        $email = htmlspecialchars($_POST["email"]);
        $password1 = htmlspecialchars($_POST['password']);
        $password2 = htmlspecialchars($_POST['password2']);
        
        
        //deklarasi variabel untuk menampung error
        $error=[];
        
        //memeriksa apakah konfirmasi password telah sesuai
        if($password1!==$password2){
            $error[] = "password salah";
        }
        
        //memeriksa database yang memiliki username dan email yang sama dengan inputan
        $user1 = mysqli_query($koneksi, "SELECT * FROM data_user WHERE username='$username'");
        $email1 = mysqli_query($koneksi, "SELECT * FROM data_user WHERE email='$email'");
    
        //jika ditemukan username dalam database
        if(mysqli_fetch_assoc($user1)){
            $error[]= "username telah digunakan";
        }
        
        //jika ditemukan email dalam database
        if(mysqli_fetch_assoc($email1)){
            $error[] = "Email telah digunakan";
        }
        
        if(count($error)>0){
           for($i=0;$i<count($error);$i++){
               echo"<script>alert($error[$i])</script>";
           }
        }
        else{
            //enkripsi passoword
            $password1 = password_hash($password1, PASSWORD_DEFAULT);
            
            $_SESSION['username'] = $username;
            $_SESSION['login'] = true;
            //mengirim data ke database
            mysqli_query($koneksi, "INSERT INTO data_user VALUES('','$namaLengkap','$username','$email','$password1')");
            echo "<script>document.location.href='Home2.php'</script>";
            
        }
    }
?>

<!doctype html>
<html>
    <head>
        <title>Registrasi Sekarang</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        
        <style>
            input{
                border-left-color: transparent;
                border-right-color: transparent;
                border-top-color: transparent;
                width:100%;
                text-align: center;
                
            }
            button{
                padding:5px 10px;
                width:40%;
                margin-left: 30%;
                margin-top:30px;
                border-radius: 10px;
                border:3px solid grey;
                background-color: transparent;
            }
        </style>
    </head>
    <body>
        <!--Awal NavBar-->
        <nav class="navbar" style="background-color:#B2BABB; color:white">
        <div class="container-fluid">
            <span class="navbar-brand mx-4 my-2"><h3><b>Bukuku</b></h3></span>
        </div>
        </nav>
        <!--Akhir Navbar-->
        <br>
        <div class="container shadow-lg p-3 mb-5 bg-body" id="Container1" style="">
            <h1 style="text-align:center;">Join Us Now</h1>
            <hr>
            <form style="padding:15px 0px;width:30%;margin-left:35%" method="post" action="">
                <table style="width:100%">
                    <tr><td style="text-align:center"><label for="namaLengkap">Nama Lengkap : </label></td></tr>
                    <tr><td style="padding:10px;"><input type="text" name="namaLengkap" id="namaLengkap" required></td></tr>
                    <tr><td style="text-align:center"><label for="username">Username : </label></td></tr>
                    <tr><td style="padding:10px;"><input type="text" name="username" id="username" required></td></tr>
                    <tr><td style="text-align:center"><label for="email">Email : </label></td></tr>
                    <tr><td style="padding:10px;"><input type="text" name="email" id="email" required></td></tr>
                    <tr><td style="text-align:center"><label for="password1">Password : </label></td></tr>
                    <tr><td style="padding:10px;"><input type="password" name="password" id="password1" required></td></tr>
                    <tr><td style="text-align:center"><label for="password2">Konfirmasi Password : </label></td></tr>
                    <tr><td style="padding:10px;"><input type="password" name="password2" id="password2" required></td></tr>
                </table>
                <button type="submit" name="registrasi" id="registrasi">Registrasi</button>
            </form>
        </div>
    </body>
</html>