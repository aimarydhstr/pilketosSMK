<section class="out-wrapper green">

<div class="login">
<main class="login-wrapper rd shadow-l">

<form action="<?= base_url('auth/login') ?>" method="post">
  <h2 class="green rd shadow"><?= $title ?></h2>
  <?php if ($this->session->flashdata('message')): ?>
   
  <?= $this->session->flashdata('message'); ?>
  
  <?php else: ?>
    
  <div class="alert">Silahkan Login Terlebih Dulu</div>

  <?php endif ?>

  <div class="my-form">
    <input class="rd shadow" type="text" required name="username" placeholder="Username">
  </div>
  <div class="my-form">
    <input class="rd shadow" type="password" required name="password" placeholder="Password">
  </div>
  
  <div class="inline-form">
    <button type="reset" class="btn-one greens rd shadow waves-effect">Reset</button>
    <button class="btn-one green rd shadow waves-effect waves-light" type="submit">Submit</button>
  </div>
</form>

</main>
</div>

<p class="hak center my" style="color:#fff;margin-top:10px">Powered by Rekayasa Perangkat Lunak</p>

</section>