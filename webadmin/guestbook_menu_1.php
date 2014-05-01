<?php 
$idkategori = $_GET['idkategori'];
$idsubkategori = $_GET['idsubkategori'];
?>
<table class='tabelform'  align='center'  width='100%'  cellpadding='1' cellspacing='1'>
<tr>
<td width='100%'> 
<div id='menunavigasi_horisontal' class='menunavigasi_horisontal'>
<ul>
	<li> <a href='guestbook_item.php?idkategori=<?php 
echo quote_smart($idkategori) ?>&idsubkategori=<?php 
echo quote_smart($idsubkategori) ?>&action=FormEntry'> FORM ENTRY DATA</a> </li>
	<li> <a href='guestbook_item.php?idkategori=<?php 
echo quote_smart($idkategori) ?>&idsubkategori=<?php 
echo quote_smart($idsubkategori) ?>&action=ViewList'> LIST DATA </a> </li>
</ul>
</div>
</td>
</tr>
</table>