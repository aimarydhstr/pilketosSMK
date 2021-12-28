<section class="second-wrapper">

<div class="blocks kotak-wrapper w-100">
  
<div class="kotak shadow rd waves-effect">
  <div class="icon shadow rd-100"><i class="fa fa-user"></i></div>
  <h4>Pemilih</h4>
  <p><?= $ikut ?> orang</p>
</div>

<div class="kotak shadow rd waves-effect">
  <div class="icon shadow rd-100"><i class="fa fa-medal"></i></div>
  <h4>Belum Memilih</h4>
  <p><?= $ikut - $vote ?> orang</p>
</div>

<div class="kotak shadow rd waves-effect">
  <div class="icon shadow rd-100"><i class="fa fa-edit"></i></div>
  <h4>Jumlah Vote</h4>
  <p><?= $vote ?> suara</p>
</div>

</div>

<div class="wrapper rd shadow block w-100 mt-20">

<h2 class="rd shadow">
<i class="fa fa-user"></i>Data Pemilih
</h2>

<?php if ($row < 1): ?>

<div class="alert mx-15">Tidak Ada Data</div>

<?php else: ?>

<table class="table mx-15 shadow rd">
<tr>
  <th width="20">#</th>
  <th>Kelas</th>
  <th>Sudah Memilih</th>
  <th>Belum Memilih</th>
  <th>Jumlah</th>
</tr>

<?php $i = 0; foreach ($kelas as $pd): $i++; ?>

<?php 

$siswa = $this->db->get_where('siswa', ['id_kelas' => $pd['id_kelas'], 'ikut !=' => 0])->num_rows();
$sudah = $this->db->get_where('vote', ['id_kelas' => $pd['id_kelas']])->num_rows(); 
$belum = $siswa - $sudah;

?>

<tr>
  <td><?= $i ?></td>
  <td><?= $pd['kelas']." ".$pd['jurusan'] ?></td>
  <td><?= $sudah ?> orang</td>
  <td><?= $belum ?> orang</td>
  <td><?= $siswa ?> orang</td>
</tr>

<?php endforeach; ?>

</table>

<?php endif ?>

</div>

<div class="wrapper rd shadow block w-100 mt-20">

<h2 class="rd shadow">
<i class="fa fa-user-edit"></i>Vote Pilketos
</h2>

<?php if ($row < 1): ?>

<div class="alert mx-15">Tidak Ada Data</div>

<?php else: ?>

<table class="table mx-15 shadow rd">
<tr>
  <th width="20">#</th>
  <th>Nama</th>
  <th>Kelas</th>
  <th>Jumlah</th>
  <th>Persentase</th>
</tr>

<?php $i = 0; foreach ($kandidat as $pd): $i++; ?>

<?php 


$jumlah = $this->db->get('vote')->num_rows();
$suara = $this->db->get_where('vote', ['id_calon' => $pd['id_calon']])->num_rows();
if ($jumlah > 0 && $suara > 0) {
    
    $persen =  $suara / $jumlah * 100;

} else {
    $persen = 0;
}

?>

<tr>
  <td><?= $i ?></td>
  <td><?= $pd['nama_siswa'] ?></td>
  <td><?= $pd['kelas']." ".$pd['jurusan'] ?></td>
  <td><?= $suara ?> suara</td>
  <td><?= round($persen, 1) ?>%</td>
</tr>

<?php endforeach; ?>

</table>

<?php endif ?>

</div>

</section>