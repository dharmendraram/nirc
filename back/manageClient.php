
<?php include 'logic/mclient.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage~Clients</title>
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
    <style>
        .add-client-btn {
            float: right;
        }
        .client-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
     
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Include Sidebar -->
        <?php include 'menuitem.php'; ?>
        <!-- Main Content -->
        <main class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Manage Clients</h1>
                
                        </div>
                    </div>

                    <div class="col-md-12">
                        <!-- Add Client Button -->
                        <button class="btn btn-primary add-client-btn" data-bs-toggle="modal" data-bs-target="#addClientModal">
                            <i data-lucide="plus"></i> Add Client
                        </button>
                    </div>

                    <div class="col-md-12">
                        <table class="table table-success table-striped mt-2" id="myTable">
                        <thead class="table-dark">
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT cid, cname, cimage, caddress, createdDate FROM clients ORDER BY cid DESC";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    // Convert BLOB image data to base64
                                    $image = base64_encode($row['cimage']);
                                    $imageSrc = "data:image/jpeg;base64," . $image;

                                    echo "<tr>
                                            <td>{$row['cid']}</td>
                                            <td><img src='$imageSrc' class='client-image'></td>
                                            <td>{$row['cname']}</td>
                                            <td>{$row['caddress']}</td>
                                            <td>{$row['createdDate']}</td>
                                            <td>
                                                <button class='btn btn-warning btn-sm'>Edit</button>
                                                <button class='btn btn-danger btn-sm'>Delete</button>
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center'>No clients found</td></tr>";
                            }
                            ?>
                        </tbody>
                        </table>
                    </div>

                </div>
            </div>
            <!-- Page Header -->

        </main>
    </div>

    
            <!-- Add Client Modal -->
            <div class="modal fade" id="addClientModal" tabindex="-1" aria-labelledby="addClientModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addClientModalLabel">Add New Client</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="cname" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="cimage" accept="image/*" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="caddress" required>
                                </div>
                                <button type="submit" class="btn btn-success">Save Client</button>
                            </form>
                        </div>
                    </div>
                </div>
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