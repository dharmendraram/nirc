<?php
include 'connect.php'; // Database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $createdDate = date("Y-m-d H:i:s"); // Set current timestamp

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO services (image, title, description, created_date) VALUES (?, ?, ?, ?)");
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


// Fetch total number of clients
$sql = "SELECT COUNT(*) AS total FROM services";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalServices = $row['total'];

?>
