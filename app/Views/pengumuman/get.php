
<?= $this->extend('layout/default') ?>
<?= $this->section('title') ?>
<title>Data Announcement</title>
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<style type="text/css">
h2 {
    color:#6777ef;
}
.nama {
    color:#6777ef;
}
</style>
<section class="section">
  <div class="section-header">
    <h1>Announcement</h1>
    &nbsp&nbsp&nbsp&nbsp
    <form action="" method="get" autocomplete="off">
      <div class="float-left">
        <input type="text" value="<?= $keyword ?>" name="keyword" style="width:155pt;" placeholder="Search" class="form-control" >
      </div>
      <div class="float-right ml-2">
        <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
      </div>
    </form>
  </div>
    <div id="flash" data-flash="<?=session()->getFlashdata('success')?>">
    </div>
    <div class="card-body">
  <?php
  $page = isset($_GET['page']) ? $_GET['page'] : 1;
  $no = 1 + (3 * ($page - 1));
  $no = 3;
  $bootstrapColWidth = 12 / $no ;
  $arrayChunks = array_chunk($pengumuman, $no);
  foreach($arrayChunks as $row) {
       echo '<div class="row">';
       foreach($pengumuman as $row) {
       echo '<div class="col-md-'.$bootstrapColWidth.'">';
             ?>
          <article class="article article-style-c">
            <div class="article-header">
              <div class="article-image" data-background="<?= base_url('pengumuman_data/'.$row->image); ?>">
              </div>
            </div>
            <div class="article-details">
            <?php $originalDate = $row->tgl; ?>
              <div class="article-category"><a>News</a> <div class="bullet"></div> <a><?=date_indo(date($row->tgl));?></a></div>
              <div class="article-title">
                <h2><a><?= $row->judul?>
              </a></h2>
              </div>
              <p><?= $row->deskripsi ?></p>
              <div class="article-user">
                <!-- <img alt="image" src="<?= base_url('/image/'.user()->image); ?>"> -->
                <div class="article-user-details">
                  <div class="user-detail-name nama">
                    <a><?= $row->penulis ?></a>
                  </div>
                  <div class="row">
                    <div class="col md-12 lg-12">
                      <div class="text-job"><?= $row->prodi?></div>
                      <div class="float-right">
                        <div class="row">
                        <?php if (in_groups('admin')) : ?>
                          <a href="<?= base_url('pengumuman/' .$row->id); ?>" class="btn btn-warning btn-sm col-md 12"><i class="fas fa-pencil-alt"></i></a>
                          &nbsp&nbsp
                          <a id="btn-hapus" href="<?= base_url('deletepengumuman/' .$row->id); ?>" class="btn btn-danger btn-sm col-md 12"><i class="fas fa-trash-alt"></i></a>
                        </div>
                      </div>
                      <?php endif; ?>
                    </div>
                  </div>
                </div>
              </div>
            </article>
            <?php
            echo '</div>';
          }
          echo '</div>';
      }
      ?>
      <div class="float-left">
        <i>Showing <?=1 + (3 * ($page - 1))?> to <?=$no-1?> of <?=$pager->getTotal() ?> entries</i>
      </div>
      <div class="float-right">
        <?= $pager->links('default', 'pagination') ?>
      </div>
  </div>
</div>
</div>
</section>
<?= $this->endSection() ?>
