<?php 

/*****************************************
          1907912 - Fawwaz Kautsar
******************************************/

class Task extends DB{
	
	// Mengambil data
	function getTask( $tipe ){
		// Query mysql select data ke tb_to_do
		if( $tipe == 0 ){
			$query = "SELECT * FROM tb_pertandingan";
		}else if( $tipe == 1 ){
			$query = "SELECT * FROM tb_pertandingan ORDER BY nama_tim ASC";
		}else if( $tipe == 2 ){
			$query = "SELECT * FROM tb_pertandingan ORDER BY tanggal ASC";
		}else if( $tipe == 3 ){
			$query = "SELECT * FROM tb_pertandingan ORDER BY detail ASC";
		}else if( $tipe == 4 ){
			$query = "SELECT * FROM tb_pertandingan ORDER BY tiket ASC";
		}

		// Mengeksekusi query
		return $this->execute( $query );
	}

	function tambah_data( $nama_tim, $tanggal, $detail, $penonton, $tiket, $status = "Belum" ){
		$query = "INSERT INTO tb_pertandingan( nama_tim, tanggal, detail, penonton, tiket, status ) VALUES ( '$nama_tim', '$tanggal', '$detail', '$penonton', '$tiket', '$status' );";

		// Mengeksekusi query
		$this->execute( $query );
	}

	function hapus_data( $id ){
		$query = "DELETE FROM tb_pertandingan WHERE tb_pertandingan.id = '$id';";
		
		// Mengeksekusi query
		$this->execute( $query );
	}

}



?>
