<section class="second-wrapper">

<div class="wrapper rd shadow block w-100">

<h2 class="rd shadow">

<?php 

$q = "SELECT * FROM navigasi WHERE nav_name = '$title'";
$w = "SELECT * FROM sub_navigasi WHERE sub_nav_name = '$title'";
$z = $this->db->query($w)->row_array();
$d = $this->db->query($w)->num_rows();
$r = $this->db->query($q)->num_rows();
$v = $this->db->query($q)->row_array();

if ($r < 1 && $d > 0):
?>
<i class="<?= $z['sub_nav_icon'] ?>"></i>
<?php elseif ($r > 0 && $d < 1): ?>
<i class="<?= $v['nav_icon'] ?>"></i>
<?php else: ?>
<i class="fa fa-toggle-on"></i>
<?php endif; ?>
<?= $title ?>
<a class="rd-5 waves-effect" href="<?= base_url('siswa/add/').$id_kelas ?>" title="Tambah siswa">Tambah siswa</a>

</h2>

<?= $this->session->flashdata('message') ?>

<?php if ($row < 1 && !$this->session->flashdata('message')): ?>

<div class="alert mx-15">Tidak Ada Data</div>

<?php else: ?>

<?php $i = 0; foreach ($siswa as $pd): $i++?>
<div class="list shadow rd">
  <p class="number rd-100 shadow"><?= $i ?></p>
  <h3 class="title"><?= $pd['nama_siswa'] ?></h3>
  <?php if ($pd['ikut'] == 2):?>
  <span title="Tidak Ikut Memilih" class="rd-5 shadow green"><i class="fa fa-star"></i></span>
  <?php elseif ($pd['ikut'] == 0):?>
  <span title="Tidak Ikut Memilih" class="rd-5 shadow red"><i class="fa fa-times"></i></span>
  <?php endif; ?>
  <p><?= $pd['tempat_lahir'].", ".date('d F Y', strtotime($pd['tgl_lahir'])) ?></p>
  <a class="rd-5 shadow waves-effect waves-light" href="<?= base_url('siswa/edit/'.$pd['nis']) ?>" title="Edit siswa">Edit</a>
  <a onclick="return confirm('Hapus siswa ini?')" class="delete rd-5 shadow waves-effect" href="<?= base_url('siswa/delete/'.$pd['id_kelas'].'/'.$pd['nis']) ?>" title="Delete siswa">Delete</a>
</div>
<?php endforeach ?>

<?php endif ?>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('siswa') ?>">Back</a>
</div>

</section>