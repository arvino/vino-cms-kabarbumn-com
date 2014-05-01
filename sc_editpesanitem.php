<?php
session_name("CUST");
session_start();
include "sc_session.php";
include "kelas_function.php";

if($proses == 'edit'){

    if($produk_qty>0&&$batal!="Batal"){
	
        $QTY_PRODUK[$index] 		= 	$produk_qty;
		$PESAN_PRODUK[$index] 		= 	$produk_pesan;
		$JUMLAH_HARGA[$index] 		= 	$QTY_PRODUK[$index] * $HARGA_PRODUK[$index];
	
	}else{	
				
		array_splice($ID_PRODUK, $index, 1);
		array_splice($JUDUL_PRODUK, $index, 1);
		array_splice($PREVIEW_PRODUK, $index, 1);
		array_splice($GAMBARBESAR_PRODUK, $index, 1);
		array_splice($MATAUANG_PRODUK, $index, 1);
		array_splice($HARGA_PRODUK, $index, 1);
		array_splice($DIREKTORIGAMBAR_PRODUK, $index, 1);
		array_splice($PESAN_PRODUK, $index, 1);
		array_splice($QTY_PRODUK, $index, 1);
		array_splice($JUMLAH_HARGA, $index, 1);
	

		
		
    }
}
/* 
RewriteRule ^public-users-listbooking\.defora$ public_users_listbooking.php

RewriteRule ^public-users-bookingbasket\.defora$ public_users_bookingbasket.php

RewriteRule ^public-users-bookingbasket\.defora?pesan_error=(.*) public_users_bookingbasket.php?pesan_error=$1
*/
header("Location: public-users-bookingbasket" . $extention );
?>