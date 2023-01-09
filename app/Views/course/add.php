
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Upload Course</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <!-- Make sure you put this AFTER Leaflet's CSS -->

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
            <a href="<?=site_url('course') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
    <h1>Upload Course</h1>
    <div class="section-header-button">

    </div>
  </div>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Upload Course</h4>
    </div>
    <div id="flashError" data-flash="<?=session()->getFlashdata('error')?>">
    </div>
    <div class="card-body col-md-12">
      <form action="<?= site_url('course/save') ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
        <?= csrf_field() ?>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Title*</label>
            <input type="text" name="judul" class="form-control" required autofocus>
            <div class="invalid-feedback">
              Please fill in the Title
            </div>
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Writer</label>
            <input type="text" value="<?= user()->fullname ?>" name="pemilik" class="form-control" >
            <div class="invalid-feedback">
              Please fill in the Writer
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Deskripsi *</label>
          <textarea name="deskripsi" rows="8" class="form-control" cols="80" required autofocus></textarea>
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Tanggal</label>
          <input type="date" value="<?=date('Y-m-d');?>" class="form-control" name="tgl" >
          </div>
        </div>
        <div class="form-group">
          <label class="file-label">Dokumen</label>
          <!-- <div class="col-sm-3">
            <img src="/image/default.png"  class="img-thumbnail img-preview" >
          </div> -->
          <!-- id="dokumen"
    onchange="previewDoc()" -->
        <input type="file"  class="form-control" name="dokumen"  required autofocus>
        </div>
        <!-- <div class="form-group">
          <label>Jumlah</label>
        <input type="number" class="form-control" name="jumlah_download" >
        </div> -->
        <div>
          <div>
          <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i>Save</button>
          <button type="reset" class="btn btn-secondary">Reset</button>
        </div>
      </form>
      <br>
</div>
</div>
</section>
<?= $this->endSection() ?>
