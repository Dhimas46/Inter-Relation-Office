
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Upload Activities</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <!-- Make sure you put this AFTER Leaflet's CSS -->

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
            <a href="<?=site_url('aktivitas') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
    <h1>Upload Activities</h1>
    <div class="section-header-button">
    </div>
  </div>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Upload Activities</h4>
    </div>
    <div id="flashError" data-flash="<?=session()->getFlashdata('error')?>">
    </div>
    <div class="card-body col-md-12">
      <form action="<?= site_url('aktivitas') ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
        <?= csrf_field() ?>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Title*</label>
            <input type="text" name="judul" class="form-control" required autofocus>
            <div class="invalid-feedback">
              Please fill in the Title
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="form-group col-md-6 col-12">
            <label>Content Image *Photo content suggested portrait</label> <br>
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
