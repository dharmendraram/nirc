<?php
include 'connect.php'; // Database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cname = $_POST['cname'];
    $caddress = $_POST['caddress'];
    $createdDate = date("Y-m-d"); // Set current date

    if (isset($_FILES['cimage']) && $_FILES['cimage']['error'] == 0) {
        $imageData = file_get_contents($_FILES['cimage']['tmp_name']); // Read file as binary

        // Prepare the statement correctly
        $stmt = $conn->prepare("INSERT INTO clients (cname, cimage, caddress, createdDate) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $cname, $imageData, $caddress, $createdDate);
        
        // Execute the query and check for errors
        if ($stmt->execute()) {
            echo "<script>alert('Client added successfully'); window.location.href='manageClient.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error uploading image');</script>";
    }
}


// Fetch total number of clients
$sql = "SELECT COUNT(*) AS total FROM clients";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalClients = $row['total'];
?>

