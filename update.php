<?php
include 'db.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM students WHERE id = ?");
$query->execute([$id]);
$student = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $course = $_POST['course'];

    $sql = "UPDATE students SET name = ?, email = ?, course = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$name, $email, $course, $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
</head>
<body>
    <h1>Edit Mahasiswa</h1>
    <form method="POST">
        <input type="text" name="name" value="<?= $student['name'] ?>" required>
        <input type="email" name="email" value="<?= $student['email'] ?>" required>
        <input type="text" name="course" value="<?= $student['course'] ?>">
        <button type="submit">Simpan</button>
    </form>
    <a href="index.php">Kembali</a>
</body>
</html>
