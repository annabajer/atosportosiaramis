<div id="slider">
   <div class="topslider" style="visibility: visible; overflow: hidden; position: relative; z-index: 2; left: 0px; width: 1350px;">
      <div class="next">Next</div>
      <div class="prev">Prev</div>
      <ul style="margin: 0px; padding: 0px; position: relative; list-style-type: none; z-index: 1; width: 4050px; left: -1350px;">
	 <?php 
		include 'main/MovieEntity.php';
		$movies = array(new MovieEntity("Sherlock Holmes","6 June 2012","http://cdn.demo.fabthemes.com/edivos/files/2012/07/sherlock-holmes-a-game-of-shadows-9243-1024x768-450x280.jpg"),
				new MovieEntity("Skyfall","12 June 2012","http://cdn.demo.fabthemes.com/edivos/files/2012/07/skyfall-9350-1024x768-450x280.jpg"),
				new MovieEntity("MiB 3","20 June 2010","http://cdn.demo.fabthemes.com/edivos/files/2012/07/men-in-black-3-9260-1024x768-450x280.jpg"),

			);
		foreach ($movies as $movie) {
        		echo '<li style="overflow: hidden; float: left; width: 450px; height: 280px;">';
            		echo '<a href="http://demo.fabthemes.com/edivos/video/sherlock-holmes/"><img class="slide-image" src="'.$movie->getThumbnailUrl().'" title=""></a>';
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
