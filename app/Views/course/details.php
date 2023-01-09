
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Course</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">

  <div class="section-header">
    <div class="section-header-back">
          <a href="<?=site_url('course') ?>" class="btn"><i class="fas fa-arrow-left"></i></a>
      </div>
    <h1>Course </h1>
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
      <h4>Detail Course</h4>
    </div>
    <div class="card-body table-responsive">
      <div class="row">
        <div class="col-sm-12">
          <table class="table table-borderless" >
            <tr>
              <th width="60px">Title</th>
              <th width="30px">:</th>
              <td><?= $course->judul ?></td>
              <?php $originalDate = $course->tgl; ?>
              <th width="60px">Date</th>
              <th width="30px">:</th>
              <td><?=date_indo(date($course->tgl)); ?></td>
            </tr>
            <tr>
              <th width="60px">Writer</th>
              <th width="30px">:</th>
              <td><?= $course->pemilik ?></td>
              <th width="60px">Description</th>
              <th width="30px">:</th>
              <td><?= $course->deskripsi ?></td>
            </tr>


             <embed type="application/pdf" src="<?= base_url('dokumen/'.$course->dokumen)?>" width="1150" height="400">
            <!-- <iframe src="<?= base_url('dokumen/'.$course->dokumen)?>" width="" height=""></iframe> -->
          </table>
        </div>

      </div>
  </div>
</div>
</div>
</section>
<?= $this->endSection() ?>
