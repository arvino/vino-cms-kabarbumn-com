<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL ITEM LAMPIRAN gallery */
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
  
  
 	/* Fungsi Buat ID Otomatis Untuk ID gallery File . */
	function galleryItemFile_CreateID( $tbl_galleryfile ){
		$sql = mysql_query("SELECT * FROM $tbl_galleryfile ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$CID = $data["id"];
		$CID = $CID+1;  
		return $CID;
	}	 

 
 
 	/* Fungsi Tambah Data gallery Item File */
	function galleryItemFile_TambahData(
		$tbl_galleryfile,
		$id, $idkonten, $urutan,
		$judul, $preview, $isi,
		$namafile, $tipefile, $gambar,
		$gambarpreview, $statustampil,  
		$tanggalpost, $jampost, $direktorifile,
		$userposting, $hitcounter, $linkjudul,
		$keyword

	){
		$sql = mysql_query("INSERT INTO $tbl_galleryfile
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

 
 	/* Fungsi Tambah Data gallery Item File */
	function galleryItemFile_UpdateData(
		$tbl_galleryfile,
		$id, $idkonten, $urutan,
		$judul, $preview, $isi,
		$namafile, $tipefile, $gambar,
		$gambarpreview, $statustampil, 
		$tanggalpost, $jampost, $direktorifile,
		$userposting, $hitcounter, $linkjudul,
		$keyword

	){
		$sql = mysql_query("
		
		UPDATE $tbl_galleryfile
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




 	/* Buat Direktori Untuk File Item File gallery */
	function galleryItemFile_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/gallery/" . "fileattachement/" . $tanggalhariini . "/";
	  	if (is_dir( $direktoribuat )) 
	  	{  }
	  	else
	  	{
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
	  	}
		return $direktoribuat;
	}
 

	function ViewDetail_galleryFileLampiran( $tbl_galleryfile, $id ){
		$sqlText = "SELECT * FROM $tbl_galleryfile where id = '$id'";
		$rows = mysql_query($sqlText);
		return mysql_fetch_object($rows);
	}
	
		
	function Hapus_galleryFileLampiran( $tbl_galleryfile, $id){
		$sql = mysql_query("DELETE FROM $tbl_galleryfile WHERE id = '$id'");
		return $sql;
	}

 
	function List_galleryFileLampiran_Berdasarkan_IdItem($id)
	{
		$sqlText = "SELECT * FROM $tbl_galleryfile WHERE idgallery = '$id'";
		$rows = mysql_query($sqlText);
		return mysql_fetch_object($rows);
	}

	
	function TotalAllDatagalleryItemLampiran( $tbl_galleryfile, $idkonten ){
		$sql = mysql_query("SELECT * FROM $tbl_galleryfile WHERE idkonten = '$idkonten' ");
		$hitung = mysql_num_rows($sql);
		return $hitung;
	}


	function TotalAllTampilDatagalleryItemLampiran( $tbl_galleryfile, $idkonten ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_galleryfile WHERE statustampil = '1' AND idkonten = '$idkonten'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}


	function HitunggalleryItemLampiran( $tbl_galleryfile, $idkonten ){ /* Alternatif 2  Function hitung data */
		$sql = mysql_query("SELECT * FROM $tbl_galleryfile WHERE idkonten = '$idkonten' ");
		$hitung = mysql_num_rows($sql);
		return $hitung;
	}

	
	function ViewDetail_galleryItemLampiran( $tbl_galleryfile, $id ){ /* View Detail Komentar gallery  */
		$sqlText = "SELECT * FROM $tbl_galleryfile where id = '$id'";
		$row = mysql_query($sqlText);
		return mysql_fetch_object($row);
	}
	
	
	
	function SetStatusTampil_galleryItemLampiran( $tbl_galleryfile, $id, $status ){
	$sql = mysql_query("UPDATE $tbl_galleryfile SET statustampil = '$status' WHERE id = '$id'");
	return $sql;
	}
	
	function LihatDatagalleryItemLampiran( $tbl_galleryfile ){
		$sql=mysql_query("SELECT * FROM $tbl_galleryfile ORDER BY id DESC");
		return $sql;
	}	

	
	function ViewAll_galleryItemLampiran_ByItem( $tbl_galleryfile, $iditem ){ /* View All Komentar gallery berdasarkan gallery */
		$sql = mysql_query("SELECT * FROM $tbl_galleryfile WHERE idkonten ='$iditem' ORDER BY urutan ASC");
		return $sql;
	} 

	
	function ViewAllTampil_galleryItemLampiran_ByItem( $tbl_galleryfile, $iditem ){ /* View All Komentar yang tampil berdasarkan id gallery  */
		$sql = mysql_query("SELECT * FROM $tbl_galleryfile WHERE statustampil = '1' AND idkonten ='$iditem' ORDER BY urutan ASC");
		return $sql;
	} 

	
	function UpdateStatusTampilgalleryItemLampiran( $tbl_galleryfile, $id, $status ){/* Update status tampil komentar */
		$sql = mysql_query("UPDATE $tbl_galleryfile SET statustampil = '$status' WHERE id = '$id'");
		return $sql;
	}
	
	
	function Select_ItemLampiran_gallery_By_Search_Page( $tbl_galleryfile , $iditem, $cari , $offset, $dataPerPage ){
  		$sqlText = mysql_query("
			SELECT * FROM $tbl_galleryfile 
					WHERE idkonten = '$iditem' AND 
				judul LIKE '%$cari%' OR
				isi  LIKE '%$cari%' 

			LIMIT $offset, $dataPerPage
		");
  		return $sqlText;
	}




 
	function galleryfileDiLihat( $tbl_galleryfile, $Det ){
	
			$sql = mysql_query("SELECT * FROM $tbl_galleryfile WHERE id='$Det'");
			$datagallery = mysql_fetch_object($sql);
			$hitcounter = $datagallery->hitcounter;
			$hitcounter = $hitcounter+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_galleryfile SET hitcounter ='$hitcounter' WHERE id='$Det'");
			
			return $sqlupdate;
	}


?>