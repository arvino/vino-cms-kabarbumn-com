<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL ITEM LAMPIRAN news */
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
  
  
 	/* Fungsi Buat ID Otomatis Untuk ID news File . */
	function newsItemFile_CreateID( $tbl_newsfile ){
		$sql = mysql_query("SELECT * FROM $tbl_newsfile ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$CID = $data["id"];
		$CID = $CID+1;  
		return $CID;
	}	 

 
 
 	/* Fungsi Tambah Data news Item File */
	function newsItemFile_TambahData(
		$tbl_newsfile,
		$id, $idkonten, $urutan,
		$judul, $preview, $isi,
		$namafile, $tipefile, $gambar,
		$gambarpreview, $statustampil,  
		$tanggalpost, $jampost, $direktorifile,
		$userposting, $hitcounter, $linkjudul,
		$keyword

	){
		$sql = mysql_query("INSERT INTO $tbl_newsfile
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

 
 	/* Fungsi Tambah Data news Item File */
	function newsItemFile_UpdateData(
		$tbl_newsfile,
		$id, $idkonten, $urutan,
		$judul, $preview, $isi,
		$namafile, $tipefile, $gambar,
		$gambarpreview, $statustampil, 
		$tanggalpost, $jampost, $direktorifile,
		$userposting, $hitcounter, $linkjudul,
		$keyword

	){
		$sql = mysql_query("
		
		UPDATE $tbl_newsfile
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




 	/* Buat Direktori Untuk File Item File news */
	function newsItemFile_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/news/" . "fileattachement/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}
 

	function ViewDetail_newsFileLampiran( $tbl_newsfile, $id ){
		$sqlText = "SELECT * FROM $tbl_newsfile where id = '$id'";
		$rows = mysql_query($sqlText);
		return mysql_fetch_object($rows);
	}
	
		
	function Hapus_newsFileLampiran( $tbl_newsfile, $id){
		$sql = mysql_query("DELETE FROM $tbl_newsfile WHERE id = '$id'");
		return $sql;
	}

 
	function List_newsFileLampiran_Berdasarkan_IdItem($id)
	{
		$sqlText = "SELECT * FROM $tbl_newsfile WHERE idnews = '$id'";
		$rows = mysql_query($sqlText);
		return mysql_fetch_object($rows);
	}

	
	function TotalAllDatanewsItemLampiran( $tbl_newsfile, $idkonten ){
		$sql = mysql_query("SELECT * FROM $tbl_newsfile WHERE idkonten = '$idkonten' ");
		$hitung = mysql_num_rows($sql);
		return $hitung;
	}


	function TotalAllTampilDatanewsItemLampiran( $tbl_newsfile, $idkonten ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_newsfile WHERE statustampil = '1' AND idkonten = '$idkonten'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}


	function HitungnewsItemLampiran( $tbl_newsfile, $idkonten ){ /* Alternatif 2  Function hitung data */
		$sql = mysql_query("SELECT * FROM $tbl_newsfile WHERE idkonten = '$idkonten' ");
		$hitung = mysql_num_rows($sql);
		return $hitung;
	}

	
	function ViewDetail_newsItemLampiran( $tbl_newsfile, $id ){ /* View Detail Komentar news  */
		$sqlText = "SELECT * FROM $tbl_newsfile where id = '$id'";
		$row = mysql_query($sqlText);
		return mysql_fetch_object($row);
	}
	
	
	
	function SetStatusTampil_newsItemLampiran( $tbl_newsfile, $id, $status ){
	$sql = mysql_query("UPDATE $tbl_newsfile SET statustampil = '$status' WHERE id = '$id'");
	return $sql;
	}
	
	function LihatDatanewsItemLampiran( $tbl_newsfile ){
		$sql=mysql_query("SELECT * FROM $tbl_newsfile ORDER BY id DESC");
		return $sql;
	}	

	
	function ViewAll_newsItemLampiran_ByItem( $tbl_newsfile, $iditem ){ /* View All Komentar news berdasarkan news */
		$sql = mysql_query("SELECT * FROM $tbl_newsfile WHERE idkonten ='$iditem' ORDER BY urutan ASC");
		return $sql;
	} 

	
	function ViewAllTampil_newsItemLampiran_ByItem( $tbl_newsfile, $iditem ){ /* View All Komentar yang tampil berdasarkan id news  */
		$sql = mysql_query("SELECT * FROM $tbl_newsfile WHERE statustampil = '1' AND idkonten ='$iditem' ORDER BY urutan ASC");
		return $sql;
	} 

	
	function UpdateStatusTampilnewsItemLampiran( $tbl_newsfile, $id, $status ){/* Update status tampil komentar */
		$sql = mysql_query("UPDATE $tbl_newsfile SET statustampil = '$status' WHERE id = '$id'");
		return $sql;
	}
	
	
	function Select_ItemLampiran_news_By_Search_Page( $tbl_newsfile , $iditem, $cari , $offset, $dataPerPage ){
  		$sqlText = mysql_query("
			SELECT * FROM $tbl_newsfile 
					WHERE idkonten = '$iditem' AND 
				judul LIKE '%$cari%' OR
				isi  LIKE '%$cari%' 

			LIMIT $offset, $dataPerPage
		");
  		return $sqlText;
	}




 
	function newsfileDiLihat( $tbl_newsfile, $Det ){
	
			$sql = mysql_query("SELECT * FROM $tbl_newsfile WHERE id='$Det'");
			$datanews = mysql_fetch_object($sql);
			$hitcounter = $datanews->hitcounter;
			$hitcounter = $hitcounter+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_newsfile SET hitcounter ='$hitcounter' WHERE id='$Det'");
			
			return $sqlupdate;
	}


?>