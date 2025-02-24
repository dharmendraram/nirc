<?php include 'back/logic/mclient.php'; ?>
<?php include 'back/logic/mservices.php'; ?>
<?php include 'back/logic/mportfolio.php'; ?>
<?php include 'back/logic/mtestimonials.php'; ?>
<?php include 'back/logic/mteam.php'; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Nirc~home</title>
  <meta name="description" content="">
  <meta name="keywords" content="">
  <!-- Theme Color for Mobile Browsers -->
  <meta name="theme-color" content="#1BA4A7"> <!-- For Chrome, Firefox, Edge -->
  <meta name="msapplication-navbutton-color" content="#1BA4A7"> <!-- For Windows Phone -->
  <meta name="apple-mobile-web-app-status-bar-style" content="#1BA4A7"> <!-- For Safari on iOS -->

  <!-- Favicons -->
  <link href="assets/img/favicon.ico" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
   <!-- Other head elements -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">


</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid position-relative d-flex align-items-center">

      <a href="index.php" class="d-flex align-items-center me-auto">
          <img src="./assets/img/logo.png" alt="logo" width="auto" height="40">
      </a>

      <nav id="navmenu" class="navmenu ">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="index.php#about">About</a></li>
          <li><a href="index.php#services">Services</a></li>
          <li><a href="index.php#portfolio">Portfolio</a></li>
          <!-- <li><a href="#team">Team</a></li> -->
          <!-- <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li> -->
          <li><a href="index.php#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="console-login d-flex ms-auto">
          <a href="http://localhost/nirc/back/login.php" target="_blank" class="btn btn-sm  btn-login">Console login</a> 
      </div>

    </div>
  </header>
    <section class="terms_condition">
        <div class="bg-linerar">
            <h3>Privacy Policy </h3>
            <p>Effective Date: February 21, 2016
            </p>
        </div>
        <div class="container-fluid my-4">
            <div class="rounded shadow p-5" data-aos="fade-up" data-aos-duration="3000" style="background-color: rgba(235, 235, 235, 0.856);">
                <div class="row content-text">
                    <div class="col-md-12">
                        <h5 style="font-size: 16px;">At NIRC, we prioritize your privacy. This Privacy Policy outlines how we collect, use, and protect your personal information when you use our software and cloud management services. By engaging with us, you agree to these terms.
                        </h5>
        
                        <p class="fw-bold mb-0 fs-5">Information We Collect</p>
                        <ul>
                            <li><b>Personal Information:</b> Name, email, phone number, and company / organization details.
                            </li>
                            <li><b>Usage Data:</b> IP address, browser type, and service interaction logs, gathered automatically for operational purposes.
                            </li>     
                            <li><b>Backup Data:</b> Data you store in our software or cloud services, solely for backup purposes</li>                  
                            <li><b>Website usage: </b>Browse data (IP address, cookies.. etc) for improving services.</li>
                        </ul>
        
                        <p class="fw-bold mb-0 fs-5"> How We Use Your Information</p>
                        <ul>
                            <li>Deliver and enhance our software and cloud management services.
                            </li>
                            <li> Process accounts and support requests.</li>
                            <li> Communicate updates or respond to inquiries via <a href="mailto:admin@nirc.com.np">admin@nirc.com.np.</a></li>
                            <li> Maintain secure backups of your data as part of our service.</li>

                        </ul>
                        <p class="fw-bold mb-0 fs-5">Data Sharing and Disclosure
                        </p>
                        <ul>
                            <li>We do not share your information or client data with anyone. Your data remains confidential.</li>
                            <li>We only take backups to ensure service continuity.
                            </li>
                            <li>Disclose information if required by law or to protect NIRC’s rights, with prior notice where possible.</li>
                        </ul>
        
                        <p class="fw-bold mb-0 fs-5">Your Rights</p>
                        <ul>
                            <li>Request access, updates, or deletion of your data by emailing or calling our support.
                                </li>                      
                        </ul>

                        <p class="fw-bold mb-0 fs-5">Data Security</p>
                        <ul>
                            <li>We use robust safeguards (e.g., encryption, secure backups) to protect your information. While we strive for maximum security, no system is immune to all risks.
                                </li>                      
                        </ul>
                        <p class="fw-bold mb-0 fs-5">Updates to This Policy</p>
                        <span style="font-size: 14px;">We may revise this policy as needed, posting updates here with a new effective date.</span>

                    
                        <p class="fw-bold mb-0 fs-5 pt-3">Contact Us</p>
        
                        <h6 class="my-0 " style="font-size: 14px;">If you have any queries regarding the Privacy Policy or if you have any complaints, please contact us by email at: <a href="mailto:hr@nirc.com.np">hr@nirc.com.np</a> .</h6>
        
                        <p class="text-center mt-2 fw-bold">Thank you for trusting us!</p>
        
                    </div>
        
                
                </div>
         </div>
        </div>
        
    
    </section>

  <footer id="footer" class="footer light-background">

   
    <div class="container-fluid footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <img src="./assets//img/logo.png" alt="logo" height="40" width="auto">
          </a>
          <div class="footer-contact pt-3">
            <p class="mb-3">"NIRC (National Incubation & Research Center) empowers innovation, research, and entrepreneurship, fostering groundbreaking solutions for a better future."</p>
            <p><strong class="text-dark me-2"><i class="bi bi-geo-alt-fill"></i></strong> <span class="text-dark">Gaushala, Kathmandu, Nepal</span></p>
            <p><strong class="text-danger me-2"><a href="tel:9849044721" style="font-size: 14px;" target="_blank"><i class="bi bi-telephone-forward"></i></strong> <span>+977 984-9044721</span></a></p>
            <p><strong class="text-danger me-2"><a href="maito:admin@nirc.com.np" target="_blank" style="font-size: 14px; "><i class="bi bi-envelope"></i></strong> <span>admin@nirc.com.np</span></a></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php#about">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php#services">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="privacy_policy.php">Privacy & Policy</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php#services">Web Design</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php#services">Web Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php#services">Mobile Development</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php#services">Product Management</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="index.php#services">Marketing</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 pb-3">
          <h4>Follow Us</h4>
          <p>"Stay connected with the National Incubation & Research Center! Follow us for the latest updates, innovations, and opportunities in research and entrepreneurship."</p>
          <div class="social-links d-flex">
            <a href="https://wa.me/+9779849044721?text=Hello!%20I%20am%20interested%20in%20your%20services." target="_blank">
              <i class="bi bi-whatsapp"></i> 
            </a>
            <!-- <a href=""><i class="bi bi-facebook"></i></a> -->
            <!-- <a href=""><i class="bi bi-instagram"></i></a> -->
            <a href="https://www.linkedin.com/company/nirc/" target="_blank"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center">
      <p>© 2016 - <span id="currentYear"></span> <strong class="px-1 sitename">National Incubation & Research Center.</strong> <span>All Rights Reserved</span></p>

    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <a href="https://wa.me/+9779849044721?text=Hello!%20I%20am%20interested%20in%20your%20services." target="_blank"  class="whatsapp-btn d-flex align-items-center justify-content-center"><i class="bi bi-whatsapp"></i></a>
  <a href="https://www.linkedin.com/company/nirc/" target="_blank"  class="linkedin-btn d-flex align-items-center justify-content-center"><i class="bi bi-linkedin"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="assets/vendor/php-email-form/validate.js"></script> -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <script>
document.getElementById('contactForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Prevent default form submission

    var formData = new FormData(this); // Create a FormData object from the form

    // Show loading message
    document.querySelector('.loading').style.display = 'block';
    document.querySelector('.error-message').style.display = 'none';
    document.querySelector('.sent-message').style.display = 'none';

    fetch('./forms/email.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text()) // Get text response first
    .then(text => {
        try {
            let data = JSON.parse(text); // Try parsing as JSON
            document.querySelector('.loading').style.display = 'none';

            if (data.status === 'success') {
                document.querySelector('.sent-message').style.display = 'block';
                document.querySelector('.sent-message').innerText = data.message;
                document.getElementById('contactForm').reset(); // Reset the form
                setTimeout(function() {
                    document.querySelector('.sent-message').style.display = 'none';
                }, 5000); // Hide after 5 seconds
            } else {
                document.querySelector('.error-message').style.display = 'block';
                document.querySelector('.error-message').innerText = data.message;
                setTimeout(function() {
                    document.querySelector('.error-message').style.display = 'none';
                }, 5000); // Hide after 5 seconds
            }
        } catch (error) {
            console.error('Invalid JSON response:', text); // Log for debugging
            document.querySelector('.loading').style.display = 'none';
            document.querySelector('.error-message').style.display = 'block';
            document.querySelector('.error-message').innerText = 'An unexpected error occurred.';
            setTimeout(function() {
                document.querySelector('.error-message').style.display = 'none';
            }, 5000); // Hide after 5 seconds
        }
    })
    .catch(error => {
        console.error('Fetch error:', error);
        document.querySelector('.loading').style.display = 'none';
        document.querySelector('.error-message').style.display = 'block';
        document.querySelector('.error-message').innerText = 'An error occurred. Please try again later.';
        setTimeout(function() {
            document.querySelector('.error-message').style.display = 'none';
        }, 5000); // Hide after 5 seconds
    });
});


 </script>

  <script>
  // Get current year
  document.getElementById("currentYear").textContent = new Date().getFullYear();
  

  </script>

</body>

</html>