<form action="<?= base_url('siswa/update/'.$siswa['id_kelas'].'/'.$siswa['nis']) ?>" method="post">

<section class="second-wrapper">

<div class="wrapper rd shadow block w-60">

<h3 class="shadow rd"><i class="fa fa-edit"></i><?= $title ?></h3>
  
<div class="me-form">
  <label for="NIS">NIS</label>
  <input class="shadow rd" type="number" required min="0" id="NIS" name="nis" value="<?= $siswa['nis'] ?>">
</div>

<div class="me-form">
  <label for="nama">Nama Siswa</label>
  <input class="shadow rd" type="text" id="nama" required name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>">
</div>

<div class="me-form">
  <label for="tgl_lahir">Tanggal Lahir</label>
  <input class="shadow rd" type="date" id="tgl_lahir" required name="tgl_lahir" value="<?= $siswa['tgl_lahir'] ?>">
</div>

<div class="me-form">
  <label for="tempat_lahir">Tempat Lahir</label>
  <input class="shadow rd" type="text" id="tempat_lahir" required name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>">
</div>

</div>


<div class="re-wrapper rd shadow block w-38">

<h3 class="shadow rd"><i class="fa fa-toggle-on"></i>Jenis Kelamin</h3>
  
<div class="me-form">
  <div class="pemisah">
  <div class="radio shadow rd-5 green waves-effect waves-light">
    <input type="radio" id="laki" required name="jenis_kelamin" value="Laki - Laki" <?php if($siswa['jenis_kelamin']=="Laki - Laki") {echo "checked";}?>>
    <label for="laki" title="Laki - Laki">Laki - Laki</label>
  </div>
  <div class="radio shadow rd-5 blue waves-effect waves-light">
    <input type="radio" id="perempuan" required name="jenis_kelamin" value="Perempuan" <?php if($siswa['jenis_kelamin']=="Perempuan") {echo "checked";}?>>
    <label for="perempuan" title="Perempuan">Perempuan</label>
  </div>
  </div>
</div>

<div class="me-form">
  <label>Kelas</label>
  <select required class="shadow rd" name="id_kelas">
    <option disabled>Choose Class</option>
    <?php foreach ($kelas as $kl): ?>
    <option value="<?= $kl['id_kelas'] ?>" <?php if($kl['id_kelas'] == $siswa['id_kelas']){echo "selected";} ?>><?= $kl['kelas']." ".$kl['jurusan'] ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div class="me-form">
  <label>Status</label>
  <select required class="shadow rd" name="ikut">
    <option <?php if($siswa['ikut']=="1") {echo "selected";}?> value="1">Pemilih</option>
    <option <?php if($siswa['ikut']=="0") {echo "selected";}?> value="0">Bukan Pemilih</option>
    <option <?php if($siswa['ikut']=="2") {echo "selected";}?> value="2">Otoritas</option>
  </select>
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('siswa/daftar/'.$siswa['id_kelas']) ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</section>

</form>