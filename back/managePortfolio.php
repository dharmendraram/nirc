
<?php include 'logic/mportfolio.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Portfolio</title>
    <link rel="stylesheet" href="dashboard.css"> <!-- Include your CSS file -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
       
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
                <h1>Manage Portfolio</h1>
                <p>Here you can manage your portfolio items.</p>
            </div>

            <!-- Add Portfolio Button -->
            <button class="btn btn-primary add-portfolio-btn" data-bs-toggle="modal" data-bs-target="#addPortfolioModal">
                <i data-lucide="plus"></i> Add Portfolio
            </button>

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

            <!-- Portfolio Table -->
            <div class="mt-4">
                <table class="table table-striped table-bordered">
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
        </main>
    </div>

    <script>
        // Initialize Lucide icons
        lucide.createIcons();
    </script>
</body>
</html>