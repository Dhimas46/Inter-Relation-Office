<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Course</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Course </h1>
    <?php if (in_groups('admin')) : ?>
      <div class="section-header-button">
        <a href="<?=site_url('course/add') ?>" class="btn btn-primary">Add New</a>
      </div>
    <?php endif; ?>
  </div>
  <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">

  </div>

  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Data Course</h4>
    </div>
    <div class="card-header">
    <form action="" method="get" autocomplete="off">
      <div class="float-left">
        <input type="text" value="<?= $keyword ?>" name="keyword" style="width:155pt;" placeholder="Search" class="form-control" >
      </div>
      <div class="float-right ml-2">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
      </div>
    </form>
  </div>
    <div class="card-body table-responsive">
      <table class="table table-striped table-md">
        <tbody><tr>
          <th>#</th>
          <th class="text-center">Title</th>
          <th class="text-center">Detail Course</th>
          <th class="text-center">Download</th>
          <?php if (in_groups('admin')) : ?>
          <th class="text-center">Action</th>
            <?php endif; ?>
        </tr>
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $no = 1 + (5 * ($page - 1));
        foreach($course as $key => $value) : ?>
        <tr>
          <td><?=$no++ ?></td>
          <td class="text-center"><?=$value->judul?></td>
          <td class="text-center"><a href="<?= site_url('course/details/'.$value->id_course) ?>" class="btn btn-success"></i>Detail</a></td>
          <td class="text-center" style="width:15%"><a class="btn btn-info" href="<?= base_url('dokumen/' .$value->dokumen) ?>">Download Course</a> </td>
          <?php if (in_groups('admin')) : ?>
            <td class="text-center" style="width:15%">
            <a href="<?= site_url('course/edit/'.$value->id_course) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <a id="btn-hapus" href="<?= site_url('course/hapus/'.$value->id_course) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>


          </td>
            <?php endif; ?>
        </tr>
      <?php endforeach; ?>

      </tbody>
    </table>
    <div class="float-left">
      <i>Showing <?=1 + (5 * ($page - 1))?> to <?=$no-1?> of <?=$pager->getTotal() ?> entries</i>
    </div>
    <div class="float-right">
      <?= $pager->links('default', 'pagination') ?>
    </div>
  </div>
</div>
</div>
</section>
<?= $this->endSection() ?>
