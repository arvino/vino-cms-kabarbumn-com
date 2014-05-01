<?PHP
session_name("CUST");
session_start();

class CaptchaUsers_Register {

	var $font = 'monofont.ttf';

	function AcakKode_Registrasi($characters) {
		
		$possible = '1234567890';
		$kode_registrasi = '';
		$i = 0;
		while ($i < $characters) { 
			$kode_registrasi .= substr($possible, mt_rand(0, strlen($possible)-1), 1);
			$i++;
		}
		return $kode_registrasi;
	}

	function CaptchaUsers_Register($width='120',$height='40',$characters='6') {
	
	
		$kode_registrasi = $this->AcakKode_Registrasi($characters);
		$_SESSION['kode_registrasi'] = $kode_registrasi;


		$font_size = $height * 0.75;
		$image = @imagecreate($width, $height) or die('Cannot initialize new GD image stream');
		
		$background_color = imagecolorallocate($image, 225, 225, 195);
		$text_color = imagecolorallocate($image, 245, 2, 13);
		$noise_color = imagecolorallocate($image, 225, 200, 100);
		
		for( $i=0; $i<($width*$height)/3; $i++ ) {
			imagefilledellipse($image, mt_rand(0,$width), mt_rand(0,$height), 1, 1, $noise_color);
		}
		
		for( $i=0; $i<($width*$height)/150; $i++ ) {
			imageline($image, mt_rand(0,$width), mt_rand(0,$height), mt_rand(0,$width), mt_rand(0,$height), $noise_color);
		}
		
		$textbox = imagettfbbox($font_size, 0, $this->font, $kode_registrasi) or die('Error in imagettfbbox function');
		$x = ($width - $textbox[4])/2;
		$y = ($height - $textbox[5])/2;
		imagettftext($image, $font_size, 0, $x, $y, $text_color, $this->font , $kode_registrasi) or die('Error in imagettftext function');
		
		header('Content-Type: image/jpeg');
		imagejpeg($image);
		imagedestroy($image);
		

	}
	

}

$width = isset($_GET['width']) ? $_GET['width'] : '100';
$height = isset($_GET['height']) ? $_GET['height'] : '30';
$characters = isset($_GET['characters']) && $_GET['characters'] > 1 ? $_GET['characters'] : '6';

$captchaS = new CaptchaUsers_Register($width,$height,$characters);

?>