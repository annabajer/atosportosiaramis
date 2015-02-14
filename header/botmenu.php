   <?php 
	$database = Database::getInstance();
	$movie_id = htmlspecialchars($_GET["movie_id"]); 
	$selected_genres = htmlspecialchars($_GET["genres"]); 
	$movie = $database->getMovieDetails($movie_id);
	session_start();
	$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
	$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];
   ?>

<div id="botmenu">
   <div id="submenu" class="menu-primary-container">
      <ul id="web2feel" class="sfmenu">
         <li id="menu-item-72" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-72"><a href="http://demo.fabthemes.com/edivos/category/finance/">Finance</a></li>
         <li id="menu-item-73" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-73"><a href="http://demo.fabthemes.com/edivos/category/religion/">Religion</a></li>
         <li id="menu-item-74" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-74"><a href="http://demo.fabthemes.com/edivos/category/sports/">Sports</a></li>
         <li id="menu-item-75" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-75">
            <a href="http://demo.fabthemes.com/edivos/category/business/">Business</a>
            <ul class="sub-menu">
               <li id="menu-item-77" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-77"><a href="http://demo.fabthemes.com/edivos/category/aciform/">Aciform</a></li>
               <li id="menu-item-78" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-78"><a href="http://demo.fabthemes.com/edivos/category/asmodeus/">Asmodeus</a></li>
            </ul>
         </li>
         <li id="menu-item-76" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-76"><a href="http://demo.fabthemes.com/edivos/category/politics/">Politics</a></li>
         <li id="menu-item-79" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-79">
            <a href="http://demo.fabthemes.com/edivos/category/entertainment/">Entertainment</a>
            <ul class="sub-menu">
               <li id="menu-item-81" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-81"><a href="http://demo.fabthemes.com/edivos/category/art/">Art</a></li>
               <li id="menu-item-80" class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-80"><a href="http://demo.fabthemes.com/edivos/category/vintage/">Vintage</a></li>
            </ul>
         </li>
         <li id="menu-item-880" class="menu-item menu-item-type-custom menu-item-object-custom menu-item-has-children menu-item-880">
            <a href="#">Genre</a>
            <ul class="sub-menu">
		<?php 
			echo '<li class="menu-item menu-item-type-taxonomy menu-item-object-genre"><a href='.$base.'>All</a></li>';
			$all_genres = $database->getAllGenres();
			foreach ($all_genres as $genre) { 
				echo '<li class="menu-item menu-item-type-taxonomy menu-item-object-genre"><a href='.$base.'?genres='.$genre[0].'>';
				echo $genre[1];
				echo '</a></li>';
			}
		?>
             </ul>
         </li>
         <li id="menu-item-883" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-883"><a href="http://demo.fabthemes.com/edivos/blog/">Blog</a></li>
      	 <li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-883">
		<?php 
			if (isset($_SESSION['uid'])) {
				$uid = $_SESSION['uid']; 
				echo 'Logged is as:<BR>'.$uid; 
			}
		?>
	 </li>
	</ul>

	<?php
	if (isset($_SESSION['uid'])) {
		echo '<a href="'.$base.'/index.php/logout"><button type="button">Log out</button></a>';
	} else {
		echo '<a href="'.$base.'/index.php/login"><button type="button">Log in</button></a>';
	}
	?>
	  
	  
      
   </div>
</div>