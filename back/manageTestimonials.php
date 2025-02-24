
<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'logic/mtestimonials.php'; 

// Handle DELETE
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM testimonial WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Testimonials deleted successfully'); window.location.href='manageTestimonials.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage~testimonials</title>
      <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

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
                <h1>Manage Testimonials</h1>
            </div>
                    </div>
                    <div class="col-md-12 text-end mb-3">
                    <button class="btn btn-primary add-testimonial-btn" data-bs-toggle="modal" data-bs-target="#addTestimonialModal">
                <i data-lucide="plus"></i> Add Testimonial
            </button>
                    </div>
                    <div class="col-md-12">
                            <table class="table table-striped table-bordered" id="myTable">
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
                                            <a href='manageTestimonials.php?delete_id={$row['id']}' class='btn btn-danger btn-sm' 
                                            onclick='return confirm(\"Are you sure you want to delete this testimonials?\")'>
                                             Delete
                                            </a>
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
                </div>
            </div>
            

           

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
                            <button type="submit" class="btn btn-success" name="addTestimonial">Save Testimonial</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>


            <!-- Edit Testimonial Modal -->
            <div class="modal fade" id="editTestimonialModal" tabindex="-1" aria-labelledby="editTestimonialModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editTestimonialModalLabel">Edit Testimonial</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="edit_id" id="edit_id">
                                <div class="mb-3">
                                    <label class="form-label">Quote</label>
                                    <textarea name="quote" id="edit_quote" class="form-control" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" id="edit_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" id="edit_designation" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Address</label>
                                    <input type="text" name="address" id="edit_address" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload New Image (Optional)</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary" name="updateTestimonial">Update</button>
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
    </script>

    <script>
        $(document).ready(function () {
        $('.btn-warning').click(function () {
            let row = $(this).closest('tr');
            let id = row.find('td:first').text().trim();
            let quote = row.find('td:nth-child(3)').text().trim();
            let name = row.find('td:nth-child(4)').text().trim();
            let designation = row.find('td:nth-child(5)').text().trim();
            let address = row.find('td:nth-child(6)').text().trim();

            $('#edit_id').val(id);
            $('#edit_quote').val(quote);
            $('#edit_name').val(name);
            $('#edit_designation').val(designation);
            $('#edit_address').val(address);

            var editModal = new bootstrap.Modal(document.getElementById('editTestimonialModal'));
            editModal.show();
        });
    });
    </script>


</body>
</html>
