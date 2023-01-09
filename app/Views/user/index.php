
<?= $this->extend('/layout/default') ?>
 <?= $this->section('title') ?>
 <title>Dashboard</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
<style media="screen">
h3{
  color : #fff;
}

h4{
  color : #fff;
}
</style>
<section class="section">
         <div class="section-header">
           <h1>Dashboard</h1>
         </div>
         <div class="col-lg-12 col-md-12 col-12 col-sm-12 bg-dark">
           <div class="card bg-dark">
             <div class="card-body bg-dark">
                 <div class="col-12">
                     <h4>Welcome, <?= user()->username ?> !</h4>
                     <h6>You almost arrived, complete the information about your account to complete registration</h6>
                     <br>
                     <a href="<?=base_url('profil/'.user()->id) ?>" class="btn btn-success"><i class="fas fa-user">&nbsp</i>Setup Account</a>
                 </div>
             </div>
           </div>
         </div>
         <div class="row">
           <?php if (in_groups('admin')) : ?>
           <div class="col-lg-6 col-md-6 col-sm-6 col-12">
             <div class="card card-statistic-1">
               <div class="card-icon bg-primary">
                 <i class="fas fa-users"></i>
               </div>
               <div class="card-wrap">
                 <div class="card-header">
                   <h4>User</h4>
                 </div>
                 <div class="card-body">
                   <?=countData('users') ?>
                 </div>
               </div>
             </div>
           </div>
         <?php endif; ?>
         <?php if (in_groups('admin')) : ?>
         <div class="col-lg-6 col-md-6 col-sm-6 col-12">
           <div class="card card-statistic-1">
             <div class="card-icon bg-danger">
               <i class="fas fa-file"></i>
             </div>
             <div class="card-wrap">
               <div class="card-header">
                 <h4>Content</h4>
               </div>
               <div class="card-body">
                 <?=countData('content') ?>
               </div>
             </div>
           </div>
         </div>
       <?php endif; ?>
           <div class="col-lg-6 col-md-6 col-sm-6 col-12">
             <div class="card card-statistic-1">
               <div class="card-icon bg-success">
                 <i class="fas fa-graduation-cap"></i>
               </div>
               <div class="card-wrap">
                 <div class="card-header">
                   <h4>Available Courses</h4>
                 </div>
                 <div class="card-body">
                   <?=countData('course') ?>
                 </div>
               </div>
             </div>
           </div>
           <div class="col-lg-6 col-md-6 col-sm-6 col-12">
             <div class="card card-statistic-1">
               <div class="card-icon bg-info">
                 <i class="fas fa-bell"></i>
               </div>
               <div class="card-wrap">
                 <div class="card-header">
                   <h4>Announcement</h4>
                 </div>
                 <div class="card-body">
                   <?=countData('pengumuman') ?>
                 </div>
               </div>
             </div>
           </div>
           <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-12">
             <div class="card card-statistic-1">
               <div class="card-icon bg-warning">
                 <i class="far fa-file"></i>
               </div>
               <div class="card-wrap">
                 <div class="card-header">
                   <h4>Available Courses</h4>
                 </div>
                 <div class="card-body">
                   1,201
                 </div>
               </div>
             </div>
           </div>
           <div class="col-lg-3 col-md-6 col-sm-6 col-12">
             <div class="card card-statistic-1">
               <div class="card-icon bg-danger">
                 <i class="fas fa-circle"></i>
               </div>
               <div class="card-wrap">
                 <div class="card-header">
                   <h4>Online Users</h4>
                 </div>
                 <div class="card-body">
                   47
                 </div>
               </div>
             </div>
           </div> -->
         </div>
         <div class="row">
           <!-- <div class="col-lg-8 col-md-12 col-12 col-sm-12">
             <div class="card">
               <div class="card-header">
                 <h4>Statistics</h4>
                 <div class="card-header-action">
                   <div class="btn-group">
                     <a href="#" class="btn btn-primary">Week</a>
                     <a href="#" class="btn">Month</a>
                   </div>
                 </div>
               </div>
               <div class="card-body">
                 <canvas id="myChart" height="182"></canvas>
                 <div class="statistic-details mt-sm-4">
                   <div class="statistic-details-item">
                     <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 7%</span>
                     <div class="detail-value">$243</div>
                     <div class="detail-name">Today's Sales</div>
                   </div>
                   <div class="statistic-details-item">
                     <span class="text-muted"><span class="text-danger"><i class="fas fa-caret-down"></i></span> 23%</span>
                     <div class="detail-value">$2,902</div>
                     <div class="detail-name">This Week's Sales</div>
                   </div>
                   <div class="statistic-details-item">
                     <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span>9%</span>
                     <div class="detail-value">$12,821</div>
                     <div class="detail-name">This Month's Sales</div>
                   </div>
                   <div class="statistic-details-item">
                     <span class="text-muted"><span class="text-primary"><i class="fas fa-caret-up"></i></span> 19%</span>
                     <div class="detail-value">$92,142</div>
                     <div class="detail-name">This Year's Sales</div>
                   </div>
                 </div>
               </div>
             </div>
           </div> -->
           <!-- <div class="col-lg-4 col-md-12 col-12 col-sm-12">
             <div class="card">
               <div class="card-header">
                 <h4>Our Team</h4>
               </div>
               <div class="card-body">
                 <ul class="list-unstyled list-unstyled-border">
                   <li class="media">
                     <img class="mr-3 rounded-circle" width="50" src="<?=base_url()?>/template/assets/img/avatar/avatar-1.png" alt="avatar">
                     <div class="media-body">
                       <div class="float-right text-primary">Now</div>
                       <div class="media-title">M. Dzikrul Hakim</div>
                       <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                     </div>
                   </li>
                   <li class="media">
                     <img class="mr-3 rounded-circle" width="50" src="<?=base_url()?>/template/assets/img/avatar/avatar-2.png" alt="avatar">
                     <div class="media-body">
                       <div class="float-right">12m</div>
                       <div class="media-title">Dhimas Wahyu Prayogi</div>
                       <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                     </div>
                   </li>
                   <li class="media">
                     <img class="mr-3 rounded-circle" width="50" src="<?=base_url()?>/template/assets/img/avatar/avatar-3.png" alt="avatar">
                     <div class="media-body">
                       <div class="float-right">17m</div>
                       <div class="media-title">Stefanus Edelweis Semigna Lo</div>
                       <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                     </div>
                   </li>
                   <li class="media">
                     <img class="mr-3 rounded-circle" width="50" src="<?=base_url()?>/template/assets/img/avatar/avatar-4.png" alt="avatar">
                     <div class="media-body">
                       <div class="float-right">21m</div>
                       <div class="media-title">M. Rifqy Andiraja Djamil</div>
                       <span class="text-small text-muted">Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.</span>
                     </div>
                   </li>
                 </ul>
                 <div class="text-center pt-1 pb-1">
                   <a href="#" class="btn btn-primary btn-lg btn-round">
                     View All
                   </a>
                 </div>
               </div>
             </div>
           </div> -->
         </div>
<?= $this->endSection() ?>