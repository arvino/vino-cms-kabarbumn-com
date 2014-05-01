<?php 
/* Fungsi Buat ID Otomatis Untuk ID otherpage Item . */
	function otherpageItem_CreateID( $tbl_otherpage ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpage ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 	/*  Fungsi Periksa Judul otherpage Kategori */
	function otherpageItem_PeriksaJudul( $tbl_otherpage, $judul, $judulinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE judul = '$judul' AND judulinggris = '$judulinggris'");
		return $sql;	
	}


 	/* FUNGSI TAMBAH DATA ITEM otherpage */
	function otherpageItem_TambahData(
		$tbl_otherpage,
		$id, $idupline, $idkategori, $idkategorisub,
		$judul, $judulinggris, $subjudul, $subjudulinggris,
		$preview, $previewinggris, $deskripsi, $deskripsiinggris,
		$tglpost, $jampost, $tgltampil, $jamtampil,
		$timeunix, $gambarkecil, $gambarbesar,
		$keterangangambar, $imagelogo, $dikomentari,
		$dilampirkan, $dilihat, $statustampil, $urutan, 
		$idusers, $idadmin, $direktorigambar,
		$linkjudul, $keyword
	){
		$sql = mysql_query("INSERT INTO $tbl_otherpage
		(

				id, idupline, idkategori, idkategorisub,
				judul, judulinggris, subjudul, subjudulinggris,
				preview, previewinggris,
				deskripsi, deskripsiinggris,
				tglpost, jampost,
				tgltampil, jamtampil,
				timeunix, gambarkecil, gambarbesar,
				keterangangambar, 
				imagelogo, dikomentari, dilampirkan,
				dilihat, statustampil, urutan, idusers, idadmin,
				direktorigambar, linkjudul, keyword

		)VALUES(
	
				'$id', '$idupline',
				'$idkategori', '$idkategorisub',
				'$judul', '$judulinggris',
				'$subjudul','$subjudulinggris',
				'$preview','$previewinggris',
				'$deskripsi','$deskripsiinggris',
				'$tglpost','$jampost',
				'$tgltampil','$jamtampil',
				'$timeunix',
				'$gambarkecil','$gambarbesar',
				'$keterangangambar',
				'$imagelogo', '$dikomentari', '$dilampirkan',
				'$dilihat', '$statustampil', '$urutan',
				'$idusers', '$idadmin',
				'$direktorigambar', '$linkjudul', '$keyword'
  
		)");
		return $sql;
	}
	
	

	
/* FUNGSI BACA DATA ITEM DETIL */
function otherpageItem_BacaDataDetil( $tbl_otherpage, $id ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE id = '$id'");
	$result = mysql_fetch_object($sql);
	return $result;
}




/* FUNGSI UPDATE DATA ITEM */
function otherpageItem_UpdateData(
		$tbl_otherpage,
		$id, $idupline, $idkategori,
		$idkategorisub, $judul, $judulinggris,
		$subjudul, $subjudulinggris,
		$preview, $previewinggris,
		$deskripsi, $deskripsiinggris,
		$tglpost, $jampost,
		$tgltampil, $jamtampil, $timeunix, $gambarkecil, $gambarbesar,
		$keterangangambar, $imagelogo, $dikomentari, $dilampirkan, $dilihat,
		$statustampil, $urutan, $idusers, $idadmin, $direktorigambar, $linkjudul, $keyword
		){
		$sql = mysql_query(
		"
UPDATE $tbl_otherpage SET 

	idupline ='$idupline', 	idkategori ='$idkategori',
	idkategorisub ='$idkategorisub', judul ='$judul', judulinggris ='$judulinggris', 	
	subjudul = '$subjudul', subjudulinggris = '$subjudulinggris',
	preview = '$preview', previewinggris = '$previewinggris',
	deskripsi ='$deskripsi', deskripsiinggris ='$deskripsiinggris', tglpost ='$tglpost', jampost ='$jampost',
	tgltampil ='$tgltampil', jamtampil ='$jamtampil', timeunix = '$timeunix', gambarkecil ='$gambarkecil',
	gambarbesar ='$gambarbesar', keterangangambar ='$keterangangambar', imagelogo ='$imagelogo',
	dikomentari ='$dikomentari', dilampirkan ='$dilampirkan', dilihat ='$dilihat',
	statustampil ='$statustampil', urutan = '$urutan',
	idusers ='$idusers', idadmin ='$idadmin',
	direktorigambar ='$direktorigambar', linkjudul ='$linkjudul', keyword ='$keyword'

WHERE

	id ='$id'
		");
		
return $sql;
		
}




/* -------------------- *//* -------------------- *//* -------------------- *//* -------------------- *//* -------------------- *//* -------------------- */

/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TERKINI ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_All( $tbl_otherpage , $offset , $dataPerPage){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_DiKomentari_All( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE dikomentari != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_DiKomentari_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE dikomentari != '0' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DENGAN FILE LAMPIRAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_DiLampirkan_All( $tbl_otherpage  , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE dilampirkan != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_DiLampirkan_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE dilampirkan != '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) PILIHAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_Pilihan_All( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE pilihan != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_Pilihan_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE pilihan != '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_TidakTampil_All( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE statustampil != '1' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_TidakTampil_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE statustampil != '1'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_Tampil_All( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE statustampil = '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_Tampil_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE statustampil = '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}



/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_Headline_All( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE headline != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_Headline_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE headline != '0' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DI HOTSPOT ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_Hotspot_All( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE hotspot != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_Hotspot_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE hotspot != '0' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_TidakPopuler_All( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE dilihat < '10' ORDER BY judul ASC
		LIMIT $offset, $dataPerPage
	");
	return $sql;
}

function GetJML_otherpageItem_BacaDataListing_TidakPopuler_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE dilihat < '10' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


 
function otherpageItem_BacaDataListing_Terpopuler_All_ByPage( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage ORDER BY dilihat DESC LIMIT $offset, $dataPerPage");
	return $sql;
}
 
function otherpageItem_BacaDataListing_Terpopuler_All( $tbl_otherpage ){
/* Terpopuler sortir dilihat desc */
	$sql = mysql_query("SELECT * FROM $tbl_otherpage ORDER BY dilihat DESC");
	return $sql;
}


function GetJML_otherpageItem_BacaDataListing_Terpopuler_All( $tbl_otherpage ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE dilihat >= '10' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


function Search_Item_otherpage_ALL($tbl_otherpage, $cari , $offset , $dataPerPage ){ /* otherpage Search */
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
		
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function GetJML_Search_Item_otherpage_ALL( $tbl_otherpage, $cari ){ /* otherpage Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE 
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 

			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}
	

function Search_Item_otherpage_Publish_ByPage($tbl_otherpage, $cari , $offset , $dataPerPage ){ /* otherpage Search */
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 

			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function Search_Item_otherpage_Publish($tbl_otherpage, $cari ){ /* otherpage Search */
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC ");  
  		return $sql;
}

 function Search_Item_otherpage_All_data($tbl_otherpage, $cari ){ /* otherpage Search */
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			 
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC ");  
  		return $sql;
}



function GetJML_Search_Item_otherpage_Publish( $tbl_otherpage, $cari ){ /* otherpage Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
			 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


function Select_Item_otherpage_Terkait_ALL($tbl_otherpage, $keyword , $offset ){ /* otherpage Terkait All */
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE keyword LIKE '%$keyword%' ORDER BY judul ASC LIMIT $offset");  
  		return $sql;
}

function Select_Item_otherpage_Terkait_Publish($tbl_otherpage, $keyword , $offset , $id ){ /* otherpage Terkait Publish */
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE id!='$id' AND statustampil = '1' AND keyword LIKE '%$keyword%' ORDER BY judul ASC LIMIT $offset");  
  		return $sql;
}

/* -------------------- */







/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TERKINI ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_Terkini_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_Dikomentari_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND dikomentari != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DENGAN FILE LAMPIRAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_DiLampirkan_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND dilampirkan != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) PILIHAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_Pilihan_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND pilihan != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_Tampil_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND statustampil != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_TidakTampil_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND statustampil == '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_Headline_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND headline != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI HOTSPOT ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_Hotspot_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND hotspot != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_TidakPopuler_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND dilihat < '10' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) POPULER ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategori_Terpopuler_All( $tbl_otherpage , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND dilihat > '20' ORDER BY judul ASC");
	return $sql;
}


/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TERKINI ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub' ORDER BY judul ASC");
	return $sql;
}




/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_DiKomentari_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dikomentari != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DENGAN FILE LAMPIRAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_DiLampirkan_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dilampirkan != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) PILIHAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_Pilihan_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND pilihan != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_Tampil_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND statustampil != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_TidakTampil_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND statustampil == '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_Headline_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND headline != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI HOTSPOT ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_Hotspot_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND hotspot != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function otherpageItem_BacaDataListing_ByKategoriSub_TidakPopuler_All( $tbl_otherpage , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dilihat < '10' ORDER BY judul ASC");
	return $sql;
}


 
	/* Buat Direktori Untuk File Item otherpage */
	function otherpageItem_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/otherpage/" . "file_item/" . $tanggalhariini . "/";
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
		return $direktoribuat;
	}


 	
/* ITEM otherpage : hitung total item otherpage berdasarkan format tanggal bulan dan tahun */	
	function jmlArrtbl_otherpage($blnth,$idkat){
		$sqlText = "SELECT count(id) as jml FROM $tbl_otherpage where date_format(thedate, '%M %Y') = '$blnth'
					and idkat = $idkat";
					
  		$res = mysql_query($sqlText);
  		$row = mysql_fetch_object($res);
  		$jml = $row->jml;
  		return $jml;	
	}


	function Select_Item_otherpage_By_Search($cari)
	{
		
		$sqlText = "SELECT * FROM $tbl_otherpage WHERE judul LIKE '%$cari%' OR
			judulinggris 		LIKE '%$cari%' OR subjudul LIKE '%$cari%' OR
			subjudulinggris 	LIKE '%$cari%' OR preview  LIKE '%$cari%' OR
			previewinggris 		LIKE '%$cari%' 
		ORDER BY judul ASC ";  

  		
  		$result = mysql_query($sqlText);
  		return $result;
	}
	
	
	
	

	/* select detail item otherpage berdasarkan id terpilih */	
	function Select_Detail_Item_otherpage($tbl_otherpage, $id){
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}

	

	/* Hitung Jumlah otherpage By Kategori & Sub Kategori */
	function GetJmlTotalotherpage( $tbl_otherpage, $idkategori, $idkategorisub ){
  		$sqlText = "SELECT count(id) AS jml FROM $tbl_otherpage WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	
	function GetJmlTotalotherpageByUser( $idkategori , $idkategorisub , $posted ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_otherpage WHERE 
		idkategori = '$idkategori' AND 
		idkategorisub = '$idkategorisub' AND 
		posted = '$posted'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
 
 
 	function GetJmlTotal_otherpageTerkini( $tbl_otherpage, $idkategori, $idkategorisub ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_otherpage";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
 
 	function otherpage_hostpot($sesid){
		$sqlText = "SELECT * FROM $tbl_otherpage where hostpot_headline = 1 and sesid = $sesid ORDER BY thedate DESC, thetime DESC limit 4 ";
		return mysql_query($sqlText);
	}
	
	function otherpage_hostpot_rev($time_stam,$sesid){	
  		$sqlText = "SELECT * FROM $tbl_otherpage where thejmt < $time_stam and hostpot_headline = 1 and sesid = $sesid ORDER BY thejmt DESC limit 4";  
  		return mysql_query($sqlText);
	}
	
	
	function list_indeks_otherpage($time_stam,$sesid){
  		$sqlText = "SELECT * FROM $tbl_otherpage where thedate = '$time_stam' and sesid = $sesid ORDER BY thedate DESC";  
  		return mysql_query($sqlText);
	}
	
	
	function detail_otherpage_hostpot($sesid){
		$sqlText = "SELECT * FROM $tbl_otherpage where hostpot_headline = 1 and sesid = $sesid ORDER BY thedate DESC, thetime DESC";
		$result = mysql_query($sqlText);
		return mysql_fetch_object($result);
	}
	
	
	function detail_otherpage_hostpot_rev($time_stam,$sesid){
   		$sqlText = "SELECT * FROM $tbl_otherpage where thejmt < $time_stam and hostpot_headline = 1 and sesid = $sesid ORDER BY thejmt DESC";  
  		$result = mysql_query($sqlText);
		return mysql_fetch_object($result);
	}
	
	function otherpage_hostpot_kategori($idkat){
		$sqlText = "SELECT * FROM $tbl_otherpage where otherpage_single = 1 and idkat = $idkat ORDER BY thedate DESC, thetime DESC";
		$result = mysql_query($sqlText);
		return mysql_fetch_object($result);
	}


	
	function otherpage_hostpot_kategori_rev($time_stam,$idkat){
  		
  		$sqlText = "SELECT * FROM $tbl_otherpage where thejmt < $time_stam and otherpage_single = 1 and idkat = $idkat ORDER BY thejmt DESC";  
  		$result = mysql_query($sqlText);
		return mysql_fetch_object($result);
	}
	
	
	
	function cekKategoriotherpage($idkat){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_otherpage where idkat = $idkat";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	

	
/* ITEM otherpage : Update item otherpage dilihat */
	function otherpageDiLihat( $tbl_otherpage, $Det ){
	
			$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE id='$Det'");
			$dataotherpage = mysql_fetch_array($sql);
			$dilihat = $dataotherpage ['dilihat'];
			$dilihat = $dilihat+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_otherpage SET dilihat='$dilihat' WHERE id='$Det'");
			
			return $sqlupdate;
	}


/* ITEM otherpage : select detail item otherpage berdasarkan tanggal tampil, jam tampil , status tampil */
	function ViewDetail_Item_otherpage( $tbl_otherpage, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE id = '$id'");
		$result = mysql_fetch_object($sql);
		return $result;
	}
	
	
/* ITEM otherpage : select item otherpage berdasarkan tanggal tampil >= tanggal saat ini  , jam tampil >= jam saat ini , status tampil = 1 */	
	
	function otherpageTerbaru($tbl_otherpage, $tanggalhariini, $Cat, $SubCat ){
		$sqlText = "SELECT * FROM $tbl_otherpage WHERE 
						
						tgltampil <= '$tanggalhariini' AND
						jamtampil <= '$jamsaatini' AND
						statustampil = '1' AND 

						idkategori = '$Cat' AND 
						idkategorisub = '$SubCat' AND
						
						ORDER BY judul ASC, jamtampil DESC limit 5";
						
		return mysql_query($sqlText);
	}
	
/* ambil data kemarin */	
	$tglkemarin = date("Y-m-d",mktime (0,0,0, date("m"), date("d")-1, date("Y")));
/* ITEM otherpage : select item otherpage berdasarkan tanggal tampil = tanggal kemarin, status tampil = 1 , kanal dan sub kanal terkait pengurutan berdasarkan tanggal tampil & jam tampil limit 5 baris */
	function otherpageKemaren( $tbl_otherpage, $tglkemarin, $Cat, $SubCat ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE

						tgltampil = '$tglkemarin' AND
						statustampil='1' AND 

						idkategori = '$Cat' AND 
						idkategorisub = '$SubCat' 
						
						ORDER BY 
						
						tgltampil DESC, jamtampil DESC limit 5");
		return $sql;
	}


	function otherpageTerkait( $tbl_otherpage, $tanggalhariini, $Cat, $SubCat )
	{
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE
		
						tgltampil <= '$tanggalhariini' AND
						jamtampil <= '$jamsaatini' AND
						statustampil='1' AND 
		
						idkategori = '$Cat' AND 
						idkategorisub = '$SubCat' 
						
						ORDER BY judul ASC limit 5");
						
		return $sql;
	}
	
/* ITEM otherpage : select item otherpage berdasarkan kanal terkait */	
	function otherpageKategoriTerkait( $tbl_otherpage,  $tanggalhariini, $Cat, $Det )
	{
	
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE
		
						tgltampil <= '$tanggalhariini' AND
						statustampil='1' AND 
		
						idkategori = '$Cat'
						 
						
						ORDER BY judul ASC limit 7");
						
		return $sql;
	}




function otherpageItem_PageLimit_Terkini_By_Kategori_Publik( $tbl_otherpage, $tanggalhariini, $idkategori , $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			idkategori = '$idkategori'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
		
}

function otherpageItem_PageLimit_Terkini_By_SubKategori_Publik( $tbl_otherpage, $tanggalhariini, $idkategori , $idkategorisub, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			tgltampil <= '$timeunix'
			statustampil='1' AND
			idkategori = '$idkategori' AND
			idkategorisub = '$idkategorisub'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}


 
 
/* Terkini Homepage */
function otherpageItem_PageLimit_Terkini_All_Publik( $tbl_otherpage, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			tgltampil <= '$tanggalhariini'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* Terkini By Kanal */
function otherpageItem_PageLimit_Terkini_All_Publik_By_Kategori( $tbl_otherpage, $idkategori, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* Terkini By SubKanal */
function otherpageItem_PageLimit_Terkini_All_Publik_By_SubKategori( $tbl_otherpage, $idkategorisub, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			idkategorisub = '$idkategorisub' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}



/* otherpage Terpopuler publik */
function otherpageItem_PageLimit_Populer_All_Publik( $tbl_otherpage, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			dilihat >= '5'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* otherpage Terpopuler Berdasarkan Kategori Terkait */
function otherpageItem_PageLimit_Populer_All_Publik_ByKategori( $tbl_otherpage, $idkategori, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			tgltampil <= '$tanggalhariini' AND
			dilihat >= '5'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* Halaman Sub Kanal Untuk Box otherpage Terpopuler Berdasarkan Sub Kategori Terkait */
function otherpageItem_PageLimit_Populer_All_Publik_BySubKategori( $tbl_otherpage, $idkategorisub, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			 
			idkategorisub = '$idkategorisub' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			dilihat >= '5'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}







/* otherpage terkomentari publik */
function otherpageItem_PageLimit_Terkomentari_All_Publik( $tbl_otherpage, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			dikomentari = '1'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* otherpage pilihan publik */
function otherpageItem_PageLimit_Pilihan_All_Publik( $tbl_otherpage, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			pilihan = '1'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* Revisi 23/03/2011 */
function Detail_otherpageItem_Publik_Hotspot( $tbl_otherpage, $idkategori, $idsubkategori  ){
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' AND
			idkategorisub = '$idsubkategori' AND
			statustampil='1' 
			ORDER BY judul ASC
		");
		$result = mysql_fetch_object($sql);
		return $result;
}

function Select_otherpageItem_Publik_LineUnderHotspot( $tbl_otherpage, $idkategori, $idsubkategori, $tanggalhariini, $limit ){ /* Line Item otherpage Under Hotspot Sub Kanal */
		$sql = mysql_query("
		SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' AND
			idkategorisub = '$idsubkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		 ORDER BY judul ASC LIMIT $limit	
		");
		return $sql;
}

function otherpageItem_PageLimit_Headline_UtamaHome( $tbl_otherpage, $tanggalhariini , $dataPerPage ){

					$sql = mysql_query("
						SELECT * FROM otherpage WHERE 
							tgltampil <='$tanggalhariini' AND
							statustampil ='1' AND
							headline = '1' 
								ORDER BY judul ASC
						LIMIT $dataPerPage
					");
					return $sql;
}


function otherpageItem_PageLimit_Headline_By_Kategori_Publik( $tbl_otherpage, $tanggalhariini, $idkategori , $dataPerPage ){
					$sql = mysql_query("
						SELECT * FROM otherpage WHERE 
							tgltampil <='$tanggalhariini' AND
							statustampil ='1' AND
							idkategori = '$idkategori' AND
							headline = '1' 
								ORDER BY judul ASC
						LIMIT $dataPerPage
					");
					return $sql;
}

function otherpageItem_PageLimit_Headline_By_SubKategori_Publik( $tbl_otherpage, $tanggalhariini, $idkategorisub , $dataPerPage ){
					$sql = mysql_query("
						SELECT * FROM otherpage WHERE 
							tgltampil <='$tanggalhariini' AND
							statustampil ='1' AND
							idkategorisub = '$idkategorisub' AND
							headline = '1' 
								ORDER BY judul ASC
						LIMIT $dataPerPage
					");
					return $sql;
}


function otherpageItem_PageLimit_Headline_Line_By_Kategori_Publik( $tbl_otherpage, $tanggalhariini, $idkategori , $dataPerPage ){

					$sql = mysql_query("
						SELECT * FROM otherpage WHERE 
							statustampil = '1' AND
							tgltampil <= '$tanggalhariini' AND
				  			idkategori = '$idkategori' AND
							pilihan = '1' AND
							headline !='1'
						 
								ORDER BY judul ASC

						LIMIT $dataPerPage
					");
					return $sql;


}



	function Search_Item_otherpage_By_Publik($cari, $tanggalhariini){
		
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
		
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND 
							
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC ");  

  		return $sql;
	}
	

	function  otherpageItem_HapusData( $tbl_otherpage, $id){ /* Hapus Data Item */
		$sql = mysql_query("
			DELETE FROM $tbl_otherpage WHERE id='$id'
		");
		return $sql;
	}
	
	
	function otherpageItem_StatusTampil( $tbl_otherpage, $statustampil, $id ){ /* Tampil Kan Data */
		$sql = mysql_query("
			UPDATE $tbl_otherpage SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
		return $sql;
	}


	function otherpageItem_HeadlineTampil( $tbl_otherpage, $statustampil, $id ){ /* Tampilkan data di headline terkait */
		$sql = mysql_query("
			UPDATE $tbl_otherpage SET
				headline = '$statustampil' 
			WHERE
				id = '$id'
		");
		return $sql;
	}


	function otherpageItem_PilihanTampil( $tbl_otherpage, $statustampil, $id ){ /* tampilkan data pada pilihan terkait */
		$sql = mysql_query("
			UPDATE $tbl_otherpage SET
				pilihan = '$statustampil' 
			WHERE
			id = '$id'
		");
		return $sql;
	}

	function otherpageItem_HotspotTampil( $tbl_otherpage, $statustampil, $id ){ /* tampilkan data pada hotspot terkait */
		$sql = mysql_query("
			UPDATE $tbl_otherpage SET
				hotspot = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}



	function otherpageItem_HapusImage( $tbl_otherpage, $id ){
		$sql = mysql_query("
			UPDATE $tbl_otherpage SET
				gambarkecil = '',
				gambarbesar = '',
				direktorigambar = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function otherpageItem_UpdateFileLampiran( $tbl_otherpage, $id , $status ){
		$sql = mysql_query("
			UPDATE $tbl_otherpage SET
				dilampirkan = '$status'
			WHERE
				id = '$id'
		");
	return $sql;
	}
	

	function otherpageItem_UpdateKomentar( $tbl_otherpage, $id , $status  ){
		$sql = mysql_query("
			UPDATE $tbl_otherpage SET
				dikomentari = '$status'
			WHERE
				id = '$id'
		");
	return $sql;
	}
	

	function SelectPublish_otherpageItem_Terkait( $tbl_otherpage, $idkategori, $keyword , $tanggalhariini ){ /* Publish Item otherpage Terkait */
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND 
			keyword LIKE '%$keyword%' 
		ORDER BY judul ASC ");  
  		return $sql;
	}
	
	function SelectNonPublish_otherpageItem_Terkait( $tbl_otherpage, $idkategori, $keyword , $tanggalhariini ){ /* Non Publish Item otherpage Terkait */
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='0' AND 
			keyword LIKE '%$keyword%' 
		ORDER BY judul ASC ");  
  		return $sql;
	}




function List_Indeks_otherpage_Item($tbl_otherpage, $tanggalhariini ){ 
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil='1' AND
			tgltampil = '$tanggalhariini'
			ORDER BY judul ASC");  
  		return $sql;
}

function List_Indeks_otherpage_Item_By_Tanggal($tbl_otherpage, $tanggalhariini ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			tgltampil = '$tanggalhariini'
		ORDER BY judul ASC");  
  		return $sql;
}

function Total_Indeks_otherpage_Item_By_Tanggal( $tbl_otherpage, $tanggal ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil='1' AND
			tgltampil='$tanggal'  
			ORDER BY judul ASC");  
  		$hitung = mysql_num_rows($sql);
  		 
  		return $hitung;	
}


function List_Indeks_otherpage_Item_Kategori_ByPage($tbl_otherpage, $tanggalhariini, $idkategori , $offset , $dataPerPage   ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategori ='$idkategori'
		ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function List_Indeks_otherpage_Item_SubKategori_ByPage($tbl_otherpage, $tanggalhariini, $idkategori , $offset , $dataPerPage   ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategorisub ='$idkategori'
		ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


 function  List_ALL_PUBLISH_Item_otherpage_ByKategori_List($tbl_otherpage, $tanggalhariini, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategori ='$idkategori'
		ORDER BY judul ASC ");  
  		return $sql;
}

 function  List_ALL_PUBLISH_Item_otherpage_BySubKategori_List($tbl_otherpage, $tanggalhariini, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategorisub ='$idkategori'
		ORDER BY judul ASC ");  
  		return $sql;
}

function Total_LIST_ALL_PUBLISH_Indeks_otherpage_Item_ByKategori( $tbl_otherpage, $tanggal, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil='1' AND
			tgltampil<='$tanggal' AND
			idkategori='$idkategori'
			ORDER BY judul ASC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;		
}

function Total_LIST_ALL_PUBLISH_Indeks_otherpage_Item_BySubKategori( $tbl_otherpage, $tanggal, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil='1' AND
			tgltampil<='$tanggal' AND
			idkategorisub='$idkategori'
			ORDER BY judul ASC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}

function Total_Indeks_otherpage_Item( $tbl_otherpage, $tanggalhariini ){  
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			statustampil='1' AND
			tgltampil = '$tanggalhariini'
			ORDER BY judul ASC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}
	

	

function List_Item_otherpage_Publish_view_Halaman( $tbl_otherpage, $idkategori, $idsubkategori,$offset, $dataPerPage ){
		$sql = mysql_query("
				SELECT * FROM $tbl_otherpage WHERE 
						statustampil = '1' AND
						idkategori='$idkategori' AND
						idkategorisub='$idsubkategori' 
			
				ORDER BY urutan ASC
				LIMIT $offset, $dataPerPage
			
		");
		return $sql;
}


function List_otherpage_File_Group_With_LimitPage( $tbl_otherpage, $idkategori, $idsubkategori , $offset, $dataPerPage){

	$sql = mysql_query("
				SELECT * FROM $tbl_otherpage WHERE 

						idkategori='$idkategori' AND
						idkategorisub='$idsubkategori' 
			
				ORDER BY judul ASC
				LIMIT $offset, $dataPerPage
			
		");
		
	return $sql;
}




/* View detail otherpage by kategori , sub kategori  */
	function ViewDetail_Item_otherpage_Kategori( $tbl_otherpage, $idkategori, $idkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' AND 
			idkategorisub = '$idkategorisub' 
			
		ORDER BY id DESC
		");
		$result = mysql_fetch_object($sql);
		return $result;
	}



 


/* Listing detail otherpage by kategori , sub kategori  */
	function ListDetail_Item_otherpage_Kategori( $tbl_otherpage, $idkategori, $idkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' AND 
			idkategorisub = '$idkategorisub' 
		ORDER BY id DESC
		");
		
		return $sql;
	}


/* Listing detail otherpage by kategori , sub kategori  */
	function ListDetail_Item_otherpage_Kategori_all( $tbl_otherpage, $idkategori ){
		$sql = mysql_query("SELECT * FROM $tbl_otherpage WHERE 
			idkategori = '$idkategori' 
		ORDER BY id DESC
		");
		
		return $sql;
	}



/* Update 21/02/2012 By Arvino Zulka Harahap */
function otherpageItem_BacaDataListing_Terkini_All( $tbl_otherpage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage ORDER BY urutan DESC, timeunix DESC ");
	return $sql;
}

function otherpageItem_BacaDataListing_Terkini_All_ByPage( $tbl_otherpage , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_otherpage ORDER BY urutan DESC, timeunix DESC LIMIT $offset, $dataPerPage");
	return $sql;
}

 
?>