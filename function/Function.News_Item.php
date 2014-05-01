<?php 
/* Fungsi Buat ID Otomatis Untuk ID news Item . */
	function newsItem_CreateID( $tbl_news ){
		$sql = mysql_query("SELECT * FROM $tbl_news ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 	/*  Fungsi Periksa Judul news Kategori */
	function newsItem_PeriksaJudul( $tbl_news, $judul, $judulinggris ){
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE judul = '$judul' AND judulinggris = '$judulinggris'");
		return $sql;	
	}

 
 	/* FUNGSI TAMBAH DATA ITEM news */
	function newsItem_TambahData(
		$tbl_news,
		$id, $idupline, $idkategori, $idkategorisub,
		$judul, $judulinggris, $subjudul, $subjudulinggris,
		$preview, $previewinggris, $deskripsi, $deskripsiinggris, $penulis,
		$tglpost, $jampost, $tgltampil, $jamtampil, $tglselesai, $jamselesai,
		$timeunix, $gambarkecil, $gambarbesar,
		$keterangangambar, $imagelogo, $dikomentari,
		$dilampirkan, $dilihat, $statustampil, $headline, $headlinesection, 
		$idusers, $idadmin, $direktorigambar,
		$linkjudul, $wordtag, $keyword
	){
		$sql = mysql_query("INSERT INTO $tbl_news
		(

				id, idupline, idkategori, idkategorisub,
				judul, judulinggris, subjudul, subjudulinggris,
				preview, previewinggris,
				deskripsi, deskripsiinggris, penulis,
				tglpost, jampost,
				tgltampil, jamtampil, tglselesai, jamselesai,
				timeunix, gambarkecil, gambarbesar,
				keterangangambar, 
				imagelogo, dikomentari, dilampirkan,
				dilihat, statustampil, headline, headlinesection, idusers, idadmin,
				direktorigambar, linkjudul, wordtag, keyword

		)VALUES(
	
				'$id', '$idupline',
				'$idkategori', '$idkategorisub',
				'$judul', '$judulinggris',
				'$subjudul','$subjudulinggris',
				'$preview','$previewinggris',
				'$deskripsi','$deskripsiinggris', '$penulis',
				'$tglpost','$jampost',
				'$tgltampil','$jamtampil', '$tglselesai', '$jamselesai',
				'$timeunix',
				'$gambarkecil','$gambarbesar',
				'$keterangangambar',
				'$imagelogo', '$dikomentari', '$dilampirkan',
				'$dilihat', '$statustampil', '$headline', '$headlinesection', 
				'$idusers', '$idadmin',
				'$direktorigambar', '$linkjudul', '$wordtag', '$keyword'
  
		)");
		return $sql;
	}
	
	
/* FUNGSI BACA DATA ITEM DETIL */
function newsItem_BacaDataDetil( $tbl_news, $id ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE id = '$id'");
	$result = mysql_fetch_object($sql);
	return $result;
}



/* FUNGSI UPDATE DATA ITEM */
function newsItem_UpdateData(
		$tbl_news,
		$id, $idupline, $idkategori,
		$idkategorisub, $judul, $judulinggris,
		$subjudul, $subjudulinggris,
		$preview, $previewinggris,
		$deskripsi, $deskripsiinggris, $penulis,
		$tglpost, $jampost,
		$tgltampil, $jamtampil, $tglselesai, $jamselesai, $timeunix, $gambarkecil, $gambarbesar,
		$keterangangambar, $imagelogo, $dikomentari, $dilampirkan, $dilihat,
		$statustampil, $headline, $headlinesection, $idusers, $idadmin, $direktorigambar, $linkjudul, $wordtag, $keyword
		){
		$sql = mysql_query(
		"
UPDATE $tbl_news SET 

	idupline ='$idupline', 	idkategori ='$idkategori',
	idkategorisub ='$idkategorisub', judul ='$judul', judulinggris ='$judulinggris', 	
	subjudul = '$subjudul', subjudulinggris = '$subjudulinggris',
	preview = '$preview', previewinggris = '$previewinggris',
	deskripsi ='$deskripsi', deskripsiinggris ='$deskripsiinggris', penulis = '$penulis', tglpost ='$tglpost', jampost ='$jampost',
	tgltampil ='$tgltampil', jamtampil ='$jamtampil', 
	tglselesai = '$tglselesai', jamselesai = '$jamselesai',
	timeunix = '$timeunix', gambarkecil ='$gambarkecil',
	gambarbesar ='$gambarbesar', keterangangambar ='$keterangangambar', imagelogo ='$imagelogo',
	dikomentari ='$dikomentari', dilampirkan ='$dilampirkan', dilihat ='$dilihat',
	statustampil ='$statustampil', headline = '$headline', headlinesection = '$headlinesection',  idusers ='$idusers', idadmin ='$idadmin',
	direktorigambar ='$direktorigambar', linkjudul ='$linkjudul', wordtag = '$wordtag', keyword ='$keyword'

WHERE
	id ='$id'
		");
		
return $sql;
		
}



 function newsItem_BacaDataListing_All( $tbl_news , $offset , $dataPerPage){
	$sql = mysql_query("SELECT * FROM $tbl_news ORDER BY id DESC LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_newsItem_BacaDataListing_All( $tbl_news ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_news");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_DiKomentari_All( $tbl_news , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE dikomentari != '0' ORDER BY id DESC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_newsItem_BacaDataListing_DiKomentari_All( $tbl_news ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_news WHERE dikomentari != '0' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DENGAN FILE LAMPIRAN ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_DiLampirkan_All( $tbl_news  , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE dilampirkan != '0' ORDER BY id DESC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_newsItem_BacaDataListing_DiLampirkan_All( $tbl_news ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_news WHERE dilampirkan != '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


 
 

/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_Tampil_All( $tbl_news , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE statustampil = '0' ORDER BY id DESC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_newsItem_BacaDataListing_Tampil_All( $tbl_news ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_news WHERE statustampil = '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}



/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_Headline_All( $tbl_news , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE headline != '0' ORDER BY id DESC	LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_newsItem_BacaDataListing_Headline_All( $tbl_news ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_news WHERE headline != '0' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


 
 
function newsItem_BacaDataListing_Terpopuler_All_ByPage( $tbl_news , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_news ORDER BY dilihat DESC LIMIT $offset, $dataPerPage");
	return $sql;
}
 
function newsItem_BacaDataListing_Terpopuler_All( $tbl_news ){
/* Terpopuler sortir dilihat desc */
	$sql = mysql_query("SELECT * FROM $tbl_news ORDER BY dilihat DESC");
	return $sql;
}


function GetJML_newsItem_BacaDataListing_Terpopuler_All( $tbl_news ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_news WHERE dilihat >= '10' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


function Search_Item_news_ALL($tbl_news, $cari , $offset , $dataPerPage ){ /* news Search */
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
		
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}




function GetJML_Search_Item_news_ALL( $tbl_news, $cari ){ /* news Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_news WHERE 
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 

			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}
	

function Search_Item_news_Publish_ByPage($tbl_news, $cari , $offset , $dataPerPage ){ /* news Search */
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 

			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function Search_Item_news_Publish($tbl_news, $cari ){ /* news Search */
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			 
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY id DESC");  
  		return $sql;
}

 function Search_Item_news_All_data($tbl_news, $cari ){ /* news Search */
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			 
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY id DESC");  
  		return $sql;
}



function GetJML_Search_Item_news_Publish( $tbl_news, $cari ){ /* news Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_news WHERE 
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


function Select_Item_news_Terkait_ALL($tbl_news, $keyword , $offset ){ /* news Terkait All */
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE keyword LIKE '%$keyword%' ORDER BY id DESC LIMIT $offset");  
  		return $sql;
}

function Select_Item_news_Terkait_Publish($tbl_news, $keyword , $offset , $id ){ /* news Terkait Publish */
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE id!='$id' AND statustampil = '1' AND keyword LIKE '%$keyword%' ORDER BY id DESC LIMIT $offset");  
  		return $sql;
}

/* -------------------- */







/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TERKINI ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategori_Terkini_All( $tbl_news , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' ORDER BY id DESC");
	return $sql;
}


/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TERKINI ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub' ORDER BY id DESC");
	return $sql;
}







/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategori_Dikomentari_All( $tbl_news , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND dikomentari != '0' ORDER BY id DESC");
	return $sql;
}

  
/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategori_Tampil_All( $tbl_news , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND statustampil != '0' ORDER BY id DESC");
	return $sql;
}






/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategori_TidakTampil_All( $tbl_news , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND statustampil == '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategori_Headline_All( $tbl_news , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND headline != '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) DI HOTSPOT ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategori_Hotspot_All( $tbl_news , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND hotspot != '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategori_TidakPopuler_All( $tbl_news , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND dilihat < '10' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY KATEGORI ) POPULER ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategori_Terpopuler_All( $tbl_news , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND dilihat > '20' ORDER BY id DESC");
	return $sql;
}






/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TERKOMENTARI ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_DiKomentari_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dikomentari != '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DENGAN FILE LAMPIRAN ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_DiLampirkan_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dilampirkan != '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) PILIHAN ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_Pilihan_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND pilihan != '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_Tampil_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND statustampil != '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_TidakTampil_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND statustampil == '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI HEADLINE ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_Headline_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND headline != '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) DI HOTSPOT ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_Hotspot_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND hotspot != '0' ORDER BY id DESC");
	return $sql;
}

/* FUNGSI BACA DATA ITEM LISTING ( BY SUB KATEGORI ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function newsItem_BacaDataListing_ByKategoriSub_TidakPopuler_All( $tbl_news , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND dilihat < '10' ORDER BY id DESC");
	return $sql;
}


 
	/* Buat Direktori Untuk File Item news */
	function newsItem_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/news/" . "file_item/" . $tanggalhariini . "/";
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
		return $direktoribuat;
	}


	/* select detail item news berdasarkan id terpilih */	
	function Select_Detail_Item_news($tbl_news, $id){
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}

	

	/* Hitung Jumlah news By Kategori & Sub Kategori */
	function GetJmlTotalnews( $tbl_news, $idkategori, $idkategorisub ){
  		$sqlText = "SELECT count(id) AS jml FROM $tbl_news WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	
	function GetJmlTotalnewsByUser( $idkategori , $idkategorisub , $posted ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_news WHERE 
		idkategori = '$idkategori' AND 
		idkategorisub = '$idkategorisub' AND 
		posted = '$posted'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
 
 
 	function GetJmlTotal_newsTerkini( $tbl_news, $idkategori, $idkategorisub ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_news";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
 	
 
 
	
/* ITEM news : Update item news dilihat */
	function newsDiLihat( $tbl_news, $Det ){
	
			$sql = mysql_query("SELECT * FROM $tbl_news WHERE id='$Det'");
			$datanews = mysql_fetch_object($sql);
			$dilihat = $datanews->dilihat;
			$dilihat = $dilihat+1;
			$tgldibaca = date('YmdHi');
			$sqlupdate = mysql_query("UPDATE $tbl_news SET dilihat='$dilihat', tglbaca='$tgldibaca' WHERE id='$Det'");
			
			return $sqlupdate;
	}


/* ITEM news : select detail item news berdasarkan tanggal tampil, jam tampil , status tampil */
	function ViewDetail_Item_news( $tbl_news, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE id = '$id'");
		$result = mysql_fetch_object($sql);
		return $result;
	}
	

/* View detail News by kategori , sub kategori  */
	function ViewDetail_Item_news_Kategori( $tbl_news, $idkategori, $idkategorisub ){
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			idkategori = '$idkategori' AND 
			idkategorisub = '$idkategorisub' 
			
		ORDER BY id DESC
		");
		$result = mysql_fetch_object($sql);
		return $result;
	}


	
	
/* ITEM news : select item news berdasarkan tanggal tampil >= tanggal saat ini  , jam tampil >= jam saat ini , status tampil = 1 */	
	
	function newsTerbaru($tbl_news, $tanggalhariini, $Cat, $SubCat ){
		$sqlText = "SELECT * FROM $tbl_news WHERE 
						
						tgltampil <= '$tanggalhariini' AND
						jamtampil <= '$jamsaatini' AND
						statustampil = '1' AND 

						idkategori = '$Cat' AND 
						idkategorisub = '$SubCat' AND
						
						ORDER BY id DESC, jamtampil DESC limit 5";
						
		return mysql_query($sqlText);
	}
	
/* ambil data kemarin */	
	$tglkemarin = date("Y-m-d",mktime (0,0,0, date("m"), date("d")-1, date("Y")));
/* ITEM news : select item news berdasarkan tanggal tampil = tanggal kemarin, status tampil = 1 , kanal dan sub kanal terkait pengurutan berdasarkan tanggal tampil & jam tampil limit 5 baris */
	function newsKemaren( $tbl_news, $tglkemarin, $Cat, $SubCat ){
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE

						tgltampil = '$tglkemarin' AND
						statustampil='1' AND 

						idkategori = '$Cat' AND 
						idkategorisub = '$SubCat' 
						
						ORDER BY 
						
						tgltampil DESC, jamtampil DESC limit 5");
		return $sql;
	}


 
 

function newsItem_PageLimit_Terkini_By_Kategori_Publik( $tbl_news, $tanggalhariini, $idkategori , $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			idkategori = '$idkategori'
			
		ORDER BY id DESC LIMIT $dataPerPage");
		return $sql;
		
}

function newsItem_PageLimit_Terkini_By_SubKategori_Publik( $tbl_news, $tanggalhariini, $idkategori , $idkategorisub, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			tgltampil <= '$timeunix'
			statustampil='1' AND
			idkategori = '$idkategori' AND
			idkategorisub = '$idkategorisub'
			
		ORDER BY id DESC LIMIT $dataPerPage");
		return $sql;
}


 


/* Terkini Homepage */
function newsItem_PageLimit_Terkini_All_Publik( $tbl_news, $time_now, $dataPerPage, $except_category ){
	
$pecah = explode(",",$except_category);
$hitung = count($pecah);
for($a=0;$a<=$hitung-1;$a++){ 
$hasil_pecah .= " idkategori != '" . strtolower($pecah[$a]). "' AND";
}
$hasil_pecah2 = substr($hasil_pecah,0,-4);


		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
		
			  
			statustampil = '1' AND
			timeunix <='$time_now' AND
			
			$hasil_pecah2
			
		ORDER BY timeunix DESC LIMIT $dataPerPage");
		return $sql;
}

/* Terkini By Kanal */
function newsItem_PageLimit_Terkini_All_Publik_By_Kategori( $tbl_news, $idkategori, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY id DESC LIMIT $dataPerPage");
		return $sql;
}

/* Terkini By SubKanal */
function newsItem_PageLimit_Terkini_All_Publik_By_SubKategori( $tbl_news, $idkategorisub, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			idkategorisub = '$idkategorisub' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY id DESC LIMIT $dataPerPage");
		return $sql;
}



/* news Terpopuler publik */
function newsItem_PageLimit_Populer_All_Publik( $tbl_news, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			dilihat !='' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY dilihat DESC LIMIT $dataPerPage");
		return $sql;
}

/* news Terpopuler Berdasarkan Kategori Terkait */
function newsItem_PageLimit_Populer_All_Publik_ByKategori( $tbl_news, $idkategori, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			dilihat !='' AND
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY dilihat DESC LIMIT $dataPerPage");
		return $sql;
}

/* Halaman Sub Kanal Untuk Box news Terpopuler Berdasarkan Sub Kategori Terkait */
function newsItem_PageLimit_Populer_All_Publik_BySubKategori( $tbl_news, $idkategorisub, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			dilihat !='' AND
			idkategorisub = '$idkategorisub' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1'
		ORDER BY dilihat DESC LIMIT $dataPerPage");
		return $sql;
}



/* Baru dibaca Homepage */
function newsItem_PageLimit_Barudibaca_All_Publik( $tbl_news, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			tglbaca !='' AND
			statustampil = '1' AND
			tgltampil <= '$tanggalhariini'
		ORDER BY tglbaca DESC LIMIT $dataPerPage");
		return $sql;
}

/* Baru dibaca By Kanal */
function newsItem_PageLimit_Barudibaca_All_Publik_By_Kategori( $tbl_news, $idkategori, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			tglbaca !='' AND
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY tglbaca DESC LIMIT $dataPerPage");
		return $sql;
}

/* Baru dibaca By SubKanal */
function newsItem_PageLimit_Barudibaca_All_Publik_By_SubKategori( $tbl_news, $idkategorisub, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			tglbaca !='' AND
			idkategorisub = '$idkategorisub' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		ORDER BY tglbaca DESC LIMIT $dataPerPage");
		return $sql;
}


/* news terkomentari publik */
function newsItem_PageLimit_Terkomentari_All_Publik( $tbl_news, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			dikomentari = '1'
			
		ORDER BY id DESC LIMIT $dataPerPage");
		return $sql;
}

/* news pilihan publik */
function newsItem_PageLimit_Pilihan_All_Publik( $tbl_news, $tanggalhariini, $dataPerPage ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND
			pilihan = '1'
			
		ORDER BY id DESC LIMIT $dataPerPage");
		return $sql;
}

/* Revisi 10/12/2010 */
function Detail_newsItem_Publik_Hotspot( $tbl_news, $idkategori, $idkategorisub ){
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
				idkategori = '$idkategori' AND
				idkategorisub = '$idkategorisub' AND
				statustampil='1' 
			ORDER BY id DESC
		");
		$result = mysql_fetch_object($sql);
		return $result;
}

function Select_newsItem_Publik_LineUnderHotspot( $tbl_news, $idkategori, $idsubkategori, $tanggalhariini, $limit ){ /* Line Item news Under Hotspot Sub Kanal */
		$sql = mysql_query("
		SELECT * FROM $tbl_news WHERE 
			idkategori = '$idkategori' AND
			idkategorisub = '$idsubkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' 
		 ORDER BY id DESC LIMIT $limit	
		");
		return $sql;
}




function newsItem_PageLimit_Headline_UtamaHome( $tbl_news, $time_now , $dataPerPage ){ /* Fungsi ini dipakai dibox news headline slider homepage */

					$sql = mysql_query("
						SELECT * FROM $tbl_news WHERE 
							timeunix <='$time_now' AND
							statustampil ='1' AND
							headline = '1'  
								ORDER BY timeunix DESC							
						LIMIT $dataPerPage
					");
					return $sql;
}


function newsItem_PageLimit_Headline_By_Kategori_Publik( $tbl_news, $tanggalhariini, $idkategori , $dataPerPage ){
					$sql = mysql_query("
						SELECT * FROM $tbl_news WHERE 
							tgltampil <='$tanggalhariini' AND
							statustampil ='1' AND
							idkategori = '$idkategori' AND
							headlinesection = '1' 
								ORDER BY timeunix DESC
						LIMIT $dataPerPage
					");
					return $sql;
}

function newsItem_PageLimit_Headline_By_SubKategori_Publik( $tbl_news, $tanggalhariini, $idkategori, $idkategorisub , $dataPerPage ){
					$sql = mysql_query("
						SELECT * FROM $tbl_news WHERE 
							tgltampil <='$tanggalhariini' AND
							statustampil = '1' AND
							idkategori = '$idkategori' AND 
							idkategorisub = '$idkategorisub' AND
							headlinesection = '1' 
								ORDER BY timeunix DESC
						LIMIT $dataPerPage
					");
					return $sql;
}


function newsItem_PageLimit_Headline_Line_By_Kategori_Publik( $tbl_news, $tanggalhariini, $idkategori , $dataPerPage ){

					$sql = mysql_query("
						SELECT * FROM news WHERE 
							statustampil = '1' AND
							tgltampil <= '$tanggalhariini' AND
				  			idkategori = '$idkategori' AND
							pilihan = '1' AND
							headline !='1'
						 
								ORDER BY id DESC

						LIMIT $dataPerPage
					");
					return $sql;


}

/* Fungsi untuk menghitung berita terkait berdasarkan tagterkait */
function newsItem_Count_BeritaTerkait_Headline_Homepage( $tbl_news, $time_now, $id, $idkategori ,  $idkategorisub , $tagterkait , $dataPerPage ){  /* Hitung berita terkait */

		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			timeunix <='$time_now' AND
			statustampil='1' AND 
			id != '$id' AND
			idkategori = '$idkategori' AND
			idkategorisub = '$idkategorisub' AND 
			deskripsi  LIKE '%$tagterkait%' 
		ORDER BY timeunix DESC LIMIT $dataPerPage");  
		$result = mysql_num_rows($sql);
		return $result;
}





	function Search_Item_news_By_Publik($cari, $tanggalhariini){
		
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
		
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND 
							
			judul LIKE '%$cari%' OR
			judulinggris LIKE '%$cari%' OR 
 
			deskripsi  LIKE '%$cari%' OR
			deskripsiinggris LIKE '%$cari%' 
			
		ORDER BY id DESC");  

  		return $sql;
	}
	

	function  newsItem_HapusData( $tbl_news, $id){ /* Hapus Data Item */
		$sql = mysql_query("
			DELETE FROM $tbl_news WHERE id='$id'
		");
		return $sql;
	}
	
	
	function newsItem_StatusTampil( $tbl_news, $statustampil, $id ){ /* Tampil Kan Data */
		$sql = mysql_query("
			UPDATE $tbl_news SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
		return $sql;
	}


	function newsItem_HeadlineTampil( $tbl_news, $statustampil, $id ){ /* Tampilkan data di headline terkait */
		$sql = mysql_query("
			UPDATE $tbl_news SET
				headline = '$statustampil' 
			WHERE
				id = '$id'
		");
		return $sql;
	}


	function newsItem_PilihanTampil( $tbl_news, $statustampil, $id ){ /* tampilkan data pada pilihan terkait */
		$sql = mysql_query("
			UPDATE $tbl_news SET
				pilihan = '$statustampil' 
			WHERE
			id = '$id'
		");
		return $sql;
	}

	function newsItem_HotspotTampil( $tbl_news, $statustampil, $id ){ /* tampilkan data pada hotspot terkait */
		$sql = mysql_query("
			UPDATE $tbl_news SET
				hotspot = '$statustampil' 
			WHERE
			id = '$id'
		");
	return $sql;
	}



	function newsItem_HapusImage( $tbl_news, $id ){
		$sql = mysql_query("
			UPDATE $tbl_news SET
				gambarkecil = '',
				gambarbesar = '',
				direktorigambar = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}

	function newsItem_UpdateFileLampiran( $tbl_news, $id , $status ){
		$sql = mysql_query("
			UPDATE $tbl_news SET
				dilampirkan = '$status'
			WHERE
				id = '$id'
		");
	return $sql;
	}
	

	function newsItem_UpdateKomentar( $tbl_news, $id , $status  ){
		$sql = mysql_query("
			UPDATE $tbl_news SET
				dikomentari = '$status'
			WHERE
				id = '$id'
		");
	return $sql;
	}
	

	function SelectPublish_newsItem_Terkait( $tbl_news, $idkategori, $keyword , $tanggalhariini ){ /* Publish Item news Terkait */
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND 
			keyword LIKE '%$keyword%' 
		ORDER BY id DESC");  
  		return $sql;
	}
	
	function SelectNonPublish_newsItem_Terkait( $tbl_news, $idkategori, $keyword , $tanggalhariini ){ /* Non Publish Item news Terkait */
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='0' AND 
			keyword LIKE '%$keyword%' 
		ORDER BY id DESC");  
  		return $sql;
	}



/* Indeks All Publik */

function List_Indeks_news_Item_all_public( $tbl_news, $time_now ){ 
		$sql = mysql_query("SELECT * FROM $tbl_news  WHERE
				statustampil = '1' AND
				timeunix <= '$time_now' 
			ORDER BY timeunix DESC  
			");  
  		return $sql;
}

function List_Indeks_news_Item_public($tbl_news, $time_now, $offset , $dataPerPage ){ 
		$sql = mysql_query("SELECT * FROM $tbl_news  WHERE
				statustampil = '1' AND
				timeunix <= '$time_now' 
			ORDER BY timeunix DESC LIMIT $offset, $dataPerPage
			");  
  		return $sql;
}


function Total_Indeks_news_Item_public( $tbl_news, $time_now ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
				statustampil = '1' AND
				timeunix <= '$time_now' 
			ORDER BY id DESC");  
  		$hitung = mysql_num_rows($sql);
  		 
  		return $hitung;	
}

/* end Indeks All Publik */


function Total_Indeks_news_Item( $tbl_news, $tanggalhariini ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil='1'  
			ORDER BY id DESC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}


function  list_all_publish_item_news_bykategorijugasubkategori( $tbl_news, $idkategori, $idkategorisub ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
		
			statustampil = '1' AND
			idkategori ='$idkategori' AND
			idkategorisub = '$idkategorisub'
			
		ORDER BY id DESC");  
  		return $sql;
}

function  list_all_publish_item_news_bykategoriAja( $tbl_news, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
		
			statustampil = '1' AND
			idkategori ='$idkategori'
			
		ORDER BY id DESC");  
  		return $sql;
}


function List_Indeks_news_Item_KategoriJugaSubKategori_ByPage( $tbl_news,  $idkategori, $idkategorisub, $offset , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil = '1' AND
		
			idkategori ='$idkategori' AND
			idkategorisub = '$idkategorisub'
			
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function List_Indeks_news_Item_KategoriAja_ByPage( $tbl_news,  $idkategori, $offset , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil = '1' AND
		
			idkategori ='$idkategori' 
			
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function total_list_all_publish_indeks_news_item_bykategorijugasubkategori( $tbl_news,  $idkategori , $idkategorisub ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil='1' AND
			idkategori='$idkategori'  AND
			idkategorisub = '$idkategorisub'
			ORDER BY id DESC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;		
}


function total_list_all_publish_indeks_news_item_bykategoriAja( $tbl_news,  $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil='1' AND
			idkategori='$idkategori'  
			ORDER BY id DESC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;		
}


function List_Indeks_news_Item_Kategori_ByPage( $tbl_news, $tanggalhariini, $idkategori, $offset , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategori ='$idkategori'  
			
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}



function List_Indeks_news_Item_SubKategori_ByPage($tbl_news, $tanggalhariini, $idkategori , $idkategorisub, $offset , $dataPerPage   ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategori = '$idkategori' AND 
			idkategorisub ='$idkategorisub'
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function  list_all_publish_item_news_bykategori( $tbl_news, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
		
			statustampil = '1' AND
			idkategori ='$idkategori'
			
		ORDER BY id DESC");  
  		return $sql;
}

/* Glitch */
function  list_all_publish_item_news_bykategori_list( $tbl_news, $tanggalhariini, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
		
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategori ='$idkategori'
			
		ORDER BY id DESC");  
  		return $sql;
}


 
 function  list_all_publish_item_news_bysubkategori_list($tbl_news, $tanggalhariini, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategorisub ='$idkategori'
			
		ORDER BY id DESC");  
  		return $sql;
}

function total_list_all_publish_indeks_news_item_bykategori( $tbl_news,  $tanggal, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil='1' AND
			tgltampil<='$tanggal' AND
			idkategori='$idkategori'  
			ORDER BY id DESC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;		
}

function total_list_all_publish_indeks_news_item_bysubkategori( $tbl_news, $tanggal, $idkategori, $idkategorisub ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil='1' AND
			tgltampil<='$tanggal' AND
			idkategori = '$idkategori' AND
			idkategorisub = '$idkategorisub'
			ORDER BY id DESC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}



/* Indeks berita berdasarkan tanggal */

function List_Indeks_news_Item_all_By_Tanggal( $tbl_news , $time_now , $tgltampil ){ 
		$sql = mysql_query("SELECT * FROM $tbl_news  WHERE
				statustampil = '1' AND
				timeunix <= '$time_now' AND
				tgltampil = '$tgltampil'
			ORDER BY id DESC  
			");  
  		return $sql;
}


function List_Indeks_news_Item_ByPage_Tanggal($tbl_news,  $time_now , $tgltampil, $offset , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
				statustampil = '1' AND
				timeunix <= '$time_now' AND
				tgltampil = '$tgltampil'
		ORDER BY id DESC");  
  		return $sql;
}


function Total_Indeks_news_Item_By_Tanggal( $tbl_news, $time_now , $tgltampil ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
				statustampil = '1' AND
				timeunix <= '$time_now' AND
				tgltampil = '$tgltampil'
			ORDER BY id DESC");  
  		$hitung = mysql_num_rows($sql);
  		 
  		return $hitung;	
}
	
/* end by tanggal */

function List_Item_news_Publish_view_Halaman( $tbl_news, $idkategori, $idsubkategori,$offset, $dataPerPage ){
		$sql = mysql_query("
				SELECT * FROM $tbl_news WHERE 
						statustampil = '1' AND
						idkategori='$idkategori' AND
						idkategorisub='$idsubkategori' 
			
				ORDER BY id DESC
				LIMIT $offset, $dataPerPage
			
		");
		return $sql;
}


function List_news_File_Group_With_LimitPage( $tbl_news, $idkategori, $idsubkategori , $offset, $dataPerPage){

	$sql = mysql_query("
				SELECT * FROM $tbl_news WHERE 

						idkategori='$idkategori' AND
						idkategorisub='$idsubkategori' 
			
				ORDER BY id DESC
				LIMIT $offset, $dataPerPage
			
		");
		
	return $sql;
}


function List_news_File_GroupBySection_With_LimitPage( $tbl_news, $idkategori, $offset, $dataPerPage){

	$sql = mysql_query("
				SELECT * FROM $tbl_news WHERE 

						idkategori='$idkategori' 
			
				ORDER BY timeunix DESC
				LIMIT $offset, $dataPerPage
			
		");
		
	return $sql;
}

 


function list_news_item_by_kategori_publik( $tbl_news, $idkategori , $dataPerPage ){
$sql = mysql_query("
	SELECT * FROM $tbl_news WHERE 
		statustampil = '1' AND 
		idkategori = '$idkategori'  
	ORDER BY id DESC 
		LIMIT $dataPerPage
	
");
return $sql;

}



function List_Indeks_news_Item_Kategori_Homepage($tbl_news, $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil = '1' AND headline='1'
			
		ORDER BY id DESC LIMIT $dataPerPage");  
  		return $sql;
}





/* Function untuk index news article */

/* 05-12-2011 by arvinozulka */
function  list_all_publish_item_news_bysubkategori_list_indexarticle($tbl_news, $tanggalhariini, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategorisub ='$idkategori'
			
		ORDER BY id DESC");  
  		return $sql;
}


function list_all_publish_item_news_bysubkategori_bypage_indexarticle($tbl_news, $tanggalhariini,  $idkategorisub, $offset , $dataPerPage   ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			 
			idkategorisub ='$idkategorisub'
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function total_list_all_publish_item_news_bysubkategori_indexarticle( $tbl_news, $tanggal,  $idkategorisub ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			statustampil='1' AND
			tgltampil<='$tanggal' AND
			 
			idkategorisub = '$idkategorisub'
			ORDER BY id DESC");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}



/* ----- End Function Index News --------- */


function newsItem_DeleteImage( $tbl_news, $id ){
	$sql = mysql_query("UPDATE $tbl_news SET 
	gambarkecil = '', 
	gambarbesar ='' , 
	direktorigambar = '' 
	WHERE id = '$id'
	");
	return $sql;
}


 
function newsItem_PageLimit_BeritaTerkait_Headline_Homepage( $tbl_news, $time_now, $idx, $idkategori ,  $idkategorisub , $tagterkait , $dataPerPage ){

							 		$pecah = explode(",",$tagterkait);
									$hitung = count($pecah);
									for($a=0;$a<=$hitung-1;$a++)
									{ 
										$hasil_pecah .= " judul LIKE '%" . strtolower($pecah[$a]). "%' OR deskripsi LIKE '%$pecah[$a]%' OR";
			 
									}
		 
									$hasil_pecah2 = substr($hasil_pecah,0,-3);
		
		
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			

			timeunix <='$time_now' AND
			id != '$idx' AND
			statustampil='1'  AND 
			
			( $hasil_pecah2 )
			
			
			
			ORDER BY timeunix DESC LIMIT $dataPerPage");  
		$result = $sql;
		return $result;
}




/* FUNGSI TERKAIT HALAMAN DETAIL */
/* Fungsi berita terkait halaman detail */
function newsItem_Count_BeritaTerkait_Detailpage( $tbl_news, $time_now, $id, $tagterkait , $dataPerPage ){  /* Hitung berita terkait */

							 		$pecah = explode(",",$tagterkait);
									$hitung = count($pecah);
									for($a=0;$a<=$hitung-1;$a++)
									{ 
										$hasil_pecah .= " judul LIKE '%" . strtolower($pecah[$a]). "%' OR deskripsi LIKE '%$pecah[$a]%' OR";
			 
									}
		 
									$hasil_pecah2 = substr($hasil_pecah,0,-3);
									
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
 
			timeunix <='$time_now' AND
			id != '$idx' AND
			statustampil='1'  AND 
			( $hasil_pecah2 )
			

		ORDER BY timeunix DESC LIMIT $dataPerPage");  
		$result = mysql_num_rows($sql);
		return $result;
}


function newsItem_PageLimit_BeritaTerkait_Headline_Detailpage( $tbl_news, $time_now, $idx, $tagterkait , $dataPerPage ){

							 		$pecah = explode(",",$tagterkait);
									$hitung = count($pecah);
									for($a=0;$a<=$hitung-1;$a++)
									{ 
										$hasil_pecah .= " judul LIKE '%" . strtolower($pecah[$a]). "%' OR deskripsi LIKE '%$pecah[$a]%' OR";
			 
									}
		 
									$hasil_pecah2 = substr($hasil_pecah,0,-3);
		
		
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			
 
			timeunix <='$time_now' AND
			id != '$idx' AND
			statustampil='1'  AND 
			
			( $hasil_pecah2 )
			
			
			
			ORDER BY timeunix DESC LIMIT $dataPerPage");  
		$result = $sql;
		return $result;
}

/* Tag terkait pending  */


/* LIST NEWS SUBSECTION BARU */

function  list_all_publish_item_news_bysubkategori_list_idexception($tbl_news, $tanggalhariini, $idkategori, $idkategorisub, $id_excp1 ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			id NOT IN ( $id_excp1 ) AND
			statustampil = '1' AND
			idkategori ='$idkategori' AND
			idkategorisub = '$idkategorisub' 
		ORDER BY timeunix DESC ");  
  		return $sql;
}

function List_Indeks_news_Item_SubKategori_ByPage_idexception($tbl_news, $tanggalhariini, $idkategori , $id_excp1 , $idkategorisub, $offset , $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			id NOT IN ( $id_excp1 ) AND
			statustampil = '1' AND
			idkategori = '$idkategori' AND 
			idkategorisub ='$idkategorisub'
		ORDER BY timeunix DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function total_list_all_publish_indeks_news_item_bysubkategori_idexception( $tbl_news, $tanggal, $idkategori, $idkategorisub, $id_excp1 ){  
		$sql = mysql_query("SELECT * FROM $tbl_news WHERE 
			id NOT IN ( $id_excp1 ) AND
			statustampil='1' AND
			idkategori = '$idkategori' AND
			idkategorisub = '$idkategorisub'
			ORDER BY timeunix DESC ");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}



?>