<?php
include 'connect.php'; // Database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['addTestimonial'])) {
        // Handle Add Testimonial
        $quote = $_POST['quote'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $address = $_POST['address'];

        if (!empty($_FILES['image']['tmp_name'])) {
            $image = file_get_contents($_FILES['image']['tmp_name']);
        }

        $stmt = $conn->prepare("INSERT INTO testimonial (quote, name, image, designation, address, created_date) VALUES (?, ?, ?, ?, ?, NOW())");
        $stmt->bind_param("sssss", $quote, $name, $image, $designation, $address);
        
        if ($stmt->execute()) {
            echo "<script>alert('Testimonial added successfully!'); window.location.href='manageTestimonials.php';</script>";
        } else {
            echo "<script>alert('Error adding testimonial');</script>";
        }
        $stmt->close();
    } 
    
    elseif (isset($_POST['updateTestimonial'])) {
        // Handle Update Testimonial
        $id = $_POST['edit_id'];
        $quote = $_POST['quote'];
        $name = $_POST['name'];
        $designation = $_POST['designation'];
        $address = $_POST['address'];

        if (!empty($_FILES['image']['tmp_name'])) {
            $image = file_get_contents($_FILES['image']['tmp_name']);
            $stmt = $conn->prepare("UPDATE testimonial SET quote=?, name=?, image=?, designation=?, address=? WHERE id=?");
            $stmt->bind_param("sssssi", $quote, $name, $image, $designation, $address, $id);
        } else {
            $stmt = $conn->prepare("UPDATE testimonial SET quote=?, name=?, designation=?, address=? WHERE id=?");
            $stmt->bind_param("ssssi", $quote, $name, $designation, $address, $id);
        }

        if ($stmt->execute()) {
            echo "<script>alert('Testimonial updated successfully!'); window.location.href='manageTestimonials.php';</script>";
        } else {
            echo "<script>alert('Error updating testimonial');</script>";
        }
        $stmt->close();
    }

}




// Fetch total number of testimonials
$sql = "SELECT COUNT(*) AS total FROM testimonial";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalTestimonial = $row['total'];
?>