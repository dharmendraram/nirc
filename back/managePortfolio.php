
<?php include 'logic/mportfolio.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage~portfolio</title>
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
        <!-- Include Sidebar -->
        <?php include 'menuitem.php'; ?>
        <!-- Main Content -->
        <main class="main-content">
            <!-- Page Header -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                        <h1>Manage Portfolio</h1>
                    </div>

                    <div class="col-md-12 text-end mb-3">

                        <!-- Add Portfolio Button -->
                        <button class="btn btn-primary add-portfolio-btn" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">
                            <i data-lucide="plus"></i> Add Portfolio
                        </button>
                    </div>

                    <div class="col-md-12">
                    <table class="table table-success table-striped mt-2" id="myTable">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image 1</th>
                            <th>Image 2</th>
                            <th>Image 3</th>
                            <th>Image 4</th>
                            <th>Image 5</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT pid, image1, image2, image3, image4, image5, title, description, created_date FROM portfolio ORDER BY pid DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                // Convert BLOB image data to base64
                                $image1 = base64_encode($row['image1']);
                                $image1Src = "data:image/jpeg;base64," . $image1;

                                $image2 = $row['image2'] ? base64_encode($row['image2']) : null;
                                $image2Src = $image2 ? "data:image/jpeg;base64," . $image2 : '';

                                $image3 = $row['image3'] ? base64_encode($row['image3']) : null;
                                $image3Src = $image3 ? "data:image/jpeg;base64," . $image3 : '';

                                $image4 = $row['image4'] ? base64_encode($row['image4']) : null;
                                $image4Src = $image4 ? "data:image/jpeg;base64," . $image4 : '';

                                $image5 = $row['image5'] ? base64_encode($row['image5']) : null;
                                $image5Src = $image5 ? "data:image/jpeg;base64," . $image5 : '';

                                echo "<tr>
                                        <td>{$row['pid']}</td>
                                        <td><img src='$image1Src' class='portfolio-image'></td>
                                        <td>" . ($image2Src ? "<img src='$image2Src' class='portfolio-image'>" : "N/A") . "</td>
                                        <td>" . ($image3Src ? "<img src='$image3Src' class='portfolio-image'>" : "N/A") . "</td>
                                        <td>" . ($image4Src ? "<img src='$image4Src' class='portfolio-image'>" : "N/A") . "</td>
                                        <td>" . ($image5Src ? "<img src='$image5Src' class='portfolio-image'>" : "N/A") . "</td>
                                        <td>{$row['title']}</td>
                                        <td>{$row['description']}</td>
                                        <td>{$row['created_date']}</td>
                                        <td>
                                            <button class='btn btn-warning btn-sm'>Edit</button>
                                            <button class='btn btn-danger btn-sm'>Delete</button>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='10' class='text-center'>No portfolio items found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                    </div>
                    
                </div>
            </div>
        </div>
          
            <!-- Add Portfolio Modal -->
            <div class="modal fade" id="addPortfolioModal" tabindex="-1" aria-labelledby="addPortfolioModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addPortfolioModalLabel">Add New Portfolio</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" class="form-control" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Description</label>
                                    <textarea class="form-control" name="description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 1 (Required)</label>
                                    <input type="file" class="form-control" name="image1" accept="image/*" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 2 (Optional)</label>
                                    <input type="file" class="form-control" name="image2" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 3 (Optional)</label>
                                    <input type="file" class="form-control" name="image3" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 4 (Optional)</label>
                                    <input type="file" class="form-control" name="image4" accept="image/*">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image 5 (Optional)</label>
                                    <input type="file" class="form-control" name="image5" accept="image/*">
                                </div>
                                <button type="submit" class="btn btn-success">Save Portfolio</button>
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