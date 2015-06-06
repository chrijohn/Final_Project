<div class = "logout">
<?php
session_start();
if (isset($_SESSION['user']))
{	
	echo 'Welcome ' . $_SESSION['user'];
	echo '. Click <a href="Home.php?action=logout">here</a> to log out.';
?>
</div>
	<html>
	<head>
	<script>
	function getData() 
	{ 
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("data").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","getdata.php",true);
		xmlhttp.send();
	};
	function addData(beer, brewery, style, grade, notes, share)
	{
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("data").innerHTML = xmlhttp.responseText;
				document.getElementById("Add Beer form").reset();
			}
		}
		
		var myUrl = "adddata.php";

		function addQSParm(name, value) {
			var re = new RegExp("([?&]" + name + "=)[^&]+", "");

			function add(sep) {
				myUrl += sep + name + "=" + encodeURIComponent(value);
			}

			function change() {
				myUrl = myUrl.replace(re, "$1" + encodeURIComponent(value));
			}
			if (myUrl.indexOf("?") === -1) {
				add("?");
			} else {
				if (re.test(myUrl)) {
					change();
				} else {
					add("&");
				}
			}
		}

		addQSParm("beer", beer);
		addQSParm("brewery", brewery);
		addQSParm("style", style);
		addQSParm("grade", grade);
		addQSParm("notes", notes);
		addQSParm("share", share);
		
		xmlhttp.open("GET", myUrl, true);
		xmlhttp.send();
	};
	function getUserData() 
	{ 
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("data").innerHTML = xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","getuserdata.php",true);
		xmlhttp.send();
	};
	function share(id) 
	{ 
		console.log(id);
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("data").innerHTML = xmlhttp.responseText;
			}
		}
		
		var myUrl = "sharedata.php";

		function addQSParm(name, value) {
			var re = new RegExp("([?&]" + name + "=)[^&]+", "");

			function add(sep) {
				myUrl += sep + name + "=" + encodeURIComponent(value);
			}

			function change() {
				myUrl = myUrl.replace(re, "$1" + encodeURIComponent(value));
			}
			if (myUrl.indexOf("?") === -1) {
				add("?");
			} else {
				if (re.test(myUrl)) {
					change();
				} else {
					add("&");
				}
			}
		}

		addQSParm("id", id);
		console.log(myUrl);
		xmlhttp.open("GET", myUrl, true);
		xmlhttp.send();
	};
	function unshare(id) 
	{ 
		console.log(id);
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("data").innerHTML = xmlhttp.responseText;
			}
		}
		
		var myUrl = "unsharedata.php";

		function addQSParm(name, value) {
			var re = new RegExp("([?&]" + name + "=)[^&]+", "");

			function add(sep) {
				myUrl += sep + name + "=" + encodeURIComponent(value);
			}

			function change() {
				myUrl = myUrl.replace(re, "$1" + encodeURIComponent(value));
			}
			if (myUrl.indexOf("?") === -1) {
				add("?");
			} else {
				if (re.test(myUrl)) {
					change();
				} else {
					add("&");
				}
			}
		}

		addQSParm("id", id);
		console.log(myUrl);
		xmlhttp.open("GET", myUrl, true);
		xmlhttp.send();
	};
	function deletedata(id) 
	{ 
		console.log(id);
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else {
			xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange = function() {
			if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				document.getElementById("data").innerHTML = xmlhttp.responseText;
			}
		}
		
		var myUrl = "delete.php";

		function addQSParm(name, value) {
			var re = new RegExp("([?&]" + name + "=)[^&]+", "");

			function add(sep) {
				myUrl += sep + name + "=" + encodeURIComponent(value);
			}

			function change() {
				myUrl = myUrl.replace(re, "$1" + encodeURIComponent(value));
			}
			if (myUrl.indexOf("?") === -1) {
				add("?");
			} else {
				if (re.test(myUrl)) {
					change();
				} else {
					add("&");
				}
			}
		}

		addQSParm("id", id);
		console.log(myUrl);
		xmlhttp.open("GET", myUrl, true);
		xmlhttp.send();
	};
	</script>
	 <link rel="stylesheet" href="style.css">
	</head>
	<body>
		<h1 class="title"> Beer Review Database </h1>	
		<form method="post" onsubmit ="addData(beer.value, brewery.value, ss.value, grade.value, notes.value, share.value); return false" action = "" id="Add Beer form" class = "adddata"/>
			<h3>Add Beer Review</h3>
				<p> Enter Beer: <input type = "text" name="beer" required class = "beer"></p>
				<p> Enter Brewery: <input type= "text" name="brewery" required class = "brewery"></p>
				<p> Enter Style: <input type= "text" name="ss" required class = "style"></p>
				<p> Enter Grade: <input type = "number" name="grade" min = 0 max =100 required placeholder= " (0-100)" class ="grade"></p>
				<p> Enter Review: <p><textarea name = "notes"  rows="10" cols="39" required class = "review"></textarea></p></p>
				<p>Share Review With Other Users: <select name = "share" class = "share">
				<option value= "0"> No </option>
				<option value= "1"> Yes </option>
				</select>
				<p><input type="submit" value = "Add Review"></p>
	</form>
	
	<div class = "getresults">
	<form>
		<input type="button" onclick="getUserData()" value = "View Your Reviews" id = "getuser">
	</form>
	<form>
		<input type="button" onclick="getData()" value = "View Shared Reviews" id = "getshared">
	</form>
	</div>
	
	<br>
	<div id="data" class = "table"><b></b></div>
</body>
</html>


<?php
}
else
{
	echo "<link rel='stylesheet' href='style.css'>";
	echo "<div class = 'logout'>";
	echo 'You must be logged in to access this page.  Click <a href="Home.php">here</a> to return to login screen';
	echo "</div>";
}
?>
