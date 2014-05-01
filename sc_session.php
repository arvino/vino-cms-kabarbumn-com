<?php
if(ereg("sc_session.php", $PHP_SELF)){
    header("Location: index.php");
    die;
}

if(!session_is_registered("ID_PRODUK")){
    session_register( ID_PRODUK, JUDUL_PRODUK, PREVIEW_PRODUK, GAMBARBESAR_PRODUK, MATAUANG_PRODUK, HARGA_PRODUK, DIREKTORIGAMBAR_PRODUK, PESAN_PRODUK, QTY_PRODUK, JUMLAH_HARGA  );
	$ID_PRODUK  = array();
	$JUDUL_PRODUK = array();
	$PREVIEW_PRODUK = array();
	$GAMBARBESAR_PRODUK = array();
	$MATAUANG_PRODUK = array();
	$HARGA_PRODUK = array();
	$DIREKTORIGAMBAR_PRODUK = array();
	$PESAN_PRODUK = array();
	$QTY_PRODUK = array();
	$JUMLAH_HARGA = array();
}


$sesi_id = $_SESSION['users_id'];
$sesi_username = $_SESSION['users_username'];
$sesi_email = $_SESSION['users_email'];
$sesi_aksesmodul = $_SESSION['users_aksesmodul'];
?>