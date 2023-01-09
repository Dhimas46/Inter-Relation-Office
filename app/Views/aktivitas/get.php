
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Activities</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<section class="section">
  <div class="section-header">
    <h1>Upload Activities</h1>
    <?php if (in_groups('admin')) : ?>
      <div class="section-header-button">
        <a href="<?=site_url('aktivitas/add') ?>" class="btn btn-primary">Add New</a>
      </div>
    <?php endif; ?>
  </div>
  <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">

  </div>

  <div class="section-body">
    <div class="card">
    <div class="card-header">
      <h4>Data Activities</h4>
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
          <th>Title</th>
          <th>Image </th>
          <th class="text-center">Action</th>
        </tr>
        <?php
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $no = 1 + (5 * ($page - 1));
         foreach($aktivitas as $key => $value) :
           ?>
        <tr>
          <td><?=$no++ ?></td>
          <td><?=$value->judul?></td>
          <td><img src="<?= base_url('activities/'.$value->image)?>" width="240px" height="200px"></td>
          <td class="text-center" style="width:15%">
            <a href="<?= site_url('editact/'.$value->id) ?>" class="btn btn-warning btn-sm"><i class="fas fa-pencil-alt"></i></a>
            <a id="btn-hapus" href="<?= site_url('hapusact/'.$value->id) ?>" class="btn btn-danger btn-sm"><i class="fas fa-trash-alt"></i></a>
          </td>
          <!-- <form id="btn-hapus" class="d-inline" action="<?= site_url('content/'.$value->id) ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="_method" value="DELETE">
            <button  class="btn btn-danger btn-sm">
              <i class="fas fa-trash-alt"></i>
            </button>
          </form> -->
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
