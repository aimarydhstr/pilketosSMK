<section class="navbar" id="navbar">
<div class="navbar-container block">

    <header class="header">
      <h1><a href="<?= base_url() ?>">
        <img width="40" height="40" src="<?= base_url('assets/img/'.$meta['favicon']); ?>"> <span><?= $meta['judul_website'] ?></span>
      </a></h1>
    </header>

    <nav class="nav" id="nav">
        <ul>
            <li class="submenu mobile waves-effect"><a onclick="ter()" href="javascript::void(0)">Main Menu <i class="fa fa-times"></i></a></li>
            <li><a class="waves-effect" href="#about">About</a></li>
            <li><a class="waves-effect" href="#vote">Vote Kandidat</a></li>
            <li><a class="waves-effect" href="<?= base_url('auth/logout') ?>">Logout</a></li>
        </ul>
    </nav>

    <button class="i-con waves-effect" onclick="nav()"><i class="fa fa-bars"></i></button>

</div>
</section>

<section class="icon-wrapper shadow" id="icon">
<div class="i-wrap">
    <h3>Selamat Datang</h3>
    <p>Pilihlah kandidat Ketua OSIS SMK Negeri 1 Purwokerto sesuai dengan hati nurani sendiri</p>
    <a href="#vote" class="btn-two shadow rd-50 waves-effect">Vote Sekarang</a>
</div>
</section>

<section id="vote">
<div class="wrapper">
<div class="container">

<div class="main-wrapper" id="post">

<h3 class="shadow"><i class="fa fa-user-edit"></i>Pilih Kandidat</h3>

<main class="artikel">

<?php $i = 0; foreach ($calon as $c): $i++;?>
<article class="post shadow center">

<div class="img shadow"><img src="<?= base_url('assets/img/').$c['foto'] ?>" alt="<?= $c['nama_siswa'] ?>" title="<?= $c['nama_siswa'] ?>"></div>    
<h2><?= $c['nama_siswa'] ?></h2>
<p><?= $c['kelas']." ".$c['jurusan'] ?></p>
<div class="informasi">
<div class="inline-form">
<a class="btn-one violets shadow waves-effect" href="javascript::void(0)" onclick="detail(<?= $i ?>)">Detail</a>
<a class="btn-one shadow waves-effect waves-light" href="javascript::void(0)" onclick="vote(<?= $i ?>)">Vote</a>
</div>
</div>

</article>

<div class="background" id="back<?= $i ?>">

<div class="pop shadow" id="pop<?= $i ?>">
  <h3 class="t">Detail Kandidat</h3>
  <h4>Visi</h4>
  <p><?= $c['visi'] ?></p>
  <h4>Misi</h4>
  <p><?= $c['misi'] ?></p>
  <h4>Motto</h4>
  <p><?= $c['moto'] ?></p>
  <div class="inline-form">
  <a class="btn-ones orange shadow waves-effect waves-light" href="javascript::void(0)" onclick="hide(<?= $i ?>)">Close</a>
  <a class="btn-ones green shadow waves-effect waves-light" href="javascript::void(0)" onclick="vote(<?= $i ?>)">Vote</a>
</div>
</div>

</div>
<div class="background" id="backs<?= $i ?>">
  
<div class="pop shadow" id="pops<?= $i ?>">
  <h3 class="t">Berikan Suara ke Kandidat nomor <?= $c['id_calon'] ?>?</h3>
  <p>Apakah anda yakin akan memberikan suara anda ke <?= $c['nama_siswa'] ?>?</p>
  <div class="inline-form">
  <a class="btn-ones orange shadow waves-effect waves-light" href="javascript::void(0)" onclick="hides(<?= $i ?>)">Tutup</a>
  <a class="btn-ones green shadow waves-effect waves-light" href="<?= base_url('pemilihan/vote/'.$c['id_calon']) ?>">Yakin</a>
</div>
</div>

</div>



<?php endforeach; ?>

</main>
</div>

</div>
</div>
</section>