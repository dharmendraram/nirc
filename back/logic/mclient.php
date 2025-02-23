<?php
include 'connect.php'; // Database connection

        // Handle editing a client (AJAX request)
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_client_id'])) {
            $editClientId = $_POST['edit_client_id'];
            $cname = $_POST['cname'];
            $caddress = $_POST['caddress'];

            if (isset($_FILES['cimage']) && $_FILES['cimage']['error'] == 0) {
                $imageData = file_get_contents($_FILES['cimage']['tmp_name']); // Read file as binary
                $stmt = $conn->prepare("UPDATE clients SET cname = ?, caddress = ?, cimage = ? WHERE cid = ?");
                $stmt->bind_param("sssi", $cname, $caddress, $imageData, $editClientId);
            } else {
                $stmt = $conn->prepare("UPDATE clients SET cname = ?, caddress = ? WHERE cid = ?");
                $stmt->bind_param("ssi", $cname, $caddress, $editClientId);
            }

            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "error";
            }

            $stmt->close();
            exit();
        }

        // Handle adding a new client (Existing code)
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['cname'])) {
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

        // Handle client deletion (AJAX request)
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_id'])) {
            $delete_id = intval($_POST['delete_id']);

            $stmt = $conn->prepare("DELETE FROM clients WHERE cid = ?");
            $stmt->bind_param("i", $delete_id);

            if ($stmt->execute()) {
                echo "success";
            } else {
                echo "error";
            }

            $stmt->close();
            exit(); // Stop further script execution
        }

        // Fetch total number of clients
        $sql = "SELECT COUNT(*) AS total FROM clients";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $totalClients = $row['total'];
?>
