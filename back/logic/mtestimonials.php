<?php
include 'connect.php'; // Database connection
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $quote = $_POST['quote'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];
    $address = $_POST['address'];
    $createdDate = date("Y-m-d H:i:s"); // Set current timestamp

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO testimonial (quote, name, image, designation, address, created_date) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $quote, $name, $imageData, $designation, $address, $createdDate);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Testimonial added successfully'); window.location.href='manageTestimonials.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error uploading image');</script>";
    }
}




// Fetch total number of clients
$sql = "SELECT COUNT(*) AS total FROM testimonial";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalTestmonial = $row['total'];
?>