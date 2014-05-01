<?php
if(ereg("sc_order_form.php", $PHP_SELF)){
    header("location: index.php");
    die;
}

?>
<script type="text/javascript" language="javascript" src="javascript/format_teks.js"></script>
<?php 
/*
produk_id
produk_judul
produk_preview
produk_gambarbesar
produk_matauang
produk_harga
produk_direktorigambar
produk_pesan
produk_qty
*/

$form = "<form method='post' action='sc_additem.php'>";

$form .= "<input type='hidden' name='produk_id' value='$item_id'>";

$form .= "<input type='hidden' name='produk_judul' value='$item_judul'>";

$form .= "<input type='hidden' name='produk_preview' value='$item_preview'>";

$form .= "<input type='hidden' name='produk_gambarbesar' value='$item_gambarbesar'>";

$form .= "<input type='hidden' name='produk_matauang' value='$item_matauang'>";

$form .= "<input type='hidden' name='produk_harga' value='$item_harga'>";

$form .= "<input type='hidden' name='produk_direktorigambar' value='$item_direktorigambar'>";

$form .= "<input type='hidden' name='produk_pesan' value='Please enter your message here..'>";

$form .= "<input type='hidden' name='produk_qty' value='1'>";

$form .= "<input type='submit' value='Book Now' class='book_submit'>";

$form .= "<input type='hidden' name='proses' value='add'>";

$form .= "</form>";
?>