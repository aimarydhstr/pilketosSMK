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
<a class="shadow rd-5 waves-effect" href="<?= base_url('navigasi/add') ?>">Tambah Navigasi</a>
</h2>

<?= $this->session->flashdata('message') ?>

<?php if ($row < 1 && !$this->session->flashdata('message')): ?>

<div class="alert mx-15">Tidak Ada Data</div>

<?php else: ?>

<table class="table mx-15 shadow rd">
<tr>
	<th width="20">#</th>
	<th>Nama Navigasi</th>
	<th>Link</th>
	<th class="center">Icon</th>
	<th>Menu</th>
	<th>Subnav</th>
	<th class="center">Action</th>
</tr>

<?php $i = 0; foreach ($nav as $pd): $i++; ?>

<?php if ($pd['subnav'] == 1) {$subnav = "Ada";} else {$subnav = "Tidak Ada";} ?>
<?php $m = $this->db->get_where('menu', ['id_menu' => $pd['id_menu']])->row_array() ?>

<tr>
	<td><?= $i ?></td>
	<td><?= $pd['nav_name'] ?></td>
	<td><?= $pd['nav_link'] ?></td>
	<td class="center"><i class="<?= $pd['nav_icon'] ?>"></i></td>
	<td><?= $m['menu_name'] ?></td>
	<td><?= $subnav ?></td>
	<td class="center">
		<a href="<?= base_url('navigasi/edit/').$pd['nav_id'] ?>" class="shadow rd-5 waves-effect waves-light">Edit</a> 
		<a href="<?= base_url('navigasi/delete/').$pd['nav_id'] ?>" class="violets shadow rd-5 waves-effect">Delete</a>
	</td>
</tr>

<?php endforeach; ?>

</table>

<?php endif ?>

</div>

</section>
