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
            <li><a class="waves-effect" href="<?= base_url('data') ?>">Kelas</a></li>
            <li><a class="waves-effect" href="<?= base_url('data/sesi/').$kls ?>">Sesi</a></li>
            <li><a class="waves-effect" href="<?= base_url('data/list/').$kls ?>">Siswa</a></li>
            <li><a class="waves-effect" href="<?= base_url('auth/logouts') ?>">Logout</a></li>
        </ul>
    </nav>

    <button class="i-con waves-effect" onclick="nav()"><i class="fa fa-bars"></i></button>

</div>
</section>

<section class="icon-wrapper" style="height:80px;overflow:auto">
  
</section>
