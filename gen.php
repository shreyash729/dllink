<?php
 require_once 'config.php';
 include 'function.php';
$size=getRemoteFilesize($_POST['url']);
function fileWriteAppend(){
    $current_data = file_get_contents('file.json');
    $array_data = json_decode($current_data, true);
    $extra = array(
       md5($_POST['url']) =>   array(
       'url'               =>     $_POST['url'],
       'suggested_name'   =>  $_POST['filename'],
       'type'             => 'remote_file',
       'size'             => $size
       ),

    );
    $array_data[] = $extra;
    $final_data = json_encode($array_data);
    return $final_data;
}
function fileCreateWrite(){
    $file=fopen("file.json","w");
    $array_data =array();
    $extra = array(
       md5($_POST['url']) =>   array(
       'url'               =>     $_POST['url'],
       'suggested_name'   =>  $_POST['filename'],
       'type'             => 'remote_file',
       'size'             => $size
       ),

    );
    $array_data[] = $extra;
    $final_data = json_encode($array_data);
    fclose($file);
    return $final_data;
}
  if(file_exists('file.json'))
{
     $final_data=fileWriteAppend();
     if(file_put_contents('file.json', $final_data))
     {
          $message = "<label class='text-success'>Data added Success fully</p>";
     }
}
else
{
     $final_data=fileCreateWrite();
     if(file_put_contents('file.json', $final_data))
     {
          $message = "<label class='text-success'>File createed and  data added Success fully</p>";
     }

}


$pr=$_POST['filecount'];
$downloadurl=BASE_URL.'generate.php?token='.$pr.'&id='.md5($_POST['url']);

?>
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Coder729 - Temprary Link Generator</title>
  <link rel="stylesheet" href="./style.css?<?php echo date('l jS \of F Y h:i:s A'); ?>"/>
  <style type="text/css">

  </style>
</head>
<body>
<main>
  <figure>
    <picture>
      <img src="https://vani.nic.in/vahanBot/images/vani-gif.gif" alt="Citymap illustration" />
    </picture>
  </figure>
  <div class="headline">
    <h2 class="text-headline"></h2>
    <h3 class="text-subheadline"></h2>
  </div>
  <form>
    <?php if ($_GET['url']=='') :?>
    <span>
      <label for="username" class="text-small-uppercase"></label>
      <input class="text-body" type="url" id="copyurl" name="url" value="<?php echo $downloadurl?>" readonly>
    </span>
    <p style="font-style: bold; color: darkseagreen; "><strong>Your Link Has Been Generated </strong><br>
    <b>you may have to pass a short varification process in order to download</b></p><br>
    <button class="btn" onclick="copyToClipboard()">Copy Generated link</button><button class="btn" onclick="window.open('<?php echo $downloadurl?>')">Download Now</button>
    <?php endif?>
    <?php if (strpos($_GET['url'], 'http')!== false) :?>
    <p style="color: darkseagreen; "><b>You Have already <u>COPIED</u> or <u>DOWLOADED</u> Through Generated File Link</b></p><br>
    <p style="color: mediumvioletred; "><b>By Copying Link You Can Download The File With Temprary Link Whenever You Want</b></p>

    <?php endif?>
    </form>
   

  

</main>
  <script  src="script.js?version=<?= time() ?>"></script>
 
</body>
</html>