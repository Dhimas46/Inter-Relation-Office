<!DOCTYPE html>
<html lang="en">
<head>

     <title>IRO - Blog Details</title>
<!--
Hydro Template
http://www.templatemo.com/tm-509-hydro
-->
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="description" content="">
     <meta name="keywords" content="">
     <meta name="author" content="">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     <link rel="stylesheet" href="<?= base_url() ?>/load_home/css/bootstrap.min.css">
     <link rel="stylesheet" href="<?= base_url() ?>/load_home/css/magnific-popup.css">
     <link rel="stylesheet" href="<?= base_url() ?>/load_home/css/font-awesome.min.css">

     <!-- MAIN CSS -->
     <link rel="stylesheet" href="<?= base_url() ?>/load_home/css/templatemo-style.css">
</head>
<body>

     <!-- PRE LOADER -->
     <section class="preloader">
          <div class="spinner">
               <span class="spinner-rotate"></span>
          </div>
     </section>


     <!-- MENU -->
     <section class="navbar custom-navbar navbar-fixed-top" role="navigation">
          <div class="container">

               <div class="navbar-header">
                    <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                         <span class="icon icon-bar"></span>
                    </button>

                    <!-- lOGO TEXT HERE -->
                    <a href="<?= base_url('dashboard') ?>" class="navbar-brand"><img src="<?= base_url() ?>/load_home/images/logo.png" width="230" height="55"></a>
               </div>

               <!-- MENU LINKS -->
               <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-nav-first">
                         <li><a href="<?= base_url() ?>" class="smoothScroll">Home</a></li>
                       </ul>
                       <ul class="nav navbar-nav navbar-right">
                            <li class="section-btn"><a href="<?= base_url('/login') ?>" ><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp&nbspSign in</a></li>
                       </ul>
               </div>
          </div>
     </section>


     <!-- BLOG HEADER -->
     <section id="blog-header" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-offset-1 col-md-5 col-sm-12">
                         <h2><?= $content->judul ?></h2>
                    </div>

               </div>
          </div>
     </section>


     <!-- BLOG DETAIL -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-8 col-sm-6">
                         <div class="about-info">
                              <div class="section-title">
                                   <h2><?= $content->judul ?></h2>
                                   <span class="line-bar">...</span>
                              </div>
                              <div text-align="justify">
                                <p><b><?= $content->deskripsi ?></b></p>
                              </div>
                         </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-4 col-sm-12">
                        <div class="about-image">
                              <img src="<?= base_url('konten/'.$content->image); ?>" width="220px" height="120px" class="img-responsive" alt="">
                        </div>
                    </div>
               </div>
          </div>
     </section>
     <br><br><br>


     <!-- FOOTER -->
     <footer data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">
                    <div class="col-md-5 col-sm-12">
                         <div class="footer-thumb footer-info">
                              <h2>International Relation Offie</h2>
                             <p>International Relation Office (IRO) Vokasi UB is formed as proof of Vokasi UB’s commitment to going global as a world-class vocational education.</p>
                         </div>
                    </div>



                    <div class="col-md-3 col-sm-6">
                         <div class="footer-thumb">
                              <h2>Find us</h2>
                              <p>Address: Jl Veteran No 12 – 14, Ketawanggede, Malang, Jawa Timur, Indonesia</p>
                              <p>Email: vokasi@ub.ac.id</p>
                              <p>Phone: 0341-551-611</p>
                         </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                         <div class="footer-thumb">
                             <a href="<?= base_url('dashboard') ?>" class="navbar-brand"><img src="<?= base_url() ?>/load_home/images/logo.png" width="230" height="55"></a>
                         </div>
                    </div>

                    <div class="col-md-12 col-sm-12">
                         <div class="footer-bottom">
                              <div class="col-md-6 col-sm-5">
                                   <div class="copyright-text">
                                        <p>Copyright &copy; 2022 Brawijaya University Vocational</p>
                                   </div>
                              </div>
                              <div class="col-md-6 col-sm-7">
                                   <div class="phone-contact">
                                        <p>Call us <span>0341-551-611</span></p>
                                   </div>
                                   <ul class="social-icon">
                                        <li><a href="https://www.facebook.com/Pendidikan-Vokasi-UB-987357274986986/" class="fa fa-facebook-square" attr="facebook icon"></a></li>
                                        <li><a href="https://twitter.com/VokasiUB" class="fa fa-twitter"></a></li>
                                        <li><a href="https://www.instagram.com/vokasiub/?hl=id" class="fa fa-instagram"></a></li>
                                   </ul>
                              </div>
                         </div>
                    </div>

               </div>
          </div>
     </footer>
     <!-- MODAL -->


     <!-- SCRIPTS -->
     <script src="<?= base_url() ?>/load_home/js/jquery.js"></script>
     <script src="<?= base_url() ?>/load_home/js/bootstrap.min.js"></script>
     <script src="<?= base_url() ?>/load_home/js/jquery.stellar.min.js"></script>
     <script src="<?= base_url() ?>/load_home/js/jquery.magnific-popup.min.js"></script>
     <script src="<?= base_url() ?>/load_home/js/smoothscroll.js"></script>
     <script src="<?= base_url() ?>/load_home/js/custom.js"></script>

</body>
</html>
