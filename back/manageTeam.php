
<?php include 'logic/mteam.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage~team</title>
      <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <link rel ="stylesheet" type = "text/css" href ="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src = "https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="dashboard.css"> <!-- Include your CSS file -->
</head>
<body>
    <div class="container-fluid">
        <?php include 'menuitem.php'; ?>
        
        <main class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                        <h1>Manage Team</h1>
                         </div>

                    </div>

                    <div class="col-md-12 text-end">
                    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addTeamModal">
                <i data-lucide="plus"></i> Add Team Member
            </button>
                    </div>
                    <div class="col-md-12">
 <!-- Team Table -->
            <table class="table table-striped table-bordered" id="myTable">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Designation</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT id, name, image, designation FROM team ORDER BY id DESC";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $image = base64_encode($row['image']);
                            $imageSrc = "data:image/jpeg;base64," . $image;

                            echo "<tr>
                                    <td>{$row['id']}</td>
                                    <td><img src='$imageSrc' class='team-image'></td>
                                    <td>{$row['name']}</td>
                                    <td>{$row['designation']}</td>
                                    <td>
                                        <button class='btn btn-warning btn-sm'>Edit</button>
                                        <button class='btn btn-danger btn-sm'>Delete</button>
                                    </td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5' class='text-center'>No team members found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
                    </div>
                  
                </div>
            </div>

          

            <!-- Add Team Modal -->
            <div class="modal fade" id="addTeamModal" tabindex="-1" aria-labelledby="addTeamModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTeamModalLabel">Add New Team Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-success">Save Member</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

           
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        // Initialize Lucide icons
        lucide.createIcons();
        let table = new DataTable('#myTable');
    </script>
</body>
</html>
