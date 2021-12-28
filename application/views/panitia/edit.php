<form action="<?= base_url('panitia/update/').$akun['username'] ?>" enctype="multipart/form-data" method="post">

<section class="second-wrapper">

<div class="wrapper rd shadow block w-60">

<h3 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h3>

<div class="me-form">
  <label>Nama Siswa</label>
  <select class="shadow rd" required name="nis">
    <option disabled>Choose Student</option>
    <?php foreach ($siswa as $sw): ?>
    <option value="<?= $sw['nis'] ?>" <?php if($akun['nis'] == $sw['nis']){echo "selected";} ?>><?= $sw['nama_siswa'] ?></option>
    <?php endforeach ?>
  </select>
</div>

<div class="me-form">
  <label for="username">Username</label>
  <input type="text" class="shadow rd" required id="username" name="username" value="<?= $akun['username'] ?>">
</div>

<div class="me-form">
  <label>Role</label>
  <select class="shadow rd" required name="role">
    <option value="2" <?php if($akun['id_role']==2){echo "selected";} ?>>Panitia</option>
    <option value="1" <?php if($akun['id_role']==1){echo "selected";} ?>>Admin</option>
  </select>
</div>

</div>

<div class="re-wrapper rd shadow block w-38">

<h3 class="shadow rd"><i class="fa fa-image"></i>Profil Siswa</h3>
  
<div class="me-form">

<label class="mx-0" for="profil">
<div class="up-img shadow" title="Upload Images">
  <img src="<?= base_url('assets/img/').$akun['profil'] ?>">
</div>
</label>

<input type="file" name="profil" id="profil">

</div>

<div class="me-form">
  <label>Status</label>
  <select class="shadow rd" required name="status">
    <option value="1" <?php if($akun['status']==1){echo "selected";} ?>>Aktif</option>
    <option value="0" <?php if($akun['status']==0){echo "selected";} ?>>Tidak Aktif</option>
  </select>
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('panitia') ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</section>

</form>
