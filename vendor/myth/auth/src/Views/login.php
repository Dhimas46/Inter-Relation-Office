
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/node_modules/bootstrap-social/bootstrap-social.css">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/style.css">
  <link rel="stylesheet" href="<?=base_url()?>/template/assets/css/components.css">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="<?=base_url()?>/template/assets/img/stisla.svg" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <br><span class="font-weight-bold">International Relation Office <br> Vokasi Universitas Brawijaya</span></h4>
            <p class="text-muted">Before you get started, you must login or register if you don't already have an account.</p>
            	<?= view('Myth\Auth\Views\_message_block') ?>
            <form method="post" action="<?= url_to('login') ?>" class="needs-validation" >
              <?= csrf_field() ?>
              <?php if ($config->validFields === ['email']): ?>
              <div class="form-group">
                <label for="login"><?=lang('Auth.email')?></label>
                <input id="email" type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
                 name="login" tabindex="1" placeholder="<?=lang('Auth.email')?>" required autofocus>
                 <div class="invalid-feedback">
   								<?= session('errors.login') ?>
   							</div>
              </div>
<?php else: ?>
  <div class="form-group">
    <label for="login"><?=lang('Auth.emailOrUsername')?></label>
    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>"
         name="login" placeholder="<?=lang('Auth.emailOrUsername')?>">
    <div class="invalid-feedback">
      <?= session('errors.login') ?>
    </div>
  </div>
<?php endif; ?>
              <div class="form-group">
                <div class="d-block">
                  	<label for="password"><?=lang('Auth.password')?></label>
                </div>
                <input id="password" type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"  placeholder="<?=lang('Auth.password')?>"required>
                <div class="invalid-feedback">
                  <?= session('errors.password') ?>
                </div>
              </div>

              <div class="form-group text-right">

                <button type="submit" class="btn btn-success btn-lg btn-icon icon-right" tabindex="4">
              <?=lang('Auth.loginAction')?>
                </button>
              </div>

            </form>
            <div class="text-center mt-5 ">
            <?php if ($config->allowRegistration) : ?>
            					<p><a href="<?= url_to('register') ?>"><?=lang('Auth.needAnAccount')?></a></p>
            <?php endif; ?>
          </div>
            <div class="text-center mt-5 text-small">
              Copyright &copy; Made with 💙 by Dhimas
              <div class="mt-2">
                <!-- <a href="#">Privacy Policy</a> -->
                <!-- <div class="bullet"></div> -->
                <!-- <a href="#">Terms of Service</a> -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?=base_url()?>/template/assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2">
            <div class="text-light p-5 pb-2">
              <div class="mb-5 pb-3">
                <h1 class="mb-2 display-4 font-weight-bold">Hello Everyone !</h1>
                <h5 class="font-weight-normal text-muted-transparent">Bali, Indonesia</h5>
              </div>
              Photo by <a class="text-light bb" target="_blank" href="https://unsplash.com/photos/a8lTjWJJgLA">Justin Kauffman</a> on <a class="text-light bb" target="_blank" href="https://unsplash.com">Unsplash</a>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->

    <!-- General JS Scripts -->
    <script src="<?=base_url()?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?=base_url()?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script> -->
    <script src="<?=base_url()?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->

    <!-- Template JS File -->
    <script src="<?=base_url()?>/template/assets/js/scripts.js"></script>
    <script src="<?=base_url()?>/template/assets/js/custom.js"></script>
  <!-- Page Specific JS File -->
</body>
</html>
