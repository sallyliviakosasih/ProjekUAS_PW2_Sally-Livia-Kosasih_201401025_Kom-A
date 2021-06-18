<?php
    session_start();
    
    //pemeriksaan akses ke halaman ini
    //mencegah user yang telah login melakukan login lagi
    if(isset($_SESSION['login'])){
        header ("Location: Home2.php");
        exit;
    }
    //akhir pemeriksaan

    include("fungsi.php");
    //memeriksa apakah tombol LOGIN ditekan
    if(isset($_POST["login"])){
        //menampung inputan user
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        //memeriksa apakah ada username ada di database;
        $userdb = mysqli_query($koneksi,"SELECT * FROM data_user WHERE username='$username'");
        
        //jika ditemukan data username di database
        if(mysqli_num_rows($userdb)===1){
            //menampung data dari database berdasarkan username inputan
            $data = mysqli_fetch_assoc($userdb);
            
            //proses verfikasi Password dengan password username inputan didatabase yang telah dienkripsi 
            $verifikasi = password_verify($password, $data["password"]);
            
            //jika password sesuai
            if($verifikasi){
                $_SESSION['login']=true;
                $_SESSION['username']=$username;
                echo"<script>
                        alert('Login Success');
                        document.location.href='Home2.php';
                    </script>";
                exit;
            }
            else{
                echo "<script>alert('Password Anda Salah');                 
                document.location.href='Login.php';
                        </script>";
                exit;
            }
            
        }
        else{
             echo "<script>
                    alert('Username tidak ditemukan');                 
                    document.location.href='Login.php';
                    </script>";
            exit;
        }  
    }
?>
<!doctype html>
<html>
    <head>
        <title>Login--Welcome</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        
        <style>
            input{
                border-left-color: transparent;
                border-right-color: transparent;
                border-top-color: transparent;
                width:100%;   
            }
            input:active{
                border:none;
            }
            button{
                padding:5px 10px;
                width:20%;
                margin-left: 40%;
                margin-top:30px;
                border-radius: 10px;
                border:3px solid grey;
                background-color: transparent;
            }
            table, tr, td{
                padding-left: 20px;
                padding:10px;
                
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
        <form method="post" action="" class="shadow" style="background-color:white; width:40%;margin-left:30%;margin-top:5%;">
            <br>
            <h3 style="text-align:center">Selamat Datang</h3>
            <br>
            <table style="width:90%;margin-left:5%;">
                <tr><td><label for="username">Username : </label></td></tr>
                <tr><td><input type="text" name="username" id="username" required></td></tr>
                <tr><td><label for="password">Password : </label></td></tr>
                <tr><td><input type="password" name="password" id="password" required></td></tr>
            </table>
            <button type="submit" name="login" id="login">LogIn</button>
            <br>
            <br>
        </form>
    </body>
</html>