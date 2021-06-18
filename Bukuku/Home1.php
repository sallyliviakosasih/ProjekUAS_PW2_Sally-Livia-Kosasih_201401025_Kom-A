<?php
    session_start();
    include("fungsi.php");

    //pemeriksaan akses ke halaman ini
    if(isset($_SESSION['login'])){
        header ("Location: Home2.php");
        exit;
    }
    
    //mengambil data review buku dari database data_review;
    $hasil = mysqli_query($koneksi, "SELECT * FROM data_review");
    
    //menampung data yang telah diambil ke variabel $rows
    $rows=[];
    while($row = mysqli_fetch_assoc($hasil)){
        $rows[]=$row;
    }
?>
<!doctype html>
<html>
    <head>
        <title>Bukuku</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    </head>
    <body>
        <!--Awal NavBar-->
        <nav class="navbar" style="background-color:#B2BABB; color:white;">
        <div class="container-fluid">
            <span class="navbar-brand mx-4 my-2"><h3><b>Bukuku</b></h3></span>
            <span class="" style="">
                <button type="button" onclick="location.href = 'Registrasi.php'" style="background-color:transparent;border:3px solid white;padding:10px 20px;margin-right:25px;border-radius:30px;color:white">Registrasi</button>
                
                <button type="button" onclick="location.href = 'Login.php'" style="background-color:transparent;border:3px solid white;padding:10px 25px;margin-right:10px;border-radius:30px;color: white">LogIn</button>
            </span>
        </div>
        </nav>
        <!--Akhir Navbar-->
        <br>
        <!--Awal Carousel-->
        <div class="container" style="margin-top:10px;">
            <div class="row justify-content-center">
                <div class="col-4">
                    <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
                      <div class="carousel-inner">
                        <div class="carousel-item active">
                          <img src="temp/gambar1.jpg" class="d-block" style="height:430px;width:100%">
                            <div class="carousel-caption d-none d-md-block" style="background-color:rgba(0, 0, 0, 0.5);bottom:140px;">
                                <h3>Get To Know Your Books</h3>
                            </div>
                        </div>
                        <div class="carousel-item">
                          <img src="temp/gambar2.jpg" class="d-block" style="height:430px;width:100%">
                            <div class="carousel-caption d-none d-md-block" style="background-color:rgba(0, 0, 0, 0.5);bottom:140px;">
                                <h3>Gain More By read More</h3>
                            </div>
                        </div>
                        <div class="carousel-item">
                          <img src="temp/gambar3.jpg" class="d-block" style="height:430px;width:100%">
                            <div class="carousel-caption d-none d-md-block" style="background-color:rgba(0, 0, 0, 0.5);bottom:140px;">
                                <h3>Enjoy review's from expert</h3>
                            </div>
                        </div>
                      </div>
                      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev" style="background-color:black;height:20%;top:40%">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                      </button>
                      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next" style="background-color:black;height:20%;top:40%">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                      </button>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row">
                        <div class="col">
                        <img src="temp/gambar6.jpg" style="height:215px;width:100%;">
                        </div>
                        <div class="col">
                        <img src="temp/gambar5.png" style="height:215px;width:100%;">
                        </div>
                    </div>
                    <div class="row">
                         <img src="temp/gambar4.jpg" style="height:215px">
                    </div>
                </div>    
            </div>        
        </div>
        <br>
        <br>
        <h2 style="text-align:center;">See Some of Our Reviews</h2>
        <br>
        
        <!--Menampilkan data-data didatabase-->
        <?php foreach($rows as $data) : ?>
        <div class="container" style="max-width:1000px;border:3px solid green;border-radius:10px;">
            <div class="row">
                <div class="col" style="max-width:250px">
                    <img src="image/<?php echo $data["Gambar"];?>" style="height:300px;width:100%;padding:15px 0px;">
                </div>
                <div class="col" style="padding:10px 20px;max-width:750px;border-left:1px solid black">
                    <div class="row">
                        <h3><?php echo $data["judulBuku"];?></h3>
                    </div>
                    <div class="row">
                        <div class="container" style="">
                            <div class="row">
                                <div class="col" style="max-width:100px;font-size:12px"><?php echo $data["namaPengarang"];?></div>
                                <div class="col" style="max-width:130px;font-size:12px">ISBN : <?php echo $data["ISBN"];?> </div>
                                <div class="col" style="max-width:175px;font-size:12px"><?php echo $data["namaPenerbit"];?></div>
                                <div class="col" style="max-width:150px;font-size:12px">Jumlah Halaman : <?php echo $data["jumlahHalaman"];?> </div>
                                <div class="col" style="red;max-width:150px;font-size:12px">Tahun Terbit : <?php echo $data["tahunTerbit"];?> </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <p>Review by <?php echo $data["user"]?> :</p>
                    </div>
                    <div class="row">
                        <p style="  word-wrap: break-word;"><?php echo $data["Komentar"];?></p>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <?php endforeach; ?>
    </body>
</html>