<?php
session_start();
unset($_SESSION['uid']);
unset($_SESSION['pwd']);
?>
<html>
	<head>
	</head>
	<body>
		<p>Logged out successfully</p>
		<p><a href="../index.php">Return</a></p>
	</body>
</html>
