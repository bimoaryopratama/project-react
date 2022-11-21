<?php
session_start();
// jika belum login kembalikan user ke halaman login
// if(!isset($_SESSION["login"])){
//     header("location: index.php");
//     exit;
// }
    require 'functions.php';

    //ambil data di url
    $nok = $_GET["nok"];

    //bacadata mahasiswa berdasarkan id
    $pj = query("SELECT * FROM penjualan WHERE nok=$nok")[0];

    // cek apakah tombol submit di tekan
    if(isset($_POST["submit"])){

            // cek apakah data berhasil ditambah atau tidak
            // var_dump(mysqli_affected_rows($con));
            if(edit($_POST) > 0){
                echo"
                <script> 
                alert('Data Berhasil diedit');
                document.location.href='index.php';
                </script>
                ";
        
            } else{
                echo"
                <script>
                alert('Data Gagal diedit');
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
			background-color: aqua;
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
    <title>Edit Data pesanan</title>
</head>
<body>
    <h1>Edit Data pesanan</h1>

    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <input type="hidden" name="nok" value="<?= $pj["nok"]?>">
            <input type="hidden" name="fotoLama" value="<?= $pj["foto"]?>">
            <li>
                <label for="nok">nok :</label>
                <input type="text" name="nok" nok="nok" placeholder="Masukkan no karcis" value="<?= $pj["nok"]?>" required>
            </li>
            <li>
                <label for="noseri">no seri :</label>
                <input type="text" name="no_seri" nok="no_seri" placeholder="Masukkan No Seri" value="<?= $pj["no_seri"]?>" required>
            </li>
            <li>
                <label for="hp">hp :</label>
                <input type="text" name="hp" nok="hp" placeholder="Masukkan Nama Hp" value="<?= $pj["hp"]?>" required>
            </li>
            <li>
                <label for="types">types :</label>
                <input type="text" name="types" nok="types" placeholder="Masukkan Type Hp" value="<?= $pj["types"]?>" required>
            </li>
            <li>
                <label for="merek">merek :</label>
                <input type="text" name="merek" nok="merek" placeholder="Masukkan Merek Hp" value="<?= $pj["merek"]?>" required>
            </li>
            <li>
                <label for="foto">foto :</label><br>
                <img src="foto/<?= $pj["foto"];?>" alt="" width="60"><br>
                <input type="file" name="foto" nok="foto">
            </li>
            <li>
                <button type="submit" name="submit">Edit Pesanan</button>
            </li>
        </ul>
    </form>
</body>
</html>