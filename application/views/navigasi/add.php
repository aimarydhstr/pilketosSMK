<section class="second-wrapper">

<form action="<?= base_url('navigasi/save') ?>" method="post">

<div class="wrapper rd shadow block">

<h2 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h2>

<div class="me-form">
	<label for="nav_name">Nama Navigasi</label>
  	<input class="shadow rd" type="text" id="nav_name" required name="nav_name">
</div>

<div class="me-form">
	<label for="nav_link">Link Navigasi</label>
  	<input class="shadow rd" type="text" id="nav_link" required name="nav_link">
</div>

<div class="me-form">
	<label for="nav_icon">Icon Navigasi</label>
  	<input class="shadow rd" type="text" id="nav_icon" required name="nav_icon" placeholder="Fontawesome">
</div>

<div class="me-form">
	<label>Subnav</label>
	<select required name="subnav" class="shadow rd">
		<option value="0">Tidak Ada</option>
		<option value="1">Ada</option>
	</select>
</div>

<div class="me-form">
	<label>Menu</label>
	<select required name="id_menu" class="shadow rd">
		<option disabled selected>Choose Menu</option>
		<?php foreach ($menu as $m): ?>
		<option value="<?= $m['id_menu'] ?>"><?= $m['menu_name'] ?></option>
		<?php endforeach ?>
	</select>
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('navigasi') ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</form>

</section>