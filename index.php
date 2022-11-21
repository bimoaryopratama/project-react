<?php
session_start();
// jika belum login kembalikan user ke halaman login
// if(!isset($_SESSION["login"])){
//     header("location: login.php");
//     exit;
// }
// koneksi ke database
require 'functions.php';
// ambil data dari table penjualan
$penjualan=query("SELECT * FROM penjualan");

// jika tombol pencarian di tekan
if(isset($_POST["cari"])){
    $penjualan = cari($_POST["keyword"]);
}

// ambil data dari variable result

// mysqli_fetch_row()
// mysqli_fetch_assoc()

// $mhs=mysqli_fetch_row($result);
// var_dump($mhs);

// $mhs=mysqli_fetch_assoc($result);
// var_dump($mhs);

// while ($mhs=mysqli_fetch_row($result)){
//      var_dump($mhs);
//}

// while ($mhs=mysqli_fetch_assoc($result)){
//      var_dump($mhs);
//}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/style.css" rel="stylesheet"/>
    <title>project 1</title>
    <script src="https://unpkg.com/react@16/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@16/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/babel-standalone@6.15.0/babel.min.js"></script>
</head>
<body>
<div id="app"></div>

<script type="text/babel">
  class Hello extends React.Component {
    render() {
      return 
    }
  }

  ReactDOM.render(<Hello/>, document.getElementById("app"));
</script>
    <a href="logout.php">Logout</a>
    <h1>Daftar Pesanan Hp Android/Iphone</h1>

    <a href="tambah.php">Tambah Pesanan Hp</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" placeholder="keyword..." size="40" autofocus autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>
    

    <a href="./directory/yourfile.pdf" download="newfilename">Download the pdf</a>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No Karcis</th>
            <th>No seri</th>
            <th>Hp</th>
            <th>Type</th>
            <th>Merek</th>
            <th>Foto</th>
            <th>Action</th>
        </tr>

        <?php $i = 1; ?>
        <?php foreach($penjualan as $pj) :?>
        <tr>
            <td><?= $pj["nok"]?></td>
            <td><?= $pj["no_seri"]?></td>
            <td><?= $pj["hp"]?></td>
            <td><?= $pj["types"]?></td>
            <td><?= $pj["merek"]?></td>
            <td><img src="foto/<?= $pj["foto"]?>" widht="50px" alt=""></td>
            <td>
                <a href="edit.php?nok=<?=$pj["nok"]?>">Edit</a> ||
                <a href="hapus.php?nok=<?=$pj["nok"]?>">Delete</a>
            </td>
        </tr>
        <?php $i++;?>
        <?php endforeach;?>
    </table>
    
</body>
</html>