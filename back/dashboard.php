

<?php include 'logic/mclient.php' ; ?>
<?php include 'logic/mportfolio.php' ; ?>
<?php include 'logic/mservices.php' ; ?>
<?php include 'logic/mteam.php' ; ?>
<?php include 'logic/mtestimonials.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIRC~Admin~Dashboard</title>
      <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <link href="../../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="dashboard.css">
    <script src="https://unpkg.com/lucide@latest"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container-fluid bg-light">
        <!-- Include Sidebar -->
        <?php include 'menuitem.php'; ?>
        <!-- Main Content -->
        <main class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Dashboard</h1>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card" id="totalClient">
                            <h3><?php echo $totalClients; ?></h3>
                            <p>Total Clients</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card" id = "totalPortfolio">
                            <h3><?php echo $totalPortfolio; ?></h3>
                            <p>Total Portfolio</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card" id = "totalServices">
                            <h3><?php echo $totalServices; ?> </h3>
                            <p>Total Services</p>
                        </div>
                    </div>

                    <div class="col-md-3 mb-3">
                        <div class="card" id = "totalTeam">
                            <h3><?php echo $totalTeam; ?></h3>
                            <p>Total Team</p>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card" id = "totalTestmonial">
                            <h3><?php echo $totalTestmonial; ?></h3>
                            <p>Total Testimonial</p>
                        </div>    
                    </div>



                </div>
            </div>
            
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();

        // Mobile sidebar toggle
        const menuToggle = document.getElementById('menuToggle');
        const closeSidebar = document.getElementById('closeSidebar');
        const sidebar = document.getElementById('sidebar');

        menuToggle.addEventListener('click', () => {
            sidebar.classList.add('active');
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('active');
        });

        // Navigation item active state
        const navItems = document.querySelectorAll('.nav-item');
        navItems.forEach(item => {
            item.addEventListener('click', () => {
                navItems.forEach(i => i.classList.remove('active'));
                item.classList.add('active');
            });
        });
    </script>
</body>
</html>