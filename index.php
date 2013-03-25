<?php
$projectFolder = "/"
?>

<?php include 's.php'; ?>
<!DOCTYPE HTML>
<html>

  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8">

<!-- jquery -->
<script type="text/javascript">
document.write("\<script src='//ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js' type='text/javascript'>\<\/script>");
</script>
<!-- /jquery -->

<?php
/*if form in page, include form validation and styling*/
if(uri() === "events") {
?>
    <!-- stylesheet for uniform.js, the form styling lib -->
    <link rel="stylesheet" href="/css/uniform.agent.min.css" media="screen" />
<!-- validation stuff -->
    <link rel="stylesheet" href="/css/validationEngine.jquery.css" media="screen" />
    <script src="/js/jquery.validationEngine.js" type="text/javascript" charset="utf-8"></script>
   <script src="/js/jquery.validationEngine-de.js" type="text/javascript" charset="utf-8"></script>
 <!--   
   -->
<?php
};
/* if form in page, include form validation and styling*/
?>




    <link rel="stylesheet" href="<? echo $projectFolder?>css/main.css" type="text/css" media="screen" charset="utf-8">

    <title>The Cypher - <?=t()?></title>

  </head>
  <body>

    <h1><?=t()?></h1>
    <h1><?=uri()?></h1>
    <h1><?=f()?></h1>
    <h1><?=p()?></h1>
    <div id="menu">
      <ul id="menuList">
          <li class="menuListEntry"><a href="<? echo $projectFolder?>">Home</a></li>
          <li class="menuListEntry"><a href="<? echo $projectFolder?>info">Info</a></li>
          <li class="menuListEntry"><a href="<? echo $projectFolder?>events">Events</a></li>
          <li class="stretch"></li>
      </ul>

    </div>

    <div id="main-content">
      <?=c()?>
    </div>

<!-- Warning: JAVASCRIPT AHEAD -->
    <script src="<? echo $projectFolder?>js/main.js" type="text/javascript" charset="utf-8"></script>

  </body>
</html>
