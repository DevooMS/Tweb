<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Session Jquery</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
<divclass="container">
	<h1 class="page-header text-center">How to get PHP Session Value in jQuery</h1>
	<div class="row">
		<div class="col-xl-6 col-xl-offset-3">
			<h3 class="text-center">Set simple jquery to php Session Value ( $_SESSION['value'] )</h3>
			<form method="get" action="do_session.php">
				<input type="text" name="set_sessionVal" class="form-control" placeholder="enter simple value" required>
				<div style="margin-top:11px;">
				<button type="submit" class="live btn btn-success">Set Value</button> <a href="logout.php" type="button" class="live btn btn-danger">Remove session Value</a>
				</div>
			</form>
 
			<button type="button" id="checkSession" class="btn btn-success" style="margin-top:30px;">Check Session in jQuery</button>
		</div>
	</div>
    <div id="test"></div>

</div>
<script src="session.js"></script>
</body>
</html>