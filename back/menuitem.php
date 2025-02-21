
<?php
include 'logic/mlogin.php';
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIRC~Admin~Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container-fluid">

        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <img src="../assets/img/logo.png" alt="">
                </div>
                <button class="close-sidebar" id="closeSidebar">
                    <i data-lucide="x"></i>
                </button>
            </div>
            <nav class="sidebar-nav">
                <a href="dashboard.php" class="nav-item">
                    <i data-lucide="layout"></i>
                    <span>Dashboard</span>
                    <i data-lucide="chevron-right"></i>
                </a>
                <a href="manageClient.php" class="nav-item">
                    <i data-lucide="users"></i>
                    <span>Manage Clients</span>
                    <i data-lucide="chevron-right"></i>
                </a>
                <a href="managePortfolio.php" class="nav-item">
                    <i data-lucide="briefcase"></i>
                    <span>Manage Portfolio</span>
                    <i data-lucide="chevron-right"></i>
                </a>
                <a href="manageServices.php" class="nav-item">
                    <i data-lucide="settings"></i>
                    <span>Manage Services</span>
                    <i data-lucide="chevron-right"></i>
                </a>
                <a href="manageTeam.php" class="nav-item">
                    <i data-lucide="users"></i>
                    <span>Manage Teams</span>
                    <i data-lucide="chevron-right"></i>
                </a>
                <a href="manageTestimonials.php" class="nav-item">
                    <i data-lucide="message-square"></i>
                    <span>Testimonials</span>
                    <i data-lucide="chevron-right"></i>
                </a>
                <!-- Add more navigation items as needed -->
            </nav>
        </aside>

         <!-- Top Navigation -->
         <header class="top-nav">
            <div class="nav-left">
                <button class="menu-toggle" id="menuToggle">
                    <i data-lucide="menu"></i>
                </button>
                <div class="search-box">
                
                <a href="http://localhost/nirc/" target="_blank" class="btn btn-sm btn-success">Home</a>
                    
                </div>
            </div>

            <div class="nav-right">
                
                <div class="profile">
                <span><?php echo $username; ?></span>

      <!-- Logout button with onclick event -->
      <button class="btn btn-sm btn-danger" onclick="logout()">Logout</button>




                </div>
            </div>
        </header>

    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Mobile sidebar toggle
        const menuToggle = document.getElementById('menuToggle');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');

        if (menuToggle) {
            menuToggle.addEventListener('click', () => {
                sidebar.classList.add('active');
            });
        }

        if (closeSidebar) {
            closeSidebar.addEventListener('click', () => {
                sidebar.classList.remove('active');
            });
        }

        // Navigation item active state
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', () => {
                navItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });
    </script>


<script>
    function logout() {
        // Send an AJAX request to the server to logout
        $.ajax({
            url: 'logic/logout.php',   // URL for logout logic
            type: 'POST',        // POST method
            success: function(response) {
                // If logout is successful, redirect to login page
                window.location.href = 'login.php';
            },
            error: function() {
                // If an error occurs, alert the user
                alert('Error during logout. Please try again.');
            }
        });
    }
</script>

</body>
</html>