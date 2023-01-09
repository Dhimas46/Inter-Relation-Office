<li class="menu-header">Main Menu</li>


<!-- <li> <a href="<?= site_url('') ?>" class="nav-link"><i class="fas fa-home"></i><span>Home</span></a></li> -->

<li> <a href="<?= site_url('dashboard') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a></li>

<?php if (in_groups('admin')) : ?>
<li> <a href="<?= site_url('/userlist') ?>" class="nav-link"><i class="fas fa-users"></i><span>User List</span></a></li>
<?php endif; ?>
<li> <a href="<?= site_url('/course') ?>" class="nav-link"><i class="fas fa-graduation-cap"></i><span>Course</span></a></li>

<?php if (in_groups('user')) : ?>
<li> <a href="<?= site_url('announcement') ?>" class="nav-link"><i class="fas fa-bell"></i><span>Announcement</span></a></li>
<?php endif; ?>

<?php if (in_groups('admin')) : ?>
<li class="nav-item dropdown">
  <a href="#" class="nav-link has-dropdown"><i class="fas fa-upload"></i> <span>Uploads</span></a>
  <ul class="dropdown-menu">
    <li> <a href="<?= site_url('content') ?>" class="nav-link"><span>Content</span></a></li>
    <li> <a href="<?= site_url('pengumuman/add') ?>" class="nav-link"><span>Announcement</span></a></li>
    
  </ul>
</li>
<?php endif; ?>
  <!-- <li class="nav-item dropdown">
    <a href="#" class="nav-link has-dropdown"><i class="far fa-address-book"></i><span>Kontak</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link" href="<?=site_url('services') ?>">Add Coordinate</a></li>
    <li><a class="nav-link" href="">Kontak Saya</a></li>
  </ul>
</li> -->
<!-- <li class="nav-item dropdown">
  <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-envelope"></i> <span>Undangan</span></a>
  <ul class="dropdown-menu">
    <li><a class="nav-link" href="">Saya Mengundang</a></li>
    <li><a class="nav-link" href="">Saya Diundang</a></li>
  </ul>
</li> -->

</ul>
