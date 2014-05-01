<?php
session_name("CUST");
session_start();
include "sc_session.php";
include "kelas_function.php";

if($proses == 'add'){

    if(in_array($produk_id, $ID_PRODUK) and $produk_qty > 0){
	
        $idx = 0;
        $count = count($ID_PRODUK);
        for($key=0;$key<$count;$key++){
		
            if($ID_PRODUK[$key] == $produk_id){
			
                $idx = $key;
                break;
            }
        }
        
        $QTY_PRODUK[$idx] = $QTY_PRODUK[$idx] + $produk_qty;
        $JUMLAH_HARGA[$idx] = $QTY_PRODUK[$idx] * $produk_harga[$idx];

	}else{


        if($produk_qty > 0){

			$ID_PRODUK[] = $produk_id;
			$JUDUL_PRODUK[] = $produk_judul;
			$PREVIEW_PRODUK[] = $produk_preview;
			$GAMBARBESAR_PRODUK[] = $produk_gambarbesar;
			$MATAUANG_PRODUK[] = $produk_matauang;
			$HARGA_PRODUK[] = $produk_harga;
			$DIREKTORIGAMBAR_PRODUK[] = $produk_direktorigambar;
			$PESAN_PRODUK[] = $produk_pesan;
			$QTY_PRODUK[] = $produk_qty;
	
			$JUMLAH_HARGA[] = $produk_qty * $produk_harga;

        }
    }
}
/* 
RewriteRule ^public-users-listbooking\.defora$ public_users_listbooking.php

RewriteRule ^public-users-bookingbasket\.defora$ public_users_bookingbasket.php

RewriteRule ^public-users-bookingbasket\.defora?pesan_error=(.*) public_users_bookingbasket.php?pesan_error=$1
*/
header("Location: public-users-bookingbasket" . $extention . "");
?>
