<?php include('log.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign in</title>
<style>
* {
margin: 0px;
padding: 0px;
}
body {
background: rgb(212, 212, 212);
}
.failure {
width: 95%;
margin: 0px auto;
padding: 10px;
border: 1px solid #b82826;
color: #d3413f;
background: #e4e4e4;
border-radius: 5px;
text-align: left;
}
.success {
color: #1fa822;
background: #e0e0e0;
border: 1px solid #007202;
margin-bottom: 2em;
}
.topic {
width: 35%;
margin-left: 23em;
margin-top: 7em;
color: white;
background: rgb(97, 160, 255);
text-align: center;
border: 1px solid rgb(0, 110, 255);
border-bottom: none;
border-radius:5px 5px 0px 0px;
padding: 20px;
font-size: 130%;
}
form {
width: 35%;
padding: 20px;
border: 1px solid #B0C4DE;
border-radius: 0px 0px 5px 5px;
background: white;
margin-left: 29.9em;

}
.inp {
margin-top: 15px;
margin-bottom: 15px;
}

.inp label {
text-align: left;
margin: 3px;
font-size: 120%;
color: rgb(113, 37, 255);
}
.inp input {
height: 30px;
width: 95%;
padding: 5px 10px;
font-size: 18px;
border-radius: 5px;
border: 1px solid rgb(173, 173, 173);
}
.bt {
padding-right: 30px;
padding-left: 30px;
padding-bottom: 8px;
padding-top: 8px;
font-size: 120%;
color: white;
background: rgb(97, 160, 255);
border: none;
border-radius: 5px;
}
</style>
</head>
<body>

	<div class="topic">
		<h2>Admin Login</h2>
	</div>

	<form method="post" action="login.php">

		<?php include('fail.php'); ?>

		<div class="inp">
			<label>Username</label>
			<input type="text" name="uname" >
		</div>
		<div class="inp">
			<label>Password</label>
			<input type="password" name="pword">
		</div>
		<div class="inp">
			<button type="submit" class="bt" name="signin">Sign in</button>
		</div>
		<p>
			Do not have an account(Only for admins)? <a href="regis.php">Sign up</a>
		</p>
		<p>
			Or you are visitor? <a href="view.php">View News</a>
		</p>
	</form>


</body>
</html>
