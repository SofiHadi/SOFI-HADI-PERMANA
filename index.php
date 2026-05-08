<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Data Mahasiswa Teknik</h2>
        <a href="form.php" class="btn-tambah">+ Tambah Mahasiswa</a>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Profil</th>
                    <th>NIM</th>
                    <th>Nama Lengkap</th>
                    <th>Jurusan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = mysqli_query($conn, "SELECT * FROM mahasiswa ORDER BY id DESC");
                $no = 1;
                while($row = mysqli_fetch_assoc($sql)): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><img src="uploads/<?= $row['foto'] ?>" width="50" height="50" style="border-radius:50%"></td>
                    <td><?= $row['nim'] ?></td>
                    <td><strong><?= $row['nama_lengkap'] ?></strong></td>
                    <td><?= $row['jurusan'] ?></td>
                    <td class="aksi">
                        <a href="form.php?id=<?= $row['id'] ?>" class="edit">Edit</a> | 
                        <a href="proses.php?hapus=<?= $row['id'] ?>" class="hapus" onclick="return confirm('Yakin hapus mahasiswa ini?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>