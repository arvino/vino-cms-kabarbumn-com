<?php 
function potong_judul( $text ){
		$PotongJudul = array( ":", "~","`","'",";","%","'","<",'"',"#", "--", "=",">","\"","%", "{","}", "(",")"," ",":",",","/","-","+","*","&", ",",
		"?","\'" ); /* Judul link untuk mode rewrite */
		//$text  = htmlspecialchars($text );
		$text  = trim ( str_replace ( $PotongJudul, '-', $text ) );
		$text = strtolower($text);
		return $text;
	}


	function potong_kata($sentence,$word_count){
		$space_count = 0;
		$print_string = '';
		for($i=0;$i<strlen($sentence);$i++)
		{
		if($sentence[$i]==' ')
		$space_count ++;
		$print_string .= $sentence[$i];
		if($space_count == $word_count)
		break;
		}
		echo $print_string;
		
	}


	function potong_kata_terkait($sentence,$word_count){
		$space_count = 0;
		$print_string = '';
		for($i=0;$i<strlen($sentence);$i++)
		{
		if($sentence[$i]==',')
		$space_count ++;
		$print_string .= $sentence[$i];
		if($space_count == $word_count)
		break;
		}
		
		
		return $print_string;

	}



	function pecah_terkait($kataterkait){
		$pecah = explode(", ",$kataterkait);
		$hitung = count($pecah);
		for($a=0;$a<=$hitung;$a++)
		{ 
			$hasil_pecah .= "$pecah[$a],";
		}
		return $hasil_pecah;
	}


	function strip_html_tags( $text ){
		return str_replace( '&nbsp;&lt;p&gt;&ndash;&rdquo;' , '' , strip_tags( $text ) );
	}
	

 	/* Text Limiter */
 	function limit_text($text, $limit) {
      if (strlen($text) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }

	  /* Word Count */
      function word_count($theString)
      {
        $char_count = strlen($theString);
        $fullStr = $theString." ";
        $initial_whitespace_rExp = "^[[:alnum:]]$";
       
        $left_trimmedStr = ereg_replace($initial_whitespace_rExp,"",$fullStr);
        $non_alphanumerics_rExp = "^[[:alnum:]]$";
        $cleanedStr = ereg_replace($non_alphanumerics_rExp," ",$left_trimmedStr);
        $splitString = explode(" ",$cleanedStr);
       
        $word_count = count($splitString)-1;
       
        if(strlen($fullStr)<2)
        {
          $word_count=0;
        }     
        return $word_count;
      }

	 function removeEvilTags($source)
     {
         $source = preg_replace('/<(.*?)>/ie', "", $source);
         return  $source;
     }



    function quote_smart($value) {
        if (!get_magic_quotes_gpc()) {
            $value = addslashes($value);
        }
        else {
        $value = $value;
    }
        return trim(htmlspecialchars(removeEvilTags($value)));
    }




    function katakotor($string) {
                    $banlist = array
                (
                "INSERT", "SELECT", "UPDATE", "DELETE", "DISTINCT", "HAVING", "TRUNCATE", "REPLACE",
                "HANDLER", " LIKE ", " AS ", " OR ", "PROCEDURE", "LIMIT", "ORDER BY", "GROUP BY",
                "insert", "select", "update", "delete", "distinct", "having", "truncate", "replace",
                "handler", " like ", " as ", " or ", "procedure", "limit", "order by", "group by",
                ";"," % "," ' "," < ",' " ',"#", "--", "=",">","'","%","NGENTOT","ngentot"
				
                );
        if ( eregi ( "[a-zA-Z0-9]+", $string ) )
        {
        $tbl_beritatring = trim ( str_replace ( $banlist, '', $string) );
        }
		
     return trim(htmlspecialchars(removeEvilTags($tbl_beritatring)));
     }
	 
	 
    function antiinjeksi($string) 
	{
               $banlist = array
                (
                "INSERT", "SELECT", "UPDATE", "DELETE", "DISTINCT", "HAVING", "TRUNCATE", "REPLACE",
                "HANDLER", " LIKE ", " AS ", " OR ", "PROCEDURE", "LIMIT", "ORDER BY", "GROUP BY",
                "insert", "select", "update", "delete", "distinct", "having", "truncate", "replace",
                "handler", " like ", " as ", " or ", "procedure", "limit", "order by", "group by", "UNION", "union",
                ";"," % "," ' "," < ",' " ',"#", "--", "=",">","'","%"
                );
        	if ( eregi ( "[a-zA-Z0-9]+", $string ) )
        	{
        		$newstring = trim ( str_replace ( $banlist, '', $string) );
        	}
     		//return trim(htmlspecialchars(removeEvilTags($newstring)));
			return $newstring;
     }
	     

	 function CryptPass( $password ) {
    		return md5($password);
 	 }
	 
	 
	 
	 
	function string_limiter($string, $limit = 50, $end_char = '&#8230;'){
        if (trim($string) == '')
        {
                return $string;
        }

        preg_match('/^\s*+(?:\S++\s*+){1,'.(int) $limit.'}/', $string, $matches);

        if (strlen($string) == strlen($matches[0]))
        {
                $end_char = '';
        }

        return rtrim($matches[0]).$end_char;
	}


	function strip_word_html($text, $allowed_tags = '<b><i><sup><sub><em><strong><u><br>')
    {
        mb_regex_encoding('UTF-8');
        //replace MS special characters first
        $search = array('/&lsquo;/u', '/&rsquo;/u', '/&ldquo;/u', '/&rdquo;/u', '/&mdash;/u');
        $replace = array('\'', '\'', '"', '"', '-');
        $text = preg_replace($search, $replace, $text);
        //make sure _all_ html entities are converted to the plain ascii equivalents - it appears
        //in some MS headers, some html entities are encoded and some aren't
        $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
        //try to strip out any C style comments first, since these, embedded in html comments, seem to
        //prevent strip_tags from removing html comments (MS Word introduced combination)
        if(mb_stripos($text, '/*') !== FALSE){
            $text = mb_eregi_replace('#/\*.*?\*/#s', '', $text, 'm');
        }
        //introduce a space into any arithmetic expressions that could be caught by strip_tags so that they won't be
        //'<1' becomes '< 1'(note: somewhat application specific)
        $text = preg_replace(array('/<([0-9]+)/'), array('< $1'), $text);
        $text = strip_tags($text, $allowed_tags);
        //eliminate extraneous whitespace from start and end of line, or anywhere there are two or more spaces, convert it to one
        $text = preg_replace(array('/^\s\s+/', '/\s\s+$/', '/\s\s+/u'), array('', '', ' '), $text);
        //strip out inline css and simplify style tags
        $search = array('#<(strong|b)[^>]*>(.*?)</(strong|b)>#isu', '#<(em|i)[^>]*>(.*?)</(em|i)>#isu', '#<u[^>]*>(.*?)</u>#isu');
        $replace = array('<b>$2</b>', '<i>$2</i>', '<u>$1</u>');
        $text = preg_replace($search, $replace, $text);
        //on some of the ?newer MS Word exports, where you get conditionals of the form 'if gte mso 9', etc., it appears
        //that whatever is in one of the html comments prevents strip_tags from eradicating the html comment that contains
        //some MS Style Definitions - this last bit gets rid of any leftover comments */
        $num_matches = preg_match_all("/\<!--/u", $text, $matches);
        if($num_matches){
              $text = preg_replace('/\<!--(.)*--\>/isu', '', $text);
        }
        return $text;
    }
	
	
	function Filter_Get( $text ){
	$PotongJudul = array( ";","%","'","<",'"',"#", "--", "=",">","\"","%", "{","}", "(",")"," ",":",",","/","?" ); /* Judul link untuk mode rewrite */
	//$text  = htmlspecialchars($text );
	$text  = trim ( str_replace ( $PotongJudul, '', $text ) );
	$text = strtolower($text);
	return $text;
}


    function quote_variable( $value ) {
        if (!get_magic_quotes_gpc()) {
            $value = addslashes($value);
        }
        else {
        	$value = $value;
    	}
        return $value;
    }


	function random_number($pass_len=3){
		$allchars = '0123456789'; 
		$string = ''; 
	
		mt_srand ((double) microtime() * 1000000); 
	
		for ($i = 0; $i < $pass_len; $i++) { 
	
		$string .= $allchars{mt_rand (0,strlen($allchars))}; 
		} 
	
		return $string; 
	}




	function filter_tipefile( $tipefile ){
		$allowedExtensions = array(
				"bmp","jpg","jpeg","gif","png","JPG","JPEG","PNG","GIF","BMP",
				"doc","xls","pdf","zip","rar","DOC","XLS","PDF","ZIP","RAR",
				"mp3","mp4","wmv","midi","wav","MP3","MP4","WMV","MIDI","WAV",
				"flv","3gp","FLV","3GP","iso","ISO","exe","EXE"
		);
		
		if (!in_array(end(explode(".", strtolower($tipefile))), $allowedExtensions)) {	
			$tipefile = "vino";
			return $tipefile;	
		}else{
			return $tipefile;
		}	
	}


?>