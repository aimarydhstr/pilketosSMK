<form action="<?= base_url('siswa/save/'.$id_kelas) ?>" method="post">

<section class="second-wrapper">

<div class="wrapper rd shadow block w-60">

<h3 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h3>
  
<div class="me-form">
  <label for="NIS">NIS</label>
  <input class="shadow rd" type="number" required min="0" id="NIS" name="nis">
</div>

<div class="me-form">
  <label for="nama">Nama Siswa</label>
  <input class="shadow rd" type="text" id="nama" required name="nama_siswa">
</div>

<div class="me-form">
  <label for="tgl_lahir">Tanggal Lahir</label>
  <input class="shadow rd" type="date" id="tgl_lahir" required name="tgl_lahir">
</div>

<div class="me-form">
  <label for="tempat_lahir">Tempat Lahir</label>
  <input class="shadow rd" type="text" id="tempat_lahir" required name="tempat_lahir">
</div>

</div>


<div class="re-wrapper rd shadow block w-38">

<h3 class="shadow rd"><i class="fa fa-toggle-on"></i>Jenis Kelamin</h3>
  
<div class="me-form">
  <div class="pemisah">
  <div class="radio shadow rd-5 green waves-effect waves-light">
    <input type="radio" id="laki" required name="jenis_kelamin" value="Laki - Laki">
    <label for="laki" title="Laki - Laki">Laki - Laki</label>
  </div>
  <div class="radio shadow rd-5 blue waves-effect waves-light">
    <input type="radio" id="perempuan" required name="jenis_kelamin" value="Perempuan">
    <label for="perempuan" title="Perempuan">Perempuan</label>
  </div>
  </div>
</div>

<div class="me-form">
  <label>Kelas</label>
  <select required class="shadow rd" name="id_kelas">
    <option disabled>Choose Class</option>
    <?php foreach ($kelas as $kl): ?>
    <option value="<?= $kl['id_kelas'] ?>" <?php if($kl['id_kelas'] == $id_kelas){echo "selected";} ?>><?= $kl['kelas']." ".$kl['jurusan'] ?></option>
    <?php endforeach; ?>
  </select>
</div>

<div class="me-form">
  <label>Status</label>
  <select required class="shadow rd" name="ikut">
    <option value="1">Pemilih</option>
    <option value="0">Bukan Pemilih</option>
    <option value="2">Otoritas</option>
  </select>
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('siswa/daftar/'.$id_kelas) ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</section>

</form>