<?php 
include 'koneksi.php';
$id = $_GET['id'] ?? '';
$d = ['nim'=>'','nama_lengkap'=>'','jurusan'=>'','foto'=>''];
if($id) {
    $res = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id=$id");
    $d = mysqli_fetch_assoc($res);
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h3>Form Mahasiswa</h3>
        <form action="proses.php" method="POST" enctype="multipart/form-data" onsubmit="return validasi()">
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="text" name="nim" id="nim" placeholder="NIM" value="<?= $d['nim'] ?>" required>
            <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= $d['nama_lengkap'] ?>" required>
            <input type="text" name="jurusan" id="jurusan" placeholder="Jurusan" value="<?= $d['jurusan'] ?>" required>
            <input type="file" name="foto" id="foto">
            <button type="submit" name="simpan" class="btn-tambah">Simpan Data</button>
            <a href="index.php">Kembali</a>
        </form>
    </div>
    <script src="script.js"></script>
</body>
</html>