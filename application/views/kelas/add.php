<section class="second-wrapper">

<form action="<?= base_url('kelas/save') ?>" method="post">

<div class="wrapper rd shadow block">

<h2 class="shadow rd"><i class="fa fa-plus-circle"></i><?= $title ?></h2>

<div class="inline-form mx-15">

<div class="me-form" style="width:100px;margin:0">
  <select name="kelas" class="shadow rd">
    <option value="X">X</option>
    <option value="XI">XI</option>
    <option value="XII">XII</option>
    <option value="Guru">Guru</option>

  </select>
</div>

<div class="me-form" style="width:calc(100% - 100px);margin:0">
  <input class="shadow rd" type="text" id="jurusan" required name="jurusan" placeholder="Jurusan">
</div>

</div>

<div class="me-form">
  <input class="shadow rd" type="text" id="token" required name="token" placeholder="Token 8 karakter">
</div>

</div>

<div class="inline-form w-100">
<a class="btn-two shadow rd waves-effect" href="<?= base_url('kelas') ?>">Back</a>
<button class="btn-one shadow rd waves-effect waves-light" type="submit">Submit</button>
</div>

</form>

</section>