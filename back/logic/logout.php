<?php
session_start();

// Destroy all session data
session_unset();
session_destroy();

// Optionally, you can also delete the session cookie if you want
if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time() - 3600, '/');
}

// Return a success response
echo "success";
?>
