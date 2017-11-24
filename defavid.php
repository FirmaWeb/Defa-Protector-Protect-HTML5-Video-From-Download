<?php
session_start();
ob_start();
$crc = filter_var($_GET['crc']);
$file = $_SESSION['defaprotect'.$crc];
if( $headerurl = @get_headers($file,1)['Location'] ){
 $file = $headerurl;
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

