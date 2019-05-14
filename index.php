<?php include('db.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>PHP CHat System</title>
	<link rel="stylesheet" href="style.css">
	<script>
		function ajax() {
			var req = new XMLHttpRequest();
			req.onreadystatechange = function() {
				if (req.readyState == 4 && req.status == 200) {
					document.getElementById('chat').innerHTML = req.responseText;
				}
			}

			req.open('GET', 'chat.php', true);
			req.send();
		}
		setInterval(function(){ajax();},1000)
	</script>
</head>
<body onload="ajax();">
	<div id="container">
		<div id="chat_box">
			<div id="chat"></div>
		</div>
		<form action="index.php" method="post" accept-charset="utf-8">
			<input type="text" name="name" value="" placeholder="Enter Name">
			<textarea name="msg" placeholder="enter message"></textarea>
			<input type="submit" name="submit" value="Send">
		</form>
		<?php
			if (isset($_POST['submit'])) {
				$name = $_POST['name'];
				$msg = $_POST['msg'];

				$query = "INSERT INTO chat (name,msg) values ('$name','$msg')";
				$run = $con->query($query);
				if ($run) {
					echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true' /> ";
				}
			}
		?>
	</div>
</body>
</html>