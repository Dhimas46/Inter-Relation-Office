
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Edit Course</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <!-- Make sure you put this AFTER Leaflet's CSS -->

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
            <a href="<?=site_url('course') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
    <h1>Edit Course</h1>
    <div class="section-header-button">

    </div>
  </div>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Edit Course</h4>
    </div>

    <div class="card-body col-md-12">
      <form action="<?= site_url('course/'.$course->id_course) ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="dokumenLama" value="<?= $course->dokumen?>">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Title*</label>
            <input value="<?= $course->judul ?>" type="text" name="judul" class="form-control" required autofocus>
            <div class="invalid-feedback">
              Please fill in the Title
            </div>
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Writer</label>
            <input type="text" value="<?= $course->pemilik ?>" name="pemilik" class="form-control" >
            <div class="invalid-feedback">
              Please fill in the Writer
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Description*</label>
          <textarea name="deskripsi" rows="8" class="form-control" cols="80" ><?= $course->deskripsi?></textarea>
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Date</label>
          <input type="date" value="<?= $course->tgl?>" class="form-control" name="tgl" >
          </div>
        </div>
        <div class="form-group">
          <label class="file-label">Dokumen</label> <br>
          <span>Empty if you don't want to be replaced</span>
          <!-- <div class="col-sm-3">
            <img src="/image/default.png"  class="img-thumbnail img-preview" >
          </div> -->
          <!-- id="dokumen"
    onchange="previewDoc()" -->
        <input type="file" value="<?= $course->dokumen?>"  class="form-control" name="dokumen">
        </div>

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
