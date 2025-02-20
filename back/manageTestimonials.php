
<?php include 'logic/mtestimonials.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Testimonials</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <style>
        .add-testimonial-btn {
            float: right;
            margin-bottom: 10px;
        }
        .testimonial-image {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 5px;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .page-header {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php include 'menuitem.php'; ?>

        <main class="main-content">
            <div class="page-header">
                <h1>Manage Testimonials</h1>
                <p>Here you can manage testimonials.</p>
            </div>

            <button class="btn btn-primary add-testimonial-btn" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
                <i data-lucide="plus"></i> Add Testimonial
            </button>

            <!-- Add Testimonial Modal -->
            <div class="modal fade" id="addTestimonialModal" tabindex="-1" aria-labelledby="addTestimonialModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addTestimonialModalLabel">Add New Testimonial</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Quote</label>
                                    <textarea class="form-control" name="quote" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" class="form-control" name="designation" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" class="form-control" name="address" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image (Required)</label>
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-success">Save Testimonial</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Testimonials Table -->
            <div class="mt-4">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Quote</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Address</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT id, quote, name, image, designation, address, created_date FROM testimonial ORDER BY id DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $image = base64_encode($row['image']);
                                $imageSrc = "data:image/jpeg;base64," . $image;

                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td><img src='$imageSrc' class='testimonial-image'></td>
                                        <td>{$row['quote']}</td>
                                        <td>{$row['name']}</td>
                                        <td>{$row['designation']}</td>
                                        <td>{$row['address']}</td>
                                        <td>{$row['created_date']}</td>
                                        <td>
                                            <button class='btn btn-warning btn-sm'>Edit</button>
                                            <button class='btn btn-danger btn-sm'>Delete</button>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='8' class='text-center'>No testimonials found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

    <script>
        lucide.createIcons();
    </script>
</body>
</html>
