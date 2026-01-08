<?php
require('db.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM members WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: member.php");
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>