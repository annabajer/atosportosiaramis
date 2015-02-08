<?php
$rec_title = $_POST['rec_title'];
$rec_stars = $_POST['rec_stars'];
$rec_text = $_POST['rec_text'];

if (isset($rec_title) && isset($rec_stars) && isset($rec_text)) {
	$database = Database::getInstance();
	$database->addReview($movie->getId(),1, $rec_stars, $rec_title, $rec_text, date("Y-m-d"));
	?>
	<p>Your review has been submitted.</p>
	<p><a href="../index.php">Return</a></p>
	<?php
} else {
	?>
	<h2>Your review</h2>
	  <p>Fill out the form below.</p>
	  <form action="" method="post">
	  <label>Title: <br />
	  <input name="rec_title" type="text" value="" /><br /></label>
	  <label>Stars: <br />
	  <input name="rec_stars" type="text" value="" /><br /></label>
	  <label>Text: <br />
	  <input name="rec_text" type="text" value="" /><br /></label>
	  <input name="" type="reset" value="Reset Form" /><input name="submitted" type="submit" value="Submit" />
	  </form>
	<?php
}  
?>