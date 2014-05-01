<?php 
function offsethalaman($halaman,$dataPerPage){
	if(!isset($halaman) OR $halaman=='')
	{
		$noPage = 1;
	}else{
		$noPage = $halaman;
	}
	$offset = ($noPage - 1) * $dataPerPage;
	return array($offset, $noPage);
}


function tampilkanhalaman($posisihalaman, $dataPencarian1,$dataPerPage, $noPage, $halaman){
	$jumData = $dataPencarian1;

	$jumPage = ceil($jumData/$dataPerPage);

	if ($noPage > 1) 

	$TampilHalaman .=  "<strong> <a href='$posisihalaman&halaman=".($noPage-1)."'> <img src='images/arrow_previous.png' border='0'> </a> </strong>";

	for($page = 1; $page <= $jumPage; $page++)
	{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2)) 
			 
			$TampilHalaman .= "..."; 
			
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  
			
			$TampilHalaman .= "...";
			
            if ($page == $noPage) 
			
			$TampilHalaman .=  "<strong> <a href='' class='currentpage'>".$page."</a> </strong>";
			
            else 
			
			$TampilHalaman .= "<strong> <a href='$posisihalaman&halaman=".$page."'>".$page."</a> </strong>";
			
            $showPage = $page;          
         }
	}



	if ($noPage < $jumPage) 

	$TampilHalaman .= "<strong> <a href='$posisihalaman&halaman=".($noPage+1)."'> <img src='images/arrow_next.png' border='0'>  </a> </strong>";

	return $TampilHalaman;

}


function tampilkanhalaman_dihome($posisihalaman, $dataPencarian1,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman ){
	$jumData = $dataPencarian1;
 
	$jumPage = ceil($jumData/$dataPerPage);

	if ($noPage > 1) 

	$TampilHalaman .=  "<strong> <a href='$link_host"."$kategori_halaman"."page".($noPage-1)."$posisihalaman'> <img src='images/arrow_previous.png' border='0'> </a> </strong>";

	// memunculkan nomor halaman dan linknya

	for($page = 1; $page <= $jumPage; $page++)
	{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2)) 
			 
			$TampilHalaman .= "..."; 
			
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  
			
			$TampilHalaman .= "...";
			
            if ($page == $noPage) 
			
			$TampilHalaman .=  "<strong> <a href='' class='currentpage'>".$page."</a> </strong>";
			
            else 
			
			$TampilHalaman .= "<strong> <a href='$link_host"."$kategori_halaman"."page".$page."$posisihalaman'>".$page."</a> </strong>";
			
            $showPage = $page;          
         }
	}

	if ($noPage < $jumPage) 

	$TampilHalaman .= "<strong> <a href='$link_host"."$kategori_halaman"."page".($noPage+1)."$posisihalaman'> <img src='images/arrow_next.png' border='0'> </a></strong>";

	return $TampilHalaman;

}


function tampilkanhalaman_hasil_pencarian( $posisihalaman, $dataPencarian1,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman ){
	$jumData = $dataPencarian1;
 
	$jumPage = ceil($jumData/$dataPerPage);

	if ($noPage > 1) 

	$TampilHalaman .=  "<strong> <a href='$link_host"."$kategori_halaman"."page".($noPage-1)."$posisihalaman'>  <img src='images/arrow_previous.png' border='0'>  </a> </strong>";

	for($page = 1; $page <= $jumPage; $page++)
	{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2)) 
			 
			$TampilHalaman .= "..."; 
			
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  
			
			$TampilHalaman .= "...";
			
            if ($page == $noPage) 
			
			$TampilHalaman .= "<strong> <a href='$link_host"."$kategori_halaman"."page".$page."$posisihalaman' class='currentpage'>".$page."</a> </strong>";
			
            else 
			
			$TampilHalaman .= "<strong> <a href='$link_host"."$kategori_halaman"."page".$page."$posisihalaman'>".$page."</a> </strong>";
			
            $showPage = $page;          
         }
	}


	if ($noPage < $jumPage) 

	$TampilHalaman .= "<strong> <a href='$link_host"."$kategori_halaman"."page".($noPage+1)."$posisihalaman'> <img src='images/arrow_next.png' border='0'>  </a> </strong>";

	return $TampilHalaman;

}




function tampilkanhalaman_hasil_indeks( $posisihalaman, $dataPencarian1,$dataPerPage, $noPage, $halaman, $link_host, $kategori_halaman ){
	$jumData = $dataPencarian1;
 
	$jumPage = ceil($jumData/$dataPerPage);

	if ($noPage > 1) 

	$TampilHalaman .=  "<strong> <a href='$link_host"."$kategori_halaman"."page".($noPage-1)."$posisihalaman'>  <img src='images/arrow_previous.png' border='0'>  </a> </strong>";

	for($page = 1; $page <= $jumPage; $page++)
	{
         if ((($page >= $noPage - 3) && ($page <= $noPage + 3)) || ($page == 1) || ($page == $jumPage)) 
         {   
            if (($showPage == 1) && ($page != 2)) 
			 
			$TampilHalaman .= "..."; 
			
            if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  
			
			$TampilHalaman .= "...";
			
            if ($page == $noPage) 
			
			$TampilHalaman .=  "<strong> <a href='$link_host"."$kategori_halaman"."page".$page."$posisihalaman' class='currentpage'>".$page."</a> </strong>";
			
            else 
			
			$TampilHalaman .= "<strong> <a href='$link_host"."$kategori_halaman"."page".$page."$posisihalaman'>".$page."</a> </strong>";
			
            $showPage = $page;          
         }
	}

	if ($noPage < $jumPage) 

	$TampilHalaman .= "<strong> <a href='$link_host"."$kategori_halaman"."page".($noPage+1)."$posisihalaman'> <img src='images/arrow_next.png' border='0' >  </a> </strong>";

	return $TampilHalaman;

}

?>