<?php
	function String2Hex($string){
		$hex='';
		for ($i=0; $i < strlen($string); $i++){
				$hex .= dechex(ord($string[$i]));
		}
		return $hex;
	} 
				
	function Hex2String($hex){
		$string='';
		for ($i=0; $i < strlen($hex)-1; $i+=2){
			$string .= chr(hexdec($hex[$i].$hex[$i+1]));
		}
		return $string;
	}
						
	function Encript($word){
		$tam="blitarmap";
		$b=0;
		$c=strlen($tam);
		$WtH=String2Hex($word);
		$SWtH=(String)$WtH;
		for($a=0;$a<strlen($SWtH);$a++){
			$asc=ord($SWtH[$a]);
			$asct=ord($tam[$b]);
			$asc=$asc+$b;
			$SWtH[$a]=chr($asc);
			$b++;
			if($b>=$c)
				$b=0;
		}
		$word=$SWtH;
		return $word;
	}
	function Decript($word){
		$tam="blitarmap";
		$b=0;
		$c=strlen($tam);
		for($a=0;$a<strlen($word);$a++){
			$asc=ord($word[$a]);
			$asct=ord($tam[$b]);
			$asc=$asc-$b;
			$word[$a]=chr($asc);
			$b++;
			if($b>=$c)
				$b=0;
		}
		$HtW=Hex2String($word);
		return $HtW;
	}
?>