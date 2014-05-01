<?php 
/* PUSTAKA FUNGSI QUERY DATABASE PADA TABEL BANNER ITEM */
/* 

id
idupline
idkategori
idkategorisub
judul` 
deskripsi
tglpost
jampost
tgltampil
jamtampil
tglselesai
jamselesai
timeunix
dilihat
statustampil
urutan
idusers
idadmin
direktorigambar
namafile
linkurl
target

  
*/  
	/* Fungsi Buat ID Otomatis Untuk ID banner Item . */
	function bannerItem_CreateID( $tbl_banner ){
		$sql = mysql_query("SELECT * FROM $tbl_banner ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;
	}	 

 	/*  Fungsi Periksa Judul banner Kategori */
	function bannerItem_PeriksaJudul( $tbl_banner, $judul ){
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE judul = '$judul'");
		return $sql;	
	}

 
 	/* FUNGSI TAMBAH DATA ITEM banner */
	function bannerItem_TambahData(
		$tbl_banner,
		$id,$idupline,
		$idkategori,$idkategorisub,
		$judul,$deskripsi,$tglpost,
		$jampost,$tgltampil,
		$jamtampil,$tglselesai,
		$jamselesai,$timeunix,
		$dilihat,$statustampil,$urutan,
		$idusers,$idadmin,
		$direktorigambar,$namafile,
		$linkurl, $target
	){
		$sql = mysql_query("INSERT INTO $tbl_banner
		(

				id,idupline,
				idkategori,idkategorisub,
				judul,deskripsi,
				tglpost,jampost,
				tgltampil,jamtampil,
				tglselesai,jamselesai,
				timeunix,dilihat,
				statustampil,urutan,idusers,
				idadmin,direktorigambar,
				namafile,linkurl,target

		)VALUES(
	
				'$id','$idupline',
				'$idkategori','$idkategorisub',
				'$judul','$deskripsi',
				'$tglpost','$jampost',
				'$tgltampil','$jamtampil',
				'$tglselesai','$jamselesai',
				'$timeunix','$dilihat',
				'$statustampil','$urutan','$idusers',
				'$idadmin','$direktorigambar',
				'$namafile','$linkurl','$target'
  
		)");
		return $sql;
	}
	
	
/* FUNGSI BACA DATA ITEM DETIL */
function bannerItem_BacaDataDetil( $tbl_banner, $id ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE id = '$id'");
	$result = mysql_fetch_object($sql);
	return $result;
}



/* FUNGSI UPDATE DATA ITEM */
function bannerItem_UpdateData(
		$tbl_banner,
		$id,$idupline,
		$idkategori,$idkategorisub,
		$judul,$deskripsi,$tglpost,
		$jampost,$tgltampil,
		$jamtampil,$tglselesai,
		$jamselesai,$timeunix,
		$dilihat,$statustampil,$urutan,
		$idusers,$idadmin,
		$direktorigambar,$namafile,
		$linkurl,$target
		){
		$sql = mysql_query(
		"
UPDATE $tbl_banner SET 

		idupline = '$idupline',
		idkategori = '$idkategori', idkategorisub = '$idkategorisub',
		judul = '$judul' , deskripsi = '$deskripsi' , tglpost = '$tglpost',
		jampost = '$jampost' , tgltampil = '$tgltampil',
		jamtampil = '$jamtampil', tglselesai = '$tglselesai',
		jamselesai = '$jamselesai', timeunix = '$timeunix',
		dilihat = '$dilihat', statustampil = '$statustampil', urutan = '$urutan',
		idusers = '$idusers', idadmin = '$idadmin',
		direktorigambar = '$direktorigambar' , namafile = '$namafile',
		linkurl = '$linkurl', target = '$target'

WHERE
	id ='$id'
		");
		
return $sql;
		
}


function bannerItem_BacaDataListing_All( $tbl_banner , $offset , $dataPerPage){
	$sql = mysql_query("SELECT * FROM $tbl_banner ORDER BY id DESC LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_bannerItem_BacaDataListing_All( $tbl_banner ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_banner");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

 
  
/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function bannerItem_BacaDataListing_TidakTampil_All( $tbl_banner , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE statustampil != '1' ORDER BY id DESC LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_bannerItem_BacaDataListing_TidakTampil_All( $tbl_banner ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_banner WHERE statustampil != '1'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


/* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TIDAK DI TAMPILKAN ( UNTUK HALAMAN ADMIN ) */
function bannerItem_BacaDataListing_Tampil_All( $tbl_banner , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE statustampil = '0' ORDER BY id DESC LIMIT $offset, $dataPerPage");
	return $sql;
}

function GetJML_bannerItem_BacaDataListing_Tampil_All( $tbl_banner ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_banner WHERE statustampil = '0'  ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

 
 /* FUNGSI BACA DATA ITEM LISTING ( ALL DATA ) TIDAK POPULER ( UNTUK HALAMAN ADMIN ) */
function bannerItem_BacaDataListing_TidakPopuler_All( $tbl_banner , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE dilihat < '10' ORDER BY id DESC 
		LIMIT $offset, $dataPerPage
	");
	return $sql;
}

function GetJML_bannerItem_BacaDataListing_TidakPopuler_All( $tbl_banner ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_banner WHERE dilihat < '10' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


 
function bannerItem_BacaDataListing_Terpopuler_All_ByPage( $tbl_banner , $offset , $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_banner ORDER BY dilihat DESC LIMIT $offset, $dataPerPage");
	return $sql;
}
 
function bannerItem_BacaDataListing_Terpopuler_All( $tbl_banner ){
/* Terpopuler sortir dilihat desc */
	$sql = mysql_query("SELECT * FROM $tbl_banner ORDER BY dilihat DESC");
	return $sql;
}


function GetJML_bannerItem_BacaDataListing_Terpopuler_All( $tbl_banner ){
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_banner WHERE dilihat >= '10' ");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}


function Search_Item_banner_ALL($tbl_banner, $cari , $offset , $dataPerPage ){ /* banner Search */
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
		
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%'
			 
		ORDER BY id DESC  LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function GetJML_Search_Item_banner_ALL( $tbl_banner, $cari ){ /* banner Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_banner WHERE 
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%'
			
					");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}
	

function Search_Item_banner_Publish_ByPage($tbl_banner, $cari , $offset , $dataPerPage ){ /* banner Search */
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil = '1' AND
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%' OR
			
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function Search_Item_banner_Publish($tbl_banner, $cari ){ /* banner Search */
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil = '1' AND
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%' OR
			
		ORDER BY id DESC ");  
  		return $sql;
}

 function Search_Item_banner_All_data($tbl_banner, $cari ){ /* banner Search */
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			 
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%'
			
		ORDER BY id DESC ");  
  		return $sql;
}



function GetJML_Search_Item_banner_Publish( $tbl_banner, $cari ){ /* banner Search Count */
		$sql = mysql_query("SELECT count(id) as jml FROM $tbl_banner WHERE 
			statustampil = '1' AND
			judul LIKE '%$cari%' OR
			deskripsi  LIKE '%$cari%' OR
		");
  		$row = mysql_fetch_object($sql);
  		$jml = $row->jml;
  		return $jml;	
}

 

function bannerItem_BacaDataListing_ByKategori_Terkini_All( $tbl_banner , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE idkategori = '$idkategori' ORDER BY id DESC ");
	return $sql;
}

 
function bannerItem_BacaDataListing_ByKategori_Tampil_All( $tbl_banner , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE idkategori = '$idkategori' AND statustampil != '0' ORDER BY id DESC ");
	return $sql;
}


function bannerItem_BacaDataListing_ByKategori_TidakTampil_All( $tbl_banner , $idkategori ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE idkategori = '$idkategori' AND statustampil == '0' ORDER BY id DESC ");
	return $sql;
}


function bannerItem_BacaDataListing_ByKategoriSub_Terkini_All( $tbl_banner , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub' ORDER BY id DESC ");
	return $sql;
}

 

function bannerItem_BacaDataListing_ByKategoriSub_Tampil_All( $tbl_banner , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND statustampil != '0' ORDER BY id DESC ");
	return $sql;
}



function bannerItem_BacaDataListing_ByKategoriSub_TidakTampil_All( $tbl_banner , $idkategori, $idkategorisub ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'  AND statustampil == '0' ORDER BY id DESC ");
	return $sql;
}




/* Query untuk banner di homepage */
function listitem_banner_bykategori_public( $tbl_banner , $idkategori, $idkategorisub, $offset, $dataPerPage ){
	$sql = mysql_query("SELECT * FROM $tbl_banner WHERE statustampil = '1' AND idkategori = '$idkategori' AND idkategorisub = '$idkategorisub' 
	ORDER BY urutan ASC LIMIT $offset, $dataPerPage ");
	return $sql;
}
/* end query banner untuk di homepage */



	function bannerItem_CreateDirektori(  
	  	$tanggalhariini
	){
 		$direktoribuat =  "filemodul/banner/" . "file_item/" . $tanggalhariini . "/";
			 mkdir( $direktoribuat,'0777',true); 
			 chmod( $direktoribuat, 0777);
		return $direktoribuat;
	}


	function Select_Detail_Item_banner($tbl_banner, $id){
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE id = '$id'");
		return mysql_fetch_object($sql);
	}

	

	function GetJmlTotalbanner( $tbl_banner, $idkategori, $idkategorisub ){
  		$sqlText = "SELECT count(id) AS jml FROM $tbl_banner WHERE idkategori = '$idkategori' AND idkategorisub = '$idkategorisub'";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
	
  
 
 	function GetJmlTotal_bannerTerkini( $tbl_banner, $idkategori, $idkategorisub ){
  		$sqlText = "SELECT count(id) as jml FROM $tbl_banner";
  		$result = mysql_query($sqlText);
  		$row = mysql_fetch_object($result);
  		$jml = $row->jml;
  		return $jml;
	}
 

	function bannerDiLihat( $tbl_banner, $Det ){
	
			$sql = mysql_query("SELECT * FROM $tbl_banner WHERE id='$Det'");
			$databanner = mysql_fetch_array($sql);
			$dilihat = $databanner ['dilihat'];
			$dilihat = $dilihat+1;
	
			$sqlupdate = mysql_query("UPDATE $tbl_banner SET dilihat='$dilihat' WHERE id='$Det'");
			
			return $sqlupdate;
	}



	function ViewDetail_Item_banner( $tbl_banner, $id ){
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE id = '$id'");
		$result = mysql_fetch_object($sql);
		return $result;
	}
	
	

	
	function bannerTerbaru($tbl_banner, $tanggalhariini, $Cat, $SubCat ){
		$sqlText = "SELECT * FROM $tbl_banner WHERE 
						
						tgltampil <= '$tanggalhariini' AND
						jamtampil <= '$jamsaatini' AND
						statustampil = '1' AND 

						idkategori = '$Cat' AND 
						idkategorisub = '$SubCat' AND
						
						ORDER BY id DESC, jamtampil DESC limit 5";
						
		return mysql_query($sqlText);
	}

 
	function  bannerItem_HapusData( $tbl_banner, $id){ /* Hapus Data Item */
		$sql = mysql_query("
			DELETE FROM $tbl_banner WHERE id='$id'
		");
		return $sql;
	}
	
	
	function bannerItem_StatusTampil( $tbl_banner, $statustampil, $id ){ /* Tampil Kan Data */
		$sql = mysql_query("
			UPDATE $tbl_banner SET
				statustampil = '$statustampil' 
			WHERE
				id = '$id'
		");
		return $sql;
	}

  


	function bannerItem_HapusImage( $tbl_banner, $id ){
		$sql = mysql_query("
			UPDATE $tbl_banner SET
				namafile = '',
				direktorigambar = ''
			WHERE
				id = '$id'
		");
	return $sql;
	}


 	

	function SelectPublish_bannerItem_Terkait( $tbl_banner, $idkategori, $keyword , $tanggalhariini ){ /* Publish Item banner Terkait */
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='1' AND 
			keyword LIKE '%$keyword%' 
		ORDER BY id DESC ");  
  		return $sql;
	}
	
	
	
	function SelectNonPublish_bannerItem_Terkait( $tbl_banner, $idkategori, $keyword , $tanggalhariini ){ /* Non Publish Item banner Terkait */
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			idkategori = '$idkategori' AND
			tgltampil <= '$tanggalhariini' AND
			statustampil='0' AND 
			keyword LIKE '%$keyword%' 
		ORDER BY id DESC ");  
  		return $sql;
	}




function List_Indeks_banner_Item($tbl_banner, $tanggalhariini ){ 
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil='1' AND
			tgltampil = '$tanggalhariini'
			ORDER BY id DESC ");  
  		return $sql;
}

function List_Indeks_banner_Item_By_Tanggal($tbl_banner, $tanggalhariini ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil = '1' AND
			tgltampil = '$tanggalhariini'
		ORDER BY id DESC ");  
  		return $sql;
}

function Total_Indeks_banner_Item_By_Tanggal( $tbl_banner, $tanggal ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil='1' AND
			tgltampil='$tanggal'  
			ORDER BY id DESC ");  
  		$hitung = mysql_num_rows($sql);
  		 
  		return $hitung;	
}


function List_Indeks_banner_Item_Kategori_ByPage($tbl_banner, $tanggalhariini, $idkategori , $offset , $dataPerPage   ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategori ='$idkategori'
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}

function List_Indeks_banner_Item_SubKategori_ByPage($tbl_banner, $tanggalhariini, $idkategori , $offset , $dataPerPage   ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategorisub ='$idkategori'
		ORDER BY id DESC LIMIT $offset, $dataPerPage");  
  		return $sql;
}


function  List_ALL_PUBLISH_Item_banner_ByKategori_List($tbl_banner, $tanggalhariini, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategori ='$idkategori'
		ORDER BY id DESC ");  
  		return $sql;
}


function  List_ALL_PUBLISH_Item_banner_BySubKategori_List($tbl_banner, $tanggalhariini, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil = '1' AND
			tgltampil <='$tanggalhariini' AND
			idkategorisub ='$idkategori'
		ORDER BY id DESC ");  
  		return $sql;
}

function Total_LIST_ALL_PUBLISH_Indeks_banner_Item_ByKategori( $tbl_banner, $tanggal, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil='1' AND
			tgltampil<='$tanggal' AND
			idkategori='$idkategori'
			ORDER BY id DESC ");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;		
}

function Total_LIST_ALL_PUBLISH_Indeks_banner_Item_BySubKategori( $tbl_banner, $tanggal, $idkategori ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil='1' AND
			tgltampil<='$tanggal' AND
			idkategorisub='$idkategori'
			ORDER BY id DESC ");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}

function Total_Indeks_banner_Item( $tbl_banner, $tanggalhariini ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
			statustampil='1' AND
			tgltampil = '$tanggalhariini'
			ORDER BY id DESC ");  
  		$hitung = mysql_num_rows($sql);
  		return $hitung;	
}

function List_Item_banner_Publish_view_Halaman( $tbl_banner, $idkategori, $idsubkategori,$offset, $dataPerPage ){
		$sql = mysql_query("
				SELECT * FROM $tbl_banner WHERE 
						statustampil = '1' AND
						idkategori='$idkategori' AND
						idkategorisub='$idsubkategori' 
			
				ORDER BY id DESC LIMIT $offset, $dataPerPage
			
		");
		return $sql;
}

function List_banner_File_Group_With_LimitPage( $tbl_banner, $idkategori, $idsubkategori , $offset, $dataPerPage){

	$sql = mysql_query("
				SELECT * FROM $tbl_banner WHERE 

						idkategori='$idkategori' AND
						idkategorisub='$idsubkategori' 
			
				ORDER BY id DESC LIMIT $offset, $dataPerPage
			
		");
		
	return $sql;
}

/* 08-12-2011 */
function Show_banner($tbl_banner, $idkategori, $idkategorisub, $dataPerPage ){  
		$sql = mysql_query("SELECT * FROM $tbl_banner WHERE 
		
			idkategori = '$idkategori' AND
			idkategorisub = '$idkategorisub' AND
			statustampil = '1' 
			
			
		ORDER BY urutan LIMIT $dataPerPage");  
  		return $sql;
}





/* Function banner log */


/* 
 
id 
idkategori 
idkategorisub 
iditem 
ipaddr 
tanggal 
jam 
browser 
referal 
fileakses
hit


*/
	function BuatIDBannerlog( $tbl_bannerlog ){
		$sql = mysql_query("SELECT * FROM $tbl_bannerlog ORDER BY id DESC");  
		$data =	mysql_fetch_array($sql);
		$UID = $data["id"];
		$UID = $UID+1;  
		return $UID;

	}
 

function addHitsBannerlog(
	$tbl_bannerlog,
	$id,
	$idkategori,
	$idkategorisub,
	$iditem,
	$ipaddr,
	$tanggal,
	$jam,
	$browser,
	$referal,
	$fileakses,
	$hit

){

 		$sqlText = mysql_query("INSERT INTO $tbl_bannerlog
		(
		
	 
			id, idkategori,
			idkategorisub,
			iditem, ipaddr,
			tanggal, jam,
			browser, referal,
			fileakses, hit

		
		)VALUES(
		
			'$id', '$idkategori',
			'$idkategorisub',
			'$iditem', '$ipaddr',
			'$tanggal', '$jam',
			'$browser', '$referal',
			'$fileakses', '$hit'

		
		)");
		return $sqlText;
	}
	
	function listAllDataBannerLog( $tbl_bannerlog ){
		$sqlText = "SELECT * FROM $tbl_bannerlog ORDER BY id DESC";
		return mysql_query($sqlText);
	}
	
	function updateHitsBannerLog( $tbl_bannerlog, $iditem, $ipaddr, $tanggalhariini, $hits){
		$sqlText = mysql_query("UPDATE $tbl_bannerlog SET hit = '$hits' WHERE iditem = '$iditem' AND ipaddr = '$ipaddr' AND tanggal='$tanggalhariini'");
		return $sqlText;
	}
	
	function cekHitsBannerLog( $tbl_bannerlog, $iditem, $ipaddr, $tanggalhariini ){
		$sqlText = mysql_query("SELECT * FROM $tbl_bannerlog WHERE iditem='$iditem' AND ipaddr = '$ipaddr' AND tanggal='$tanggalhariini'");
		$result = mysql_num_rows($sqlText);
		return $result;
	}
	
	function cekJmlHitsBannerLog( $tbl_bannerlog ){
		$sqlText = "SELECT count(id) as jml FROM $tbl_bannerlog";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		$jml = $row->jml;
		return $jml;
	}
	
  
 
 	function viewdetail_bannerlog( $tbl_bannerlog, $ipddr, $tanggalhariini ){
		$sqlText = "SELECT * FROM $tbl_bannerlog WHERE ipaddr = '$ipddr' AND tanggal = '$tanggalhariini'";
		$result = mysql_query($sqlText);
		$row = mysql_fetch_object($result);
		return $row;
	}
	


?>