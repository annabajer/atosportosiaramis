<html lang="en-US">
		
   <?php include 'head.php';
	 include 'main/MovieEntity.php';
	$base = pathinfo($_SERVER['PHP_SELF'])['dirname'];
   ?>
   <body class="home blog">
      <div id="wrapper">
         <div id="header">
            <?php include 'header/botmenu.php' ?>
            <?php include 'header/top.php' ?>
         </div>
         <div id="main">
		<?php
		$uri = $_SERVER["REQUEST_URI"];
		$uri_no_param = explode('?', $uri)[0];
		switch ($uri_no_param) {
   		case $base:
    		    include "main/slider.php";
		    include "main/fullcontent.php";
      		    break;
   		case $base."/movie":
    		    include "main/movie.php";
      		    break;	
    		default:
    		    include "main/slider.php";
		    include "main/fullcontent.php";
                    break;
		}
		?>
         </div>
	 <?php include 'footer/bottom.php' ?>
	 <?php include 'footer/footer.php' ?>
      </div>
      <script type="text/javascript" src="js/carousel.js?ver=20120206"></script>  
   </body>
</html>
