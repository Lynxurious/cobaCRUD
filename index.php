<?php
include 'db.php'; // Menghubungkan ke database

// Ambil data dari tabel students
$query = $conn->query("SELECT * FROM students");
$students = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>

</head>
<body>
    <h1>Data Mahasiswa</h1>
    <a href="create.php">Tambah Data</a>
    <table cellpadding="10">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= $student['id'] ?></td>
                    <td><?= $student['name'] ?></td>
                    <td><?= $student['email'] ?></td>
                    <td><?= $student['course'] ?></td>
                    <td>
                        <a href="update.php?id=<?= $student['id'] ?>">Edit</a> |
                        <a href="delete.php?id=<?= $student['id'] ?>">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>