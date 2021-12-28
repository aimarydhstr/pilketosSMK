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
<a class="shadow rd-5 waves-effect" href="<?= base_url('kelas/add') ?>">Tambah Kelas</a>
</h2>

<?= $this->session->flashdata('message') ?>

<?php if ($row < 1 && !$this->session->flashdata('message')): ?>

<div class="alert mx-15">Tidak Ada Data</div>

<?php else: ?>

<table class="table mx-15 shadow rd">
<tr>
	<th width="20">#</th>
	<th>Kelas & Jurusan</th>
	<th class="center" width="20">Sesi</th>
	<th>Jumlah</th>
	<th>Token</th>
	<th class="center">Action</th>
</tr>

<?php $i = 0; foreach ($kelas as $pd): $i++; ?>

<?php

if ($pd['is_active']==1){
	$sesi = "<a href='".base_url('kelas/active/').$pd['id_kelas']."/".$pd['is_active']."' class='green shadow rd-5 waves-effect waves-light'>Aktif</a>";
} elseif ($pd['is_active']==2){
	$sesi = "<div class='diss blue shadow rd-5 waves-effect waves-light'>Selesai</div>";
} else {
	$sesi = "<a href='".base_url('kelas/active/').$pd['id_kelas']."/".$pd['is_active']."' class='orange shadow rd-5 waves-effect waves-light'>Start</a>";
}

?>

<?php 
	$siswa = $this->db->get_where('siswa', ['id_kelas' => $pd['id_kelas']])->num_rows();
	$siswax = $this->db->get_where('siswa', ['id_kelas' => $pd['id_kelas'], 'ikut' => 1])->num_rows();
	$siswaxx = $this->db->get_where('siswa', ['id_kelas' => $pd['id_kelas'], 'ikut' => 0])->num_rows();
?>

<tr>
	<td><?= $i ?></td>
	<td><?= $pd['kelas']." ".$pd['jurusan'] ?></td>
	<td class="center"><?= $sesi ?></td>
	<td><?= $siswa." orang" ?></td>
	<td><?= $pd['token'] ?></td>
	<td class="center">
		<a href="<?= base_url('kelas/edit/').$pd['id_kelas'] ?>" class="shadow rd-5 waves-effect waves-light">Edit</a> 
		<a href="<?= base_url('kelas/delete/').$pd['id_kelas'] ?>" class="violets shadow rd-5 waves-effect">Delete</a>
	</td>
</tr>

<?php endforeach; ?>

</table>

<?php endif ?>

</div>

</section>
