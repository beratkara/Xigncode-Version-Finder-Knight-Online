<?php

set_time_limit(0);

function curl_download($Url){
 
    if (!function_exists('curl_init'))
        die('Curl Kurulu Değil ');
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $Url);
    curl_setopt($ch, CURLOPT_REFERER, "http://hspatch.nttgameonline.com");
    curl_setopt($ch, CURLOPT_USERAGENT, "MozillaXYZ/1.0");
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

$url = "http://hspatch.nttgameonline.com/xigncode3/knight/GameLive/gA1cjrxctNryNA/List/";
$version = 50000;


startpage:

$gidilcekurl = $url.$version."/";

$icerik = curl_download($gidilcekurl);
while(strpos($icerik,"Hellow World!!")){
	flush();
	ob_get_contents();
	ob_flush();

	$icerik = curl_download($gidilcekurl);
}

if($version == 62269){
	echo "Bitti !";
}elseif(strpos($icerik,"Forbidden")){
	echo "Version : ".$version." URL : ".$gidilcekurl."<br>";
	$version = $version + 1;
	goto startpage;
}elseif(strpos($icerik,"Not Found")){
	$version = $version + 1;
	goto startpage;
}


?>