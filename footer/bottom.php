<div id="bottom">
   <ul>
      <li class="botwid">
         <h3 class="bothead">Orgins</h3>
         <ul>
            <li><a href="http://demo.fabthemes.com/edivos/2012/06/">Oryginal Template</a></li>
         </ul>
      </li>
      <li class="botwid">
         <h3 class="bothead">Management</h3>
         <ul>
      <?php
         if (isset($_SESSION['uid'])) {
         	echo '<li><a href="'.$base.'/index.php/logout">Log out</a></li>';
         } else {
         	echo '<li><a href="'.$base.'/index.php/login">Log in</a></li>';
         }
         ?>
		<li><a href='<?php echo $base?>/index.php/account'>Account</a></li>
         </ul>
      </li>
   </ul>
   <div class="clear"> </div>
</div>
