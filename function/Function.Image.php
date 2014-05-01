<?php 
function resize_png_image($img,$newWidth,$newHeight,$target)
	{
    $srcImage=imagecreatefrompng($img);
    										if($srcImage=='')
											{
        											return FALSE;
    											}
    										$srcWidth=imagesx($srcImage);
    $srcHeight=imagesy($srcImage);
    $percentage=(double)$newWidth/$srcWidth;
    $destHeight=round($srcHeight*$percentage)+1;
    $destWidth=round($srcWidth*$percentage)+1;
    if($destHeight > $newHeight)
	{
        // if the width produces a height bigger than we want, calculate based on height
        $percentage=(double)$newHeight/$srcHeight;
        $destHeight=round($srcHeight*$percentage)+1;
        $destWidth=round($srcWidth*$percentage)+1;
    }
    $destImage=imagecreatetruecolor($destWidth-1,$destHeight-1);
    if(!imagealphablending($destImage,FALSE))
	{
        return FALSE;
    }
    if(!imagesavealpha($destImage,TRUE))
	{
        return FALSE;
    }
    if(!imagecopyresampled($destImage,$srcImage,0,0,0,0,$destWidth,$destHeight,$srcWidth,$srcHeight))
	{
        return FALSE;
    }
    if(!imagepng($destImage,$target))
	{
        return FALSE;
    }
    imagedestroy($destImage);
    imagedestroy($srcImage);
    return TRUE;
}


/* IMAGE CROPPING */
	function image_croping( $direktory_file, $newName, $buntutnye )
	{
	
						$buntutnye_di_filter = array("jpg","jpeg","JPG","JPEG");
					
						if(!in_array($buntutnye,$buntutnye_di_filter))
						{
							exit();
							return false;
						}
						else
						{
								$gambar_asli 		= $direktory_file.$newName;
								$gambar_crop 		= $direktory_file."Croping".$newName;
								$gambar_crop_FILE	= "Vin_Croping".$newName;

								$nw				= 400;
								$nh 			= 300;
								$source 		= $gambar_asli;
								$stype 			= $buntutnye; 
								$dest 			= $gambar_crop;

                				$size = getimagesize($source); // ukuran gambar

                				$w = $size[0];

                				$h = $size[1];

                				switch($stype) { // format gambar

                                case 'gif':

                                                $simg = imagecreatefromgif($source);

                                                break;

                                case 'GIF':

                                                $simg = imagecreatefromgif($source);

                                                break;
												

                                case 'jpg':

                                                $simg = imagecreatefromjpeg($source);

                                                break;
								
								
								
                                case 'JPG':

                                                $simg = imagecreatefromjpeg($source);

                                                break;


                                case 'jpeg':

                                                $simg = imagecreatefromjpeg($source);

                                                break;



                                case 'JPEG':

                                                $simg = imagecreatefromjpeg($source);

                                                break;
												


												

                                case 'png':

                                                $simg = imagecreatefrompng($source);

                                                break;



                                case 'PNG':

                                                $simg = imagecreatefrompng($source);

                                                break;

                			

                		$dimg = imagecreatetruecolor($nw, $nh); // menciptakan image baru

                		$wm = $w/$nw;

                		$hm = $h/$nh;

                		$h_height = $nh/2;

                		$w_height = $nw/2;

                		if($w> $h) {

                                $adjusted_width = $w / $hm;

                                $half_width = $adjusted_width / 2;

                                $int_width = $half_width - $w_height;

                                imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);

                		} elseif(($w <$h) || ($w == $h)) {

                                $adjusted_height = $h / $wm;

                                $half_height = $adjusted_height / 2;

                                $int_height = $half_height - $h_height;

                                imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);

                		} else 
						{

                                imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);

                		}

                                imagejpeg($dimg,$dest,100);

			}

	}




	function image_watermark(
		$direktory_file, $newName, $lokasiwatermark,
		$v_position, $h_position, $wm_size, $watermark
	){


			$lokasiwatermark = "filemodul/berita/watermark";

 		 	$gambar_asli 			= $direktory_file.$newName;
			ob_start();
 
  			$disp_width_max			=	150;                     
  			$disp_height_max		=	80;                     
  			$edgePadding			=	15;                      
  			$quality				=	100;                            
 
 			$default_watermark		= 'kosong.png';   

			//$page_display=ob_get_clean();

            if($v_position=='') $v_position='center';
            if($h_position=='') $h_position='center';
            if($wm_size=='') 	$wm_size='1';
        
            // file upload success
            $size=getimagesize($gambar_asli);
            if($size[2]==2 || $size[2]==3)
			{

				$target_name=$gambar_asli;
				if($watermark=='')
				{
				
				$watermark		=	$lokasiwatermark . 'watermarks/kosong.png';
				}
				else
				{
				 $watermark		=	$lokasiwatermark . 'watermarks/'.$watermark;
				}
				
                $target				=	$gambar_asli;
				
                $wmTarget			=	$watermark.'.tmp';
				// Informasi gambar nyang mo di watermark
                $origInfo 			= getimagesize($gambar_asli); 
                $origWidth 			= $origInfo[0]; 
                $origHeight 		= $origInfo[1]; 
				
				
                $waterMarkInfo 		= getimagesize($watermark);
                $waterMarkWidth 	= $waterMarkInfo[0];
                $waterMarkHeight 	= $waterMarkInfo[1];
        
                // Informasi Ukuran Watermark yang di dapat sebagai berikut -->
                if($wm_size=='larger')
				{
                    $placementX=0;
                    $placementY=0;
                    $h_position='center';
                    $v_position='center';
                	$waterMarkDestWidth=$waterMarkWidth;
                	$waterMarkDestHeight=$waterMarkHeight;
                    
                    if($waterMarkWidth > $origWidth*1.05 && $waterMarkHeight > $origHeight*1.05){

                    	$wdiff=$waterMarkDestWidth - $origWidth;
                    	$hdiff=$waterMarkDestHeight - $origHeight;
                    	if($wdiff > $hdiff)
						{

                    		$sizer=($wdiff/$waterMarkDestWidth)-0.05;
                    	}
						else
						{
                    		$sizer=($hdiff/$waterMarkDestHeight)-0.05;
                    	}
                    	$waterMarkDestWidth-=$waterMarkDestWidth * $sizer;
                    	$waterMarkDestHeight-=$waterMarkDestHeight * $sizer;
                    }
					else
					{

                    	$wdiff=$origWidth - $waterMarkDestWidth;
                    	$hdiff=$origHeight - $waterMarkDestHeight;
                    	if($wdiff > $hdiff)
						{

                    		$sizer=($wdiff/$waterMarkDestWidth)+0.05;
                    	}
						else
						{
                    		$sizer=($hdiff/$waterMarkDestHeight)+0.05;
                    	}
                    		$waterMarkDestWidth+=$waterMarkDestWidth * $sizer;
                    		$waterMarkDestHeight+=$waterMarkDestHeight * $sizer;
                    }
                }
				else
				{
	                $waterMarkDestWidth=round($origWidth * floatval($wm_size));
	                $waterMarkDestHeight=round($origHeight * floatval($wm_size));
	                if($wm_size==1){
	                    $waterMarkDestWidth-=2*$edgePadding;
	                    $waterMarkDestHeight-=2*$edgePadding;
	                }
                }

                // OK, we have what size we want the watermark to be, time to scale the watermark image
                resize_png_image($watermark,$waterMarkDestWidth,$waterMarkDestHeight,$wmTarget);
                
                // get the size info for this watermark.
                $wmInfo=getimagesize($wmTarget);
                $waterMarkDestWidth=$wmInfo[0];
                $waterMarkDestHeight=$wmInfo[1];

                $differenceX = $origWidth - $waterMarkDestWidth;
                $differenceY = $origHeight - $waterMarkDestHeight;

                // where to place the watermark?
                switch($h_position)
				{
                    // find the X coord for placement
                    case 'left':
                        $placementX = $edgePadding;
                        break;
                    case 'center':
                        $placementX =  round($differenceX / 2);
                        break;
                    case 'right':
                        $placementX = $origWidth - $waterMarkDestWidth - $edgePadding;
                        break;
                }

                switch($v_position)
				{
                    // find the Y coord for placement
                    case 'top':
                        $placementY = $edgePadding;
                        break;
                    case 'center':
                        $placementY =  round($differenceY / 2);
                        break;
                    case 'bottom':
                        $placementY = $origHeight - $waterMarkDestHeight - $edgePadding;
                        break;
                }
       
                if($size[2]==3)
                    $resultImage = imagecreatefrompng($gambar_asli);
                else
                    $resultImage = imagecreatefromjpeg($gambar_asli);
                imagealphablending($resultImage, TRUE);
        
                $finalWaterMarkImage = imagecreatefrompng($wmTarget);
                $finalWaterMarkWidth = imagesx($finalWaterMarkImage);
                $finalWaterMarkHeight = imagesy($finalWaterMarkImage);
        
                imagecopy($resultImage,
                          $finalWaterMarkImage,
                          $placementX,
                          $placementY,
                          0,
                          0,
                          $finalWaterMarkWidth,
                          $finalWaterMarkHeight
                );
                
                if($size[2]==3)
				{
                    imagealphablending($resultImage,FALSE);
                    imagesavealpha($resultImage,TRUE);
                    imagepng($resultImage,$target,$quality);
                }else{
                    imagejpeg($resultImage,$target,$quality); 
                }

                imagedestroy($resultImage);
                imagedestroy($finalWaterMarkImage);
		}


}


}





?>