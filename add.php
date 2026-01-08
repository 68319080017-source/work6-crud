<?php
require('db.php');

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; // รับค่าแต่ไม่เอาไปโชว์หน้าเว็บ
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $position = $_POST['position'];

    $sql = "INSERT INTO members (username, password, fullname, email, position) 
            VALUES ('$username', '$password', '$fullname', '$email', '$position')";

    if ($conn->query($sql) === TRUE) {
        header("Location: member.php"); // เพิ่มเสร็จกลับไปหน้าตาราง
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-5">
    <h3>เพิ่มสมาชิกใหม่</h3>
    <form method="POST">
        <div class="mb-3"><label>Username</label><input type="text" name="username" class="form-control" required></div>
        <div class="mb-3"><label>Password</label><input type="password" name="password" class="form-control" required></div>
        <div class="mb-3"><label>Fullname</label><input type="text" name="fullname" class="form-control" required></div>
        <div class="mb-3"><label>Email</label><input type="email" name="email" class="form-control" required></div>
        <div class="mb-3">
            <label>Position</label>
            <select name="position" class="form-select">
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-success">บันทึก</button>
        <a href="member.php" class="btn btn-secondary">ยกเลิก</a>
    </form>
</div>