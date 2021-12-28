<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Vote_model extends CI_Model
{

	function a()
	{
		$a = "SELECT `calon`.*, `siswa`.*, `kelas`.* FROM `calon` JOIN `siswa` ON `calon`.`nis` = `siswa`.`nis` JOIN `kelas` ON `calon`.`id_kelas` = `kelas`.`id_kelas`";

		return $this->db->query($a)->result_array();
	}

	function b()
	{
		$b = "SELECT `akun`.*, `siswa`.*, `kelas`.* FROM `akun` JOIN `siswa` ON `akun`.`nis` = `siswa`.`nis` JOIN `kelas` ON `akun`.`id_kelas` = `kelas`.`id_kelas`";

		return $this->db->query($b)->result_array();
	}

	function c()
	{
		$c = "SELECT `siswa`.*, `kelas`.* FROM `siswa` JOIN `kelas` ON `siswa`.`id_kelas` = `kelas`.`id_kelas`";

		return $this->db->query($c)->row_array();
	}

	function row()
	{
		$row = "SELECT `calon`.*, `siswa`.*, `kelas`.* FROM `calon` JOIN `siswa` ON `calon`.`nis` = `siswa`.`nis` JOIN `kelas` ON `calon`.`id_kelas` = `kelas`.`id_kelas`";

		return $this->db->query($row)->num_rows();
	}

	function rows()
	{
		$rows = "SELECT `akun`.*, `siswa`.*, `kelas`.* FROM `akun` JOIN `siswa` ON `akun`.`nis` = `siswa`.`nis` JOIN `kelas` ON `akun`.`id_kelas` = `kelas`.`id_kelas`";

		return $this->db->query($rows)->num_rows();
	}
	
}

?>