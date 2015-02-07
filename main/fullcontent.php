            <div id="fullcontent">
               <div id="topbar" class="clearfix">
                  <div class="leftinfo"> Latest Videos</div>
               </div>

	       <?php 

		$database = Database::getInstance();
		$movies = $database->getFullContentMovies($selected_genres);

		foreach ($movies as $movie) {
        		echo '<div class="video-post">';
			echo '<div class="video-title">';
            		echo '<h2><a href="'.$base.'/index.php/movie?movie_id='.$movie->getId().'" rel="bookmark">'.$movie->getTitle().'</a></h2>';			
            		echo '</div>';
         		echo '<a href="'.$base.'/index.php/movie?movie_id='.$movie->getId().'"><img class="video-image" width=165 height=110 src="'.$movie->getThumbnailUrl().'"></a>';
			echo '</div>';
		};
	       ?>
		
	       <div class="clear"></div>
               <div id="navigation" class="clearfix">
                  <div class="wp-pagenavi">
                     <span class="pages">Page 1 of 2</span><span class="current">1</span><a href="http://demo.fabthemes.com/edivos/page/2/" class="page larger">2</a><a href="http://demo.fabthemes.com/edivos/page/2/" class="nextpostslink">»</a>
                  </div>
               </div>
            </div>
            <div class="clear"></div>