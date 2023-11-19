<?php

function get_youtube_id_from_url($url)  {
    preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);    return $results[6];
}



function imgUrl($filepath=null,$fileName=null){

	$old_image =public_path('images/'.$filepath.'/'.$fileName);
    if (!empty($fileName) and (file_exists($old_image))) {
       $url= asset('images/'.$filepath.'/'.$fileName);
    }else{

    	$url=asset('images/no_image.jpg');
    }

    return $url;

}