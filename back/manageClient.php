
<?php include 'logic/mclient.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Clients</title>
    <link rel="stylesheet" href="dashboard.css"> <!-- Include your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .add-client-btn {
            float: right;
            margin-bottom: 10px;
        }
        .client-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 50%;
        }
        .main-content {
            margin-left: 250px; /* Adjust based on sidebar width */
            padding: 20px;
        }
        .page-header {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <!-- Include Sidebar -->
        <?php include 'menuitem.php'; ?>
      

        <!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="page-header">
                <h1>Manage Clients</h1>
                <p>Here you can manage your clients.</p>
            </div>

            <!-- Add Client Button -->
            <button class="btn btn-primary add-client-btn" data-bs-toggle="modal" data-bs-target="#addClientModal">
                <i data-lucide="plus"></i> Add Client
            </button>

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

            <!-- Clients Table -->
            <div class="mt-4">
                <table class="table table-striped table-bordered">
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
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>