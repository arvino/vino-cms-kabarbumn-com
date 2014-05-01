<?PHP
session_name("CUST");
session_start();

class CaptchaUsers_GantiPassword {

	var $font = 'monofont.ttf';

	function AcakKode_GantiPassword($characters) {
		
		$possible = '1234567890';
		$Kode_GantiPassword = '';
		$i = 0;
		while ($i < $characters) { 
			$Kode_GantiPassword .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $Kode_GantiPassword;
	}

	function CaptchaUsers_GantiPassword($width='120',$height='40',$characters='6') {
	
	
		$Kode_GantiPassword = $this->AcakKode_GantiPassword($characters);
		$_SESSION['Kode_GantiPassword'] = $Kode_GantiPassword;


		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height) or die('Tidak Dapat Melihat Pustaka GD');
		
		$background_color = imagecolorallocate($image, 225, 225, 195);
		$text_color = imagecolorallocate($image, 245, 2, 13);
		$noise_color = imagecolorallocate($image, 225, 200, 100);
		
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		
		$textbox = imagettfbbox($font_size, 0, $this->font, $Kode_GantiPassword) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font , $Kode_GantiPassword) or die('Error in imagettftext function');
		
		header('Content-Type: image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
		
		
		
		
		
		
	}
	

}

$width = isset($_GET['width']) ? $_GET['width'] : '100';
$height = isset($_GET['height']) ? $_GET['height'] : '30';
$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';

$captchaS = new CaptchaUsers_GantiPassword($width,$height,$characters);

?>