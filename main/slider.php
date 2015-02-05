<div id="slider">
   <div class="topslider" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 1350px;">
      <div class="next">Next</div>
      <div class="prev">Prev</div>
      <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 4050px; left: -1350px;">
	 <?php 
		$database = Database::getInstance();
		$movies = $database->getSliderMovies();

		foreach ($movies as $movie) {
        		echo '<li style="overflow: hidden; float: left; width: 450px; height: 280px;">';
            		echo '<a href="'.$base.'/index.php/movie?movie_id='.$movie->getId().'"><img class="slide-image" src="'.$movie->getThumbnailUrl().'" title=""></a>';
 			echo '<div class="slide-caption">';
               		echo '<h3>'.$movie->getTitle().'</h3>';
               		echo $movie->getPremiereDate();				
            		echo '</div>';
         		echo '</li>';
		};
	 ?>
      </ul>
   </div>
</div>
