<?php
session_start();
require 'admin/db-con/db_con.php';

$site_desp = "SELECT * FROM site_desp";
$site_desp_que = mysqli_query($db_con,$site_desp);
$site_desp_assoc = mysqli_fetch_assoc($site_desp_que);






?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?php echo $site_desp_assoc['title']; ?> &mdash; Portfolio <?php echo $site_desp_assoc['title']; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  


  <div class="site-wrap">

    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap">
      
      <div class="site-navbar site-navbar-target js-sticky-header">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-6 col-md-4">
              <h1 class="my-0 site-logo"><a href="index.php"><?php echo $site_desp_assoc['s_name']; ?><span class="text-primary">.</span> </a></h1>
            </div>
            <div class="col-6 col-md-8">
              <nav class="site-navigation text-right" role="navigation">
                <div class="container">

                  <div class="d-inline-block d-lg-block ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black">
                    <span class="icon-menu h3"></span> <span class="menu-text">Menu</span>
                  </a></div>

                  <ul class="site-menu main-menu js-clone-nav d-none d-lg-none">
                    <li><a href="#home-section" class="nav-link">Home</a></li>
                    <li><a href="#what-we-do-section" class="nav-link">What We Do</a></li>
                    <li><a href="#about-section" class="nav-link">About Us</a></li>
                    <li><a href="#portfolio-section" class="nav-link">Portfolio</a></li>
                    <li><a href="#studio-section" class="nav-link">Gallery</a></li>
                    <li><a href="#contact-section" class="nav-link">Contact</a></li>
                  </ul>
                </div>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- END .site-navbar-wrap -->
    <?php
    $sel_banner = "SELECT * FROM site_banner_img WHERE status=1";
    $sel_banner_que = mysqli_query($db_con,$sel_banner);


    ?>
    
    <div class="site-blocks-cover" id="home-section">
      <div class="img-wrap">
        <div class="owl-carousel slide-one-item hero-slider">
          <?php foreach ($sel_banner_que as $banner): ?>
          <div class="slide">
            <img src="admin/uploads/banner/<?php echo $banner['picture']; ?>" alt="Image">  
          </div>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="container">
        <div class="row">
          <div class="col-md-6 ml-auto align-self-center">
            <div class="intro">
              <div class="heading">
                <h1><?php echo $site_desp_assoc['ban_text']; ?></h1>
              </div>
              <div class="text">
                <p class="sub-text mb-5"><?php echo $site_desp_assoc['short_desp']; ?>.</p>
                <p><a href="#" target="_blank" class="btn btn-outline-primary btn-md">Start a project</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- END .site-blocks-cover -->
<?php
$sel_service = "SELECT * FROM services WHERE status=1";
$sel_service_que = mysqli_query($db_con,$sel_service);
?>
    <div class="site-section" id="what-we-do-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-6 section-title">
            <span class="sub-title mb-2 d-block">What We Do</span>
            <h2 class="title text-primary">Far far away, behind the word mountains far from the countries</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-10 ml-auto">
            <div class="row">
              <?php foreach ($sel_service_que as $service): ?>
              <div class="col-md-6 col-lg-4 mb-4 mb-lg-4">
                <div class="service h-100">
                  <h3><?php echo $service['ser_name']; ?></h3>
                  <p><?php echo substr($service['ser_desp'], 0,65); ?>.</p>
                  <p><a href="single-service.php?id=<?php echo $service['id']; ?>" class="readmore">Learn more</a></p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
    </div> <!-- END .site-section -->
<?php
$sel_about = "SELECT * FROM about_me";
$sel_about_que = mysqli_query($db_con,$sel_about);
$sel_about_assoc = mysqli_fetch_assoc($sel_about_que);

?>
    <div class="site-section" id="about-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 mb-5">
            <img src="images/glint_about_1.jpg" alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 ml-auto section-title">
            <span class="sub-title mb-2 d-block">Acquaint Us</span>
            <h2 class="title text-primary mb-3">About Me</h2>
            <p class="mb-4"><?php echo $sel_about_assoc['about']; ?>.</p>
<?php
$sel_quil = "SELECT * FROM quil WHERE status=1 LIMIT 3";
$sel_quil_que = mysqli_query($db_con,$sel_quil);


?>

            <div class="d-flex">
              <ul class="list-unstyled ul-check success mr-5">
                <?php foreach ($sel_quil_que as $quil): ?>
                <li><?php echo $quil['name']; ?></li>
              <?php endforeach; ?>
                
              </ul>
              <!-- <ul class="list-unstyled ul-check success">
                
                <li>Mobile Apps</li>
                <li>Copywriting</li>
                <li>SEO</li>
              </ul> -->
            </div>
            <p><a data-fancybox data-ratio="2" href="https://vimeo.com/326176805" class="d-flex align-items-center"><span class="icon-play_circle_outline h4 m-0 mr-2"></span> <span>Watch the video</span></a></p>
          </div>
        </div>
      </div>
    </div> <!-- .END site-section -->


    <div class="site-section" id="what-we-do-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-6 section-title">
            <span class="sub-title mb-2 d-block">Meet The Team</span>
            <h2 class="title text-primary">We are talented people.</h2>
          </div>
        </div>
        <div class="row no-gutters">
          <div class="col-lg-6 mb-5 person">
            <img src="images/person_1.jpg" alt="Image" class="img-fluid mb-5">

            <div class="row">
              <div class="col-lg-10 ml-auto">
                <div class="pr-lg-5">
                  <h3>Jacob Spencer</h3>
                  <span class="mb-4 d-block">CEO, Co-Founder</span>
                  <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
                  <p>A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.</p>
                  <p class="d-flex align-items-center">
                    <span class="mr-3 text-black">Follow me:</span>
                    <a href="#" class="twitter pr-2 pt-2 pb-2 pl-0"><span class="icon-twitter"></span></a>
                    <a href="#" class="facebook p-2"><span class="icon-facebook"></span></a>
                    <a href="#" class="dribbble p-2"><span class="icon-dribbble"></span></a>
                    <a href="#" class="instagram p-2"><span class="icon-instagram"></span></a>
                    <a href="#" class="linkedin p-2"><span class="icon-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 person">
            <img src="images/person_2.jpg" alt="Image" class="img-fluid mb-5">
            <div class="row">
              <div class="col-lg-10 ml-auto">
                <div class="pr-lg-5">
                  <h3>Chris Peters</h3>
                  <span class="mb-4 d-block">CTO, Co-Founder</span>
                  <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                  <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.</p>
                  <p class="d-flex align-items-center">
                    <span class="mr-3 text-black">Follow me:</span>
                    <a href="#" class="twitter pr-2 pt-2 pb-2 pl-0"><span class="icon-twitter"></span></a>
                    <a href="#" class="github p-2"><span class="icon-github"></span></a>
                    <a href="#" class="dribbble p-2"><span class="icon-dribbble"></span></a>
                    <a href="#" class="instagram p-2"><span class="icon-instagram"></span></a>
                    <a href="#" class="linkedin p-2"><span class="icon-linkedin"></span></a>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="site-section" id="portfolio-section">
      <div class="container">
        <div class="row mb-5 ">
          <div class="col-md-7 section-title text-center mx-auto">
            <span class="sub-title mb-2 d-block">Recent Works</span>
            <h2 class="title text-primary mb-3">We love what we do, check out some of our latest works</h2>
          </div>
        </div>

        <?php
        $sel_pro = "SELECT * FROM pro_1 WHERE pro1_status=1";
        $sel_pro_que = mysqli_query($db_con,$sel_pro);
        ?>

        <?php foreach ($sel_pro_que as $pro): ?>
        <div class="row mb-5">
          <div class="col-lg-6 mb-4 mb-lg-0">
            <img src="admin/uploads/project/<?php echo $pro['pro1_picture']; ?>  " alt="Image" class="img-fluid">
          </div>
          <div class="col-lg-5 h-100 jm-sticky-top ml-auto">
            <h3><?php echo $pro['pro1_title']; ?></h3>
            <p class="mb-4"><?php echo $pro['pro1_short']; ?></p>
            <p class="mb-4"><a href="http://<?php echo $pro['pro1_link']; ?>" target="blank" class="readmore">Visit website</a></p>
            <div class="testimonial bg-white h-100">
              <blockquote class="mb-3">
                <p>&ldquo;<strong><?php echo $pro['pro1_feedback']; ?></strong>.&rdquo;</p>
              </blockquote>
              <div class="d-flex align-items-center vcard">
                <figure class="mb-0 mr-3">
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid ounded-circle">
                </figure>
                <div class="vcard-text">
                  <span class="d-block"><?php echo $pro['pro1_sender']; ?></span>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      </div>
    </div>

    <div class="site-section bg-light">
      <div class="container">
         <div class="row mb-5 ">
          <div class="col-md-7 section-title text-center mx-auto">
            <span class="sub-title mb-2 d-block">Testimonials</span>
            <h2 class="title text-primary mb-3">Our Client Sayings</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-6 mb-4">
            <div class="testimonial bg-white h-100">
              <blockquote class="mb-3">
                <p>&ldquo;Far far away, behind the word mountains, <strong>far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</strong> right at the coast of the Semantics, a large language ocean.&rdquo;</p>
              </blockquote>
              <div class="d-flex align-items-center vcard">
                <figure class="mb-0 mr-3">
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid ounded-circle">
                </figure>
                <div class="vcard-text">
                  <span class="d-block">Jacob Spencer</span>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-6 mb-4">
            <div class="testimonial bg-white h-100">
              <blockquote class="mb-3">
                <p>&ldquo;A small river named Duden <strong>flows by their place and supplies it with the necessary regelialia</strong>. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <div class="d-flex align-items-center vcard">
                <figure class="mb-0 mr-3">
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid ounded-circle">
                </figure>
                <div class="vcard-text">
                  <span class="d-block">Jean Smith</span>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mb-4">
            <div class="testimonial bg-white h-100">
              <blockquote class="mb-3">
                <p>&ldquo;A small river named Duden <strong>flows by their place and supplies it with the necessary regelialia</strong>. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <div class="d-flex align-items-center vcard">
                <figure class="mb-0 mr-3">
                  <img src="images/person_4.jpg" alt="Image" class="img-fluid ounded-circle">
                </figure>
                <div class="vcard-text">
                  <span class="d-block">Jean Smith</span>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
            
          </div>
          <div class="col-lg-6 mb-4">
            <div class="testimonial bg-white h-100">
              <blockquote class="mb-3">
                <p>&ldquo;Far far away, behind the word mountains, <strong>far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</strong> right at the coast of the Semantics, a large language ocean.&rdquo;</p>
              </blockquote>
              <div class="d-flex align-items-center vcard">
                <figure class="mb-0 mr-3">
                  <img src="images/person_3.jpg" alt="Image" class="img-fluid ounded-circle">
                </figure>
                <div class="vcard-text">
                  <span class="d-block">Jacob Spencer</span>
                  <span class="position">Web Designer</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    
    <div class="site-section" id="studio-section">
      <div class="container">

        <div class="row mb-5 ">
          <div class="col-md-7 section-title text-center mx-auto">
            <span class="sub-title mb-2 d-block">Photos</span>
            <h2 class="title text-primary mb-3">Studio Gallery</h2>
          </div>
        </div>
       <?php
       $gallery = "SELECT * FROM gallery WHERE status=1";
       $gallery_que = mysqli_query($db_con,$gallery);
       ?>


<?php foreach ($gallery_que as $pic): ?>
        <div id="posts" class="row no-gutter">
          <div class="item web col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4 mb-4">
            <a href="/sam/admin/gallery/uploads/<?php echo $pic['picture']; ?>" class="item-wrap" data-fancybox="gal">
              <span class="icon-search2"></span>
              <img class="img-fluid" src="/sam/admin/gallery/uploads/<?php echo $pic['picture']; ?>">
            </a>
          </div>
<?php endforeach; ?>


        </div>
      </div>
    </div> <!-- END .site-section -->
    
    <div class="site-section" id="contact-section">
      <div class="container">
        <form action="admin/contact/con-com.php" method="post" class="contact-form">

          <div class="section-title text-center mb-5">
            <span class="sub-title mb-2 d-block">Get In Touch</span>
            <h2 class="title text-primary">Contact Us</h2>
          </div>

          <div class="row mb-4">
            <div class="col-md-6 mb-4 mb-md-0">
              <input type="text" name="f_name" class="form-control" placeholder="First name">
            </div>
            <div class="col-md-6">
              <input type="text" name="l_name" class="form-control" placeholder="Last name">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-12">
              <input type="email" name="email" class="form-control" placeholder="Email*">
            </div>
          </div>

          <div class="row mb-4">
            <div class="col-12">
              <textarea class="form-control" name="msg" id="" cols="30" rows="10" placeholder="Message"></textarea>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary btn-md">Send Message</button>
            </div>
          </div>
          <div class="mt-1 text-center">
                     <?php if(!empty($_SESSION['msg_err'])): ?>
                         <div class="alert alert-dismissable alert-warning">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php echo $_SESSION['msg_err']; ?>
                      </div>
                 <?php endif; unset($_SESSION['msg_err']); ?>
            </div>
            <div class="mt-1 text-center">
                     <?php if(!empty($_SESSION['ins_com'])): ?>
                         <div class="alert alert-dismissable alert-success">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                          <?php echo $_SESSION['ins_com']; ?>
                      </div>
                 <?php endif; unset($_SESSION['ins_com']); ?>
            </div>
        </form>
      </div>
    </div> <!-- END .site-section -->
  
    <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 mb-5 mb-lg-0">
            <div class="row mb-5">
              <div class="col-12">
                <h3 class="footer-heading mb-4">About Me</h3>
                <p><?php echo $sel_about_assoc['about']; ?>.</p>
              </div>
            </div>
            

            
          </div>
          <div class="col-lg-3 ml-auto">
           
            <div class="row mb-5">
              <div class="col-md-12">
                <h3 class="footer-heading mb-4">Navigation</h3>
              </div>
              <div class="col-md-6 col-lg-6">
                <ul class="list-unstyled">
                  <li><a href="#home-section" class="smoothscroll">Home</a></li>
                  <li><a href="#what-we-do-section" class="smoothscroll">What We Do</a></li>
                  <li><a href="#about-section" class="smoothscroll">About Us</a></li>
                  <li><a href="#team-section"  class="smoothscroll">Team</a></li>
                </ul>
              </div>
              
            </div>
            
          </div>
          

          <div class="col-lg-4 mb-5 mb-lg-0">

            <div class="mb-5">
              <h3 class="footer-heading mb-2">Subscribe Newsletter</h3>
              <p>A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>

              <form method="post" class="form-subscribe">
                <div class="form-group mb-3">
                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="Enter full name" aria-label="Enter Email" aria-describedby="button-addon2">
                </div>
                <div class="form-group mb-3">
                  <input type="text" class="form-control border-white text-white bg-transparent" placeholder="Enter email" aria-label="Enter Email" aria-describedby="button-addon2">
                </div>
                <div class="form-group">
                  <button class="btn btn-primary px-5" type="submit">Subscribe</button>
                </div>
              </form>

            </div>

            


          </div>
          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <div class="mb-4">
                  <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                  <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                </div>
            <p>
              &copy; <script>document.write(new Date().getFullYear());</script> <a href="<?php echo $site_desp_assoc['footer_link']; ?>"><?php echo $site_desp_assoc['footer']; ?></a> | All rights reserved
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.sticky.js"></script>
  <script src="js/stickyfill.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/isotope.pkgd.min.js"></script>
  
  <script src="js/jquery.fancybox.min.js"></script>
  <script src="js/main.js"></script>

     
  </body>
</html>