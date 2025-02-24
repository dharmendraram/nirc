
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIRC~Admin~Dashboard</title>
      <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="dashboard.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
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
                <a href="dashboard.php" class="nav-item active">
                    <img src="../assets/img/home.png" alt="" height="20">
                    <span style="padding-left: 5px;">Dashboard</span>
                </a>
                <a href="manageClient.php" class="nav-item">
                <img src="../assets/img/user.png" alt="" height="25">
                    <span>Manage Clients</span>
                    
                </a>
                <a href="managePortfolio.php" class="nav-item">
                <img src="../assets/img/briefcase.png" alt="" height="20">
                    <span style="padding-left: 5px;">Manage Portfolio</span>
                    
                </a>
                <a href="manageServices.php" class="nav-item">
                <img src="../assets/img/setting.png" alt="" height="25">
                    <span>Manage Services</span>
          
                </a>
                <a href="manageTeam.php" class="nav-item">
                <img src="../assets/img/user.png" alt="" height="20">
                    <span style="padding-left: 5px;">Manage Teams</span>
                    
                </a>
                <a href="manageTestimonials.php" class="nav-item">
                <img src="../assets/img/message.png" alt="" height="20">
                    <span style="padding-left: 5px;">Testimonials</span>
                
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
                
                <a href="https://nirc.com.np/" target="_blank" class="">
                <img src="../assets/img/home.png" alt="" height="25" title="Back to home page">
                </a>
                    
                </div>
            </div>

            <div class="nav-right">
                
                <div class="profile ">
                <span class=""><?php echo $username; ?></span>

                <!-- Logout button with onclick event -->
                <button class="ps-2" onclick="logout()" style="border:none;background-color:#fff">
                <img src="../assets/img/logout.png" alt="" height="22" title="Logout">
                </button>

                </div>
            </div>
        </header>
        <header class="bottom-nav">
        <p class="py-2 m-0 text-center text-light">&copy; 2016 - <span id="currentYear"></span> <strong class="px-1 sitename">National Incubation & Research Center.</strong> <span>All Rights Reserved</span></p>
        </header>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Initialize Lucide icons
        document.getElementById("currentYear").textContent = new Date().getFullYear();
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
            url: 'logic/logout.php',  
            type: 'POST',       
            success: function(response) {
                window.location.href = 'login.php';
            },
            error: function() {
                alert('Error during logout. Please try again.');
            }
        });
    }
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        let currentPage = window.location.pathname.split("/").pop();
        let navItems = document.querySelectorAll(".sidebar-nav .nav-item");
        navItems.forEach(item => {
            let pageLink = item.getAttribute("href");
            if (pageLink === currentPage) {
                navItems.forEach(nav => nav.classList.remove("active"));
                item.classList.add("active");
            }
        });
    });
    </script>    

</body>
</html>
