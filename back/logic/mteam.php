<?php
include 'connect.php'; // Database connection


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form submitted!<br>"; // Debug: Confirm form submission

    $name = $_POST['name'];
    $designation = $_POST['designation'];

    // Handle image upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        echo "File uploaded successfully!<br>"; // Debug: Confirm file upload
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        
        // Prepare the statement
        $stmt = $conn->prepare("INSERT INTO team (name, image, designation) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error); // Debug: Check if prepare failed
        }
        $stmt->bind_param("sss", $name, $imageData, $designation);

        // Execute the query
        if ($stmt->execute()) {
            echo "<script>alert('Team member added successfully'); window.location.href='manageTeam.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>"; // Debug: Show SQL error
        }

        $stmt->close();
    } else {
        echo "<script>alert('Error uploading image: " . $_FILES['image']['error'] . "');</script>"; // Debug: Show file upload error
    }
}



// Fetch total number of clients
$sql = "SELECT COUNT(*) AS total FROM team";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalTeam = $row['total'];

?>