<div class = "logout">
<?php
session_start();
if($_GET['action']== 'logout')
{
	echo $_SESSION['user'] . ' is now logged out';
	session_destroy();	
}
?>
</div>
<html>
<head>
<script language="javascript">
function LogIn(user, pass)
{
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("response").innerHTML = xmlhttp.responseText;
		}
	}
	
	var myUrl = "user=" + user + "&pass=" + pass;

	
	console.log(myUrl);
	xmlhttp.open("POST", "LogIn.php", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(myUrl);
};
function createAccount(user, pass)
{
	if (window.XMLHttpRequest) {
		xmlhttp = new XMLHttpRequest();
	} else {
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function() {
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
			document.getElementById("response").innerHTML = xmlhttp.responseText;
		}
	}
	
	var myUrl = "user=" + user + "&pass=" + pass;

	
	console.log(myUrl);
	xmlhttp.open("POST", "createAccount.php", true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send(myUrl);
};

</script>
 <meta charset="UTF-8">
 <link rel="stylesheet" href="style.css">
 <title>Beer Database</title>
</head>
<body class = "body">
	<h1 class="title"> Beer Review Database </h1>
	<div class = "Main">
	<div class = "About">
		<h2 class = "Subtitle"> About </h2>
		<p> Welcome to the Beer Review Database.  Here you will be able to write and store your beer reviews.
			Additionally, you can choose to share your reviews and read reviews other users have decided to share.
		</p>
	</div>
	</div>
	<br><br>

	<form method="post" onsubmit="createAccount(username.value, password.value); return false" action = "" id="login form" class="create" />
			<h3>Create Account</h3>
				<p> Enter Username: <input type ="text" id = "username"name="username" required placeholder="Your Username"></p>
				<p> Enter Password:  <input type = "password" id= "password" name="password" required placeholder="Your Password"></p>
				<input type="submit" name = "submit" id= "submit" value ="Create Account" onsubmit="createAccount(username.value, password.value); return false">
	</form>
	<form method="post" onsubmit="LogIn(username.value, password.value); return false" action = "" id="login form" class = "login" />
			<h3> Log In</h3>
				<p> Username:
				<input type ="text" id = "username"name="username" required placeholder="Your Username"/></p>
				<p> Password:
				<input type = "password" id= "password" name="password" required placeholder="Your Password"/></p>
				<input type="submit" name = "submit" id= "submit" value ="Log In">
	</form>
<br>
	<div id="response" class = "response"><b></b></div>
</body>
</html>