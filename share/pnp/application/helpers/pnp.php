<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
*
* 
*/
class pnp_Core {

	public static function clean($string = FALSE){
	    if($string === FALSE){
	        return;
	    }

	    if (1 == get_magic_quotes_gpc()){
	       $string = stripslashes($string);
	    }
	    $string = preg_replace('/[ :\/\\\\]/', "_", $string);
	    return $string;
	
	}
	public static function shorten($string = FALSE, $length = 25){
	    if($string === FALSE){
	        return;
	    }
		if(strlen($string) > $length){
			$string = substr($string, 0, $length) . "...";
		}
		return $string;
	}
	/*
	*
	*/
	public static function xml_version_check($string = FALSE){
	    if($string === FALSE){
	        return FALSE;
	    }
		if( $string == XML_STRUCTURE_VERSION ){
			$string = "valid";
		}else{
			$string = Kohana::lang('common.xml-structure-mismatch', $string, XML_STRUCTURE_VERSION);
		}
		return $string;
	}
	/*
	*
	*/
	public static function zoom_icon($host,$service,$start,$end,$source,$view){
		print "<a href=\"javascript:Gzoom('".url::base()."zoom?host=$host&srv=$service&view=$view&source=$source&end=$end&start=$start');\" title=\"Zoom into the Graph\"><img src=\"".url::base()."media/images/zoom.png\"></a>\n";
	}

	/*
	*
	*/
	public static function add_to_basket_icon($host,$service){
		print "<span id=\"basket_action_add\"><a title=\"Add This Item\" id=\"".$host."::".$service."\"><img width=16px height=16px src=\"".url::base()."media/images/add.png\"></a></span><br>\n";
}


} 
