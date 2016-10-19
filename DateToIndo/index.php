<?php
	//setting tanggal indonesia
	date_default_timezone_set('Asia/Jakarta');

	 // fungsi atau method untuk mengubah tanggal ke format indonesia
	 // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
	function BulanIndo($date) {
		$BulanIndo = array("Januari", "Februari", "Maret",
						   "April", "Mei", "Juni",
						   "Juli", "Agustus", "September",
						   "Oktober", "November", "Desember");
		$bulan = substr($date, 0, 2);
		$result = $BulanIndo[(int)$bulan-1] ;
		return($result);
	}

	//cek apakah ada post atau tidak, jika tidak ada menggambil tanggal hari ini.
	if(isset($_POST['cari']))
	{
		$date        = $_POST['date'];
		$sebelumnya  = date("Y-m-d", strtotime("$date -1 day"));
		$selanjutnya = date("Y-m-d", strtotime("$date +1 day"));
		$hari   = date('d', strtotime(str_replace(' ','-', $date)));
		$bulan = date('m', strtotime(str_replace(' ','-', $date)));
		$tahun = date('Y', strtotime(str_replace(' ','-', $date)));
	 }else{
		$date=date('Y-m-d');
		$sebelumnya = date("Y-m-d", strtotime("$date -1 day"));
		$selanjutnya = date("Y-m-d", strtotime("$date +1 day"));
		$hari =date('d', strtotime(str_replace(' ','-', $date)));
		$bulan =date('m', strtotime(str_replace(' ','-', $date)));
		$tahun =date('Y', strtotime(str_replace(' ','-', $date)));
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Bulan Indonesia</title>
</head>
<body>
	<h3 >Hari ini Tanggal  <?php echo" ".$hari." ".(BulanIndo($bulan))." ".$tahun." "; ?></h3>
	<br>
	<form role="form" action="" method="post" >
		<input type="hidden" name="date" value="<?php echo $sebelumnya; ?>">
		<button type="submit" class="btn btn-outline btn-default" name="cari" id="cari">Sebelumnya</button>
	</form>
	<br>
	<form role="form" action="" method="post">
		<input type="hidden" name="date" value="<?php echo $selanjutnya; ?>">
		<button type="submit" class="btn btn-outline btn-default" name="cari" id="cari">Selanjutnya </button>
	</form>
</body>
</html>