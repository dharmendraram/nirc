<?php include 'logic/mlogin.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Nirc~login</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="../assets/img/favicon.ico" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <!-- fontawesome cdn  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

   <!-- Other head elements -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <!-- Main CSS File -->
  <link href="../assets/css/auth.css" rel="stylesheet">

</head>
<body>
    <!-- Particle Background -->
    <div id="particles-js"></div>
    <div class="main">
        <div class="form-container">
            <h1 class="navbar-brand brand-logo text-light" >
                <img src="../assets/img/logo.png" alt="" class="img-fluid">
            </h1>
            <form method="POST" class="form">
            <?php if (isset($error)) { echo "<p style='color: red;'>$error</p>"; } ?>
                <div class="input-group ">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="">
                </div>
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="">
                    <span class="toggle-eye" onclick="togglePassword('password', this)">
                        <i class="fa-regular fa-eye"></i>
                    </span> 
                </div>
                <div class="d-flex align-items-center justify-content-between py-2"> 
                <button class="sign" type="submit">Login</button>
            </form>
        </div>
    </div>
  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <!-- Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="../assets/js/auth.js"></script>
</script>

<script>
// Get current year
document.getElementById("currentYear").textContent = new Date().getFullYear();
function togglePassword(inputId, eyeIcon){
    const passwordField = document.getElementById(inputId);
    const icon = eyeIcon.querySelector("i");

    if (passwordField.type ==="password"){
        passwordField.type = "text";
        icon.classList.replace("fa-eye","fa-eye-slash");
    }else{
        passwordField.type = "password";
        icon.classList.replace("fa-eye-slash", "fa-eye");
    }

}
</script>

</body>

</html>
