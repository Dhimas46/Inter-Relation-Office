
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Edit Content</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
  <!-- Make sure you put this AFTER Leaflet's CSS -->

<section class="section">
    <div class="section-header">
      <div class="section-header-back">
            <a href="<?=site_url('content') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
        </div>
    <h1>Edit Content</h1>
    <div class="section-header-button">

    </div>
  </div>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Edit Content</h4>
    </div>

    <div class="card-body col-md-12">
      <form action="<?= site_url('content/'.$content->id) ?>" enctype="multipart/form-data" method="post" autocomplete="off" >
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="imageLama" value="<?= $content->image?>">
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Title*</label>
            <input type="text" value="<?= $content->judul ?>" name="judul" class="form-control" required autofocus>
            <div class="invalid-feedback">
              Please fill in the Title
            </div>
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Writer</label>
            <input type="text" value="<?= $content->penulis?>" name="penulis" class="form-control" >
            <div class="invalid-feedback">
              Please fill in the Writer
            </div>
          </div>
        </div>
        <div class="row">
          <div class="form-group col-md-6 col-12">
            <label>Date*</label>
            <input type="date" value="<?= $content->tgl?>" class="form-control" name="tgl" required autofocus>
          </div>
          <div class="form-group col-md-6 col-12">
            <label>Description*</label>
          <textarea name="deskripsi" rows="8" class="form-control" cols="80" ><?= $content->deskripsi?></textarea>
        </div>
        </div>
        <div class="form-group">
          <div class="form-group col-md-6 col-12">
            <label>Content Image *Ukuran disarankan 600x400</label> <br>
            <label class="file-label"></label>
            <div class="col-sm-5">
            <img src="<?= base_url('konten/'.$content->image)?>"  class="img-thumbnail img-preview" >
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
