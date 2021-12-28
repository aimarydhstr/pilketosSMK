<section class="out-wrapper">

<div class="login">
<main class="login-wrapper rd shadow-l">

<form action="<?= base_url('auth') ?>" method="post">
  <h2 class="rd shadow"><?= $title ?></h2>
  <?php if ($this->session->flashdata('message')): ?>
   
  <?= $this->session->flashdata('message'); ?>
  
  <?php else: ?>
    
  <div class="alert">Silahkan Login Terlebih Dulu</div>

  <?php endif ?>

  <div class="my-form">
    <input class="rd shadow" type="number" required name="nis" placeholder="NIS">
  </div>
  <div class="my-form">
    <input class="rd shadow" type="date" required name="tgl_lahir">
  </div>
  <div class="my-form">
    <input class="rd shadow" type="text" required name="token" placeholder="Token anda">
  </div>
  <div class="inline-form">
    <button type="reset" class="btn-two rd shadow waves-effect">Reset</button>
    <button class="btn-one rd shadow waves-effect waves-light" type="submit">Submit</button>
  </div>
</form>


</main>
</div>

<p class="hak center my" style="color:#fff;margin-top:10px">Powered by Rekayasa Perangkat Lunak</p>

</section>