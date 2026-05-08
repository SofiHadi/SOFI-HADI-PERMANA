<?php
include 'koneksi.php';

if(isset($_POST['simpan'])) {
    $id = $_POST['id'];
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $jurusan = $_POST['jurusan'];
    $foto = $_FILES['foto']['name'];

    if($foto != "") {
        $tmp = $_FILES['foto']['tmp_name'];
        $ext = pathinfo($foto, PATHINFO_EXTENSION);
        $nama_baru = time().".".$ext;
        move_uploaded_file($tmp, "uploads/".$nama_baru);

        if($id) {
            mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama_lengkap='$nama', jurusan='$jurusan', foto='$nama_baru' WHERE id=$id");
        } else {
            mysqli_query($conn, "INSERT INTO mahasiswa VALUES(NULL, '$nim', '$nama', '$jurusan', '$nama_baru')");
        }
    } else {
        mysqli_query($conn, "UPDATE mahasiswa SET nim='$nim', nama_lengkap='$nama', jurusan='$jurusan' WHERE id=$id");
    }
    header("Location: index.php");
}

if(isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id=$id");
    header("Location: index.php");
}
?>