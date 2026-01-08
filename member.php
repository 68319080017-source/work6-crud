<?php require('db.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Member Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand" href="#">Navbar</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link active" href="member.php">Member</a></li>
      </ul>
      <span class="navbar-text text-white">
        ปทุมรัตน์ พิมพ์สด <a href="#" class="text-white ms-2">Logout</a>
      </span>
    </div>
  </div>
</nav>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>สมาชิก</h3>
        <a href="add.php" class="btn btn-success">เพิ่มสมาชิก</a>
    </div>

    <table class="table table-hover">
        <thead class="table-light">
            <tr>
                <th>Mem Id</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Position</th>
                <th>จัดการ</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // ดึงข้อมูลจากฐานข้อมูล (ไม่เอา password มาแสดงตามโจทย์)
            $sql = "SELECT * FROM members";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['position'] . "</td>";
                    echo "<td>
                            <a href='edit.php?id=".$row['id']."' class='btn btn-primary btn-sm'>แก้ไข</a>
                            <a href='delete.php?id=".$row['id']."' class='btn btn-danger btn-sm' onclick='return confirm(\"ยืนยันการลบ?\")'>ลบ</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>ไม่มีข้อมูล</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>