<div class="wrapper py-20" style="margin:-50px 0 60px;">
<div class="container">
<div class="main-wrapper block" id="post">

<h3 class="searchs violets shadow block">
  <span><i class="fa fa-th-large"></i><?= $title ?></span>
  <form method="POST" class="search" action="<?= base_url('data/sesi/'.$kls) ?>">
    <input type="text" name="s" id="s" placeholder="Search Here...">
    <label for="s" class="rd-100 waves-effect waves-light"><i class="fa fa-search"></i></label>
  </form>
</h3>

<main class="artikel">

<?= $this->session->flashdata('message'); ?>

<table class="shadow rd">

<tr>
  <th>Kelas</th>
  <th>Token</th>
  <th class="center">Sesi</th>
</tr>

<?php $i = 0; foreach ($kelas as $kl): $i++; ?>

<?php

if ($kl['is_active']==1){
  $sesi = "<a href='".base_url('data/active/').$kl['id_kelas']."/".$kl['is_active']."' class='green shadow rd-5 waves-effect waves-light'>Aktif</a>";
} elseif ($kl['is_active']==2){
  $sesi = "<div class='diss blue shadow rd-5 waves-effect waves-light'>Selesai</div>";
} else {
  $sesi = "<a href='".base_url('data/active/').$kl['id_kelas']."/".$kl['is_active']."' class='orange shadow rd-5 waves-effect waves-light'>Start</a>";
}

?>

<tr>
  <td><?= $kl['kelas']." ".$kl['jurusan'] ?></td>
  <td><?= $kl['token'] ?></td>
  <td class="center"><?= $sesi ?></td>
</tr>

<?php endforeach ?>

</table>

<a class="btn-ones mx-0 rd-5 shadow waves-effect waves-light" href="<?= base_url('data') ?>">Kembali</a>

</main>

</div>

</div>
</div>