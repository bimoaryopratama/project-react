<?php
    // koneksi ke database
    $con=mysqli_connect("localhost","root","","belajarphp");

    function query($query){
        global $con;
        $result = mysqli_query($con,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;

   
    }

    function tambah($data){
        global $con;
         // ambil data dari form tambah
         $nok = $data["nok"];
         $noseri = $data["no_seri"];
         $hp = $data["hp"];
         $types = $data["types"];
         $merek = $data["merek"];
        
 
         //upload gambar
         $foto = upload();
         if(!$foto){
             return false;
         }
 
         // query insert data
             $query="INSERT INTO penjualan
             VALUES('','$nok','$noseri','$hp','$types','$merek','$foto')
             ";
             mysqli_query($con,$query);

    return mysqli_affected_rows($con);
    }
   
    function upload(){
        $namaFile = $_FILES['foto'] ['name'];
        $ukuranFile = $_FILES['foto'] ['size'];
        $error = $_FILES['foto'] ['error'];
        $tmpName = $_FILES['foto'] ['tmp_name'];

        // cek apakah yang diupload adalah gambar
        $ekstensiGambarValid = ['jpg','jpeg','png'];
        $ekstensiGambar = explode ('.', $namaFile);
        $ekstensiGambar = strtolower(end($ekstensiGambar));

        if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo"
            <script>
            alert('yang anda upload bukan gambar!');
            </script>
            ";
            return false;
        }

        // cek ukuran gambar terlalu besar
        if($ukuranFile > 1000000){
            echo"
            <script>
            alert('file gambar terlalu besar');
            </script>
            ";
            return false; 
        }

        //generate nama baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .=$ekstensiGambar;

    // var dump ($namaFileBaru);die;

        // gambar siap di upload
        move_uploaded_file($tmpName, 'foto/'.$namaFileBaru);

        return $namaFileBaru;
    }

    
   

    function hapus($nok){
        global $con;
        mysqli_query($con,"DELETE FROM penjualan WHERE nok=$nok");
        return mysqli_affected_rows($con);
    }

    function edit($data){
        global $con;
         // ambil data dari form edit
         $nok = $data["nok"];
         $noseri = $data["no_seri"];
         $hp = $data["hp"];
         $types = $data["types"];
         $merek = $data["merek"];
         
         $fotoLama = $data["fotoLama"];
         // cek apakah user memilih gambar baru atau tidak
         if($_FILES ['foto'] ['error'] === 4){
             $foto = $fotoLama;  
         }else{
             $foto=upload();
         }
 
         // query update data
             $query="UPDATE penjualan SET
             nok= '$nok',
             no_seri= '$noseri',
             hp= '$hp',
             types= '$types',
             foto= '$foto' WHERE nok=$nok";
             mysqli_query($con,$query);

    return mysqli_affected_rows($con);
    }

    function cari($keyword){
        $query = "SELECT * FROM  WHERE
        nok LIKE '%$keyword%' OR
        hp LIKE '%$keyword%'";

        return query($query);
    }

    function registrasi($data){
        global $con;

        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($con, $data["password"]);
        $password2 = mysqli_real_escape_string($con, $data["password2"]);
    

    //cek username sudah ada atau belum
    $result = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Username sudah terdaftar')
                </script>";
                return false;
    }

    // cek konfirmasi password
    if($password !== $password2){
        echo "<script>
                alert('Konfirmasi password tidak sesuai!')
                </script>";
                return false;
    }

    // enkripsi pass
    $password = password_hash($password, PASSWORD_DEFAULT);
    // var_dump($password); die;

    // tambahkan user baru ke dalam database
    mysqli_query($con, "INSERT INTO users VALUES('', '$username', '$password')");

    return mysqli_effected_rows($con);

    }
?>