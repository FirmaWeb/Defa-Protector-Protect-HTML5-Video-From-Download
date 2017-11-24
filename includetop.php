<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start(function($output){
    if( (strpos($output,"<video") > -1 || strpos($output,"<audio") > -1  || strpos($output,"<source") > -1 )  && (strpos($output,"<safe") == FALSE) ){
    //Check If There is Video On The Page Then Load Defa Protector
    // Source Tag Validation isn't need but for safety 
    //If HTML Contains Safe Tag, Then Not Load Defa Protector
        
        $output = preg_replace_callback("/((<video[^>]|<audio[^>]|source[^>])*src *= *[\"']?)([^\"']*)/i", function ($matches) {
            $crc = substr(sha1($matches['3']), -8, -1);
            $_SESSION['defaprotect'.$crc] = $matches['3'];
            return $matches[1] . "/defavid.php?crc=".$crc;
      } , $output);
    }
    return $output;
});
