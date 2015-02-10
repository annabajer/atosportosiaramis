<html lang="en-US">
		
   <?php $base_with_index = pathinfo($_SERVER['PHP_SELF'])['dirname'];
	 $base = str_replace("/index.php","",pathinfo($_SERVER['PHP_SELF'])['dirname']);
	 include 'header/head.php';
	 include 'main/MovieEntity.php';
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
		case $base_with_index:
			include "main/slider.php";
			include "main/fullcontent.php";
			break;
		case $base_with_index."/movie_review":
			include "main/movie_review.php";
			break;
		case $base_with_index."/movie":
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
