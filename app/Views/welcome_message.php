<?= $this->extend('home_layout/default') ?>
<?= $this->section('title') ?>
<title>Welcome to IRO Vokasi</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

     <section id="home" data-stellar-background-ratio="0.5">
          <div class="overlay"></div>
          <div class="container">
               <div class="row">

                    <div class="col-md-6 col-sm-12">
                         <div class="home-info">
                              <h1>Welcome to International Realtion Office</h1>
                              <a href="<?= base_url('/login') ?>" class="btn section-btn smoothScroll">Sign in</a>
                              <span>
                                   CALL US 0341-551-611
                                   <small>For any inquiry</small>
                              </span>
                         </div>
                    </div>

                    <!--<div class="col-md-6 col-sm-12">-->
                    <!--      <div class="home-video">-->
                    <!--          <img src="<?= base_url() ?>/load_home/images/caro1.jpg" width="550px" height="400px">-->
                    <!--     </div> -->
                    <!--</div>-->

               </div>
          </div>
     </section>

     <!-- ABOUT -->
     <section id="about" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-8 col-sm-6">
                         <div class="about-info">
                              <div class="section-title">
                                   <h2>International Relation Office (IRO)</h2>
                                   <span class="line-bar">...</span>
                              </div>
                              <div text-align="justify">
                                <p><b>International Relation Office (IRO)</b> Vokasi UB is formed as proof of Vokasi UB’s commitment to going global as a world-class vocational education. The main activities of International Office Vokasi UB is including developing partnerships and agreements with various international institutions, managing Vokasi UB inbound and outbound mobility, and coordinating with International Office Brawijaya University to support Brawijaya University as a world-class university.
                                  International Relation Office (IRO) also supports the strategic role of Vokasi UB in performing the Higher Education’s Tri Dharma to the International Level. It consists of Teaching, Research, and Community Engagement. The International Office try to implement these values into these activities that we are very proud to present to you :</p>
                                <ul>
                                  <li><b>Teaching :</b> Joint-Degree and Dual Degree, Twining Program, Joint-Teaching, Public Lecture, International Workshop, Seminar, and Training</li>
                                  <li><b>Research :</b> Joint-Research, Joint-Publication, International Journal, International Conference, International Student Conference, International Student Conference</li>
                                  <li><b>Community Engagement :</b> Industry Visit for International Student, Student Visit to University Abroad, Community empowerment, Social project</li>
                                </ul>
                              </div>
                              <br><br><br>

                         </div>
                    </div>
                    <br><br><br>
                    <div class="col-md-4 col-sm-12">
                        <div class="about-image">
                              <img src="<?= base_url() ?>/load_home/images/about-image.png" width="400px" height="400px" class="img-responsive" alt="">
                        </div>
                    </div>
               </div>
          </div>
     </section>


     <!-- BLOG -->
     <section id="blog" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Our News</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>
                    <?php
                          foreach($content as $key => $data){ ?>
                    <div class="col-md-6 col-sm-6">
                         <!-- BLOG THUMB -->
                         <div class="media blog-thumb">
                              <div class="media-object media-left">
                                   <a href="blog-detail.html"><img src="<?= base_url('konten/'.$data->image)?>" width="250" height="350"></a>
                              </div>
                              <div class="media-body blog-info">
                                   <small><i class="fa fa-clock-o"></i> <?=date_indo(date($data->tgl)); ?></small>
                                   <h3><a href="<?= base_url('blog/'.$data->id) ?>"><?=$data->judul?></a></h3>
                                   <small><i class="fa fa-pencil"></i> by: <?=$data->penulis; ?></small>
                                   <button class="btn section-btn" onclick="readMore(this)">
                                   <a href="<?= base_url('blog/'.$data->id) ?>">Read article</a>
                                   </button>
                              </div>
                         </div>
                    </div>
                    <?php } ?>
               </div>
          </div>
     </section>
     <!-- WORK -->
     <section id="work" data-stellar-background-ratio="0.5">
          <div class="container">
               <div class="row">

                    <div class="col-md-12 col-sm-12">
                         <div class="section-title">
                              <h2>Our Activities</h2>
                              <span class="line-bar">...</span>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb" width ="340px" height="340px">
                              <a href="<?= base_url() ?>/load_home/images/caro4.jpg" class="image-popup">
                                   <img src="<?= base_url() ?>/load_home/images/caro4.JPG" class="img-responsive"  >

                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb" width ="340px" height="340px">
                              <a href="<?= base_url() ?>/load_home/images/caro1.jpg" class="image-popup">
                                   <img src="<?= base_url() ?>/load_home/images/caro1.JPG" class="img-responsive" >

                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb" width ="340px" height="340px">
                              <a href="<?= base_url() ?>/load_home/images/caro2.jpg" class="image-popup">
                                   <img src="<?= base_url() ?>/load_home/images/caro2.JPG" class="img-responsive" width ="500px" height="500px" >
                              </a>
                         </div>
                    </div>

                    <div class="col-md-3 col-sm-6">
                         <!-- WORK THUMB -->
                         <div class="work-thumb" width ="320px" height="320px">
                              <a href="<?= base_url() ?>/load_home/images/caro3.jpg" class="image-popup">
                                   <img src="<?= base_url() ?>/load_home/images/caro3.JPG" class="img-responsive" >
                              </a>
                         </div>
                    </div>

               </div>
          </div>
     </section>
<?= $this->endSection() ?>

</body>
</html>
