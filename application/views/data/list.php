<div class="wrapper py-20" style="margin:-50px 0 60px;">
<div class="container">
<div class="main-wrapper block" id="post">

<h3 class="searchs violets shadow block">
  <span><i class="fa fa-th-list"></i><?= $title ?></span>
  <form method="POST" class="search" action="<?= base_url('data/list/'.$kls) ?>">
    <input type="text" name="s" id="s" placeholder="Search Here...">
    <label for="s" class="rd-100 waves-effect waves-light"><i class="fa fa-search"></i></label>
  </form>
</h3>

<main class="artikel">

<?php if ($jml < 1): ?>

<div class="alert alert-blue w-100 mt-20 mb-20">Tidak Ada Data</div>

<?php else: ?>

<table class="shadow rd">

<tr>
  <th width="20">#</th>
  <th>Kelas</th>
  <th class="center">Action</th>
</tr>

<?php $i = 0; foreach ($kelas as $kl): $i++; ?>

<tr>
  <td width="20"><?= $i ?></td>
  <td><?= $kl['kelas']." ".$kl['jurusan'] ?></td>
  <td class="center"><a href="<?= base_url('data/siswa/').$kls.'/'.$kl['id_kelas'];?>" class="shadow rd-5 waves-effect waves-light">Lihat</a></td>
</tr>

<?php endforeach ?>

</table>

<?php endif ?>

<a class="btn-ones mx-0 rd-5 shadow waves-effect waves-light" href="<?= base_url('data') ?>">Kembali</a>

</main>

</div>

</div>
</div>