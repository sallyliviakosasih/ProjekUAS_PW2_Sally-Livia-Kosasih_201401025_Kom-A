<?php
    session_start();
    
    //mencegah user yang belum login untuk mengakses halaman ini
    if(!isset($_SESSION['login'])){
        header ("Location: Login.php");
        exit;
    }

    include("fungsi.php");
    //mengakses nama dari username yang telah dilogin kan
    $username = $_SESSION['username'];
    $userdb = mysqli_query($koneksi,"SELECT * FROM data_user WHERE username='$username'");
    $user = mysqli_fetch_assoc($userdb);

    //memeriksa apakah tombol ADD telah ditekan
    if(isset($_POST["add"])){
        $judul = htmlspecialchars($_POST["judulBuku"]);
        $penulis = htmlspecialchars($_POST["namaPengarang"]);
        $penerbit = htmlspecialchars($_POST["namaPenerbit"]);
        $ISBN = htmlspecialchars($_POST["ISBN"]);
        $halaman = htmlspecialchars($_POST["jumlahHalaman"]);
        $tahun = htmlspecialchars($_POST["tahunTerbit"]);
        $user = $username;
        $Komentar = htmlspecialchars($_POST["Komentar"]);
        
        //Untuk Upload Gambar
        //Mencari apakah gambar diupload
        $error = $_FILES['Gambar']['error'];
        $Gambar = $_FILES['Gambar']['name'];
        $LokasiGambar = $_FILES['Gambar']['tmp_name'];
        
        //Jika $error = 4 menandakan gambar tidak diupload
        if($error===4){
            echo "
                    <script>
                        alert('Gambar tidak ada');
                        document.location.href='Tambah.php';
                    </script>
                ";
        }else{
            move_uploaded_file($LokasiGambar,'image/'.$Gambar);
            $insert = "INSERT INTO data_review VALUES ('','$judul','$penulis','$ISBN','$penerbit','$halaman','$tahun','$user','$Komentar','$Gambar')";
            
            mysqli_query($koneksi, $insert);
            echo "<script>
                    alert('Data Berhasil Terupload');
                    document.location.href='Home2.php';
                    </script>";
        }
        
        
    }
?>
<!doctype html>
<html>
    <head>
        <title>Add Review</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
        
        <style>
            table,tr,td{
                padding:10px
            }
            .pemisah{
                border-left: 1px solid gray;
                height: 10;
                width: 0px;
                float: right;
            }
            #kembali{
                float:right;
                padding:5px 20px;
                border-radius:10px;
                border:2px solid gray;
                background-color: transparent;
            }
        </style>
    </head>
    <body>
        <!--Awal NavBar-->
        <nav class="navbar" style="background-color:#B2BABB; color:white;">
        <div class="container-fluid">
            <span class="navbar-brand mx-4 my-2"><h3><b>Bukuku</b></h3></span>
            <span class="" style="">
                <div class="container" style="padding-top:15px;">
                    <div class="row">
                        <div class="col">
                            <p style="background-color:transparent;border:3px solid white;padding:10px 10px;margin-right:10px;border-radius:30px;color: white;width:200px;text-align:center"><img src="temp/account.jpg" style="width:15px;margin-right:10px">
                                <?php echo $user["namaLengkap"]?>
                            </p>
                        </div>
                        <div class="col">
                            <button type="button" onclick="location.href = 'Logout.php'" style="background-color:transparent;border:3px solid white;padding:10px 25px;margin-right:10px;border-radius:30px;color: white">Logout</button>
                        </div>
                    </div>
                </div>
            </span>
        </div>
        </nav>
        <!--Akhir Navbar-->
        
        <div class="container shadow-lg p-3 mb-5 bg-body" id="" style="margin-top:80px">
            <h2 style="display: inline;margin-left:15px">Add Your Review</h2>
            <button onclick="location.href='Home2.php'" id="kembali">Kembali</button>
            <hr>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col" style="">
                        <h3>Data Buku</h3>
                        <br>
                        <table style="">
                            <tr>
                                <td><label for="judulBuku">Judul Buku : </label></td>
                                <td><label for="namaPengarang">Penulis : </label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="judulBuku" id="judulBuku" placeholder="Judul Buku" required></td>
                                <td><input type="text" name="namaPengarang" id="namaPengarang" placeholder="Penulis" required></td>
                            </tr>
                            <tr>
                                <td><label for="namaPenerbit">Nama Penerbit : </label></td>
                                <td><label for="ISBN">ISBN : </label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="namaPenerbit" id="namaPenerbit" placeholder="Nama Penerbit" required></td>
                                <td><input type="text" name="ISBN" id="ISBN" placeholder="No. ISBN" required></td>
                            </tr>
                            <tr>
                                <td><label for="jumlahHalaman">Jumlah Halaman :</label></td>
                                <td><label for="tahunTerbit">Tahun terbit :</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" name="jumlahHalaman" id="jumlahHalaman" placeholder="Jumlah Halaman" required></td>
                                <td><input type="text" name="tahunTerbit" id="tahunTerbit" placeholder="Tahun Terbit" required></td>
                            </tr>
                        </table>
                        <br>
                        <h5>Upload Cover Buku</h5>
                        <input type="file" name="Gambar" id="Gambar">
                    </div>
                    <div class="pemisah"></div>
                    <div class="col">
                        <h5><label for="Komentar">Share Your Review</label></h5>
                        <br>
                        <p><textarea style="width:100%;height:100%" name="Komentar" id="Komentar" placeholder="Review" required></textarea></p>
                    </div>
                    
                </div>
                <br>
                <div class="row">
                        <div class="col" style="margin: 0 44%">
                            <button style="padding:5px 15px;border:2px solid grey;background-color:transparent;border-radius:10px;margin-bottom:10px;margin-top:10px" type="submit" name="add" id="add" >Add Review</button>
                    </div>
                    </div>
                </div>    
            </form>
        </div>
        <!--Akhir Form Post-->
    </body>
</html>