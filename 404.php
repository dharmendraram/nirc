<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        body{
            overfolw:hidden !important;
        }
    .error-container {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: 97vh;
  }
  .error-content {
    margin-top:-30px;
    text-align: center;
  }

  .error-content h1 {
    font-size: 4rem;
    font-weight: bold;
    margin-bottom: 1rem;
  }

  .error-content p {
    font-size: 1.5rem;
    margin-bottom: 2rem;
  }

  .lottie-animation {
    max-width: 400px;
    margin-bottom: 2rem;
  }
  .btn-primary{
    background-color: #40C4C7;
    text-decoration: none;
    padding: 8px 20px;
    color: #fff;
    border-radius: 8px;
  }
  .btn-primary:hover{
    background-color: red;
    text-decoration: none;
    padding: 8px 20px;
    color: #fff;
    border-radius: 8px;
  }
  
    </style>
</head>
<body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>

<div class="error-container">
  <div class="lottie-animation"></div>
   <!-- <div class="img-not">
    <img src="assets/img/notfound.png" alt="" height="300">
   </div> -->
  <div class="error-content">
    <h1>404</h1>
    <p>Oops! Page not Found</p>
    <a href="#" class="btn btn-primary">Back To Home</a>
  </div>
</div> 


<script>
const animation = lottie.loadAnimation({
      container: document.querySelector('.lottie-animation'),
      renderer: 'svg',
      loop: true,
      autoplay: true,
      path: 'https://lottie.host/d987597c-7676-4424-8817-7fca6dc1a33e/BVrFXsaeui.json'

    });
    </script>
</body>
</html>