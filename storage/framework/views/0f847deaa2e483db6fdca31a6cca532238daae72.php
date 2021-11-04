<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>7DC </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->

  <link href="/assets/images/logo-sm1.png" rel="icon">
  <link href="/static/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="/static/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="/static/vendor/icofont/icofont.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="/static/css/style.css" rel="stylesheet">


</head>

<body>

<!-- ======= Header ======= -->
<div class="container d-flex flex-column ">



  <nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <a class="navbar-brand" style="color: gold" href="#">7DC</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/register">Register</a>
        </li>
      </ul>
    </div>
  </nav>

</div>
<header id="header" class="d-flex align-items-center">





  <div class="container d-flex flex-column align-items-center">


    <img src="/images/aff.png" height="150px">
    <h1>Welcome to the 7DC platform</h1>
    <h3 style="color: white">We are building Africa’s largest Salesforce.
    </h3>
    <br>
    <h4 style="color: white">Do you have an account? <a class="btn btn-warning btn-sm" href="/login">Login</a>
    </h4>
    <br>
     
Countdown to Oct. 31st 


    <h1>N5 Million Naira October Challenge Countdown to 31st October, 2021</h1>
    <div class="countdown d-flex justify-content-center" data-count="2021/10/31">
      <div>
        <h3>%D</h3>
        <h4>Days</h4>
      </div>
      <div>
        <h3>%H</h3>
        <h4>Hours</h4>
      </div>
      <div>
        <h3>%M</h3>
        <h4>Minutes</h4>
      </div>
      <div>
        <h3>%S</h3>
        <h4>Seconds</h4>
      </div>
    </div>

    <div class="subscribe">
      <h4>Subscribe now to get the latest updates!</h4>
      <form action="/newsletter" method="post" role="form" class="mphp-email-form">
        <div class="subscribe-form">
          <?php echo csrf_field(); ?>
          <input type="email" name="email">
          <input type="submit" value="Subscribe">
        </div>
        <div class="mt-2">
          <div class="loading">Loading</div>
          <div class="error-message"></div>

          <?php if($errors->all()): ?>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <p class="text text-center text-danger"> <?php echo e($error); ?> </p>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          <?php endif; ?>

          <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <strong><?php echo e(session('success')); ?></strong>
            </div>
          <?php endif; ?>

          <?php if(session('error')): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
              <strong><?php echo e(session('error')); ?></strong>
            </div>
          <?php endif; ?>

        </div>
      </form>
    </div>

    <div class="social-links text-center">
      <a href="https://www.twitter.com/7dc" class="twitter"><i class="icofont-twitter"></i></a>
      <a href="https://www.facebook.com/7dc" class="facebook"><i class="icofont-facebook"></i></a>
      <a href="https://www.instagram.com/7dc" class="instagram"><i class="icofont-instagram"></i></a>
      <a href="https://www.linkedin.com/7dc" class="google-plus"><i class="icofont-linkedin"></i></a>

      
    </div>

  </div>
</header>



<main id="main">

  <!-- ======= About Us Withdrawal ======= -->
  <section id="about" class="about" style="color: white; background-image: url('/static/img/pexels.jpeg'); opacity: 0.87; background-color: black">
    <div class="container">

       <div class="section-title">
        <h2 style="color: orange">About Us</h2>
        <p>We are building Africa’s largest Salesforce.</p><br>
        <h3>Our goals are simple</h3>
        <ul>
          <h5>1. Raise One Million Young Intelligent Affiliate Marketers who will live life on their own terms, travel the world, and raise very beautiful families while they make a minimum of $1000 weekly.</h5>
          <br>
          <h5>2. Achieve weekly sales turnover of $10,000,000,000, (N4.5Tr) in value every week across Africa.</h5>
        </ul>
      </div>

      <div class="row mt-2">
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="icofont-computer" style="color: white"></i></div>
          <h4 class="titler"  style="color: white">Services</h4>
          <p class="description"></p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="icofont-chart-bar-graph" style="color: white"></i></div>
          <h4 class="titler" style="color: white">Products</h4>
          <p class="description"></p>
        </div>
        <div class="col-lg-4 col-md-6 icon-box">
          <div class="icon"><i class="icofont-earth" style="color: white"></i></div>
          <h4 class="titler" style="color: white">Projects</h4>
          <p class="description"></p>
        </div>
      </div>

    </div>
  </section>

  <section id="contact" class="contact" style="background-color: black">
    <div class="container">

      <div class="section-title">
        <h2>Become a 7D Affiliate</h2>
        <h6 style="color:#ffffff;">Make up to N5 million naira monthly</h6>
      </div>

      <div class="row">

        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="info">

            <h3 style="text-align: center; padding: 0">
              They say, across the world, that talent is evenly distributed but that resources or opportunities are not evenly distributed. <br><br>
              Well, we are changing that narrative now. Your dreams are valid.<br><br>
              If you are smart enough to want it and bold enough to pursue it we will supply you with everything else.<br><br>
              Join our affiliates and earn as much as N5M monthly.
            </h3>
            <br>


            <!--<center><a class="btn btn-md btn-warning" href="/register" style="color: white"> Register Today</a></center>-->
            <br>
            <br>

            <center><img src="images/point.png" height="400px"></center>

          </div>

        </div>




























































      </div>

    </div>
  </section>



</main>

<footer id="footer">
  <div class="container">
    <div class="copyright">
      &copy; Copyright <strong><span>The 7D Affiliates Limited (7D Group) (c) <?php echo e(date('Y')); ?></span></strong>. All Rights Reserved
    </div>
    <div class="social-links text-center">
      <a href="https://www.twitter.com/7dc" class="twitter"><i class="icofont-twitter"></i></a>
      <a href="https://www.facebook.com/7dc" class="facebook"><i class="icofont-facebook"></i></a>
      <a href="https://www.instagram.com/7dc" class="instagram"><i class="icofont-instagram"></i></a>
      <a href="https://www.linkedin.com/7dc" class="google-plus"><i class="icofont-linkedin"></i></a>

      
    </div>
    <div class="credits">

      
    </div>
  </div>
</footer><!-- End #footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="/static/vendor/jquery/jquery.min.js"></script>
<script src="/static/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/static/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="/static/vendor/php-email-form/validate.js"></script>
<script src="/static/vendor/jquery-countdown/jquery.countdown.min.js"></script>

<!-- Template Main JS File -->
<script src="/static/js/main.js"></script>

</body>

</html><?php /**PATH /Users/mac/webProjects/creator/resources/views/soon.blade.php ENDPATH**/ ?>