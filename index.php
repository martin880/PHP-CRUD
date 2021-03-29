<?php
include 'koneksi.php';
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
<div class="container  mt-2">
    <a href="./tambahData.php" class="btn btn-primary btn-md mb-3">Tambah Data</a>
    <table class="table table-striped table-hover table-bordered">
    <thead class="table-primary">
        <th>NIK</th>
        <th>Nama Karyawan</th>
        <th>Jabatan</th>
        <th>Alamat</th>
        <th>Telepon</th>
        <th>Action</th>
    </thead>

    <!-- mengambil data dari database -->
    <?php
        $sqlGet = "SELECT * FROM karyawan";
        $query  = mysqli_query($conn, $sqlGet);

        while($data = mysqli_fetch_array($query)){
            echo "
            <tbody>
                <tr>
                    <td>$data[nik]</td>
                    <td>$data[nama]</td>
                    <td>$data[jabatan]</td>
                    <td>$data[alamat]</td>
                    <td>$data[telepon]</td>
                    <td>
                        <div class='row'>
                            <div class='col d-flex justify-content-center'>
                                <a href='update.php?nik=$data[nik]' class='btn btn-md btn-warning'>Update</a>
                            </div>
                            <div class='col d-flex justify-content-center'>
                                <a href='hapus.php?nik=$data[nik]' class='btn btn-md btn-danger'>Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
            </tbody>
            ";
        }
    ?>
    </table>
</div>
</body>
</html>