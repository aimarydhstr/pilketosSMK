<section class="second-wrapper">

<form action="<?= base_url('subnav/save') ?>" method="post">

<div class="wrapper rd shadow block">

<h2 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h2>

<div class="me-form">
	<label for="sub_nav_name">Nama Subnav</label>
  	<input class="shadow rd" type="text" id="sub_nav_name" required name="sub_nav_name">
</div>

<div class="me-form">
	<label for="sub_nav_link">Link Subnav</label>
  	<input class="shadow rd" type="text" id="sub_nav_link" required name="sub_nav_link">
</div>

<div class="me-form">
	<label for="sub_nav_icon">Icon Subnav</label>
  	<input class="shadow rd" type="text" id="sub_nav_icon" required name="sub_nav_icon" placeholder="Fontawesome">
</div>

<div class="me-form">
	<label>Navigasi</label>
	<select required name="nav_id" class="shadow rd">
		<option disabled selected>Choose Navigation</option>
		<?php foreach ($nav as $n): ?>
		<option value="<?= $n['nav_id'] ?>"><?= $n['nav_name'] ?></option>
		<?php endforeach ?>
	</select>
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('subnav') ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</form>

</section>