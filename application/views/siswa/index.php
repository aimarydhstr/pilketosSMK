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

</h2>

<table class="table mx-15 shadow rd">
<tr>
	<th width="20">#</th>
	<th>Kelas</th>
	<th>Jumlah</th>
	<th class="center">Action</th>
</tr>

<?php $i = 0; foreach ($kelas as $pd): $i++; ?>
	
<?php 
	$siswa = $this->db->get_where('siswa', ['id_kelas' => $pd['id_kelas']])->num_rows();
?>
<tr>
	<td><?= $i ?></td>
	<td><?= $pd['kelas']." ".$pd['jurusan'] ?></td>
	<td><?= $siswa." orang" ?></td>
	<td class="center">
		<a href="<?= base_url('siswa/daftar/').$pd['id_kelas'] ?>" class="shadow rd-5 waves-effect waves-light">Lihat</a> 
	</td>
</tr>

<?php endforeach; ?>
</table>
</div>

</section>