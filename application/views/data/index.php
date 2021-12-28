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
            <li><a class="violets rd-50 waves-effect" style="border:0!important" href="<?= base_url('auth/logouts') ?>">Logout</a></li>
        </ul>
    </nav>

    <button class="i-con waves-effect" onclick="nav()"><i class="fa fa-bars"></i></button>

</div>
</section>

<section class="icon-wrapper" style="height:80px;overflow:auto">
  
</section>

<div class="wrapper py-20" style="margin:-50px 0 60px;">
<div class="container">
<div class="main-wrapper block" id="post">

<h3 class="searchs violets shadow block"><i class="fa fa-school"></i>Pilih Kelas</h3>

<main class="artikel">

<?php foreach ($kelas as $kl): ?>

<article class="post rd shadow waves-effect">
<a href="<?= base_url('data/sesi/').$kl['kelas'] ?>" class="btn-one py-20 violets my-0 w-100 rd" style="border:0!important">
  <h2>Kelas <?= $kl['kelas'] ?></h2>
</a>
</article>

<?php endforeach ?>

</main>

</div>

</div>
</div>