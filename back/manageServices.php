
<?php include 'logic/mservices.php' ; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage~service</title>
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
                    <h1>Manage Services</h1>
              
                    </div>
                    </div>

                    <div class="col-md-12 text-end">
                    <button class="btn btn-primary add-service-btn mb-2" data-bs-toggle="modal" data-bs-target="#addServiceModal" >
                        <i data-lucide="plus"></i> Add Service
                    </button>
                    </div>

                    <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="myTable" >
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Created Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT sid, image, title, description, created_date FROM services ORDER BY sid DESC";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $image = base64_encode($row['image']);
                                $imageSrc = "data:image/jpeg;base64," . $image;

                                echo "<tr>
                                        <td>{$row['sid']}</td>
                                        <td><img src='$imageSrc' class='service-image'></td>
                                        <td>{$row['title']}</td>
                                        <td>{$row['description']}</td>
                                        <td>{$row['created_date']}</td>
                                        <td>
                                            <button class='btn btn-warning btn-sm'>Edit</button>
                                            <button class='btn btn-danger btn-sm delete-services' data-id='{$row['sid']}'>Delete</button>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No services found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                    </div>
                </div>
            </div>

            <!-- Add Service Modal -->
            <div class="modal fade" id="addServiceModal" tabindex="-1" aria-labelledby="addServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="addServiceModalLabel">Add New Service</h5>
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
                                    <label class="form-label">Image (Required)</label>
                                    <input type="file" class="form-control" name="image" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-success">Save Service</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

           <!-- Edit Service Modal -->
            <div class="modal fade" id="editServiceModal" tabindex="-1" aria-labelledby="editServiceModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editServiceModalLabel">Edit Service</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="editServiceForm" method="POST" enctype="multipart/form-data">
                                <input type="hidden" id="edit_sid" name="sid">
                                <div class="mb-3">
                                    <label for="edit_title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="edit_title" name="title" required>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_description" class="form-label">Description</label>
                                    <textarea class="form-control" id="edit_description" name="description" rows="3" required></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="edit_image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="edit_image" name="image">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
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
            $(".delete-services").click(function () {
                var servicesId = $(this).data("id");
                var row = $(this).closest("tr");

                console.log("Attempting to delete Service ID:", servicesId); // Debugging

                if (confirm("Are you sure you want to delete this service?")) {
                    $.ajax({
                        url: "manageServices.php",
                        type: "POST",
                        data: { delete_id: servicesId }, // Corrected variable name
                        success: function (response) {
                            console.log("Response:", response); // Debugging

                            if (response.trim() === "success") {
                                row.fadeOut(500, function () { $(this).remove(); });
                            } else {
                                alert("Failed to delete the service: " + response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error("AJAX Error:", status, error);
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Edit button click event
            $('.btn-warning').click(function () {
                let row = $(this).closest('tr'); // Get the closest row (tr)
                let sid = row.find('td:first').text().trim(); // Fetch the service ID from the first cell
                let title = row.find('td:nth-child(3)').text().trim(); // Fetch the title from the third cell
                let description = row.find('td:nth-child(4)').text().trim(); // Fetch the description from the fourth cell

                // Set the values in the modal input fields
                $('#edit_sid').val(sid); 
                $('#edit_title').val(title); 
                $('#edit_description').val(description);

                // Show the modal
                var editModal = new bootstrap.Modal(document.getElementById('editServiceModal'));
                editModal.show();
            });
        });
    </script>




</body>
</html>