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

<?php 
	if(isset($_SESSION['uid'])) {
		echo '<h2><a href="'.$base.'/index.php/movie_review?movie_id='.$movie->getId().'" rel="bookmark"> Add review</a></h2>'; 
	}
?>

<div class="clear"></div>
<div id="main">
   <div id="content">
      <div class="post" id="post-53">
         <div class="title">
            <h2><a href="http://demo.fabthemes.com/edivos/2012/06/09/aenean-velit-risus-venenatis-sed-pellentesque-ege/" rel="bookmark" title="Permanent Link to Aenean velit risus, venenatis sed pellentesque ege">Aenean velit risus, venenatis sed pellentesque ege</a></h2>
         </div>
         <div class="postmeta">
            <span>Posted by <a href="http://demo.fabthemes.com/edivos/author/admin/" title="Posts by admin" rel="author">admin</a></span> | <span>Saturday, 6 June 2012</span> 
         </div>
         <div class="entry">
            <a href="http://demo.fabthemes.com/edivos/2012/06/09/aenean-velit-risus-venenatis-sed-pellentesque-ege/"><img class="post-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/06/p9-180x120.jpg"></a>	
            <p>Ut sit amet odio erat, ut rhoncus libero. Maecenas vestibulum dui et urna fringilla pulvinar at ornare nibh. Nam et scelerisque lorem. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Nam quis neque et elit congue luctus. Sed ultrices tellus at dui pellentesque vulputate? Phasellus molestie tincidunt convallis. Nullam turpis […]</p>
            <div class="clear"></div>
         </div>
         <div class="clear"></div>
      </div>


      <div id="navigation" class="clearfix">
      </div>
   </div>
   <div id="sidebar"></div>
   <div class="clear"></div>
</div>
