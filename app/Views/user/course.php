
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Course</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Data Course</h1>
    <div class="section-header-button">
    <!-- <a href="<?=site_url('sensor/add') ?>" class="btn btn-primary">Add New</a> -->

    </div>
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
      <h4>Data Course</h4>
    </div>
    <div class="card-body table-responsive">
      <table class="table table-striped table-md">
        <tbody><tr>
          <th>#</th>
          <th>Judul</th>
          <th>Deskripsi</th>
          <th>Dokumen</th>
        </tr>
        <?php $i = 1; ?>
        <?php foreach($course as $value) : ?>
        <tr>
          <td><?= $i++; ?></td>
          <td><?=$value->judul?></td>
          <td><?=$value->deskripsi?></td>
          <th><?=$value->dokumen?></th>

            </form>

        </tr>
      <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</div>
</div>
</section>
<?= $this->endSection() ?>
