<html>
<body>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script type="text/javascript" src=../js/login.js></script>  
	<form action="login.php" method="post"> 			 	                    			
    	<input type="text" id="email" placeholder="Email"/>	<br>												 
		<input type="password" id="password" placeholder="Password"/><br>						                         
		 <input type="button" value="Log In" id= "login"> 	
		    			
    </form>
	   
	<p id ="response"></p> 
	<?php include("check.php")?>
</body>
</html>
