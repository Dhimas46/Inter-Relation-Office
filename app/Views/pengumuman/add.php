
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Upload Announcement</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <!-- Make sure you put this AFTER Leaflet's CSS -->

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
            <a href="<?=site_url('announcement') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
    <h1>Upload Announcement</h1>
    <div class="section-header-button">
    </div>
  </div>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Upload Announcement</h4>
    </div>
    <div id="flashError" data-flash="<?=session()->getFlashdata('error')?>">
    <div class="card-body col-md-12">
      <form action="<?= site_url('pengumuman/save') ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
        <?= csrf_field() ?>
        <div class="row">
          <div class="form-group col-md-4 col-12">
            <label>Title*</label>
            <input type="text" name="judul" class="form-control" required autofocus>
            <div class="invalid-feedback">
              Please fill in the Title
            </div>
          </div>
          <div class="form-group col-md-4 col-12">
            <label>Writer</label>
            <input type="text" value="<?= user()->fullname ?>" name="penulis" class="form-control" >
            <div class="invalid-feedback">
              Please fill in the Writer
            </div>
          </div>
          <div class="form-group col-md-4 col-12">
            <label>Author's Study Program</label>
            <input type="text" value="<?= user()->prodi ?>" name="prodi" class="form-control" required autofocus>
            <div class="invalid-feedback">
              Please fill in the Study Program
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Date*</label>
            <input type="date" value="<?=date('Y-m-d');?>" class="form-control" name="tgl" required autofocus>
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Description*</label>
          <textarea name="deskripsi" rows="8" class="form-control" cols="80" ></textarea>
        </div>
        </div>
        <div class="form-group">
          <div class="form-group col-md-6 col-12">
            <label>Announcement Image *Ukuran disarankan 600x400</label> <br>
            <label class="file-label"></label>
            <div class="col-sm-5">
            <img src="/news.jpg"  class="img-thumbnail img-preview" >
            </div>
            <input id="image" type="file" name="image" class="form-control" onchange="previewImg()">
            <div class="invalid-feedback">
              Please fill in the Profile Image
            </div>
          </div>
        <div>
          <div>
          <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>&nbspSave</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
      <br>
</div>
</div>
</section>
<?= $this->endSection() ?>
