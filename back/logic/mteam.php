<?php
include 'connect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST" && !isset($_POST['edit_id'])) {
    $name = $_POST['name'];
    $designation = $_POST['designation'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $stmt = $conn->prepare("INSERT INTO team (name, image, designation) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $imageData, $designation);
        
        if ($stmt->execute()) {
            echo "<script>alert('Team member added successfully'); window.location.href='manageTeam.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error uploading image');</script>";
    }
}

// Fetch total number of testimonials
$sql = "SELECT COUNT(*) AS total FROM team";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalTeam = $row['total'];
?>
