<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL ITEM gallery */
/* 

id, idupline, idkategori, idkategorisub,
judul, judulinggris, subjudul, subjudulinggris,
preview, previewinggris,
deskripsi, deskripsiinggris,
tglpost, jampost,
tgltampil, jamtampil,
timeunix, gambarkecil, gambarbesar,
keterangangambar, 
imagelogo, dikomentari, dilampirkan,
dilihat, statustampil, idusers, idadmin,
direktorigambar, linkjudul, keyword



$id, $idupline, $idkategori, $idkategorisub,
$judul, $judulinggris, $subjudul, $subjudulinggris,
$preview, $previewinggris, $deskripsi, $deskripsiinggris,
$tglpost, $jampost, $tgltampil, $jamtampil,
$timeunix, $gambarkecil, $gambarbesar,
$keterangangambar, $imagelogo, $dikomentari,
$dilampirkan, $dilihat, $statustampil,
$idusers, $idadmin, $direktorigambar,
$linkjudul, $keyword



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
'$imagelogo',
'$dikomentari',
'$dilampirkan',
'$dilihat',
'$statustampil',
'$idusers',
'$idadmin',
'$direktorigambar',
'$linkjudul',
'$keyword'









*/  
	/* Fungsi Buat ID Otomatis Untuk ID gallery Item . */
	function galleryItem_CreateID( $tbl_gallery ){
		$sql = mysql_query("SELECT * FROM $tbl_gallery ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 	/*  Fungsi Periksa Judul gallery Kategori */
	function galleryItem_PeriksaJudul( $tbl_gallery, $judul, $judulinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE judul = '$judul' AND judulinggris = '$judulinggris'");
		return $sql;	
	}

 
 	/* FUNGSI TAMBAH DATA ITEM gallery */
	function galleryItem_TambahData(
		$tbl_gallery,
		$id, $idupline, $idkategori, $idkategorisub,
		$judul, $judulinggris, $subjudul, $subjudulinggris,
		$preview, $previewinggris, $deskripsi, $deskripsiinggris,
		$tglpost, $jampost, $tgltampil, $jamtampil,
		$timeunix, $gambarkecil, $gambarbesar,
		$keterangangambar, $imagelogo, $dikomentari,
		$dilampirkan, $dilihat, $statustampil,
		$idusers, $idadmin, $direktorigambar,
		$linkjudul, $keyword
	){
		$sql = mysql_query("INSERT INTO $tbl_gallery
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
				dilihat, statustampil, idusers, idadmin,
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
				'$dilihat', '$statustampil',
				'$idusers', '$idadmin',
				'$direktorigambar', '$linkjudul', '$keyword'
  
		)");
		return $sql;
	}
	
	
/* FUNGSI BACA DATA ITEM DETIL */
function galleryItem_BacaDataDetil( $tbl_gallery, $id ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE id = '$id'");
	$result = mysql_fetch_object($sql);
	return $result;
}



/* FUNGSI UPDATE DATA ITEM */
function galleryItem_UpdateData(
		$tbl_gallery,
		$id, $idupline, $idkategori, $idkategorisub,
		$judul, $judulinggris, $subjudul, $subjudulinggris,
		$preview, $previewinggris, $deskripsi, $deskripsiinggris,
		$tglpost, $jampost, $tgltampil, $jamtampil,
		$timeunix, $gambarkecil, $gambarbesar,
		$keterangangambar, $imagelogo, $dikomentari,
		$dilampirkan, $dilihat, $statustampil,
		$idusers, $idadmin, $direktorigambar,
		$linkjudul, $keyword
		){
		$sql = mysql_query(
		"
UPDATE $tbl_gallery SET 

	idupline ='$idupline', 	idkategori ='$idkategori',
	idkategorisub ='$idkategorisub', judul ='$judul', judulinggris ='$judulinggris', 	
	subjudul='$subjudul', subjudulinggris='$subjudulinggris', preview='$preview', previewinggris='$previewinggris',
	deskripsi ='$deskripsi', deskripsiinggris ='$deskripsiinggris', tglpost ='$tglpost', jampost ='$jampost',
	tgltampil ='$tgltampil', jamtampil ='$jamtampil', timeunix = '$timeunix', gambarkecil ='$gambarkecil',
	gambarbesar ='$gambarbesar', keterangangambar ='$keterangangambar', imagelogo ='$imagelogo',
	dikomentari ='$dikomentari', dilampirkan ='$dilampirkan', dilihat ='$dilihat',
	statustampil ='$statustampil', idusers ='$idusers', idadmin ='$idadmin',
	direktorigambar ='$direktorigambar', linkjudul ='$linkjudul', keyword ='$keyword'

WHERE
	id ='$id'
		");
		
return $sql;
		
}








/* -------------------- *//* -------------------- *//* -------------------- *//* -------------------- *//* -------------------- *//* -------------------- */

/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TERKINI ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_All( $tbl_gallery , $offset , $dataPerPage){
	$sql = mysql_query("SELECT * FROM $tbl_gallery ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_galleryItem_BacaDataListing_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_DiKomentari_All( $tbl_gallery , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE dikomentari != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_galleryItem_BacaDataListing_DiKomentari_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE dikomentari != '0' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DENGAN FILE LAMPIRAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_DiLampirkan_All( $tbl_gallery  , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE dilampirkan != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_galleryItem_BacaDataListing_DiLampirkan_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE dilampirkan != '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) PILIHAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_Pilihan_All( $tbl_gallery , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE pilihan != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_galleryItem_BacaDataListing_Pilihan_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE pilihan != '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_TidakTampil_All( $tbl_gallery , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE statustampil != '1' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_galleryItem_BacaDataListing_TidakTampil_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE statustampil != '1'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_Tampil_All( $tbl_gallery , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE statustampil = '1' ORDER BY id DESC LIMIT $offset, $dataPerPage");
	return $sql;
}



function GetJML_galleryItem_BacaDataListing_Tampil_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE statustampil = '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}



/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_Headline_All( $tbl_gallery , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE headline != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_galleryItem_BacaDataListing_Headline_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE headline != '0' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DI HOTSPOT ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_Hotspot_All( $tbl_gallery , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE hotspot != '0' ORDER BY judul ASC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_galleryItem_BacaDataListing_Hotspot_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE hotspot != '0' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_TidakPopuler_All( $tbl_gallery , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE dilihat < '10' ORDER BY judul ASC
		LIMIT $offset, $dataPerPage
	");
	return $sql;
}

function GetJML_galleryItem_BacaDataListing_TidakPopuler_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE dilihat < '10' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


 
function galleryItem_BacaDataListing_Terpopuler_All_ByPage( $tbl_gallery , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery ORDER BY dilihat DESC LIMIT $offset, $dataPerPage");
	return $sql;
}
 
function galleryItem_BacaDataListing_Terpopuler_All( $tbl_gallery ){
/* Terpopuler sortir dilihat desc */
	$sql = mysql_query("SELECT * FROM $tbl_gallery ORDER BY dilihat DESC");
	return $sql;
}


function GetJML_galleryItem_BacaDataListing_Terpopuler_All( $tbl_gallery ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE dilihat >= '10' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


function Search_Item_gallery_ALL($tbl_gallery, $cari , $offset , $dataPerPage ){ /* gallery Search */
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
		
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function GetJML_Search_Item_gallery_ALL( $tbl_gallery, $cari ){ /* gallery Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE 
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 

			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}
	

function Search_Item_gallery_Publish_ByPage($tbl_gallery, $cari , $offset , $dataPerPage ){ /* gallery Search */
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 

			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function Search_Item_gallery_Publish($tbl_gallery, $cari ){ /* gallery Search */
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC ");  
  		return $sql;
}

 function Search_Item_gallery_All_data($tbl_gallery, $cari ){ /* gallery Search */
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			 
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC ");  
  		return $sql;
}



function GetJML_Search_Item_gallery_Publish( $tbl_gallery, $cari ){ /* gallery Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_gallery WHERE 
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


function Select_Item_gallery_Terkait_ALL($tbl_gallery, $keyword , $offset ){ /* gallery Terkait All */
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE keyword LIKE '%$keyword%' ORDER BY judul ASC LIMIT $offset");  
  		return $sql;
}

function Select_Item_gallery_Terkait_Publish($tbl_gallery, $keyword , $offset , $id ){ /* gallery Terkait Publish */
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE id!='$id' AND statustampil = '1' AND keyword LIKE '%$keyword%' ORDER BY judul ASC LIMIT $offset");  
  		return $sql;
}

/* -------------------- */







/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TERKINI ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_Terkini_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_Dikomentari_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND dikomentari != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DENGAN FILE LAMPIRAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_DiLampirkan_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND dilampirkan != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) PILIHAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_Pilihan_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND pilihan != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_Tampil_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND statustampil != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_TidakTampil_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND statustampil == '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_Headline_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND headline != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI HOTSPOT ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_Hotspot_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND hotspot != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_TidakPopuler_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND dilihat < '10' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) POPULER ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategori_Terpopuler_All( $tbl_gallery , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND dilihat > '20' ORDER BY judul ASC");
	return $sql;
}


/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TERKINI ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub' ORDER BY judul ASC");
	return $sql;
}




/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_DiKomentari_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dikomentari != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DENGAN FILE LAMPIRAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_DiLampirkan_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dilampirkan != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) PILIHAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_Pilihan_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND pilihan != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_Tampil_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND statustampil != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_TidakTampil_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND statustampil == '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_Headline_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND headline != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI HOTSPOT ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_Hotspot_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND hotspot != '0' ORDER BY judul ASC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function galleryItem_BacaDataListing_ByKategoriSub_TidakPopuler_All( $tbl_gallery , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dilihat < '10' ORDER BY judul ASC");
	return $sql;
}


 
	/* Buat Direktori Untuk File Item gallery */
	function galleryItem_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/gallery/" . "file_item/" . $tanggalhariini . "/";
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
		return $direktoribuat;
	}


 	
/* ITEM gallery : hitung total item gallery berdasarkan format tanggal bulan dan tahun */	
	function jmlArrtbl_gallery($blnth,$idkat){
		$sqlText = "SELECT count(id) as jml FROM $tbl_gallery where date_format(thedate, '%M %Y') = '$blnth'
					and idkat = $idkat";
					
  		$res = mysql_query($sqlText);
  		$row = mysql_fetch_object($res);
  		$jml = $row->jml;
  		return $jml;	
	}


	function Select_Item_gallery_By_Search($cari)
	{
		
		$sqlText = "SELECT * FROM $tbl_gallery WHERE judul LIKE '%$cari%' OR
			judulinggris 		LIKE '%$cari%' OR subjudul LIKE '%$cari%' OR
			subjudulinggris 	LIKE '%$cari%' OR preview  LIKE '%$cari%' OR
			previewinggris 		LIKE '%$cari%' 
		ORDER BY judul ASC ";  

  		
  		$result = mysql_query($sqlText);
  		return $result;
	}
	
	
	
	

	/* select detail item gallery berdasarkan id terpilih */	
	function Select_Detail_Item_gallery($tbl_gallery, $id){
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}

	

	/* Hitung Jumlah gallery By Kategori & Sub Kategori */
	function GetJmlTotalgallery( $tbl_gallery, $idkategori, $idkategorisub ){
  		$sqlText = "SELECT count(id) AS jml FROM $tbl_gallery WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	
	function GetJmlTotalgalleryByUser( $idkategori , $idkategorisub , $posted ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_gallery WHERE 
		idkategori = '$idkategori' AND 
		idkategorisub = '$idkategorisub' AND 
		posted = '$posted'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
 
 
 	function GetJmlTotal_galleryTerkini( $tbl_gallery, $idkategori, $idkategorisub ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_gallery";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
 
 	function gallery_hostpot($sesid){
		$sqlText = "SELECT * FROM $tbl_gallery where hostpot_headline = 1 and sesid = $sesid ORDER BY thedate DESC, thetime DESC limit 4 ";
		return mysql_query($sqlText);
	}
	
	function gallery_hostpot_rev($time_stam,$sesid){	
  		$sqlText = "SELECT * FROM $tbl_gallery where thejmt < $time_stam and hostpot_headline = 1 and sesid = $sesid ORDER BY thejmt DESC limit 4";  
  		return mysql_query($sqlText);
	}
	
	
	function list_indeks_gallery($time_stam,$sesid){
  		$sqlText = "SELECT * FROM $tbl_gallery where thedate = '$time_stam' and sesid = $sesid ORDER BY thedate DESC";  
  		return mysql_query($sqlText);
	}
	
	
	function detail_gallery_hostpot($sesid){
		$sqlText = "SELECT * FROM $tbl_gallery where hostpot_headline = 1 and sesid = $sesid ORDER BY thedate DESC, thetime DESC";
		$result = mysql_query($sqlText);
		return mysql_fetch_object($result);
	}
	
	
	function detail_gallery_hostpot_rev($time_stam,$sesid){
   		$sqlText = "SELECT * FROM $tbl_gallery where thejmt < $time_stam and hostpot_headline = 1 and sesid = $sesid ORDER BY thejmt DESC";  
  		$result = mysql_query($sqlText);
		return mysql_fetch_object($result);
	}
	
	function gallery_hostpot_kategori($idkat){
		$sqlText = "SELECT * FROM $tbl_gallery where gallery_single = 1 and idkat = $idkat ORDER BY thedate DESC, thetime DESC";
		$result = mysql_query($sqlText);
		return mysql_fetch_object($result);
	}


	
	function gallery_hostpot_kategori_rev($time_stam,$idkat){
  		
  		$sqlText = "SELECT * FROM $tbl_gallery where thejmt < $time_stam and gallery_single = 1 and idkat = $idkat ORDER BY thejmt DESC";  
  		$result = mysql_query($sqlText);
		return mysql_fetch_object($result);
	}
	
	
	
	function cekKategorigallery($idkat){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_gallery where idkat = $idkat";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	

	
/* ITEM gallery : Update item gallery dilihat */
	function galleryDiLihat( $tbl_gallery, $Det ){
	
			$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE id='$Det'");
			$datagallery = mysql_fetch_array($sql);
			$dilihat = $datagallery ['dilihat'];
			$dilihat = $dilihat+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_gallery SET dilihat='$dilihat' WHERE id='$Det'");
			
			return $sqlupdate;
	}



/* ITEM gallery : select detail item gallery berdasarkan tanggal tampil, jam tampil , status tampil */
	function ViewDetail_Item_gallery( $tbl_gallery, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE id = '$id'");
		$result = mysql_fetch_object($sql);
		return $result;
	}

/* View detail gallery by kategori , sub kategori  */
	function ViewDetail_Item_gallery_Kategori( $tbl_gallery, $idkategori, $idkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			idkategori = '$idkategori' AND 
			idkategorisub = '$idkategorisub' 
			
		ORDER BY id DESC
		");
		$result = mysql_fetch_object($sql);
		return $result;
	}


	
/* ITEM gallery : select item gallery berdasarkan tanggal tampil >= tanggal saat ini  , jam tampil >= jam saat ini , status tampil = 1 */	
	
	function galleryTerbaru($tbl_gallery, $tanggalhariini, $Cat, $SubCat ){
		$sqlText = "SELECT * FROM $tbl_gallery WHERE 
						
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
/* ITEM gallery : select item gallery berdasarkan tanggal tampil = tanggal kemarin, status tampil = 1 , kanal dan sub kanal terkait pengurutan berdasarkan tanggal tampil & jam tampil limit 5 baris */
	function galleryKemaren( $tbl_gallery, $tglkemarin, $Cat, $SubCat ){
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE

						tgltampil = '$tglkemarin' AND
						statustampil='1' AND 

						idkategori = '$Cat' AND 
						idkategorisub = '$SubCat' 
						
						ORDER BY 
						
						tgltampil DESC, jamtampil DESC limit 5");
		return $sql;
	}


	function galleryTerkait( $tbl_gallery, $tanggalhariini, $Cat, $SubCat )
	{
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE
		
						tgltampil <= '$tanggalhariini' AND
						jamtampil <= '$jamsaatini' AND
						statustampil='1' AND 
		
						idkategori = '$Cat' AND 
						idkategorisub = '$SubCat' 
						
						ORDER BY judul ASC limit 5");
						
		return $sql;
	}
	
/* ITEM gallery : select item gallery berdasarkan kanal terkait */	
	function galleryKategoriTerkait( $tbl_gallery,  $tanggalhariini, $Cat, $Det )
	{
	
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE
		
						tgltampil <= '$tanggalhariini' AND
						statustampil='1' AND 
		
						idkategori = '$Cat'
						 
						
						ORDER BY judul ASC limit 7");
						
		return $sql;
	}




function galleryItem_PageLimit_Terkini_By_Kategori_Publik( $tbl_gallery, $tanggalhariini, $idkategori , $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			idkategori = '$idkategori'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
		
}

function galleryItem_PageLimit_Terkini_By_SubKategori_Publik( $tbl_gallery, $tanggalhariini, $idkategori , $idkategorisub, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			tgltampil <= '$timeunix'
			statustampil='1' AND
			idkategori = '$idkategori' AND
			idkategorisub = '$idkategorisub'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}


 
 
/* Terkini Homepage */
function galleryItem_PageLimit_Terkini_All_Publik( $tbl_gallery, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			tgltampil <= '$tanggalhariini'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* Terkini By Kanal */
function galleryItem_PageLimit_Terkini_All_Publik_By_Kategori( $tbl_gallery, $idkategori, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* Terkini By SubKanal */
function galleryItem_PageLimit_Terkini_All_Publik_By_SubKategori( $tbl_gallery, $idkategorisub, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			idkategorisub = '$idkategorisub' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}



/* gallery Terpopuler publik */
function galleryItem_PageLimit_Populer_All_Publik( $tbl_gallery, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			dilihat >= '5'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* gallery Terpopuler Berdasarkan Kategori Terkait */
function galleryItem_PageLimit_Populer_All_Publik_ByKategori( $tbl_gallery, $idkategori, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			tgltampil <= '$tanggalhariini' AND
			dilihat >= '5'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* Halaman Sub Kanal Untuk Box gallery Terpopuler Berdasarkan Sub Kategori Terkait */
function galleryItem_PageLimit_Populer_All_Publik_BySubKategori( $tbl_gallery, $idkategorisub, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			 
			idkategorisub = '$idkategorisub' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			dilihat >= '5'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}







/* gallery terkomentari publik */
function galleryItem_PageLimit_Terkomentari_All_Publik( $tbl_gallery, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			dikomentari = '1'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* gallery pilihan publik */
function galleryItem_PageLimit_Pilihan_All_Publik( $tbl_gallery, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			pilihan = '1'
			
		ORDER BY judul ASC LIMIT $dataPerPage");
		return $sql;
}

/* Revisi 10/12/2010 */
function Detail_galleryItem_Publik_Hotspot( $tbl_gallery, $idkategori, $idsubkategori, $tanggalhariini ){
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			idkategori = '$idkategori' AND
			idkategorisub = '$idsubkategori' AND
			tgltampil <= '$tanggalhariini' AND
			headline = '1' AND
			statustampil='1' 
			ORDER BY judul ASC
		");
		$result = mysql_fetch_object($sql);
		return $result;
}

function Select_galleryItem_Publik_LineUnderHotspot( $tbl_gallery, $idkategori, $idsubkategori, $tanggalhariini, $limit ){ /* Line Item gallery Under Hotspot Sub Kanal */
		$sql = mysql_query("
		SELECT * FROM $tbl_gallery WHERE 
			idkategori = '$idkategori' AND
			idkategorisub = '$idsubkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		 ORDER BY judul ASC LIMIT $limit	
		");
		return $sql;
}

function galleryItem_PageLimit_Headline_UtamaHome( $tbl_gallery, $tanggalhariini , $dataPerPage ){

					$sql = mysql_query("
						SELECT * FROM gallery WHERE 
							tgltampil <='$tanggalhariini' AND
							statustampil ='1' AND
							headline = '1' 
								ORDER BY judul ASC
						LIMIT $dataPerPage
					");
					return $sql;
}


function galleryItem_PageLimit_Headline_By_Kategori_Publik( $tbl_gallery, $tanggalhariini, $idkategori , $dataPerPage ){
					$sql = mysql_query("
						SELECT * FROM gallery WHERE 
							tgltampil <='$tanggalhariini' AND
							statustampil ='1' AND
							idkategori = '$idkategori' AND
							headline = '1' 
								ORDER BY judul ASC
						LIMIT $dataPerPage
					");
					return $sql;
}

function galleryItem_PageLimit_Headline_By_SubKategori_Publik( $tbl_gallery, $tanggalhariini, $idkategorisub , $dataPerPage ){
					$sql = mysql_query("
						SELECT * FROM gallery WHERE 
							tgltampil <='$tanggalhariini' AND
							statustampil ='1' AND
							idkategorisub = '$idkategorisub' AND
							headline = '1' 
								ORDER BY judul ASC
						LIMIT $dataPerPage
					");
					return $sql;
}


function galleryItem_PageLimit_Headline_Line_By_Kategori_Publik( $tbl_gallery, $tanggalhariini, $idkategori , $dataPerPage ){

					$sql = mysql_query("
						SELECT * FROM gallery WHERE 
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



	function Search_Item_gallery_By_Publik($cari, $tanggalhariini){
		
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
		
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND 
							
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY judul ASC ");  

  		return $sql;
	}
	

	function  galleryItem_HapusData( $tbl_gallery, $id){ /* Hapus Data Item */
		$sql = mysql_query("
			DELETE FROM $tbl_gallery WHERE id='$id'
		");
		return $sql;
	}
	
	
	function galleryItem_StatusTampil( $tbl_gallery, $statustampil, $id ){ /* Tampil Kan Data */
		$sql = mysql_query("
			UPDATE $tbl_gallery SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
		return $sql;
	}


	function galleryItem_HeadlineTampil( $tbl_gallery, $statustampil, $id ){ /* Tampilkan data di headline terkait */
		$sql = mysql_query("
			UPDATE $tbl_gallery SET
				headline = '$statustampil' 
			WHERE
				id = '$id'
		");
		return $sql;
	}


	function galleryItem_PilihanTampil( $tbl_gallery, $statustampil, $id ){ /* tampilkan data pada pilihan terkait */
		$sql = mysql_query("
			UPDATE $tbl_gallery SET
				pilihan = '$statustampil' 
			WHERE
			id = '$id'
		");
		return $sql;
	}

	function galleryItem_HotspotTampil( $tbl_gallery, $statustampil, $id ){ /* tampilkan data pada hotspot terkait */
		$sql = mysql_query("
			UPDATE $tbl_gallery SET
				hotspot = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}



	function galleryItem_HapusImage( $tbl_gallery, $id ){
		$sql = mysql_query("
			UPDATE $tbl_gallery SET
				gambarkecil = '',
				gambarbesar = '',
				direktorigambar = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function galleryItem_UpdateFileLampiran( $tbl_gallery, $id , $status ){
		$sql = mysql_query("
			UPDATE $tbl_gallery SET
				dilampirkan = '$status'
			WHERE
				id = '$id'
		");
	return $sql;
	}
	

	function galleryItem_UpdateKomentar( $tbl_gallery, $id , $status  ){
		$sql = mysql_query("
			UPDATE $tbl_gallery SET
				dikomentari = '$status'
			WHERE
				id = '$id'
		");
	return $sql;
	}
	

	function SelectPublish_galleryItem_Terkait( $tbl_gallery, $idkategori, $keyword , $tanggalhariini ){ /* Publish Item gallery Terkait */
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND 
			keyword LIKE '%$keyword%' 
		ORDER BY judul ASC ");  
  		return $sql;
	}
	
	function SelectNonPublish_galleryItem_Terkait( $tbl_gallery, $idkategori, $keyword , $tanggalhariini ){ /* Non Publish Item gallery Terkait */
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='0' AND 
			keyword LIKE '%$keyword%' 
		ORDER BY judul ASC ");  
  		return $sql;
	}




function List_Indeks_gallery_Item($tbl_gallery, $tanggalhariini ){ 
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil='1' AND
			tgltampil = '$tanggalhariini'
			ORDER BY judul ASC");  
  		return $sql;
}

function List_Indeks_gallery_Item_By_Tanggal($tbl_gallery, $tanggalhariini ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			tgltampil = '$tanggalhariini'
		ORDER BY judul ASC");  
  		return $sql;
}

function Total_Indeks_gallery_Item_By_Tanggal( $tbl_gallery, $tanggal ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil='1' AND
			tgltampil='$tanggal'  
			ORDER BY judul ASC");  
  		$hitung = mysql_num_rows($sql);
  		 
  		return $hitung;	
}


function List_Indeks_gallery_Item_Kategori_ByPage($tbl_gallery, $idkategori , $offset , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			idkategori ='$idkategori'
		ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


/* List Item gallery By Kategori untuk di homepage */
function List_Indeks_gallery_Item_Kategori_Homepage($tbl_gallery, $idkategori , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			idkategori ='$idkategori'
		ORDER BY judul ASC LIMIT $dataPerPage");  
  		return $sql;
}


/* List Item gallery By Kategori untuk di homepage untuk DI HOT */
function List_Indeks_gallery_Item_Kategori_Homepage_Hot($tbl_gallery, $idkategori , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			judul LIKE '%CHINA%' AND
			idkategori ='$idkategori'
			
		ORDER BY dilihat ASC LIMIT $dataPerPage");  
  		return $sql;
}



/* Fungsi list gallery item berdasarkan sub kategori */
function List_Indeks_gallery_Item_SubKategori_ByPage( $tbl_gallery, $idkategori , $idkategorisub,  $offset , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			idkategori = '$idkategori' AND
			idkategorisub = '$idkategorisub'
		ORDER BY judul ASC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


 function  List_ALL_PUBLISH_Item_gallery_ByKategori_List($tbl_gallery, $tanggalhariini, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			idkategori ='$idkategori'
		ORDER BY judul ASC ");  
  		return $sql;
}


 function  list_all_publish_item_gallery_bykategori_nolimit($tbl_gallery, $idkategori, $idkategorisub ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			idkategori ='$idkategori' AND
			idkategorisub = '$idkategorisub'
		ORDER BY judul ASC ");  
  		return $sql;
}



function  list_all_publish_item_gallery_bysubkategori_limit($tbl_gallery, $idkategorisub, $dataperpage ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			idkategorisub ='$idkategorisub'
		ORDER BY id DESC LIMIT $dataperpage");  
  		return $sql;
}


/* Fungsi menampilkan daftar item data gallery berdasarkan subkategori gallery tanpa pembatasan */
/* Update By Arvino Zulka 13 Agustus 2011 , BEST TOUR */
function  list_all_publish_item_gallery_bysubkategori_nolimit($tbl_gallery, $idkategorisub ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil = '1' AND
			idkategorisub ='$idkategorisub'
		ORDER BY id DESC ");  
  		return $sql;
}

function Total_LIST_ALL_PUBLISH_Indeks_gallery_Item_ByKategori( $tbl_gallery, $tanggal, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil='1' AND
			idkategori='$idkategori'
			ORDER BY judul ASC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;		
}


/* Fungsi menampilkan data item gallery berdasarkan kategori & subkategori */
function Total_LIST_ALL_PUBLISH_Indeks_gallery_Item_BySubKategori( $tbl_gallery, $idkategori, $idkategorisub ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil='1' AND
			idkategori='$idkategori' AND
			idkategorisub='$idkategorisub'
			ORDER BY judul ASC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}

function Total_Indeks_gallery_Item( $tbl_gallery, $tanggalhariini ){  
		$sql = mysql_query("SELECT * FROM $tbl_gallery WHERE 
			statustampil='1' AND
			tgltampil = '$tanggalhariini'
			ORDER BY judul ASC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}
	

	

function List_Item_gallery_Publish_view_Halaman( $tbl_gallery, $idkategori, $idsubkategori,$offset, $dataPerPage ){
		$sql = mysql_query("
				SELECT * FROM $tbl_gallery WHERE 
						statustampil = '1' AND
						idkategori='$idkategori' AND
						idkategorisub='$idsubkategori' 
			
				ORDER BY judul ASC
				LIMIT $offset, $dataPerPage
			
		");
		return $sql;
}


function List_gallery_File_Group_With_LimitPage( $tbl_gallery, $idkategori, $idsubkategori , $offset, $dataPerPage){

	$sql = mysql_query("
				SELECT * FROM $tbl_gallery WHERE 

						idkategori='$idkategori' AND
						idkategorisub='$idsubkategori' 
			
				ORDER BY judul ASC
				LIMIT $offset, $dataPerPage
			
		");
		
	return $sql;
}







/* 22 Maret 2011 */
function galleryItem_PageLimit_Terkini( $tbl_gallery, $dataPerPage ){

					$sql = mysql_query("
						SELECT * FROM $tbl_gallery ORDER BY id DESC LIMIT $dataPerPage
					");
					return $sql;
}


function galleryItem_PageLimit_Terkini_Headline( $tbl_gallery, $dataPerPage ){

					$sql = mysql_query("
						SELECT * FROM $tbl_gallery WHERE gambarbesar !='' ORDER BY dilihat DESC LIMIT $dataPerPage
					");
					return $sql;
}



 
function list_all_gallery_item_terkini_bykategori( $tbl_gallery ){
	$sql = mysql_query("SELECT * FROM $tbl_gallery ORDER BY idkategori ASC");
	return $sql;
}

function list_gallery_item_by_kategori_publik( $tbl_gallery, $idkategori , $dataPerPage ){
$sql = mysql_query("
	SELECT * FROM $tbl_gallery WHERE 
		statustampil = '1' AND 
		idkategori = '$idkategori'  
	ORDER BY id DESC 
		LIMIT $dataPerPage
	
");
return $sql;

}



?>