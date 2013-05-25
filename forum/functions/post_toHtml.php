<?php
function postX($content,$class){
switch($class){
	case "blizz":
	$content=str_replace("[quote]", "<blockquote class=\"quote-blizzard\">",$content);
	break;
	case "mvp":
	$content=str_replace("[quote]", "<blockquote class=\"quote-mvp\">",$content);
	break;
	default:
	$content=str_replace("[quote]", "<blockquote class=\"quote-public\">",$content);
	break;
}

$content=str_replace("[/quote]", "</blockquote>",$content);
$content=str_replace("[b]", "<b>",$content);
$content=str_replace("[/b]", "</b>",$content);
$content=str_replace("[i]", "<i>",$content);
$content=str_replace("[/i]", "</i>",$content);
$content=str_replace("[u]", "<u>",$content);
$content=str_replace("[/u]", "</u>",$content);
$content=str_replace("[ul]", "<ul>",$content);
$content=str_replace("[/ul]", "</ul>",$content);
$content=str_replace("[li]", "<li>",$content);
$content=str_replace("[/li]", "</li>",$content);
$content=str_replace("[code]", "<code>",$content);
$content=str_replace("[/code]", "</code>",$content);
$content=str_replace("[img]", "<img src=\"",$content);
$content=str_replace("[/img]", "\"/>",$content);
$content=str_replace("[IMG]", "<img src=\"",$content);
$content=str_replace("[/IMG]", "\"/>",$content);

$bomb = explode("[item=",$content);

foreach($bomb AS $bombs)
{
	$new = explode(" /]",$bombs);
	if(is_numeric($new[0])){
	
    $url = "http://www.wowhead.com/item=".$new[0]."&xml";

    if (ini_get('allow_url_fopen')) {
      $xml = simplexml_load_file($url); 
    }   
    else {    
      $ch = curl_init($url);    
      curl_setopt  ($ch, CURLOPT_HEADER, false); 
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);    
      $xml_raw = curl_exec($ch);    
      $xml = simplexml_load_string($xml_raw);  
    }
		
	//$xml = new SimpleXMLElement("http://www.wowhead.com/item=".$new[0]."&xml", NULL, TRUE);
	$img = $xml->item->icon;
	$name = $xml->item->name;
	$q = $xml->item->quality;
	
	$parlevu = '<a class="bml-link-item color-q'.quality($q).'" rel="item='.$new[0].'"><span class="icon-frame frame-10">
	<img height="10" width="10" src="http://wow.zamimg.com/images/wow/icons/small/'.strtolower($img).'.jpg" alt="" /></span>
	'.$name.'</a> <span style="display:none;">(itemid : ';
	
	$content=str_replace("[item=", "$parlevu",$content);
	$content=str_replace(" /]", ")</span>",$content);
	}
}
return $content;
}


function removeBBCode($content){
    $content=str_replace("[quote]", "",$content);
    $content=str_replace("[/quote]", "",$content);
    $content=str_replace("[b]", "",$content);
    $content=str_replace("[/b]", "",$content);
    $content=str_replace("[i]", "",$content);
    $content=str_replace("[/i]", "",$content);
    $content=str_replace("[u]", "",$content);
    $content=str_replace("[/u]", "",$content);
    $content=str_replace("[ul]", "",$content);
    $content=str_replace("[/ul]", "",$content);
    $content=str_replace("[li]", "",$content);
    $content=str_replace("[/li]", "",$content);
    $content=str_replace("[code]", "",$content);
    $content=str_replace("[/code]", "",$content);
    $content=str_replace("[img]", "",$content);
    $content=str_replace("[/img]", "",$content);
    $content=str_replace("[IMG]", "",$content);
    $content=str_replace("[/IMG]", "\"/>",$content);
    $content=str_replace("[item=", "item : ",$content);
    $content=str_replace(" /]", "",$content);
    return $content;
}

function ago($time)
{
   $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();

       $difference     = $now - $time;
       $tense         = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "s";
   }

   return "$difference $periods[$j] ago";
}

?>