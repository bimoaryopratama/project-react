<?php
session_start();
// jika belum login kembalikan user ke halaman login
if(!isset($_SESSION["login"])){
    header("location: index.php");
    exit;
}
    require 'functions.php';
    // ambil id yang ada di URL
   
            $nok=$_GET["nok"];
            if(hapus($nok) > 0){
                echo"
                <script> 
                alert('Pesanan Berhasil dihapus');
                document.location.href='index.php';
                </script>
                ";
        
            } else{
                echo"
                <script>
                alert('Pesanan Gagal dihapus');
                document.location.href='index.php';
                </script>
                ";
            }
 
?>