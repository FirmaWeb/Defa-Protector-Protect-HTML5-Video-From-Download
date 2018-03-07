<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
ob_start();
$crc = filter_var($_GET['crc']);
$file = $_SESSION['defaprotect' . $crc];
if ($headerurl = @get_headers($file, 1)['Location']) {
    if (!empty($headerurl)) {
        $file = $headerurl;
    }

}
if (isset($_SERVER['HTTP_RANGE'])) {
    $opts['http']['header'] = "Range: " . $_SERVER['HTTP_RANGE'];
    $opts['http']['method'] = "GET";
    $cong = stream_context_create($opts);
    ob_end_clean();
    readfile($file, false, $cong);
    exit();
}
