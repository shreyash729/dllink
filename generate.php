<?php
// Include the configuration file
require_once 'config.php';
    
// Grab the password from the query string
$files=@json_decode(file_get_contents('file.json'),TRUE);
$id=$_GET['id'];
$parent_key=$_GET['token'];


            $fid = base64_encode($id);
            
            // Generate new unique key
            $key = uniqid(time().'-key',TRUE);
            
            // Generate download link
            $download_link = DOWNLOAD_PATH."?pr=".$parent_key."&fid=".$fid."&key=".$key; 
            
            
            // Create a protected directory to store keys
            if(!is_dir(TOKEN_DIR)) {
                mkdir(TOKEN_DIR);
                $file = fopen(TOKEN_DIR.'/.htaccess','w');
                fwrite($file,"Order allow,deny\nDeny from all");
                fclose($file);
            }
            
            // Write the key to the keys list
            $keyspath = fopen(TOKEN_DIR.'/keys','a');
            fwrite($keyspath, "{$key}\n");
            fclose($keyspath);
        
    
?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Coder729 - Download page</title>
  <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css'><link rel="stylesheet" href="download.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">
<div class="batas-downx">
<div class="dalam-downx">
<div class="bungkus-info">
<div class="file-info">
<?php echo $files[$parent_key][$id]['suggested_name'];?>
</div>
<button onclick="generate()" id="btnx"><i class="fa fa-cloud-download" aria-hidden="true"></i> download</button>
<a id="downloadx" href="<?php echo $download_link?>" style="display:none"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download Again</a>
</div>
<div class="file-deskripsi">
<span class="uploader"><i class="fa fa-user-circle" aria-hidden="true"></i>Coder729</span> <span class="file-size"> <i class="fa fa-file" aria-hidden="true"></i>
 File Size :</span>
</div>
</div>
<div class="catatan-downx">
<p style="font-family: sans-serif;color: blueviolet;">This download link is only valid for 8 hours<br> Refresh this page to generate new link</p>
</div>
</div>
</div>
<!-- partial -->
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js'></script><script  src="download.js"></script>

</body>
</html>

    
   
