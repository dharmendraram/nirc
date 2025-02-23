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
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Portfolio</a></li>
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
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <div class="console-login d-flex ms-auto">
          <a href="http://localhost/nirc/back/login.php" target="_blank" class="btn btn-sm  btn-login">Console login</a> 
      </div>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center" data-aos="fade-up">
            <h1>Creative & Modern Web Solutions</h1>
            <p>Empowering businesses with stunning, responsive, and user-friendly websites built with the latest technologies.</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <!-- <a href="https://www.youtube.com/watch?v=Y7f98aduVJ8" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a> -->
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- Featured Services Section -->
    <!-- <section id="featured-services" class="featured-services section">
      <div class="container-fluid">
        <div class="row gy-4">
          <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-activity icon"></i></div>
              <h4><a href="" class="stretched-link">Lorem Ipsum</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-bounding-box-circles icon"></i></div>
              <h4><a href="" class="stretched-link">Sed ut perspici</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>
          <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
            <div class="service-item position-relative">
              <div class="icon"><i class="bi bi-calendar4-week icon"></i></div>
              <h4><a href="" class="stretched-link">Magni Dolores</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>
        </div>
      </div>
    </section> -->
    <!-- /Featured Services Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <!-- Section Title -->
      <div class="container-fluid section-title" data-aos="fade-up">
        <span>About Us<br></span>
        <h2>About</h2>
        <p>We transform ideas into powerful digital solutions, ensuring innovation, efficiency & scalability</p>
      </div><!-- End Section Title -->

      <div class="container-fluid">
        <div class="row gy-4">
          <div class="col-lg-6 position-relative align-self-start" data-aos="fade-up" data-aos-delay="100">
            <img src="assets/img/about.png" class="img-fluid" alt="">
            <a href="" class="glightbox pulsating-play-btn"></a>
          </div>
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="200">
            <h3>National Incubation and Research Center</h3>
            <p class="fst-italic">
              Since 2016, We transform Ideas into Reality with Cutting-Edge Technologies and Agile Development.
            </p>
            <p style="text-align: justify;">
              National Incubation and Research Center (NIRC) is a leading software development company dedicated to delivering cutting-edge digital solutions. We specialize in designing and developing web-based and mobile applications tailored to meet the unique needs of businesses, government institutions, and organizations. Our expertise spans various domains, providing robust and scalable software systems that enhance efficiency and drive digital transformation.
            </p>
            <p style="text-align: justify;">
              At NIRC, innovation, research, and technology come together to create solutions that make a real impact. We are committed to delivering high-quality, secure, and user-friendly applications that empower our clients to achieve their goals.
            </p>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="50" data-purecounter-duration="1" class="purecounter"></span>
              <p>Clients</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="20" data-purecounter-duration="1" class="purecounter"></span>
              <p>Projects</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100 plus">
              <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1" class="purecounter"></span>
              <p>Hours Of Support</p>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item text-center w-100 h-100">
              <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
              <p>Our Team</p>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section light-background">



      <!-- Section Title -->
      <div class="container-fluid section-title" data-aos="fade-up">
        <span>Services</span>
        <h2>Services</h2>
        <p>We provide innovative software solutions tailord to diverse industries and organizations.</p>
      </div><!-- End Section Title -->

      <div class="container-fluid">

      <div class="row gy-4">
      <?php
      $sql = "SELECT sid, image, title, description, created_date FROM services ORDER BY sid DESC";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $image = base64_encode($row['image']);
            $imageSrc = "data:image/jpeg;base64," . $image;
            ?>
            <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="service-item position-relative">
                    <div class="icon">
                        <img src="<?php echo $imageSrc; ?>" alt="<?php echo htmlspecialchars($row['title']); ?>" height="50px" width="50px" />
                    </div>
                    <h3><?php echo htmlspecialchars($row['title']); ?></h3>
                    <p><?php echo htmlspecialchars($row['description']); ?></p>
                </div>
            </div>
            <?php
        }
    } else {
        echo "<div class='col-12 text-center'>No services found</div>";
    }
    ?>
</div>

      </div>

    </section><!-- /Services Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container-fluid section-title" data-aos="fade-up">
        <span>Portfolio</span>
        <h2>Portfolio</h2>
        <p>We take pride in delivering cutting-edge software solutions across various industries and organizations.</p>
      </div><!-- End Section Title -->

      <div class="container-fluid">
        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
          <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
          <?php
            $sql = "SELECT pid, image1, image2, image3, image4, image5, title, description FROM portfolio ORDER BY pid DESC";
            $result = $conn->query($sql);

              if ($result->num_rows > 0) {
                  while ($row = $result->fetch_assoc()) {
                      $images = [];
                      for ($i = 1; $i <= 5; $i++) {
                          if (!empty($row["image$i"])) {
                              $images[] = base64_encode($row["image$i"]);
                          }
                      }
                      $mainImage = $images[0];
                      ?>
                      <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-app">
                          <div class="portfolio-card">
                              <img src="data:image/jpeg;base64,<?php echo $mainImage; ?>" class="img-fluid portfolio-thumb" alt="">
                              <div class="portfolio-info">
                                  <h4><?php echo htmlspecialchars($row['title']); ?></h4>
                                  <p><?php echo htmlspecialchars($row['description']); ?></p>
                                  <button type="button" class="btn btn-sm btn-primary gallery-btn" data-bs-toggle="modal" data-bs-target="#portfolioModal<?php echo $row['pid']; ?>">
                                      <i class="fas fa-images"></i> View Gallery
                                  </button>
                              </div>
                          </div>
                      </div>

                      <!-- Modal -->
                      <div class="modal fade" id="portfolioModal<?php echo $row['pid']; ?>" tabindex="-1" aria-labelledby="portfolioModalLabel<?php echo $row['pid']; ?>" aria-hidden="true">
                          <div class="modal-dialog modal-xl modal-dialog-centered">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h5 class="modal-title" id="portfolioModalLabel<?php echo $row['pid']; ?>">
                                          <i class="fas fa-folder-open me-2"></i><?php echo htmlspecialchars($row['title']); ?>
                                      </h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body p-0">
                                      <div id="carousel<?php echo $row['pid']; ?>" class="carousel slide" data-bs-ride="carousel">
                                          <div class="carousel-inner">
                                              <?php foreach ($images as $index => $imageData): ?>
                                                  <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                                      <div class="carousel-image-container">
                                                          <img src="data:image/jpeg;base64,<?php echo $imageData; ?>" class="carousel-image" alt="">
                                                      </div>
                                                  </div>
                                              <?php endforeach; ?>
                                          </div>
                                          <?php if (count($images) > 1): ?>
                                              <button class="carousel-control-prev" type="button" data-bs-target="#carousel<?php echo $row['pid']; ?>" data-bs-slide="prev">
                                                  <span class="carousel-control-prev-icon carousel-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Previous</span>
                                              </button>
                                              <button class="carousel-control-next" type="button" data-bs-target="#carousel<?php echo $row['pid']; ?>" data-bs-slide="next">
                                                  <span class="carousel-control-next-icon carousel-icon" aria-hidden="true"></span>
                                                  <span class="visually-hidden">Next</span>
                                              </button>
                                          <?php endif; ?>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <?php
                  }
              } else {
                  echo "<p class='text-center'>No portfolio items found</p>";
              }
        ?>

                <style>

                  /* Portfolio Card */
                .portfolio-card {
                    position: relative;
                    overflow: hidden;
                    border-radius: 10px;
                    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                    transition: transform 0.3s ease;
                }

                .portfolio-card:hover {
                    transform: translateY(-5px);
                }

                .portfolio-thumb {
                    width: 100%;
                    height: 250px;
                    object-fit: cover;
                    transition: transform 0.3s ease;
                }

                .portfolio-card:hover .portfolio-thumb {
                    transform: scale(1.05);
                }

                .portfolio-info {
                    padding: 15px;
                    background: rgba(255, 255, 255, 0.95);
                    position: absolute;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    transition: all 0.3s ease;
                }

                .gallery-btn {
                    background: #007bff;
                    border: none;
                    padding: 8px 15px;
                    border-radius: 5px;
                    transition: all 0.3s ease;
                }

                .gallery-btn:hover {
                    background: #0056b3;
                    transform: scale(1.05);
                }

                /* Modal Styling */
                .modal-xl {
                    max-width: 700px;
                    height: 500px;
                }

                .carousel-image-container {
                    max-height: 400px;
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    background: #f8f9fa;
                }

                .carousel-image {
                    max-height: 600px;
                    max-width: 100%;
                    object-fit: contain;
                    padding: 20px;
                    transition: transform 0.3s ease;
                }

                .carousel-image:hover {
                    transform: scale(1.02);
                }

                .carousel-control-prev,
                .carousel-control-next {
                    width: 5%;
                    opacity: 0.8;
                    transition: opacity 0.3s ease;
                }

                .carousel-control-prev:hover,
                .carousel-control-next:hover {
                    opacity: 1;
                }

                .carousel-icon {
                    width: 40px;
                    height: 40px;
                    border-radius: 50%;
                    background-color: rgba(0, 0, 0, 0.7);
                }

                .modal-content {
                    border: none;
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
                }

                .modal-header {
                    background: #007bff;
                    color: white;
                    border-bottom: none;
                }

                /* Animation */
                @keyframes fadeInUp {
                    from {
                        opacity: 0;
                        transform: translateY(20px);
                    }
                    to {
                        opacity: 1;
                        transform: translateY(0);
                    }
                }

                .portfolio-item {
                    animation: fadeInUp 0.5s ease forwards;
                }
                </style> 

          </div><!-- End Portfolio Container -->
        </div>
      </div>

    </section><!-- /Portfolio Section -->
        <!-- Clients Section -->
        <section id="clients" class="testimonials section light-background">

          <div class="container-fluid section-title" data-aos="fade-up">
            <span>Clients</span>
            <h2>Clients</h2>
            <p>Our Valued Clients – Driving success together!</p>
          </div>
    
          <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
    
            <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 500,
                  "autoplay": {
                    "delay": 2000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 5,
                      "spaceBetween": 20
                    }
                  }
                }
              </script>
              <div class="swiper-wrapper">
              <?php
                  $sql = "SELECT cid, cname, cimage, caddress, createdDate FROM clients ORDER BY cid DESC";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          // Convert BLOB image data to base64
                          $imageData = base64_encode($row['cimage']);
                          $imageSrc = "data:image/jpeg;base64," . $imageData;

                          echo '
                          <div class="swiper-slide">
                              <div class="clients-item">
                                  <div class="card">
                                      <img src="' . $imageSrc . '" alt="' . htmlspecialchars($row['cname']) . '">
                                      <h2>' . htmlspecialchars($row['cname']) . '</h2>
                                      <p>' . htmlspecialchars($row['caddress']) . '</p>
                                  </div>
                              </div>
                          </div>';
                      }
                  } else {
                      echo '<p class="text-center">No clients found</p>';
                  }
                  ?>
              </div>
              <div class="swiper-pagination"></div>
            </div>
    
          </div>
    
        </section><!-- /clients Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section ">

      <!-- Section Title -->
      <div class="container-fluid section-title" data-aos="fade-up">
        <span>Testimonials</span>
        <h2>Testimonials</h2>
        <p>Hear from our valued clients about how NIRC’s innovative software and cloud management solutions have enhanced their operations.</p>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 500,
              "autoplay": {
                "delay": 2000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 20
                }
              }
            }
          </script>
          <div class="swiper-wrapper">
            <?php
            // Fetch testimonials
            $sql = "SELECT id, quote, name, image, designation, address, created_date FROM testimonial ORDER BY id DESC";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Loop through each testimonial
                while ($row = $result->fetch_assoc()) {
                    // Encode image data
                    $imageData = base64_encode($row['image']);
                    $imageSrc = "data:image/jpeg;base64," . $imageData;

                    // Output the HTML structure for each testimonial
                    echo '
                    <div class="swiper-slide">
                        <div class="testimonial-item">
                            <p>
                                <i class="bi bi-quote quote-icon-left"></i>
                                <span>' . htmlspecialchars($row['quote']) . '</span>
                                <i class="bi bi-quote quote-icon-right"></i>
                            </p>
                            <div class="img-box">
                              <img src="' . $imageSrc . '" class="testimonial-img" alt="' . htmlspecialchars($row['name']) . '">
                              <div>
                                <h3>' . htmlspecialchars($row['name']) . '</h3>
                                <h4>' . htmlspecialchars($row['designation']) . '</h4>
                              </div>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p class="text-center">No testimonials found</p>';
            }
            ?>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

    </section><!-- /Testimonials Section -->

        <!-- Team Section -->
        <!-- <section id="team" class="team section light-background">
         
          <div class="container-fluid section-title" data-aos="fade-up">
            <span>Team</span>
            <h2>Team</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
          </div>
    
          <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper init-swiper" data-speed="600" data-delay="5000" data-breakpoints="{ &quot;320&quot;: { &quot;slidesPerView&quot;: 1, &quot;spaceBetween&quot;: 40 }, &quot;1200&quot;: { &quot;slidesPerView&quot;: 3, &quot;spaceBetween&quot;: 40 } }">
              <script type="application/json" class="swiper-config">
                {
                  "loop": true,
                  "speed": 600,
                  "autoplay": {
                    "delay": 5000
                  },
                  "slidesPerView": "auto",
                  "pagination": {
                    "el": ".swiper-pagination",
                    "type": "bullets",
                    "clickable": true
                  },
                  "breakpoints": {
                    "320": {
                      "slidesPerView": 1,
                      "spaceBetween": 40
                    },
                    "1200": {
                      "slidesPerView": 4,
                      "spaceBetween": 20
                    }
                  }
                }
              </script>
              <div class="swiper-wrapper">
                <div class="swiper-slide">
                <?php
                 
                  $sql = "SELECT id, name, image, designation FROM team ORDER BY id DESC";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                      
                      while ($row = $result->fetch_assoc()) {
                          
                          $imageData = base64_encode($row['image']);
                          $imageSrc = "data:image/jpeg;base64," . $imageData;


                          echo '
                          <div class="member">
                              <div class="pic">
                                  <img src="' . $imageSrc . '" class="img-fluid rounded" alt="">
                              </div>
                              <div class="member-info rounded shadow-xl mb-3">
                                  <h4>' . htmlspecialchars($row['name']) . '</h4>
                                  <span>' . htmlspecialchars($row['designation']) . '</span>
                                  <div class="social">
                                      <a href="#"><i class="bi bi-facebook"></i></a>
                                      <a href="#"><i class="bi bi-github"></i></a>
                                      <a href="#"><i class="bi bi-linkedin"></i></a>
                                  </div>
                              </div>
                          </div>';
                      }
                  } else {
                      echo '<p class="text-center">No team members found</p>';
                  }
                  $conn->close();
                  ?>
                </div>
              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>
        </section> -->
        <!-- /team Section -->


    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container-fluid section-title" data-aos="fade-up">
        <span>Contact</span>
        <h2>Contact</h2>
        <p>Reach out to us for collaboration, inquiries, or support—we're here to help! </p>
      </div><!-- End Section Title -->
      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">
        <div class="row">
                    
                    <div class="col-lg-4 info-item d-flex align-items-center justify-content-center" >
                      <i class="bi bi-geo-alt flex-shrink-0"></i>
                      <div>
                        <h3>Address</h3>
                        <p>Gaushala, Kathmandu, Nepal</p>
                      </div>
                    </div>
      
                    <div class=" col-lg-4 info-item d-flex align-items-center justify-content-center">
                      <i class="bi bi-telephone flex-shrink-0"></i>
                      <div>
                        <h3>Call Us</h3>
                        <p>+977 984-9044721</p>
                      </div>
                    </div>
      
                    <div class=" col-lg-4 info-item d-flex align-items-center justify-content-center" >
                      <i class="bi bi-envelope flex-shrink-0"></i>
                      <div>
                        <h3>Email Us</h3>
                        <p>admin@nirc.com.np</p>
                      </div>
                    </div>
                    
                  </div>
        <div class="row gy-4">
          <div class="col-lg-7">
            <div class="">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14129.53785890344!2d85.32936566299314!3d27.705413376712457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19c7c886557d%3A0xa23b44219e7e07e3!2sPashupati%20vision%20complex!5e0!3m2!1sen!2snp!4v1739688228633!5m2!1sen!2snp" frameborder="0" style="border:0; width: 100%; height: 278px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>

          <div class="col-lg-5">
            <form id="contactForm" method="post" class="info-wrap contact">
              <div class="row gy-4 ">
                  <div class="col-md-6">
                      <label for="name-field" class="pb-2">Your Name</label>
                      <input type="text" name="name" id="name-field" class="form-control" required>
                  </div>
                  <div class="col-md-6">
                      <label for="email-field" class="pb-2">Your Email</label>
                      <input type="email" class="form-control" name="email" id="email-field" required>
                  </div>
                  <div class="col-md-6">
                      <label for="mobile-field" class="pb-2"> Mobile </label>
                      <input type="text" class="form-control" name="mobile" id="mobile-field" required>
                  </div>
                    <div class="col-md-6">
                        <label for="subject-field" class="pb-2">Subject</label>
                        <input type="text" class="form-control" name="subject" id="subject-field" required>
                    </div>
                  <div class="col-md-12">
                      <label for="message-field" class="pb-2">Message</label>
                      <textarea class="form-control" name="message" rows="3" id="message-field" required></textarea>
                  </div>
                  <div class="col-md-12 text-center">
                    <div class="loading" style="display:none;">Loading...</div>
                    <div class="error-message" style="display:none;"></div>
                    <div class="sent-message" style="display:none;"></div>
                    <button type="submit" class="contact-btn">Send Message</button>
                </div>
              </div>
          </form>
  
          </div><!-- End Contact Form -->
        </div>
      </div>
    </section><!-- /Contact Section -->
  </main>
  

  <footer id="footer" class="footer light-background">

    <!-- <div class="footer-newsletter">
      <div class="container-fluid">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div> -->

    <div class="container-fluid footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <img src="./assets//img/logo.png" alt="logo" height="40" width="auto">
          </a>
          <div class="footer-contact pt-3">
            <p class="mb-3">"NIRC (National Incubation & Research Center) empowers innovation, research, and entrepreneurship, fostering groundbreaking solutions for a better future."</p>
            <p><strong class="text-dark me-2"><i class="bi bi-geo-alt-fill"></i></strong> <span class="text-dark">Gaushala, Kathmandu, Nepal</span></p>
            <p><strong class="text-danger me-2"><a href="tel:9849044721" style="font-size: 14px; color: black;" target="_blank"><i class="bi bi-telephone-forward"></i></strong> <span>+977 984-9044721</span></a></p>
            <p><strong class="text-danger me-2"><a href="maito:admin@nirc.com.np" target="_blank" style="font-size: 14px; color: black;"><i class="bi bi-envelope"></i></strong> <span>admin@nirc.com.np</span></a></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#about">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#services">Services</a></li>
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