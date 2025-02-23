<?php
include 'connect.php'; // Database connection

// Check if the form is being submitted for adding or updating a service
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if we are adding a new service (no sid)
    if (isset($_POST['title']) && !isset($_POST['sid'])) {
        // Adding a new service
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
    // Check if we are updating an existing service (sid is set)
    else if (isset($_POST['sid'])) {
        // Updating an existing service
        $sid = $_POST['sid'];
        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);

        // Handle image upload if provided
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $conn->prepare("UPDATE services SET title=?, description=?, image=? WHERE sid=?");
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("sssi", $title, $description, $imageData, $sid);
        } else {
            // If no image uploaded, just update title and description
            $stmt = $conn->prepare("UPDATE services SET title=?, description=? WHERE sid=?");
            if ($stmt === false) {
                die("Error preparing statement: " . $conn->error);
            }
            $stmt->bind_param("ssi", $title, $description, $sid);
        }

        // Execute the update query
        if ($stmt->execute()) {
            echo "<script>alert('Service updated successfully'); window.location.href='manageServices.php';</script>";
        } else {
            echo "<script>alert('Error updating service: " . $stmt->error . "');</script>";
        }

        $stmt->close();
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
        // Proceed to delete the service
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

// Fetch total number of services (optional)
$sql = "SELECT COUNT(*) AS total FROM services";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalServices = $row['total'];

?>
