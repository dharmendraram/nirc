
<?php
include 'connect.php'; // Database connection

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        $error = "Username and Password are required!";
    } else {
        // Check user in database
        $stmt = $conn->prepare("SELECT uid, username, password FROM user WHERE username = ?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($uid, $dbUsername, $dbPassword);
            $stmt->fetch();

            // Verify password
            if ($password === $dbPassword) { // Plain text password check (Change this if hashed)
                $_SESSION['user_id'] = $uid;
                $_SESSION['username'] = $dbUsername;

                // Redirect to dashboard
                echo "<script> window.location.href='dashboard.php';</script>";
                exit();
            } else {
                $error = "Invalid Password!";
            }
        } else {
            $error = "User not found!";
        }

        $stmt->close();
    }
}


// Fetch total number of clients
$sql = "SELECT username FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $username = $row['username']; // Correct assignment

} else {
    $username = "No user found"; // Default value if no data
}




?>