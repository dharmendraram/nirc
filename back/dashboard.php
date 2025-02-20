

<?php include 'logic/mclient.php' ; ?>
<?php include 'logic/mportfolio.php' ; ?>
<?php include 'logic/mservices.php' ; ?>
<?php include 'logic/mteam.php' ; ?>
<?php include 'logic/mtestimonials.php' ; ?>

<div class="container-fluid">
        <!-- Include Sidebar -->
        <?php include 'menuitem.php'; ?>

        <!-- Main Content -->
        <main class="main-content">
                 <div class="page-header">
                    <h1>Dashboard</h1>
                </div>

            <div class="dashboard-cards">
                    <div class="card" id="totalClient">
                        <h3><?php echo $totalClients; ?></h3>
                        <p>Total Clients</p>
                    </div>

                    <div class="card" id = "totalPortfolio">
                        <h3><?php echo $totalPortfolio; ?></h3>
                        <p>Total Portfolio</p>
                    </div>
                    <div class="card" id = "totalServices">
                        <h3><?php echo $totalServices; ?> </h3>
                        <p>Total Services</p>
                    </div>
              
                   <div class="card" id = "totalTeam">
                        <h3><?php echo $totalTeam; ?></h3>
                        <p>Total Team</p>
                    </div>

                    <div class="card" id = "totalTestmonial">
                        <h3><?php echo $totalTestmonial; ?></h3>
                        <p>Total Testimonial</p>
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