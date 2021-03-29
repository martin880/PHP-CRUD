<?php
include 'koneksi.php';

$nik=$_GET['nik'];
$sqlget= "select * from karyawan where nik ='$nik'";
$queryget= mysqli_query($conn, $sqlget);
$data = mysqli_fetch_array( $queryget);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>APP-CRUD</title>
</head>
<body>
    <div class="w-50 mx-auto border p-3 mt-5">
        <a href="./index.php">Back to home</a>
        <form action="update.php" method="POST">
            <label for="nik">NIK</label>
            <input type="text" id="nik" name="nik" value= "<?php echo "$data[nik]";?>" class="form-control" readonly>

            <label for="nama">Nama Karyawan</label>
            <input type="text" id="nama" name="nama" value= "<?php echo "$data[nama]";?>" class="form-control" required>

            <label for="jabatan">Jabatan</label>
            <select name="jabatan" id="jabatan" class="form-select" required>
                <option ><?php echo "$data[jabatan]";?></option>
                <option value="Programmer">Programmer</option>
                <option value="UI/UX Desainer">UI/UX Desainer</option>
                <option value="Mobile Developer">Mobile Developer</option>
                <option value="IT Support">IT Support</option>
                <option value="Web Developer">Web Developer</option>
            </select>

            <label for="alamat">Alamat</label>
            <input type="text" id="alamat" value= "<?php echo "$data[alamat]";?>" name="alamat" class="form-control" required>

            <label for="telepon">Telepon</label>
            <input type="text" id="telepon" value= "<?php echo "$data[telepon]";?>" name="telepon" class="form-control" required>

            <input class="btn btn-success mt-2" type="submit" name="update" value="ubah data">
        </form>
    </div>

    <?php
        if(isset($_POST['update'])) {
            $nik = $_POST['nik'];
            $nama = $_POST['nama'];
            $jabatan = $_POST['jabatan'];
            $alamat = $_POST['alamat'];
            $telepon = $_POST['telepon'];

            $sqlUpdate = "UPDATE karyawan SET nama='$nama', jabatan='$jabatan', alamat='$alamat', telepon='$telepon' WHERE nik='$nik'";
            $queryUpdate= mysqli_query($conn, $sqlUpdate);

            header("location:index.php");
        }
    ?>
</body>
</html>