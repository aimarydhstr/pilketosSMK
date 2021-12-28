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
<a class="shadow rd-5" href="<?= base_url('kandidat/add') ?>">Tambah Kandidat</a>
</h2>

<?= $this->session->flashdata('message') ?>

<?php if ($row < 1 && !$this->session->flashdata('message')): ?>

<div class="alert mx-15">Tidak Ada Data</div>

<?php else: ?>

<div class="grid-wrapper">
<?php $i = 0; foreach ($calon as $c): $i++; ?>

<article class="post shadow center">

<div class="img shadow rd"><img src="<?= base_url('assets/img/').$c['foto'] ?>" alt="<?= $c['nama_siswa'] ?>" title="<?= $c['nama_siswa'] ?>"></div>    
<h2><?= $c['nama_siswa'] ?></h2>
<p><?= $c['kelas']." ".$c['jurusan'] ?></p>
<div class="informasi">
<div class="inline-form">
<a class="link shadow waves-effect waves-light" href="<?= base_url('kandidat/edit/').$c['id_calon'] ?>">Edit</a>
<a class="link violets shadow waves-effect waves-light" href="<?= base_url('kandidat/delete/').$c['id_calon'] ?>">Delete</a>
</div>
</div>

</article>

<?php endforeach; ?>

</div>

<?php endif ?>

</div>

</section>