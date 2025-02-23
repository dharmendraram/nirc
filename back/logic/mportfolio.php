<?php
include 'connect.php'; // Database connection

// Handle form submission for adding new portfolio
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && !isset($_POST['edit_id'])) {
    // Same code for adding new portfolio as you had before
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $createdDate = date("Y-m-d H:i:s");

    function getImageData($image) {
        return isset($_FILES[$image]) && $_FILES[$image]['error'] == 0 ? file_get_contents($_FILES[$image]['tmp_name']) : null;
    }

    $image1 = getImageData('image1');
    $image2 = getImageData('image2');
    $image3 = getImageData('image3');
    $image4 = getImageData('image4');
    $image5 = getImageData('image5');

    // Prepare the statement
    $stmt = $conn->prepare("INSERT INTO portfolio (image1, image2, image3, image4, image5, title, description, created_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("ssssssss", $image1, $image2, $image3, $image4, $image5, $title, $description, $createdDate);

    // Execute the query and check for errors
    if ($stmt->execute()) {
        echo "<script>alert('Portfolio added successfully'); window.location.href='managePortfolio.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}

// Handle portfolio editing (AJAX request)
else if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $edit_id = intval($_POST['edit_id']);
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);

    // Handle image uploads safely
    function getImageData($image) {
        return isset($_FILES[$image]) && $_FILES[$image]['error'] == 0 ? file_get_contents($_FILES[$image]['tmp_name']) : null;
    }

    $image1 = getImageData('image1');
    $image2 = getImageData('image2');
    $image3 = getImageData('image3');
    $image4 = getImageData('image4');
    $image5 = getImageData('image5');

    // If no image is uploaded, set it as NULL to avoid sending empty blobs
    $image1 = $image1 ?: null;
    $image2 = $image2 ?: null;
    $image3 = $image3 ?: null;
    $image4 = $image4 ?: null;
    $image5 = $image5 ?: null;

    // Debugging: Output the SQL query
    echo "UPDATE portfolio SET title = '$title', description = '$description', image1 = ?, image2 = ?, image3 = ?, image4 = ?, image5 = ? WHERE pid = $edit_id";

    // Prepare the update statement
    $updateSql = "UPDATE portfolio SET title = ?, description = ?, image1 = ?, image2 = ?, image3 = ?, image4 = ?, image5 = ? WHERE pid = ?";
    $stmt = $conn->prepare($updateSql);

    // Check for statement preparation error
    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    // Bind the parameters
    if (!$stmt->bind_param("ssssssssi", $title, $description, $image1, $image2, $image3, $image4, $image5, $edit_id)) {
        die("Error binding parameters: " . $stmt->error);
    }

    // Execute the query and check for errors
    if (!$stmt->execute()) {
        die("Error executing statement: " . $stmt->error);
    }

    echo "<script>alert('Portfolio updated successfully'); window.location.href='managePortfolio.php';</script>";
    $stmt->close();
}


// Handle portfolio deletion (AJAX request)
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);

    // Check if portfolio ID exists before deleting
    $checkStmt = $conn->prepare("SELECT pid FROM portfolio WHERE pid = ?");
    $checkStmt->bind_param("i", $delete_id);
    $checkStmt->execute();
    $result = $checkStmt->get_result();
    $checkStmt->close();

    if ($result->num_rows > 0) {
        $stmt = $conn->prepare("DELETE FROM portfolio WHERE pid = ?");
        $stmt->bind_param("i", $delete_id);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "error: portfolio not found";
    }

    exit(); // Stop further script execution
}

// Fetch total number of portfolio entries
$sql = "SELECT COUNT(*) AS total FROM portfolio";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalPortfolio = $row['total'];

?>
