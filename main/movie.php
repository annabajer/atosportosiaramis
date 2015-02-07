<div class="video-single">
   <?php 
	$database = Database::getInstance();
	$movie_id = htmlspecialchars($_GET["movie_id"]); 
	$movie = $database->getMovieDetails($movie_id);
   ?>
   <div class="videoframe">
	<?php echo '<iframe width="800" height="450" src="'.$movie->getTrailerUrl().'"></iframe>'; ?>
   </div>
   <div class="clear"></div>
   <div class="title">
	<?php echo '<h2><a href="" rel="bookmark">'.$movie->getTitle().'</a></h2>'; ?>
   </div>
   <div class="postmeta">
      <?php echo '<span class="clock">'.$movie->getPremiereDate().'</span>'; ?>
   </div>
   <div class="entry">
      <?php echo '<p>'.$movie->getMovieDescription().'</p>'; ?>
      <div class="clear"></div>
   </div>
   <div class="postmeta">
	<span class="genretag clearfix">
	<?php 
		$genres = $database->getMovieGenre($movie_id);
		foreach ($genres as $genre) { 
			echo '<a href="" rel="tag">';
			echo $genre;
			echo '</a>';
		}
	?>
	</span>
   </div>
</div>
<div class="video-comments">
</div>

