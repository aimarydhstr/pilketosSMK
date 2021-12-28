<form action="<?= base_url('kandidat/update/').$calon['id_calon'] ?>" enctype="multipart/form-data" method="post">

<section class="second-wrapper">

<div class="wrapper rd shadow block w-60">

<h3 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h3>

<div class="me-form">
  <label>Nama Siswa</label>
  <select class="shadow rd" required name="nis">
    <option disabled>Choose Student</option>
    <?php foreach ($siswa as $sw): ?>
    <option value="<?= $sw['nis'] ?>" <?php if($calon['nis'] == $sw['nis']){echo "selected";} ?>><?= $sw['nama_siswa'] ?></option>
    <?php endforeach ?>
  </select>
</div>

<div class="me-form">
  <label for="visi">Visi</label>
  <textarea class="shadow rd" required id="visi" name="visi" rows="6"><?= $calon['visi'] ?></textarea>
</div>

<div class="me-form">
  <label for="misi">Misi</label>
  <textarea class="shadow rd" required id="misi" name="misi" rows="6"><?= $calon['misi'] ?></textarea>
</div>

</div>

<div class="re-wrapper rd shadow block w-38">

<h3 class="shadow rd"><i class="fa fa-image"></i>Foto Siswa</h3>
  
<div class="me-form">

<label class="mx-0" for="foto">
<div class="up-img shadow" title="Upload Images">
  <img src="<?= base_url('assets/img/').$calon['foto'] ?>">
</div>
</label>

<input type="file" name="foto" id="foto">

</div>

<div class="me-form">
  <label for="moto">Motto</label>
  <textarea class="shadow rd" required id="moto" name="moto" rows="4"><?= $calon['moto'] ?></textarea>
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('kandidat') ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</section>

</form>
