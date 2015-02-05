            <div id="fullcontent">
               <div id="topbar" class="clearfix">
                  <div class="leftinfo"> Latest Videos</div>
               </div>

	       <?php 

		$database = Database::getInstance();
		$movies = $database->getFullContentMovies();

		foreach ($movies as $movie) {
        		echo '<div class="video-post">';
			echo '<div class="video-title">';
            		echo '<h2><a href="" rel="bookmark">'.$movie->getTitle().'</a></h2>';			
            		echo '</div>';
         		echo '<a href=""><img class="video-image" width=165 height=110 src="'.$movie->getThumbnailUrl().'"></a>';
			echo '</div>';
		};
	       ?>
		
		<!-- remove those movies below. all movies should be read from database -->

               <div class="video-post" id="post-851">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/sherlock-holmes/" rel="bookmark" title="Permanent Link to Sherlock Holmes">Sherlock Holmes	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/sherlock-holmes/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/sherlock-holmes-a-game-of-shadows-9243-1024x768-165x110.jpg"></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-849">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/ghost-protocol/" rel="bookmark" title="Permanent Link to Ghost protocol">Ghost protocol	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/ghost-protocol/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/mission-impossible-ghost-protocol-9254-1024x768-165x110.jpg"></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-847">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/project-x/" rel="bookmark" title="Permanent Link to Project X">Project X	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/project-x/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/project-x-9269-1024x768-165x110.jpg"></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-845">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/american-reunion/" rel="bookmark" title="Permanent Link to American reunion">American reunion	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/american-reunion/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/american-reunion-9281-1024x768-165x110.jpg"></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-842">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/a-thousand-words/" rel="bookmark" title="Permanent Link to A thousand words">A thousand words	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/a-thousand-words/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/a-thousand-words-9293-1024x768-165x110.jpg"></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-839">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/piranah-3dd/" rel="bookmark" title="Permanent Link to Piranah 3DD">Piranah 3DD	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/piranah-3dd/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/piranha-3d-the-sequel-9355-1024x768-165x110.jpg" title="
                     "></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-836">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/hobbit/" rel="bookmark" title="Permanent Link to Hobbit">Hobbit	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/hobbit/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/the-hobbit_-an-unexpected-journey-9252-1024x768-165x110.jpg" title="
                     "></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-834">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/ice-age/" rel="bookmark" title="Permanent Link to Ice age">Ice age	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/ice-age/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/ice-age-continental-drift-9351-1024x768-165x110.jpg" title="
                     "></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-831">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/skyfall/" rel="bookmark" title="Permanent Link to Skyfall">Skyfall	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/skyfall/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/skyfall-9350-1024x768-165x110.jpg" title="
                     "></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-828">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/battleship/" rel="bookmark" title="Permanent Link to Battleship">Battleship	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/battleship/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/battleship-9264-1024x768-165x110.jpg" title="
                     "></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-825">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/mib-iii/" rel="bookmark" title="Permanent Link to MIB III">MIB III	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/mib-iii/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/men-in-black-3-9260-1024x768-165x110.jpg" title="
                     "></a>	
               </div>
               <!-- post end -->
               <div class="video-post" id="post-821">
                  <div class="video-title">
                     <h2><a href="http://demo.fabthemes.com/edivos/video/dictator/" rel="bookmark" title="Permanent Link to Dictator">Dictator	</a></h2>
                  </div>
                  <a href="http://demo.fabthemes.com/edivos/video/dictator/"><img class="video-image" src="http://cdn.demo.fabthemes.com/edivos/files/2012/07/the-dictator-9331-1024x768-165x110.jpg" title="
                     "></a>	
               </div>
               <!-- post end -->
               <div class="clear"></div>
               <div id="navigation" class="clearfix">
                  <div class="wp-pagenavi">
                     <span class="pages">Page 1 of 2</span><span class="current">1</span><a href="http://demo.fabthemes.com/edivos/page/2/" class="page larger">2</a><a href="http://demo.fabthemes.com/edivos/page/2/" class="nextpostslink">»</a>
                  </div>
               </div>
            </div>
            <div class="clear"></div>