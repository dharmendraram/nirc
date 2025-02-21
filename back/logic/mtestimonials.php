<?php
include 'connect.php'; // Database connection

// Handle form submission (Adding testimonial)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quote'])) {
    $quote = htmlspecialchars($_POST['quote']);
    $name = htmlspecialchars($_POST['name']);
    $designation = htmlspecialchars($_POST['designation']);
    $address = htmlspecialchars($_POST['address']);
    $createdDate = date("Y-m-d H:i:s"); // Current timestamp

    // Handle image upload safely
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);

        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO testimonial (quote, name, image, designation, address, created_date) VALUES (?, ?, ?, ?, ?, ?)");
        if ($stmt === false) {
            die("Error preparing statement: " . $conn->error);
        }

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

// Handle testimonial deletion (AJAX request)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);

    // Check if testimonial ID exists before deleting
    $checkStmt = $conn->prepare("SELECT id FROM testimonial WHERE id = ?");
    $checkStmt->bind_param("i", $delete_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $checkStmt->close();

    if ($result->num_rows > 0) {
        $stmt = $conn->prepare("DELETE FROM testimonial WHERE id = ?");
        $stmt->bind_param("i", $delete_id);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "error: testimonial not found";
    }

    exit(); // Stop further script execution
}

// Fetch total number of testimonials
$sql = "SELECT COUNT(*) AS total FROM testimonial";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalTestimonial = $row['total'];

?>
