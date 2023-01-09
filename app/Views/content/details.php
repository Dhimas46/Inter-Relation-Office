
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Content</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">

  <div class="section-header">
    <div class="section-header-back">
          <a href="<?=site_url('content') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
    <h1>Detail Content </h1>
  </div>
  <?php if(session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Success !</b>
        <?=session()->getFlashdata('success')?>
      </div>
    </div>
  <?php endif; ?>
  <?php if(session()->getFlashdata('error')) : ?>
    <div class="alert alert-danger alert-dismissible show fade">
      <div class="alert-body">
        <button class="close" data-dismiss="alert">x</button>
        <b>Error !</b>
        <?=session()->getFlashdata('error')?>
      </div>
    </div>
  <?php endif; ?>
  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Detail Content</h4>
    </div>
    <div class="card-body table-responsive">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-borderless" >

            <tr>
              <th width="60px">Description</th>
              <th width="90px">:</th>
              <td><?= $content->deskripsi ?></td>
            </tr>
            <tr>
              <th></th>
              <td></td>
            </tr>
            <tr>
              <th width="60px">Image</th>
              <th width="30px">:</th>
              <td><img width="310px" height="420px"src="<?= base_url('konten/'.$content->image); ?>"></td>
            </tr>

          </table>
        </div>

      </div>
  </div>
</div>
</div>
</section>
<?= $this->endSection() ?>
