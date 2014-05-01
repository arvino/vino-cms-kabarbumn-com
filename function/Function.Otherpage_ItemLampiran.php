<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL ITEM LAMPIRAN otherpage */
/*

id 
idkonten 
urutan 
judul 
preview 
isi 
namafile 
tipefile 
gambar 
gambarpreview 
statustampil 
hotspot 
tanggalpost 
jampost 
direktorifile 
userposting 
hitcounter 
linkjudul 
keyword 

 */
  
  
 	/* Fungsi Buat ID Otomatis Untuk ID otherpage File . */
	function otherpageItemFile_CreateID( $tbl_otherpagefile ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagefile ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$CID = $data["id"];
		$CID = $CID+1;
		return $CID;
	}	 

 
 
 	/* Fungsi Tambah Data otherpage Item File */
	function otherpageItemFile_TambahData(
		$tbl_otherpagefile,
		$id, $idkonten, $urutan,
		$judul, $preview, $isi,
		$namafile, $tipefile, $gambar,
		$gambarpreview, $statustampil,  
		$tanggalpost, $jampost, $direktorifile,
		$userposting, $hitcounter, $linkjudul,
		$keyword

	){
		$sql = mysql_query("INSERT INTO $tbl_otherpagefile
		(

			id, idkonten, urutan,
			judul, preview, isi,
			namafile, tipefile, gambar,
			gambarpreview, statustampil, 
			tanggalpost, jampost, direktorifile,
			userposting, hitcounter, linkjudul,
			keyword 

		)VALUES(

			'$id', '$idkonten', '$urutan',
			'$judul', '$preview', '$isi',
			'$namafile', '$tipefile', '$gambar',
			'$gambarpreview', '$statustampil', 
			'$tanggalpost', '$jampost', '$direktorifile',
			'$userposting', '$hitcounter', '$linkjudul',
			'$keyword'
	
		)");
		return $sql;
	}

 
 	/* Fungsi Tambah Data otherpage Item File */
	function otherpageItemFile_UpdateData(
		$tbl_otherpagefile,
		$id, $idkonten, $urutan,
		$judul, $preview, $isi,
		$namafile, $tipefile, $gambar,
		$gambarpreview, $statustampil, 
		$tanggalpost, $jampost, $direktorifile,
		$userposting, $hitcounter, $linkjudul,
		$keyword

	){
		$sql = mysql_query("
		
		UPDATE $tbl_otherpagefile
		SET 

			idkonten = '$idkonten',
			urutan = '$urutan',
			judul = '$judul',
			preview = '$preview',
			isi = '$isi',
			namafile = '$namafile',
			tipefile = '$tipefile',
			gambar = '$gambar',
			gambarpreview = '$gambarpreview',
			statustampil = '$statustampil',
			 
			tanggalpost = '$tanggalpost',
			jampost = '$jampost',
			direktorifile = '$direktorifile',
			userposting = '$userposting',
			hitcounter = '$hitcounter',
			linkjudul = '$linkjudul',
			keyword  = '$keyword'
		WHERE
			id='$id'
		");
		return $sql;
	}




 	/* Buat Direktori Untuk File Item File otherpage */
	function otherpageItemFile_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/otherpage/" . "fileattachement/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}
 

	function ViewDetail_otherpageFileLampiran( $tbl_otherpagefile, $id ){
		$sqlText = "SELECT * FROM $tbl_otherpagefile where id = '$id'";
		$rows = mysql_query($sqlText);
		return mysql_fetch_object($rows);
	}
	
		
	function Hapus_otherpageFileLampiran( $tbl_otherpagefile, $id){
		$sql = mysql_query("DELETE FROM $tbl_otherpagefile WHERE id = '$id'");
		return $sql;
	}

 
	function List_otherpageFileLampiran_Berdasarkan_IdItem($id)
	{
		$sqlText = "SELECT * FROM $tbl_otherpagefile WHERE idotherpage = '$id'";
		$rows = mysql_query($sqlText);
		return mysql_fetch_object($rows);
	}

	

	function TotalAllDataotherpageItemLampiran( $tbl_otherpagefile, $idkonten ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpagefile WHERE idkonten = '$idkonten' ");
		$hitung = mysql_num_rows($sql);
		return $hitung;
	}


	function TotalAllTampilDataotherpageItemLampiran( $tbl_otherpagefile, $idkonten ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_otherpagefile WHERE statustampil = '1' AND idkonten = '$idkonten'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}



	function HitungotherpageItemLampiran( $tbl_otherpagefile, $idkonten ){ /* Alternatif 2  Function hitung data */
		$sql = mysql_query("SELECT * FROM $tbl_otherpagefile WHERE idkonten = '$idkonten' ");
		$hitung = mysql_num_rows($sql);
		return $hitung;
	}

	
	function ViewDetail_otherpageItemLampiran( $tbl_otherpagefile, $id ){ /* View Detail Komentar otherpage  */
		$sqlText = "SELECT * FROM $tbl_otherpagefile where id = '$id'";
		$row = mysql_query($sqlText);
		return mysql_fetch_object($row);
	}
	

	function SetStatusTampil_otherpageItemLampiran( $tbl_otherpagefile, $id, $status ){
	$sql = mysql_query("UPDATE $tbl_otherpagefile SET statustampil = '$status' WHERE id = '$id'");
	return $sql;
	}

	
	function LihatDataotherpageItemLampiran( $tbl_otherpagefile ){
		$sql=mysql_query("SELECT * FROM $tbl_otherpagefile ORDER BY id DESC");
		return $sql;
	}	

	
	function ViewAll_otherpageItemLampiran_ByItem( $tbl_otherpagefile, $iditem ){ /* View All Komentar otherpage berdasarkan otherpage */
		$sql = mysql_query("SELECT * FROM $tbl_otherpagefile WHERE idkonten ='$iditem' ORDER BY urutan ASC");
		return $sql;
	} 

	
	function ViewAllTampil_otherpageItemLampiran_ByItem( $tbl_otherpagefile, $iditem ){ /* View All Komentar yang tampil berdasarkan id otherpage  */
		$sql = mysql_query("SELECT * FROM $tbl_otherpagefile WHERE statustampil = '1' AND idkonten ='$iditem' ORDER BY urutan ASC");
		return $sql;
	} 

	
	function UpdateStatusTampilotherpageItemLampiran( $tbl_otherpagefile, $id, $status ){/* Update status tampil komentar */
		$sql = mysql_query("UPDATE $tbl_otherpagefile SET statustampil = '$status' WHERE id = '$id'");
		return $sql;
	}
	
	
	function Select_ItemLampiran_otherpage_By_Search_Page( $tbl_otherpagefile , $iditem, $cari , $offset, $dataPerPage ){
  		$sqlText = mysql_query("
			SELECT * FROM $tbl_otherpagefile 
					WHERE idkonten = '$iditem' AND 
				judul LIKE '%$cari%' OR
				isi  LIKE '%$cari%' 

			LIMIT $offset, $dataPerPage
		");
  		return $sqlText;
	}


 
	function otherpagefileDiLihat( $tbl_otherpagefile, $Det ){
	
			$sql = mysql_query("SELECT * FROM $tbl_otherpagefile WHERE id='$Det'");
			$dataotherpage = mysql_fetch_object($sql);
			$hitcounter = $dataotherpage->hitcounter;
			$hitcounter = $hitcounter+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_otherpagefile SET hitcounter ='$hitcounter' WHERE id='$Det'");
			
			return $sqlupdate;
	}


?>