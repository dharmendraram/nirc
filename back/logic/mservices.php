<?php
include 'connect.php'; // Database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $createdDate = date("Y-m-d H:i:s"); // Current timestamp

    // Handle image upload safely
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO services (image, title, description, created_date) VALUES (?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

        $stmt->bind_param("ssss", $imageData, $title, $description, $createdDate);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Service added successfully'); window.location.href='manageServices.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error uploading image');</script>";
    }
}

// Handle service deletion (AJAX request)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);

    // Check if service ID exists before deleting
    $checkStmt = $conn->prepare("SELECT sid FROM services WHERE sid = ?");
    $checkStmt->bind_param("i", $delete_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $checkStmt->close();

    if ($result->num_rows > 0) {
        $stmt = $conn->prepare("DELETE FROM services WHERE sid = ?");
        $stmt->bind_param("i", $delete_id);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "error: service not found";
    }

    exit(); // Stop further script execution
}

// Fetch total number of services
$sql = "SELECT COUNT(*) AS total FROM services";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalServices = $row['total'];
?>
