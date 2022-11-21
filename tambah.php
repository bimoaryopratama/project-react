<?php
session_start();
// jika belum login kembalikan user ke halaman login
// if(!isset($_SESSION["login"])){
//     header("location: index.php");
//     exit;
// }
    require 'functions.php';

    

    // cek apakah tombol submit di tekan
    if(isset($_POST["submit"])){

            // cek apakah data berhasil ditambah atau tidak
            // var_dump($_POST);
            // var_dump($_FILES);
            // die;

            // var_dump(mysqli_affected_rows($con));
            if(tambah($_POST) > 0){
                echo"
                <script> 
                alert('Data Berhasil ditambahkan');
                document.location.href='index.php';
                </script>
                ";
        
            } else{
                echo"
                <script>
                alert('Data Gagal ditambahkan');
                document.location.href='index.php';
                </script>
                ";
            }
    };
?>


<!DOCTYPE html>
<html lang="en">
<head>
<style type="text/css">
		body {
			background-color:aqua;
		}
		form ul {
			list-style: none;
		}
		form label {
			width: 100px;
			display: inline-block;
		}
		form li{
			margin-bottom: 5px;
		}
	</style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.css" rel="stylesheet"/>
    <title>Tambah Pesanan Hp</title>
</head>
<body>
    <h1>Tambah Pesanan Hp</h1>

    <form action=""method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="nok">no karcis :</label>
                <input type="text" name="nok" nok="nok" placeholder="Masukkan No Karcis" require>
            </li>
            <li>
                <label for="no_seri">no seri :</label>
                <input type="text" name="no_seri" nok="no_seri" placeholder="Masukkan No Seri" require>
            </li>
            <li>
                <label for="hp">Handphone :</label>
                <input type="text" name="hp" nok="hp" placeholder="Masukkan Nama Handphone" require>
            </li>
            <li>
                <label for="types">Type :</label>
                <input type="text" name="types" nok="types" placeholder="Masukkan Type Handphone" require>
            </li>
            <li>
                <label for="merek">Merek :</label>
                <input type="text" name="merek" nok="merek" placeholder="Masukkan Merek Hp" require>
            </li>
            <li>
                <label for="foto">Foto :</label>
                <input type="file" name="foto" nok="foto" placeholder="Masukkan Foto" require>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>
</body>
</html>