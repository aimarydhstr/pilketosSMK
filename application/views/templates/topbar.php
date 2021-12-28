<div class="outer-wrapper">
  
<section class="top-wrapper shadow">

<?php

$query = "SELECT `akun`.*, `role`.* FROM `akun` JOIN `role` ON `akun`.`id_role` = `role`.`id_role`";
$ss = $this->db->query($query)->row_array();

?>

<div class="block">
<i class="icon fa fa-crown"></i><h2><?= $ss['role'] ?> Page</h2><p><?= $title ?></p>

<form class="search shadow rd-50">
  
<input type="text" name="search" placeholder="Search here...">
<button><i class="fa fa-search"></i></button>

</form>

<div style="clear:both;"></div>  

</div>

</section>