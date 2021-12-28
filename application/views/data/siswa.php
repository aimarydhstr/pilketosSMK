<div class="wrapper py-20" style="margin:-50px 0 60px;">
<div class="container">
<div class="main-wrapper block" id="post">

<h3 class="searchs violets shadow block">
  <span><i class="fa fa-th"></i>List Siswa</span>
  <form method="POST" class="search" action="<?= base_url('data/siswa/'.$kls.'/'.$kelas) ?>">
    <input type="text" name="s" id="s" placeholder="Search Here...">
    <label for="s" class="rd-100 waves-effect waves-light"><i class="fa fa-search"></i></label>
  </form>
</h3>

<main class="artikel">

<?php if ($jml < 1): ?>

<div class="alert alert-blue w-100 mt-20 mb-20">Tidak Ada Data</div>

<?php else: ?>

<?php foreach ($siswa as $sw): ?>

<article class="post rd shadow waves-effect">
<a href="javascript::void(0)" class="btn-one py-20 violets my-0 w-100 rd" style="border:0!important">
  <p><?= $sw['nis'] ?></p>
  <h4 style="color:#444"><?= $sw['nama_siswa'] ?></h4>
  <p style="font-size:12px;color:#555;text-transform:capitalize;">
    <?= date('d F Y', strtotime($sw['tgl_lahir'])) ?>
  </p>
</a>

<?php 
  $voter = $this->db->get_where('vote', ['nis' => $sw['nis']])->num_rows();
  $panitia = $this->db->get_where('akun', ['nis' => $sw['nis'], 'id_role' => 2])->num_rows();
  $admin = $this->db->get_where('akun', ['nis' => $sw['nis'], 'id_role' => 1])->num_rows();
  $calon = $this->db->get_where('calon', ['nis' => $sw['nis']])->num_rows();
?>

<?php if ($voter < 1 && $sw['ikut'] != 0): ?>
<p class="keterangan white center">Belum Memilih</p>
</article>

<?php elseif ($voter == 1 && $sw['ikut'] != 0): ?>

<p class="keterangan green center">Sudah Memilih</p>

</article>

<?php elseif ($sw['ikut'] == 0): ?>

<p class="keterangan center" style="background:#eee;color:#444"><i class="fa fa-times"></i> Tidak Ikut Memilih</p>

</article>

<?php endif; endforeach; endif; ?>


</main>
<div class="w-100">
<a class="btn-ones mx-0 rd-5 shadow waves-effect waves-light" href="<?= base_url('data/list/'.$kls) ?>">Kembali</a>
</div>

</div>

</div>
</div>