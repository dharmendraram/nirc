<?php
include 'connect.php'; // Database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $createdDate = date("Y-m-d H:i:s"); // Set current timestamp

    // Handle image uploads
    $image1 = file_get_contents($_FILES['image1']['tmp_name']);
    $image2 = isset($_FILES['image2']) && $_FILES['image2']['error'] == 0 ? file_get_contents($_FILES['image2']['tmp_name']) : null;
    $image3 = isset($_FILES['image3']) && $_FILES['image3']['error'] == 0 ? file_get_contents($_FILES['image3']['tmp_name']) : null;
    $image4 = isset($_FILES['image4']) && $_FILES['image4']['error'] == 0 ? file_get_contents($_FILES['image4']['tmp_name']) : null;
    $image5 = isset($_FILES['image5']) && $_FILES['image5']['error'] == 0 ? file_get_contents($_FILES['image5']['tmp_name']) : null;

    // Prepare the statement
    $stmt = $conn->prepare("INSERT INTO portfolio (image1, image2, image3, image4, image5, title, description, created_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $image1, $image2, $image3, $image4, $image5, $title, $description, $createdDate);

    // Execute the query and check for errors
    if ($stmt->execute()) {
        echo "<script>alert('Portfolio added successfully'); window.location.href='managePortfolio.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}


// Fetch total number of clients
$sql = "SELECT COUNT(*) AS total FROM portfolio";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPortfolio = $row['total'];


?>

