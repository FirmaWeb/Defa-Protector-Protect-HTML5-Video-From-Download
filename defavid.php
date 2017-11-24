<?php
session_start();
ob_start();
$crc = filter_var($_GET['crc']);
$url = base64_decode(str_replace(sha_1($crc),'',$_SESSION['defaprotect'].$crc));
if( $headerurl = get_headers($url,1)['Location'] ){
 $url = $headerurl;
}
if(isset($_SERVER['HTTP_RANGE'])){
 if(isset($_SERVER['HTTP_RANGE'])){
            $opts['http']['header']="Range: ".$_SERVER['HTTP_RANGE'];
        }
        $opts['http']['method']= "HEAD";
        $conh=stream_context_create($opts);
        $opts['http']['method']= "GET";
        $cong= stream_context_create($opts);
        $out[]= file_get_contents($file,false,$conh);
        $out[]= $http_response_header;
        ob_end_clean();
        array_map("header",$http_response_header);
        readfile($file,false,$cong);
        die();
    }
}
}
