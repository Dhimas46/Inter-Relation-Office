
<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Details</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>

<section class="section">
  <div class="section-header">
    <h1>Profil</h1>

  </div>
  <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">

  </div>
  <div class="section-body">
          <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
              <div class="card profile-widget">
                <div class="profile-widget-header">
                  <img alt="image" src="<?= base_url('/image/'.$user->image); ?>" class="rounded-circle profile-widget-picture">
                </div>
                <div class="profile-widget-description">
                  <div class="profile-widget-name"><?= $user->username; ?>
                    <div class="text-muted d-inline font-weight-normal">
                      <div class="slash"></div>
                  <span class="badge badge-<?= ($user->name == 'admin')? 'danger' : 'dark' ?>"><?= $user->name?></span></div></div>
                  <ul class="list-group list-group-flush">
                  <?php if ($user->fullname): ?>
                     <li class="list-group-item">Fullname : <?= $user->fullname ?></li>
                  <?php endif; ?>
                   <li class="list-group-item">Email : <?= $user->email ?></li>
                   <li class="list-group-item">NIM : <?= $user->nim ?></li>
                   <li class="list-group-item">Phone : <?= $user->telp ?></li>
                   <?php $originalDate = $user->tgl_lahir?>
                   <li class="list-group-item">Born : <?= $user->tempat ?>, <?=date_indo(date($user->tgl_lahir)); ?></li>
                 </ul>

                 <form action="<?= site_url('admin/'.$user->userid) ?>" method="post" autocomplete="off" >
                   <div class="card-body">
                     <?= csrf_field() ?>
                     <input type="hidden" name="_method" value="PUT">
                     <div class="form-group">
                       <label>Change Role</label>
                       <select name="group_id" class="form-control">
                         <option value="<?= user()->name?>"> -- Chosee --</option>
                         <option value="1">Admin</option>
                         <option value="2">User</option>
                       </select>
                     </div>
                   </div>
                   <div class="card-footer text-right">
                    <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">&nbsp</i>Save</button>
                    <a href="<?=site_url('admin') ?>" class="btn btn-warning"><i class="fa fa-arrow-left" aria-hidden="true"></i>&nbspBack</a>
                   </div>

                 </form>
                 <!-- <form class="" action="index.html" method="post">
                   <div class="form-group text-right">


                 </form> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


           </div>
         </div>
<?= $this->endSection() ?>
