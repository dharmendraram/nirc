
<?php include 'logic/mteam.php'; ?>

<?php

// Handle DELETE
if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $stmt = $conn->prepare("DELETE FROM team WHERE id = ?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        echo "<script>alert('Team member deleted successfully'); window.location.href='manageTeam.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }
}

// Handle UPDATE
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit_id'])) {
    $id = $_POST['edit_id'];
    $name = $_POST['name'];
    $designation = $_POST['designation'];

    if ($_FILES['image']['size'] > 0) {
        // New image uploaded
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $stmt = $conn->prepare("UPDATE team SET name=?, designation=?, image=? WHERE id=?");
        $stmt->bind_param("sssi", $name, $designation, $imageData, $id);
    } else {
        // Keep existing image
        $stmt = $conn->prepare("UPDATE team SET name=?, designation=? WHERE id=?");
        $stmt->bind_param("ssi", $name, $designation, $id);
    }

    if ($stmt->execute()) {
        echo "<script>alert('Team member updated successfully'); window.location.href='manageTeam.php';</script>";
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
                                        <button class='btn btn-warning btn-sm edit-btn' 
                                            data-id='{$row['id']}' 
                                            data-name='{$row['name']}'
                                            data-designation='{$row['designation']}'>
                                            Edit
                                        </button>
                                    <a href='manageTeam.php?delete_id={$row['id']}' class='btn btn-danger btn-sm' 
                                        onclick='return confirm(\"Are you sure you want to delete this member?\")'>
                                        Delete
                                    </a>
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


            <!-- Edit Modal -->
            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="editModalLabel">Edit Team Member</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="POST" enctype="multipart/form-data">
                                <input type="hidden" name="edit_id" id="edit_id">
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" id="edit_name" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Designation</label>
                                    <input type="text" name="designation" id="edit_designation" class="form-control" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Upload New Image (Optional)</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
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

    <script>
        $(document).ready(function () {
            $('.edit-btn').click(function () {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let designation = $(this).data('designation');

                $('#edit_id').val(id);
                $('#edit_name').val(name);
                $('#edit_designation').val(designation);

                var editModal = new bootstrap.Modal(document.getElementById('editModal'));
                editModal.show();
            });
        });
    </script>
</body>
</html>
