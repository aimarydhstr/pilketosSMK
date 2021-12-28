<section class="second-wrapper">

<form action="<?= base_url('navigasi/update/').$nav['nav_id'] ?>" method="post">

<div class="wrapper rd shadow block">

<h2 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h2>

<div class="me-form">
	<label for="nav_name">Nama Navigasi</label>
  	<input class="shadow rd" type="text" id="nav_name" required name="nav_name" value="<?= $nav['nav_name'] ?>">
</div>

<div class="me-form">
	<label for="nav_link">Link Navigasi</label>
  	<input class="shadow rd" type="text" id="nav_link" required name="nav_link" value="<?= $nav['nav_link'] ?>">
</div>

<div class="me-form">
	<label for="nav_icon">Icon Navigasi</label>
  	<input class="shadow rd" type="text" id="nav_icon" required name="nav_icon" placeholder="Fontawesome" value="<?= $nav['nav_icon'] ?>">
</div>

<div class="me-form">
	<label>Submenu</label>
	<select required name="subnav" class="shadow rd">
		<option <?php if ($nav['subnav']==0){echo "selected";} ?> value="0">Tidak Ada</option>
		<option <?php if ($nav['subnav']==1){echo "selected";} ?> value="1">Ada</option>
	</select>
</div>

<div class="me-form">
	<label>Menu</label>
	<select required name="id_menu" class="shadow rd">
		<option disabled selected>Choose Menu</option>
		<?php foreach ($menu as $m): ?>
		<option <?php if ($nav['id_menu']==$m['id_menu']){echo "selected";} ?> value="<?= $m['id_menu'] ?>"><?= $m['menu_name'] ?></option>
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