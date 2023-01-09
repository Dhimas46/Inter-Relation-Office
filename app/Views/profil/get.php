
<?= $this->extend('layout/default') ?>
 <?= $this->section('title') ?>
 <title>Details</title>
 <?= $this->endSection() ?>
<?= $this->section('content') ?>

<section class="section">
  <div class="section-header">
    <h1>Profile</h1>
  </div>
  <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">

  </div>
  <div class="section-body">
    <div class="row mt-sm-4">
      <div class="col-12 col-md-12 col-lg-5">
        <div class="card profile-widget">
          <div class="profile-widget-header">

                <img alt="image" src="<?= base_url('image/'.user()->image)?>" class="rounded-circle profile-widget-picture">

              <br>
            <div class="profile-widget-items">
              <div class="profile-widget-item">
            <div class="profile-widget-item-value">Hi, <?= $profil->fullname ?></div>
              </div>
            </div>
          </div>
          <div class="profile-widget-description">
            <div class="profile-widget-name"><?= $profil->username ?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div><?= $profil->prodi ?></div></div>
            <table class="table table-borderless " >
              <tr >
                <th>Email</th>
                <th >:</th>
                <td><?= $profil->email ?></td>
              </tr>
              <tr class="text-left">
                <th>Fullname</th>
                <th>:</th>
                <td><?= $profil->fullname ?></td>
              </tr>
              <tr >
                <th>Username</th>
                <th >:</th>
                <td><?= $profil->username ?></td>
              </tr>
              <tr>
                <th>NIM</th>
                <th>:</th>
                <td><?= $profil->nim ?></td>
              </tr>
              <tr>
                <th width="60px">Prodi</th>
                <th width="30px">:</th>
                <td><?= $profil->prodi ?></td>
              </tr>
              <tr>
                <th width="60px">Phone</th>
                <th width="30px">:</th>
                <td><?= $profil->telp ?></td>
              </tr>
              <tr>
                <th width="60px">Born</th>
                <th width="30px">:</th>
                <?php  $originalDate = $profil->tgl_lahir;  ?>
                <td><?= $profil->tempat ?>,&nbsp<?=date_indo(date($profil->tgl_lahir)); ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-12 col-lg-7">
        <div class="card">
          <form action="<?= site_url('profil/'.$profil->id) ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
            <div class="card-header">
              <h4>Edit Profile</h4>
            </div>
            <div class="card-body">
              <?= csrf_field() ?>
              <input type="hidden" name="_method" value="PUT">
              <input type="hidden" name="imageLama" value="<?= $profil->image?>">
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Full Name</label>
                    <input type="text" name="fullname" class="form-control" value="<?= $profil->fullname ?>">
                    <div class="invalid-feedback">
                      Please fill in the fullname
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-6 col-12">
                    <label>Username</label>
                    <input type="text" name="username" class="form-control" value="<?= $profil->username ?>" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in the NIM
                    </div>
                  </div>
                  <div class="form-group col-md-6 col-12">
                    <label>NIM</label>
                    <input type="text" name="nim" class="form-control" value="<?= $profil->nim ?>" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in the NIM
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label>Study Program</label>
                    <input type="text" name="prodi" class="form-control" value="<?= $profil->prodi ?>">
                    <div class="invalid-feedback">
                      Please fill in the NIM
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-7 col-12">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="<?= $profil->email ?>" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in the email
                    </div>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Phone</label>
                    <input type="tel" name="telp" class="form-control" value="<?= $profil->telp ?>" required autofocus>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-5 col-12">
                    <label>Place</label>
                    <input type="text" name="tempat" class="form-control" value="<?= $profil->tempat ?>" required autofocus>
                  </div>
                  <div class="form-group col-md-5 col-12">
                    <label>Date of Birth</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="<?= $profil->tgl_lahir ?>" required autofocus>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-md-12 col-12">
                    <label >Profile Image *Ukuran disarankan 500x500</label> <br>
                    <label class="file-label"></label>
                    <div class="col-sm-3">
                    <img src="<?= base_url('image/'.user()->image)?>"  class="img-thumbnail img-preview" >
                    </div>
                    <input id="image" type="file" name="image" class="form-control" value="<?= $profil->image ?>" onchange="previewImg()">
                    <div class="invalid-feedback">
                      Please fill in the Profile Image
                    </div>
                  </div>
                </div>
            </div>
            <div type="submit" class="card-footer text-right">
              <button class="btn btn-primary"><i class="fas fa-paper-plane"></i> &nbsp Save Changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
       </div>
<?= $this->endSection() ?>
