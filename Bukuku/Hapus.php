<?php
    session_start();
    include("fungsi.php");
    //menangkap id yang dikirimkan dari URL
    $id = $_GET["id"];

    //mengumpulkan objek data berdasarkan id dari database
    $objek = mysqli_query($koneksi,"SELECT * FROM data_review WHERE id=$id");
    
    //menampung hasil objek ke variabel $data berupa array
    $data = mysqli_fetch_assoc($objek);
    
    //mengakses nama dari username yang telah dilogin kan
    $username = $_SESSION['username'];

    //pemeriksaan    
    //mencegah user yang belum login melakukan hapus data user lain
    if(!isset($_SESSION['login'])){
        header ('Location: Home1.php');
    }
    //mencegah user melakukan hapus data user lain melalui link
    if($data["username"]!==$username){
        header('Location: Home2.php');
        exit;
    }
    mysqli_query($koneksi, "DELETE FROM data_review WHERE id= '$id'");
    echo "<script>
            document.location.href='Home2.php';
        </script>";
?>