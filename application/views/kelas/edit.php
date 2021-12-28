<section class="second-wrapper">

<form action="<?= base_url('kelas/update/').$kelas['id_kelas'] ?>" method="post">

<div class="wrapper rd shadow block">

<h2 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h2>

<div class="inline-form mx-15">

<div class="me-form" style="width:100px;margin:0">
  <select name="kelas" class="shadow rd">
    <option <?php if ($kelas['kelas']=="X"){echo "selected";} ?> value="X">X</option>
    <option <?php if ($kelas['kelas']=="XI"){echo "selected";} ?> value="XI">XI</option>
    <option <?php if ($kelas['kelas']=="XII"){echo "selected";} ?> value="XII">XII</option>
    <option <?php if ($kelas['kelas']=="Guru"){echo "selected";} ?> value="Guru">Guru</option>
  </select>
</div>

<div class="me-form" style="width:calc(100% - 100px);margin:0">
  <input class="shadow rd" type="text" id="jurusan" required name="jurusan" placeholder="Jurusan" value="<?= $kelas['jurusan'] ?>">
</div>

</div>

<div class="me-form">
  <label>Token Kelas</label>
  <input class="shadow rd" type="text" id="token" required name="token" placeholder="Token 8 karakter" value="<?= $kelas['token'] ?>">
</div>

<div class="me-form">
	<label>Sesi</label>
  <select name="is_active" class="shadow rd">
    <option <?php if ($kelas['is_active']=="0"){echo "selected";} ?> value="0">Start</option>
    <option <?php if ($kelas['is_active']=="1"){echo "selected";} ?> value="1">Aktif</option>
    <option <?php if ($kelas['is_active']=="2"){echo "selected";} ?> value="2">Selesai</option>
  </select>
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('kelas') ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</form>

</section>