<?php
include 'MovieEntity.php';
session_start();
$uid = isset($_POST['uid']) ? $_POST['uid'] : $_SESSION['uid'];
$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : $_SESSION['pwd'];

$database = Database::getInstance();

if($database->validateUserPassword($uid,$pwd)) {
	$_SESSION['uid'] = $uid;
	$_SESSION['pwd'] = $pwd;
	
	?>
	<html>
		<head>
		</head>
		<body>
			<p>Login successful</p>
			<p><a href="../index.php">Return</a></p>
		</body>
	</html>
	<?php
	exit;

} else {
	?>
	<html>
		<head>
		</head>
		<body>
			<form method="post" action="<?=$_SERVER['PHP_SELF']?>">
				<p>User: <input type="text" class="field" name="uid" id="uid"></p>
				<p>Password: <input type="password" class="field" name="pwd" id="pwd"></p>
				<input type="submit" text="Log in"></input>
			</form>
		</body>
	</html>
	<?php
	exit;
}
?>