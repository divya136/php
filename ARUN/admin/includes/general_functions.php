<?
	function redirectPage($page){
		echo '<script type="text/javascript">window.location.href="'.$page.'.html"</script>';
	}
	
	function redirectUrl($url){
		echo '<script type="text/javascript">window.location.href="'.$url.'"</script>';
	}
	
	function alert($text){
		echo '<script type="text/javascript">alert("'.$text.'");</script>';
	}
	
	function focus($field_id){
		return '<script type="text/javascript">document.getElementById("'.$field_id.'").focus();</script>';
	}
	
	//Pagination Functions
	function createPaginationLink($total_rows, $limit, $no_of_links = 0){
		//Pagination Variables
		$page = 'Page';
		$next_page = 'Next Page';
		$previous_page = 'Previous Page';
		$first_page = 'First Page';
		$last_page = 'Last Page';
		
		if(isset($_REQUEST['page'])){
			$current_page = $_REQUEST['page'];
		}else{
			$current_page = 0;
		}
		
		$total_links = ceil($total_rows/$limit);
		$links = '';
		
		if($no_of_links != 0 && $current_page > 0){
			$links .= '<a href="?page=0" title="'.$first_page.'"><<</a>';
		}
		
		if($current_page > 0 ){
			$links .= '<a href="?page='.($current_page-1).'" title="'.$previous_page.'/ '.$total_links.'"><</a>';
		}
		if($no_of_links != 0 ){
			if($current_page > $no_of_links){
				$left = $current_page - $no_of_links;
			}else{
				$left = 1;
			}
			
			if($current_page < ($total_links-$no_of_links)){
				$right = $current_page + $no_of_links;
			}else{
				$right = $total_links;
			}
			
			for($i=$left; $i<=$right; $i++){
				if($current_page == ($i-1)){
					$links .= '<strong title="'.$page.' '.$i.'/ '.$total_links.'">'.$i.'</strong>';
				}else{
					$links .= '<a href="?page='.($i-1).'" title="'.$page.' '.$i.'/ '.$total_links.'">'.$i.'</a>';
				}
			}
		}else{
			for($i=1; $i<=$total_links; $i++){
				if($current_page == ($i-1)){
					$links .= '<strong title="'.$page.' '.$i.'/ '.$total_links.'">'.$i.'</strong>';
				}else{
					$links .= '<a href="?page='.($i-1).'" title="'.$page.' '.$i.'/ '.$total_links.'">'.$i.'</a>';
				}
			}
		}
		if($current_page != $total_links-1 ){
			$links .= '<a href="?page='.($current_page+1).'" title="'.$next_page.'">></a>';
		}
		
		if($no_of_links != 0 && $current_page < $total_links-1){
			$links .= '<a href="?page='.($total_links-1).'" title="'.$last_page.'">>></a>';
		}
		if($total_rows > $limit){
			return $links;
		}
	}
	
	function isEmail($email){
		$pattern = "/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i";
		if (preg_match($pattern, $email)){
			return true;
		}else {
			return false;
		}   
	}
	
	function isSpecialChar($string){
		
		if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $string)){
			return true;
		}else{
			return false;
		}
	}
	
	function isImage($imageFilePath){
		list($width, $height, $type, $attr) = getimagesize($imageFilePath);
		
		if($type != 1 && $type != 2 && $type != 3){
			return false;
		}else{
			return true;
		}
	}
	
	function isImageSize($imageFilePath, $imageWidth, $imageHeight){
		list($width, $height, $type, $attr) = getimagesize($imageFilePath);
		
		if($imageWidth == $width && $imageHeight == $height){
			return true;
		}else {
			return false;
		}
	}
	
	function encrypt($string, $key = 'bigbenKey') {
	  $result = '';
	  for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)+ord($keychar));
		$result.=$char;
	  }
	  return base64_encode($result);
	}
	
	function decrypt($string, $key = 'bigbenKey') {
	  $result = '';
	  $string = base64_decode($string);
	  for($i=0; $i<strlen($string); $i++) {
		$char = substr($string, $i, 1);
		$keychar = substr($key, ($i % strlen($key))-1, 1);
		$char = chr(ord($char)-ord($keychar));
		$result.=$char;
	  }
	  return $result;
	}
	
	function getRandomString($length = 6) {
		$characters = array('A','1','B','2','C','3','D','4','E','5','F','6','G','7','H','8','I','9','J','0','K','9','L','8','M','7','N','6','O','5','P','4','Q','3','R','2','S','1','T','2','U','3','V','4','W','5','X','6','Y','7','Z','8');
		$string = '';
		for ($p = 0; $p < $length; $p++) {
			$string .= $characters[rand(0, 51)];
		}
		return $string;
	}
	
	function getRandomNumber($length = 10) {
		$numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', '8', '7', '6', '5', '4', '3', '2', '1', '0');
		$string = '';
		for ($p = 0; $p < $length; $p++) {
			$string .= $numbers[rand(0, 18)];
		}
		return $string;
	}
	
	function amountInWord($no){   
	 $words = array('0'=> '' ,'1'=> 'one' ,'2'=> 'two' ,'3' => 'three','4' => 'four','5' => 'five','6' => 'six','7' => 'seven','8' => 'eight','9' => 'nine','10' => 'ten','11' => 'eleven','12' => 'twelve','13' => 'thirteen','14' => 'fouteen','15' => 'fifteen','16' => 'sixteen','17' => 'seventeen','18' => 'eighteen','19' => 'nineteen','20' => 'twenty','30' => 'thirty','40' => 'fourty','50' => 'fifty','60' => 'sixty','70' => 'seventy','80' => 'eighty','90' => 'ninty','100' => 'hundred and','1000' => 'thousand','100000' => 'lakh','10000000' => 'crore');
		if($no == 0){
			return ' ';
		}else {
			$novalue='';
			$highno=$no;
			$remainno=0;
			$value=100;
			$value1=1000;       
			while($no>=100){
				if(($value <= $no) &&($no  < $value1)){
					$novalue=$words["$value"];
					$highno = (int)($no/$value);
					$remainno = $no % $value;
					break;
				}
				$value= $value1;
				$value1 = $value * 100;
			}       
			if(array_key_exists("$highno",$words)){
				return ucwords($words["$highno"]." ".$novalue." ".amountInWord($remainno).' Rupee Only/-');
			}else {
				 $unit=$highno%10;
				 $ten =(int)($highno/10)*10;            
				 return ucwords($words["$ten"]." ".$words["$unit"]." ".$novalue." ".amountInWord($remainno).' Rupee Only/-');
			}
		}
	}
?>