<section class="second-wrapper">

<form action="<?= base_url('menu/save') ?>" method="post">

<div class="wrapper rd shadow block">

<h2 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h2>

<div class="me-form">
	<label for="menu_name">Nama Menu</label>
  	<input class="shadow rd" type="text" id="menu_name" required name="menu_name">
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('menu') ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</form>

</section>