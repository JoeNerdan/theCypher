<?php
//this when project folder is /var/www/projectRoot
$projectFolder = end(explode('/', getcwd()));
//this when project folder is /var/www/
// FIXME need to correct paths in menu, script and style
//$projectFolder = "/"
?>
<?php include 's.php'; ?>
<!DOCTYPE HTML>
<html>

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" href="/<? echo $projectFolder?>/css/main.css" type="text/css" media="screen" charset="utf-8">

    <title><? echo $projectFolder?> - <?=t()?></title>

  </head>
  <body>
    
    <h1><?=t()?></h1>
    <div id="menu">
      <ul id="menuList">
          <li class="menuListEntry"><a href="/<? echo $projectFolder?>">Home</a></li>
          <li class="menuListEntry"><a href="/<? echo $projectFolder?>/info">Info</a></li>
          <li class="menuListEntry"><a href="/<? echo $projectFolder?>/break">breaks</a></li>
      </ul>
      
    </div>

    <div id="main-content">
      <?=c()?>
    </div>

    <script src="/<? echo $projectFolder?>/js/main.js" type="text/javascript" charset="utf-8"></script>
  </body>
</html>
