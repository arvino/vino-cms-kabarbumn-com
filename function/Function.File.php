<?php 
/* Upload File  */
	function Upload_File( $new_name, $uploaddir, $temp_file, $ukuran_file, $nama_file )	{

	$allowedExtensions = array(
			"bmp","jpg","jpeg","gif","png","JPG","JPEG","PNG","GIF","BMP",
			"doc","xls","pdf","zip","rar","DOC","XLS","PDF","ZIP","RAR",
			"mp3","mp4","wmv","midi","wav","MP3","MP4","WMV","MIDI","WAV",
			"flv","3gp","FLV","3GP","iso","ISO","exe","EXE"
	);
	
	if (!in_array(end(explode(".", strtolower($nama_file))), $allowedExtensions)) {	
		$buntutnye = "blokir_tipe_file_by_vino";
	}else{

		$buntutnye = end(explode(".", $nama_file));
		$buntutnye = strtolower($buntutnye);
		
	}	

					$namabaru 			= strtolower($new_name);

					$Filter_NamaBaru	= array( ":", "~","`","'",";","%","'","<",'"',"#", "--", "=",">","\"","%", "{","}", "(",")"," ",";",",","/",				"-","+","*","&",
	"?","\'"  );
					$namabaru			= trim ( str_replace ( $Filter_NamaBaru, '_', $namabaru ) );

					$keyunix = date("His");
					
					$newName			= $namabaru ."_". $keyunix ."_vino_cms_".".".$buntutnye; 
					$newfile 			= $uploaddir.$newName;
					/* Contoh Nama File : NamaFileNya-201012011000-file_vino.jpg*/

					move_uploaded_file( $temp_file, $newfile );
					chmod( $newfile, 0777 );
			
					return $newName;
	}
					
	/* Buat Direktori */
	function Create_Direktori( $location_dir ){
		mkdir( $location_dir,'0777',true); 
		chmod( $location_dir, 0777);
		return $location_dir;
	}


	/* IMAGE RESIZE */
	function Resize_Gambar( $new_name, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $ukuranresize ){

	$allowedExtensions = array(
			"bmp","jpg","jpeg","gif","png","JPG","JPEG","PNG","GIF","BMP",
			"doc","xls","pdf","zip","rar","DOC","XLS","PDF","ZIP","RAR",
			"mp3","mp4","wmv","midi","wav","MP3","MP4","WMV","MIDI","WAV",
			"flv","3gp","FLV","3GP","iso","ISO","exe","EXE"
	);
	
	if (!in_array(end(explode(".", strtolower($nama_file))), $allowedExtensions)) {	
		$buntutnye = "blokir_tipe_file_by_vino";
	}else{

		$buntutnye = end(explode(".", $nama_file));
		$buntutnye = strtolower($buntutnye);
		
	}	

		$namabaru 			= strtolower($new_name);

		$Filter_NamaBaru	= array( ";","%","'","<",'"',"#", "--", "=",">","\"","%", "{","}", "(",")"," " );
		$namabaru			= trim ( str_replace ( $Filter_NamaBaru, '_', $namabaru ) );

		$keyunix = date("YmdHis");
					
		$newName			= $namabaru ."_". $keyunix ."_vino_cms_".".".$buntutnye; 
		$newfile 			= $uploaddir.$newName;
		/* Contoh Nama File : NamaFileNya-201012011000-file_vino.jpg*/

					
		$img_thumb_width = $ukuranresize;  
					
		$ThumbWidth7 = $img_thumb_width;
					
		if($ukuran_file){

		if($tipe_file == "image/pjpeg" || $tipe_file == "image/jpeg"){

		$new_img7 = imagecreatefromjpeg($temp_file);

		}
		elseif($tipe_file == "image/x-png" || $tipe_file == "image/png"){

		$new_img7 = imagecreatefrompng($temp_file);

		}elseif($tipe_file == "image/gif"){

		$new_img7 = imagecreatefromgif($temp_file);

		}

		list($width7, $height7) = getimagesize($temp_file);

		$imgratio7=$width7/$height7;

		if ($imgratio7>1){

		$newwidth7 = $ThumbWidth7;

		$newheight7 = $ThumbWidth7/$imgratio7;

		}
		else
		{

		$newheight7 = $ThumbWidth7;

		$newwidth7 = $ThumbWidth7*$imgratio7;

		}
	
		

		if (function_exists(imagecreatetruecolor)){
			$resized_img7 = imagecreatetruecolor($newwidth7,$newheight7);
		}else{
			die("Error: Periksa GD library ver 2+");
		}
		imagecopyresized($resized_img7, $new_img7, 0, 0, 0, 0, $newwidth7, $newheight7, $width7, $height7);
		ImageJpeg ($resized_img7,$newfile);



		}				
		
		return $newName;	
		

	}	/* END IMAGE RESIZE */				





function cropImage( $new_name, $uploaddir, $temp_file, $ukuran_file, $nama_file, $tipe_file, $nw, $nh ) {

	$allowedExtensions = array(
			"bmp","jpg","jpeg","gif","png","JPG","JPEG","PNG","GIF","BMP",
			"doc","xls","pdf","zip","rar","DOC","XLS","PDF","ZIP","RAR",
			"mp3","mp4","wmv","midi","wav","MP3","MP4","WMV","MIDI","WAV",
			"flv","3gp","FLV","3GP","iso","ISO","exe","EXE"
	);
	
	if (!in_array(end(explode(".", strtolower($nama_file))), $allowedExtensions)) {	
		$buntutnye = "blokir_tipe_file_by_vino";
	}else{

		$buntutnye = end(explode(".", $nama_file));
		$buntutnye = strtolower($buntutnye);
		
	}	

		$namabaru 			= strtolower($new_name);

		$Filter_NamaBaru	= array( ";","%","'","<",'"',"#", "--", "=",">","\"","%", "{","}", "(",")"," " );
		$namabaru			= trim ( str_replace ( $Filter_NamaBaru, '_', $namabaru ) );

		$keyunix = date("YmdHis");
					
		$newName			= $namabaru ."_crop_file_". $keyunix ."_vino_cms_".".".$buntutnye; 
		$newfile 			= $uploaddir.$newName;

	
	$size = getimagesize($temp_file); // ukuran gambar
	
	$w = $size[0];
	
	$h = $size[1];
	
	

	if($tipe_file == "image/pjpeg" || $tipe_file == "image/jpeg"){
	
	$simg = imagecreatefromjpeg($temp_file);
	
	}
	elseif($tipe_file == "image/x-png" || $tipe_file == "image/png"){
	
	$simg = imagecreatefrompng($temp_file);
	
	}elseif($tipe_file == "image/gif"){
	
	$simg = imagecreatefromgif($temp_file);
	
	}


	$dimg = imagecreatetruecolor($nw, $nh); // menciptakan image baru
	
	$wm = $w/$nw;
	
	$hm = $h/$nh;
	
	$h_height = $nh/14;

	$w_height = $nw/14;
	
	if($w> $h) {
	
	$adjusted_width = $w / $hm;
	
	$half_width = $adjusted_width / 14;
	
	$int_width = $half_width - $w_height;
	
	imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
	
	} elseif(($w <$h) || ($w == $h)) {
	
	$adjusted_height = $h / $wm;
	
	$half_height = $adjusted_height / 14;
	
	$int_height = $half_height - $h_height;
	
	imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
	
	} else {
	
	imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
	
	}
	
	imagejpeg($dimg,$newfile,100);
	
	return $newName;	

}


?>