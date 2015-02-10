<div class="video-single">
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
<div class="clear"></div>

<div id="main">
   <div id="content">
      <?php 
	$reviews = $database->getMovieReviews($movie_id); 
	foreach ($reviews as $review) {
		echo '<div class="post">';
		echo '	<div class="title"><h2><a href="" rel="bookmark">'.$review[4].'</a></h2></div>';
		echo '	<div class="postmeta"><span>Posted by <a href="" rel="author">'.$review[3].'</a></span> | <span>'.$review[6].'</span></div>';
		echo '	<a href=""><img class="post-image" width="130px" src="http://at-cdn-s01.audiotool.com/2013/05/11/users/guess_audiotool/avatar256x256-709d163bfa4a4ebdb25160d094551c33.jpg"></a>';	
		echo '	<p>'.$review[5].'</p>';
		echo '  <div id="sidebar">';
		echo '<div class="movie_choice">';
		echo '    <div id="r1" class="rate_widget">';
		echo '        <div class="star_1 ratings_stars"></div>';
		echo '        <div class="star_2 ratings_stars"></div>';
		echo '        <div class="star_3 ratings_stars"></div>';
		echo '        <div class="star_4 ratings_stars"></div>';
		echo '        <div class="star_5 ratings_stars"></div>';
		echo '        <div class="total_votes">vote data</div>';
		echo '    </div>';
		echo '</div>';
		echo '  </div>';	
		echo '</div>';
		
	}
      ?>

   </div>
   <div class="clear"></div>
</div>
