 <?php
 
  $files=@json_decode(file_get_contents('file.json'),TRUE);
  $token=count($files);
  $key=$token;
  
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
  <form method="post" action="gen.php">
    <span>
      <label for="username" class="text-small-uppercase">Direct url</label>
      <input class="text-body" id="username" name="url" type="url" required>
    </span>
    <span>
      <label for="email" class="text-small-uppercase">file name with extension</label>
      <input class="text-body" id="email" name="filename" type="text" required>
    </span>
    <div class="hidden">
    <span>
      <label for="city" class="text-small-uppercase">Total Files</label>
      <input type="text" name="filecount" class="form-control" value="<?php echo $key?>" readonly />
    </span>
  </div>
   
    <input class="text-small-uppercase" id="submit" type="submit" name="submit" value="GET LINK">

  </form>
</main>
  <script  src="script.js?version=<?= time() ?>"></script>
 
</body>
</html>
