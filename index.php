<?php

/*****************************************
          1907912 - Fawwaz Kautsar
******************************************/

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/Task.class.php");

// Membuat objek dari kelas task
$otask = new Task($db_host, $db_user, $db_password, $db_name);
$otask->open();

// jika user klim tombol Add
if( isset( $_POST['add'] ) ){
	// $id = $_GET['id_status'];
	$nama_tim = $_POST['tname'];
	$tanggal = $_POST['ttanggal'];
	$detail = $_POST['tdetail'];
	$penonton = $_POST['tpenonton'];
	$tiket = $_POST['ttiket'];
	$otask->tambah_data( $nama_tim, $tanggal, $detail, $penonton, $tiket );

	header("Location: index.php");
}
// jika user klim tombol Hapus
if( isset( $_GET['id_hapus'] ) ){
	$otask->open();
	$otask->hapus_data($_GET['id_hapus']);
	
	header("Location: index.php");
}

// Memanggil method getTask di kelas Task
if(isset($_GET['id_tipe_urut'])){
	$otask->open();
	$otask->getTask($_GET['id_tipe_urut']);
}else{
	$otask->getTask(0);
}


// Proses mengisi tabel dengan data
$data = null;
$no = 1;
$batas = 0;

while (list($id, $nama_tim, $tanggal, $detail, $penonton, $tiket, $status) = $otask->getResult()) {
	// Tampilan jika status task nya sudah dikerjakan
	if( isset( $_GET['id_status'] ) ){
		$status = "Sudah";
		$batas = 1;

		$conn = mysqli_connect( 'localhost','root','','tp4_dpo' );
		$sql = "UPDATE tb_pertandingan SET ".
			"status='$status' WHERE id='$id'"
		;
		$result = mysqli_query( $conn, $sql );
	}else{
		$status = "Belum";
	}

	if( $status == "Sudah" && $batas == 1 ){
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $nama_tim . "</td>
		<td>" . $tanggal . "</td>
		<td>" . $detail . "</td>
		<td>" . $penonton . "</td>
		<td>" . $tiket . "</td>
		<td>" . $status . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		</td>
		</tr>";
		$no++;
		$batas = 0;
	}

	// Tampilan jika status task nya belum dikerjakan
	else{
		$data .= "<tr>
		<td>" . $no . "</td>
		<td>" . $nama_tim . "</td>
		<td>" . $tanggal . "</td>
		<td>" . $detail . "</td>
		<td>" . $penonton . "</td>
		<td>" . $tiket . "</td>
		<td>" . $status . "</td>
		<td>
		<button class='btn btn-danger'><a href='index.php?id_hapus=" . $id . "' style='color: white; font-weight: bold;'>Hapus</a></button>
		<button class='btn btn-success'><a href='index.php?id_status=" . $id .  "' style='color: white; font-weight: bold;'>Selesai</a></button>
		</td>
		</tr>";
		$no++;
	}
}



// Menutup koneksi database
$otask->close();

// Membaca template skin.html
$tpl = new Template("templates/skin.html");

// sortings
$reset = "<a href='index.php?id_tipe_urut=0'  style='color: white';>Reset</a>
";
$urutNama = "<a href='index.php?id_tipe_urut=1'  style='color: white';>Urut Nama</a>
";
$urutTanggal = "<a href='index.php?id_tipe_urut=2'  style='color: white';>Urut Tanggal</a>
";
$urutDetail = "<a href='index.php?id_tipe_urut=3'  style='color: white';>Urut Detail</a>
";
$urutTiket = "<a href='index.php?id_tipe_urut=4'  style='color: white';>Urut Tiket</a>
";


// Mengganti kode Data_Tabel dengan data yang sudah diproses
$tpl->replace("DATA_TABEL", $data);
$tpl->replace("RESET", $reset);
$tpl->replace("URUT_NAMA", $urutNama);
$tpl->replace("URUT_TANGGAL", $urutTanggal);
$tpl->replace("URUT_DETAIL", $urutDetail);
$tpl->replace("URUT_TIKET", $urutTiket);


// Menampilkan ke layar
$tpl->write();