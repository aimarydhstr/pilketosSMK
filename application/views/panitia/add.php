<form action="<?= base_url('panitia/save') ?>" enctype="multipart/form-data" method="post">

<section class="second-wrapper">

<div class="wrapper rd shadow block w-60">

<h3 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h3>

<div class="me-form">
  <label>Nama Siswa</label>
  <select class="shadow rd" required name="nis">
    <option selected disabled>Choose Student</option>
    <?php foreach ($siswa as $sw): ?>
    <option value="<?= $sw['nis'] ?>"><?= $sw['nama_siswa'] ?></option>
    <?php endforeach ?>
  </select>
</div>

<div class="me-form">
  <label for="username">Username</label>
  <input type="text" class="shadow rd" required id="username" name="username">
</div>

<div class="me-form">
  <label for="password1">Password</label>
  <input type="password" class="shadow rd" required id="password1" name="password1">
</div>

<div class="me-form">
  <label for="password2">Repeat Password</label>
  <input type="password" class="shadow rd" required id="password2" name="password2">
</div>

</div>

<div class="re-wrapper rd shadow block w-38">

<h3 class="shadow rd"><i class="fa fa-image"></i>Profil Siswa</h3>
  
<div class="me-form">

<label class="mx-0" for="Profil">
<div class="up-img shadow" title="Upload Images">
  <img src="<?= base_url('assets/img/noimage.png') ?>">
</div>
</label>

<input type="file" name="profil" id="Profil">

</div>

<div class="me-form">
  <label>Role</label>
  <select class="shadow rd" required name="role">
    <option value="2">Panitia</option>
    <option value="1">Admin</option>
  </select>
</div>

<div class="me-form">
  <label>Status</label>
  <select class="shadow rd" required name="status">
    <option value="1">Aktif</option>
    <option value="0">Tidak Aktif</option>
  </select>
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('panitia') ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</section>

</form>
