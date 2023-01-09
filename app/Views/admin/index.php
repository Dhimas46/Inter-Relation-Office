
<?= $this->extend('/layout/default') ?>
 <?= $this->section('title') ?>
 <title>Admin</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
         <div class="section-header">
           <h1>Dashboard Admin</h1>
         </div>
         <div class="row">
           <div class="col-lg-8 col-md-12 col-12 col-sm-12">
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

             </div>
           </div>

         </div>
<?= $this->endSection() ?>
