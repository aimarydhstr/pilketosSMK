<div class="sidenav shadow blocks">
  
<header class="head">
  <h1><a href="#" title="<?= $meta['judul_website'] ?>"><img width="40" height="40" src="<?= base_url('assets/img/'.$meta['favicon']); ?>"> <span><?= $meta['judul_website'] ?></span></a></h1>
</header>

<div class="author">
<?php

$username = $this->session->userdata('username');

$d = $this->db->get_where('akun', ['username' => $username])->row_array();
$e = $this->db->get_where('siswa', ['nis' => $d['nis']])->row_array();
$f = $this->db->get_where('role', ['id_role' => $d['id_role']])->row_array();

?>
<img class="avatar rd-100 shadow" src="<?= base_url('assets/img/'.$d['profil'])?>">
<h4><?= $e['nama_siswa'] ?></h4>
<p><i class="fa fa-crown"></i><?= $f['role'] ?></p>


</div>

<nav class="navside">
  <ul>

    <?php 

    $menu = $this->db->get('menu')->result_array();
    foreach ($menu as $f):
    $id_menu = $f['id_menu'];
    ?>

    <div class="menu"><span class="icon"><i class="fa fa-toggle-on"></i></span><?= $f['menu_name'] ?></div>

<?php 
    $navi = "SELECT * FROM navigasi WHERE id_menu = $id_menu";
    $navside = $this->db->query($navi)->result_array();
    foreach ($navside as $nav):

    ?>

    <?php if ($nav['subnav'] == 1): ?>
    <li class="submenu"><a class="waves-effect" onclick="submenu()" href="<?= $nav['nav_link'] ?>" title="<?= $nav['nav_name'] ?>"><span class="icon"><i class="<?= $nav['nav_icon'] ?>"></i></span><span class="link"><?= $nav['nav_name'] ?></span><span class="toggle" id="toggle"><i class="fa fa-chevron-right"></i></span></a>
      <ul id="sub" class="rd shadow">
        <?php

        $n = $nav['nav_id'];
        $subnavi = "SELECT * FROM sub_navigasi WHERE nav_id = $n";
        $subnav = $this->db->query($subnavi)->result_array();
        foreach ($subnav as $sub): 

        ?>
        <li class="sub"><a class="waves-effect waves-light" href="<?= base_url('/').$sub['sub_nav_link'] ?>" title="<?= $sub['sub_nav_name'] ?>"><span class="icon"><i class="<?= $sub['sub_nav_icon'] ?>"></i></span><span class="link"><?= $sub['sub_nav_name'] ?></span></a></li>
        <?php endforeach; ?>
      </ul>
      </li>

    <?php else: ?>

    <?php if ($title == $nav['nav_name']): ?>
    <li class="active"><a class="waves-effect waves-light" href="<?= base_url('/').$nav['nav_link'] ?>" title="<?= $nav['nav_name'] ?>"><span class="icon"><i class="<?= $nav['nav_icon'] ?>"></i></span><span class="link"><?= $nav['nav_name'] ?></span></a></li>
    <?php else: ?>
    <li><a class="waves-effect" href="<?= base_url('').$nav['nav_link'] ?>" title="<?= $nav['nav_name'] ?>"><span class="icon"><i class="<?= $nav['nav_icon'] ?>"></i></span><span class="link"><?= $nav['nav_name'] ?></span></a></li>
    <?php endif; ?>
    

    <?php endif; ?>

    <?php endforeach ?>
    <?php endforeach ?>

    
  </ul>
</nav>

</div>