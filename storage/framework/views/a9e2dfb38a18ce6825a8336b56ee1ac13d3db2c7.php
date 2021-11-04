<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>7DC | Contact us </title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="/static/img/favicon.png" rel="icon">
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

<div class="container d-flex flex-column ">



  <nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <a class="navbar-brand" style="color: gold" href="#">7DC</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">

      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/contact">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/login">Login</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link " href="/register">Register</a>
        </li>
      </ul>
    </div>
  </nav>

</div>

<main id="main">

  <section id="contact" class="contact" style="background-image: url('/static/img/aff.jpg'); opacity: 0.57; background-color: white">
    <div class="container">

      <div class="section-title">
        <h2>Contact Us</h2>
      </div>

      <div class="row">
        <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
          <div class="info">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">Your Name</label>
                <input type="text" name="name" class="form-control" id="name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validate"></div>
              </div>
              <div class="form-group col-md-6">
                <label for="name">Your Email</label>
                <input type="email" class="form-control" name="email" id="email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <label for="name">Subject</label>
              <input type="text" class="form-control" name="subject" id="subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validate"></div>
            </div>
            <div class="form-group">
              <label for="name">Message</label>
              <textarea class="form-control" name="message" rows="10" data-rule="required" data-msg="Please write something for us"></textarea>
              <div class="validate"></div>
            </div>





            <div class="text-center"><button class="btn btn-warning" type="submit">Send Message</button></div>
          </form>
        </div>
        </div>

        <div class="col-lg-5 d-flex align-items-stretch">
          <div class="info">
            <div class="address">
              <i class="icofont-google-map"></i>
              <h4>Location:</h4>
              <p>24, Grace Community, Dawaki, Abuja. 900108</p>
            </div>

            <div class="email">
              <i class="icofont-envelope"></i>
              <h4>Email:</h4>
              <p>info@affliatedng.com</p>
            </div>

            <div class="phone">
              <i class="icofont-phone"></i>
              <h4>Call:</h4>
              <p>07049373852</p>
            </div>

            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d12097.433213460943!2d-74.0062269!3d40.7101282!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xb89d1fe6bc499443!2sDowntown+Conference+Center!5e0!3m2!1smk!2sbg!4v1539943755621" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
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

</html><?php /**PATH /home/affilia1/7dc/resources/views/contact.blade.php ENDPATH**/ ?>