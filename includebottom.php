<?php
$output = ob_get_clean();
if( (strpos($output,"<video") || strpos($output,"<audio")  || strpos($output,"<source") )  && !(strpos($output,"<safe")) ){
//Check If There is Video On The Page Then Load Defa Protector
// Source Tag Validation isn't need but for safety 
//If HTML Contains Safe Tag, Then Not Load Defa Protector
    function getURL($matches) {
          $crc = substr(sha1($matches['2']), -8, -1);
          $_SESSION['defaprotect'.$crc] = sha1($crc).base64_encode($matches['2']).sha1($crc);
          return $matches[1] . $rootURL . "/defavid.php?crc=".$crc;
    }
    $output = preg_replace_callback("/(^(<video|<audio|<source)[^>]*src *= *[\"']?)([^\"']*)/i", getURL, $output);
}
echo $output;
