<?php
session_start();
$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];

$database = Database::getInstance();

if($database->validateUserPassword($uid,$pwd)) {
	$_SESSION['uid'] = $uid;
	$_SESSION['pwd'] = $pwd;
	
	?>
<div class="post">
			<h2>Login</h2>
			<span class="genretag clearfix"><a href="../index.php">Return</a></span></BR>
</div>
	<?php

} else {
	?>

<div class="post">
<br/>		
			<?php
			if ($uid || $pwd) {
				echo("<p>Wrong username or password. Try again.</p>");
			};
			
			?>
			<h2>Login</h2>
			<form method="post" action="<?=$_SERVER['PHP_SELF']?>"
				<p>User: <input type="text" class="field" name="uid" id="uid"></p>
				<p>Password: <input type="password" class="field" name="pwd" id="pwd"></p>
				<input type="submit" text="Log in"></input>
			</form>
</div><BR/>
	<?php

}
?>