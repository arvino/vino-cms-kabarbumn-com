<?php 
$ALAMAT_IP=$HTTP_SERVER_VARS['REMOTE_ADDR'];
// opendb();
?>


<?php 
function Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $tanggal){
$sql = mysql_query("SELECT * FROM $tbl_counter_web WHERE tanggal='$tanggal'");
$hitung	= mysql_num_rows($sql);
return $hitung;
}

function hitung_tanggal( $htng_tanggal_kurang ){
$counterlusakemarin = mktime(0, 0, 0, date("m"), date("d")-$htng_tanggal_kurang, date("Y"));
$counterlusakemarin = date("Y-m-d",$counterlusakemarin);
return $counterlusakemarin;
}

$jml_btg = 8;
$pjbar = 8; 
$pjbar2 = 8; 
$jml_top_prdk =8;

$hi_hariini 					= harienglish($tanggalhariini);
$bi_tanggalharini				= bulanenglish($tanggalhariini);

$hitungdatacounterhariini 		= Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $tanggalhariini);
$hitungdatacounterhariini 		= titik($hitungdatacounterhariini);


 
$counterkemarin 					= hitung_tanggal( $htng_tanggal_kurang=1 );
$hi_harikemarin 					= harienglish($counterkemarin);
$bi_tanggalharikemarin				= bulanenglish($counterkemarin);
  
$hitungdatacounterharikemarin123 	= Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $counterkemarin);
$hitungdatacounterharikemarin123 	= titik($hitungdatacounterharikemarin123);


$counterlusakemarin = hitung_tanggal( $htng_tanggal_kurang=2 );
$hi_lusakemarin = harienglish($counterlusakemarin);
$bi_tanggallusakemarin = bulanenglish($counterlusakemarin);
 
$hitungdatacounterlusakemarin	= Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $counterlusakemarin);
$hitungdatacounterlusakemarin 	= titik($hitungdatacounterlusakemarin);
$pengunjungweb2harilalu 		= $hitungdatacounterlusakemarin;


 
$counter3harikemarin = hitung_tanggal( $htng_tanggal_kurang=3 );
$hi_3harikemarin = harienglish($counter3harikemarin);
$bi_tanggal3harikemarin = bulanenglish($counter3harikemarin);

$hitungdatacounter3harikemarin = Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $counter3harikemarin);
$hitungdatacounter3harikemarin = titik($hitungdatacounter3harikemarin);
$pengunjungweb3harilalu = $hitungdatacounter3harikemarin;



$counter4harikemarin =  hitung_tanggal( $htng_tanggal_kurang=4 );
$hi_4harikemarin = harienglish($counter4harikemarin);
$bi_tanggal4harikemarin = bulanenglish($counter4harikemarin);
 
$hitungdatacounter4harikemarin	= Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $counter4harikemarin);
$hitungdatacounter4harikemarin 	= titik($hitungdatacounter4harikemarin);
$pengunjungweb4harilalu 		= $hitungdatacounter4harikemarin;


 
$counter5harikemarin = hitung_tanggal( $htng_tanggal_kurang=5 );
$hi_5harikemarin = harienglish($counter5harikemarin);
$bi_tanggal5harikemarin =  bulanenglish($counter5harikemarin);
 
$hitungdatacounter5harikemarin	= Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $counter5harikemarin);
$hitungdatacounter5harikemarin 	= titik($hitungdatacounter5harikemarin);
$pengunjungweb5harilalu 		= $hitungdatacounter5harikemarin;

 
$counter6harikemarin 			= hitung_tanggal( $htng_tanggal_kurang=6 );
$hi_6harikemarin 				= harienglish($counter6harikemarin);
$bi_tanggal6harikemarin			= bulanenglish($counter6harikemarin);

$hitungdatacounter6harikemarin	= Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $counter6harikemarin);
$hitungdatacounter6harikemarin 	= titik($hitungdatacounter6harikemarin);
$pengunjungweb6harilalu 		= $hitungdatacounter6harikemarin;


$counter7harikemarin 			= hitung_tanggal( $htng_tanggal_kurang=7 );
$hi_7harikemarin 				= harienglish($counter7harikemarin);
$bi_tanggal7harikemarin			= bulanenglish($counter7harikemarin);
 
$hitungdatacounter7harikemarin = Hitung_List_Counter_By_Tanggal( $tbl_counter_web, $counter7harikemarin );
$hitungdatacounter7harikemarin 	= titik($hitungdatacounter7harikemarin);
$pengunjungweb7harilalu 		= $hitungdatacounter7harikemarin;
?>

<?php 
function krgHari($tgl_awal, $lama) { 
$t = time($tgl_awal);
$h = 86400; // 1 hari
$hr = $h * $lama;
$p = date("d/m/Y", $t - $hr ); 
return $p;
}

function tmbHari($tgl_awal, $lama) { 
$t = time($tgl_awal);
$h= 86400; // 1 hari
$hr = $h * $lama;
$p = date("d/m/y", $t + $hr ); 
return $p;
}

$grafiksompret_tanggal 		= array("$tanggalhariini","$counterkemarin","$counterlusakemarin","$counter3harikemarin","$counter4harikemarin","$counter5harikemarin","$counter6harikemarin","$counter7harikemarin");
$grafiksompret_id 			= array("111","112","113","114","115","116","117","118");
$grafiksompret_jmlvisitor 	= array("$hitungdatacounterhariini","$hitungdatacounterharikemarin123","$pengunjungweb2harilalu",
"$pengunjungweb3harilalu","$pengunjungweb4harilalu","$pengunjungweb5harilalu","$pengunjungweb6harilalu","$pengunjungweb7harilalu");

$idarraynyah = count($grafiksompret_id);
for ($s=1;$s<($idarraynyah+1);$s++)
{
  $tgl_akhir		=$grafiksompret_tanggal[$s]; // tanggal terakhir statistik
  $IDS				=$grafiksompret_id[$s];
  $JML_VISITOR		=$grafiksompret_jmlvisitor[$s];
  $total_3hari		=$total_3hari + $JML_VISITOR;
  
  if($maks_3hari < $JML_VISITOR) 
  $maks_3hari=$JML_VISITOR; 
  else 
  $maks_3hari=$maks_3hari;

}


if($JML_VISITOR==$maks_3hari)

$maks_3hari_top	=	$JML_VISITOR;

else 

$maks_3hari_top	=	$maks_3hari;

$JML_VISITOR++;

$tgl_statistik=date("Y-m-d");




//start graphic bar
// statistik halamanhit ----------------------------------------------------------
$pjbarh=$pjbar+1;
?>
<table width="100%" border='0' cellpadding='0' cellspacing='0' summary='statistik'>
          <tr>
            <td colspan='11' height='5'></td>
          </tr>
          <tr>
            <td colspan='11' class='boxdatauser'>
			
			
			
			
			
<div align="center">

there is <?php 
echo $users_online ?>  users are online .
<br>
<br>

<b>Graphs Visitors </b> <br />
        ( 7 days ago )<br />
        <br />
		This day :<?php 
echo $hitungdatacounterhariini ?> visitors.
		<br>
<br>

            </div></td>
          </tr>
          <tr>
            <td width='84' rowspan='<?php 
print $pjbarh ?>' valign='top' class='boxdatauser3'><br />
            <?php 
print $maks_3hari_top ?></td>
            <td width='17' rowspan='<?php 
print $pjbarh ?>' background='images/sumbu_y.gif'> </td>
            <td width='151' rowspan='<?php 
print $pjbarh ?>'></td>
            <td width='99'></td>
            <td width='99'></td>
            <td width='99'></td>
            <td width='99'></td>
            <td width='99'></td>
            <td width='99'></td>
            <td width='89'></td>
            <td width='37'></td>
			<td width='37'></td>
          </tr>
<?php 
//$pjbar2			=	4; // panjang batang grafik statistik

$pjbarh		=$pjbar+1;
$repeat		=$IDS;

for ($i=1;$i<($jml_btg+1);$i++)
{


$grafiksompret_tanggal2 		= array("$tanggalhariini","$counterkemarin","$counterlusakemarin","$counter3harikemarin","$counter4harikemarin","$counter5harikemarin","$counter6harikemarin","$counter7harikemarin");

$grafiksompret_id2 				= array("111","112","113","114","115","116","117","118");

$grafiksompret_jmlvisitor2 		= array("$hitungdatacounterhariini","$hitungdatacounterharikemarin123","$pengunjungweb2harilalu",
"$pengunjungweb3harilalu","$pengunjungweb4harilalu","$pengunjungweb5harilalu","$pengunjungweb6harilalu","$pengunjungweb7harilalu");

$grafiksompret_hari2 			= array("$hi_hariini","$hi_harikemarin","$hi_lusakemarin","$hi_3harikemarin","$hi_4harikemarin","$hi_5harikemarin","$hi_6harikemarin","$hi_7harikemarin");




  
  $jml	=	$grafiksompret_jmlvisitor2[$i];
  $tg	= 	$grafiksompret_tanggal2[$i];
  $hri	=	$grafiksompret_hari2[$i];
  
  if($maks_3hari==0) 
  
  $maks_3hari=1; 
  
  else 
  
  $maks_3hari=$maks_3hari  ;
  
  if($i==1)//batang 1
  {
    if($jml==0) $jml=1;
    if($maks_3hari<$jml) $maks_3hari=$jml;
    $jml_1=round(($pjbar+1)- ($jml/$maks_3hari)*$pjbar);
    if($jml_1 >= $pjbar) $jml_1=$pjbar - 1;
    $top_1=$jml;//nilai angka statistik bar1
    $hittd=$top_1;
    $tg_1=$tg;
    $hri_1=$hri;
    $hri_1i=$hri_1;
    if($jml > $MAKS_JML) { $MAKS_JML=$jml; $tgal=$tg; $har=$hri;}
  }

  if($i==2)//batang 2
  {
    $jml_2=round(($pjbar+1)- ($jml/$maks_3hari)*$pjbar);
    if($jml_2 >= $pjbar) $jml_2=$pjbar - 1;
    $top_2=$jml;//nilai angka statistik bar2
    $hityd=$top_2;
    $tg_2=$tg;
    $hri_2=$hri;
    $hri_2i=$hri_2;
  }

  if($i==3)//batang 3
  {
    $jml_3=round(($pjbar+1)- ($jml/$maks_3hari)*$pjbar);
    if($jml_3 >= $pjbar) $jml_3=$pjbar - 1;
    $top_3=$jml;//nilai angka statistik bar3
    $tg_3=$tg;
    $hri_3=$hri;
    $hri_3i=$hri_3;
  }
  if($i==4)//batang 4
  {
    $jml_4=round(($pjbar+1)- ($jml/$maks_3hari)*$pjbar);
    if($jml_4 >= $pjbar) $jml_4=$pjbar - 1;
    $top_4=$jml;//nilai angka statistik bar4
    $tg_4=$tg;
    $hri_4=$hri;
    $hri_4i=$hri_4;
  }
  if($i==5)//batang 5
  {
    $jml_5=round(($pjbar+1)- ($jml/$maks_3hari)*$pjbar);
    if($jml_5 >= $pjbar) $jml_5=$pjbar - 1;
    $top_5=$jml;//nilai angka statistik bar5
    $tg_5=$tg;
    $hri_5=$hri;
    $hri_5i=$hri_5;
  }
  if($i==6)//batang 6
  {
    $jml_6=round(($pjbar+1)- ($jml/$maks_3hari)*$pjbar);
    if($jml_6 >= $pjbar) $jml_6=$pjbar - 1;
    $top_6=$jml;//nilai angka statistik bar6
    $tg_6=$tg;
    $hri_6=$hri;
    $hri_6i=$hri_6;
  }
  if($i==7)//batang 7
  {
    $jml_7=round(($pjbar+1)- ($jml/$maks_3hari)*$pjbar);
    if($jml_7 >= $pjbar) $jml_7=$pjbar - 1;
    $top_7=$jml;//nilai angka statistik bar7
    $tg_7=$tg;
    $hri_7=$hri;
    $hri_7i=$hri_7;
  }

  if($i==8)//batang 8
  {
    $jml_8=round(($pjbar+1)- ($jml/$maks_3hari)*$pjbar);
    if($jml_8 >= $pjbar) $jml_8=$pjbar - 1;
    $top_8=$jml;//nilai angka statistik bar8
    $tg_8=$tg;
    $hri_8=$hri;
    $hri_8i=$hri_8;
  }
  
  
  $repeat=$repeat - 1;

}// end for

//tampilkan nilai graph
for($c=1;$c<$pjbar+1;$c++)
{
  if($c==($jml_1+1)) {$tes_1="<font color='red'>$top_1</font><br>";if($top_1==0)$tes_1="<font color='red'>$top_1</font>"; } else $tes_1="";
  if($c>($jml_1+1)) $bg_1="bgcolor='#0099FF'";
  if($c==($jml_2+1)) {$tes_2="$top_2<br>";if($top_2==0)$tes_2="$top_2"; } else $tes_2="";
  if($c>($jml_2+1)) $bg_2="bgcolor='#ECE9D8'";
  if($c==($jml_3+1)){ $tes_3="$top_3<br>";if($top_3==0)$tes_3="$top_3"; } else $tes_3="";
  if($c>($jml_3+1)) $bg_3="bgcolor='#0099FF'";
  if($c==($jml_4+1)){ $tes_4="$top_4<br>";if($top_4==0)$tes_4="$top_4"; } else $tes_4="";
  if($c>($jml_4+1)) $bg_4="bgcolor='#ECE9D8'";
  if($c==($jml_5+1)){ $tes_5="$top_5<br>";if($top_5==0)$tes_5="$top_5"; } else $tes_5="";
  if($c>($jml_5+1)) $bg_5="bgcolor='#0099FF'";
  if($c==($jml_6+1)) {$tes_6="$top_6<br>";if($top_6==0)$tes_6="$top_6"; }else $tes_6="";
  if($c>($jml_6+1)) $bg_6="bgcolor='#ECE9D8'";
  if($c==($jml_7+1)){ $tes_7="$top_7<br>";if($top_7==0)$tes_7="$top_7"; } else $tes_7="";
  if($c>($jml_7+1)) $bg_7="bgcolor='#0099FF'";


  if($c==($jml_8+1)) {$tes_8="$top_8<br>";if($top_8==0)$tes_8="$top_8"; }else $tes_8="";
  if($c>($jml_8+1)) $bg_8="bgcolor='#ECE9D8'";
  
  
  
  ?>
          <tr >
		   <td height='6'   <?php 
print $bg_8 ?> align='center'><?php 
print $tes_8 ?></td>
            <td height='6'   <?php 
print $bg_7 ?> align='center'><?php 
print $tes_7 ?></td>
            <td height='6'  <?php 
print $bg_6 ?> align='center'><?php 
print $tes_6 ?></td>
            <td height='6'  <?php 
print $bg_5 ?> align='center'><?php 
print $tes_5 ?>
                <div align="center"></div></td>
            <td height='6'  <?php 
print $bg_4 ?> align='center'><?php 
print $tes_4 ?>
                <div align="center"></div></td>
            <td height='6'  <?php 
print $bg_3 ?> align='center'><?php 
print $tes_3 ?>
                <div align="center"></div></td>
            <td height='6'  <?php 
print $bg_2 ?> align='center'><?php 
print $tes_2 ?>
                <div align="center"></div></td>
            <td height='6'  <?php 
print $bg_1 ?> align='center'><?php 
print $tes_1 ?>
                <div align="center"></div></td>
          </tr>
          <?php 
}  ?>
          <tr height='1'>
          </tr>
          <tr>
            <td height='1' colspan='11' bgcolor='black'></td>
          </tr>
          <tr>
            <td height='1' colspan='11'></td>
          </tr>
          <tr class='boxdatauser3'>
            <td align='right' class='boxdatauser5 style2'>0</td>
            <td><span class="style2"></span></td>
            <td><span class="style2"></span></td>
			
            <td align='center'><span class="style2"><?php 
print substr($hri_8,0,3) ?></span></td>
            <td align='center'><span class="style2"><?php 
print substr($hri_7,0,3) ?></span></td>
            <td align='center'><span class="style2"><?php 
print substr($hri_6,0,3) ?></span></td>
            <td align='center'><span class="style2"><?php 
print substr($hri_5,0,3) ?></span></td>
            <td align='center'><span class="style2"><?php 
print substr($hri_4,0,3) ?></span></td>
            <td align='center'><span class="style2"><?php 
print substr($hri_3,0,3) ?></span></td>
            <td align='center'><span class="style2"><?php 
print substr($hri_2,0,3) ?></span></td>
            <td align='center'><span class="style2"><font color='red'><?php 
print substr($hri_1,0,3) ?></font></span></td>
            <td><span class="style2"></span></td>
          </tr>
        </table>
		<?php 
$AVG			=number_format($total_3hari/3,1 , ',','.');
$MAKS_JML		=number_format($MAKS_JML,0 , ',','.');
$iklan_semua	=number_format($iklan_semua,0 , ',','.');
$iklanfree		=number_format($iklanfree,0 , ',','.');

//statistik teks
?>