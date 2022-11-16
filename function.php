<?php
  function getRemoteFilesize($url)
{
    $file_headers = @get_headers($url, 1);
    if($size =getSize($file_headers)){
return $size;
    } elseif($file_headers[0] == "HTTP/1.1 302 Found"){
        if (isset($file_headers["Location"])) {
            $url = $file_headers["Location"][0];
            if (strpos($url, "/_as/") !== false) {
                $url = substr($url, 0, strpos($url, "/_as/"));
            }
            $file_headers = @get_headers($url, 1);
            return getSize($file_headers);
        }
    }
    return false;
}

function getSize($file_headers){

    if (!$file_headers || $file_headers[0] == "HTTP/1.1 404 Not Found" || $file_headers[0] == "HTTP/1.0 404 Not Found") {
        return false;
    } elseif ($file_headers[0] == "HTTP/1.0 200 OK" || $file_headers[0] == "HTTP/1.1 200 OK") {

        $clen=(isset($file_headers['Content-Length']))?$file_headers['Content-Length']:false;
        $size = $clen;
        if($clen) {
            switch ($clen) {
                case $clen < 1024:
                    $size = $clen . ' B';
                    break;
                case $clen < 1048576:
                    $size = round($clen / 1024, 2) . ' KB';
                    break;
                case $clen < 1073741824:
                    $size = round($clen / 1048576, 2) . ' MB';
                    break;
                case $clen < 1099511627776:
                    $size = round($clen / 1073741824, 2) . ' GB';
                    break;
            }
        }
        return $size;

    }
    return false;
}
?>