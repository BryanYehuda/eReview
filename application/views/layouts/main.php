<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>eReview - Science First</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="<?php echo base_url();?>assets/img/ereviewlogo.png" rel="icon">
  <link href="<?php echo base_url();?>assets/img/ereviewlogo.png" rel="apple-touch-icon">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo base_url();?>assets/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo base_url();?>assets/lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url();?>assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet">

</head>

<body id="page-top">

  <!--/ Nav Star /-->
  <nav class="navbar navbar-b navbar-trans navbar-expand-md fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll" href="#page-top">eReview</a>
      <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarDefault"
        aria-controls="navbarDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span></span>
        <span></span>
        <span></span>
      </button>
      <div class="navbar-collapse collapse justify-content-end" id="navbarDefault">
        <ul class="navbar-nav">
        <?php if($this->session->userdata('logged_in')): ?>
          <?php $user_id = $this->session->userdata('user_id'); ?>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url();?>users/display_page_role/<?php echo $user_id ?>"><?php foreach ($roles as $role) {echo ucwords($role['nama_grup'] ." ");} ?></a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url()?>users/display/<?php echo $user_id ?>">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url();?>users/logout">Logout</a>
          </li>
        <?php else: ?>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url();?>home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url();?>users/register">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll" href="<?php echo base_url();?>users/login">Login</a>
          </li>
        <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--/ Nav End /-->

  <!--/ Intro Skew Star /-->
 <div id="home" class="intro route bg-image" style="background-image: url(<?php echo base_url();?>assets/img/intro-bg.jpg)">
    <div class="overlay-itro"></div>
    <div class="intro-content display-table">
      <div class="table-cell">
        <div class="container">
          <!--<p class="display-6 color-d">Hello, world!</p>-->
          <h1 class="intro-title mb-4">We are eReview</h1>
          <p class="intro-subtitle"><span class="text-slider-items">Makelaar,Reviewer,Editor,Scientific Paper</span><strong class="text-slider"></strong></p>
        </div>
      </div>
    </div>
  </div>
  <!--/ Intro Skew End /-->

<div>
  <?php $this->load->view($main_view); ?>
</div>

  <!--/ Section Contact-Footer Star /-->
  <section class="paralax-mf footer-paralax bg-image sect-mt4 route" style="background-image: url(<?php echo base_url();?>assets/img/overlay-bg.jpg)">
    <div class="overlay-mf"></div>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <div class="contact-mf">
            <div id="contact" class="box-shadow-full">
              <div class="row">
                <div class="col-sm-12">
                  <div class="title-box text-center">
                    <h5 class="title-a">
                      Get in Touch
                    </h5>
                    <p class="subtitle-a">
                        We will give you the best solution possible
                    </p>
                    <div class="line-mf"></div>
                  </div>
                  <div class="more-info">
                    <p class="lead text-center">
                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum dolorem soluta quidem
                      expedita aperiam aliquid at.
                      Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis
                      mollitia inventore?
                    </p>
                    <ul class="list-ico text-center">
                      <li><span class="ion-ios-location"></span>Jalan Surabaya Blok ABC No 123, 60234</li>
                      <li><span class="ion-ios-telephone"></span> 0812345678910</li>
                      <li><span class="ion-email"></span> sesuatu@example.com</li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
            <div class="copyright-box">
              <p class="copyright">&copy; Copyright <strong>eReview</strong>. All Rights Reserved</p>
              <div class="credits">
                Designed by <a href="https://adajupiter.com/">JupiterDevelopment</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  </section>
  <!--/ Section Contact-footer End /-->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
  <div id="preloader"></div>

  <!-- JavaScript Libraries -->
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/popper/popper.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/easing/easing.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/counterup/jquery.waypoints.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/counterup/jquery.counterup.js"></script>
  <script src="<?php echo base_url();?>assets/lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/lightbox/js/lightbox.min.js"></script>
  <script src="<?php echo base_url();?>assets/lib/typed/typed.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo base_url();?>assets/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo base_url();?>assets/js/main.js"></script>

</body>
</html>
