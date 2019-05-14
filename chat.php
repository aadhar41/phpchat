<?php 
	include 'db.php';
	$query = "SELECT * FROM chat ORDER BY id DESC";
	$run = $con->query($query);
	while ($row = $run->fetch_array()) {
?>
<div id="chat_data">
	<span id="chat_name"><?php echo ucfirst($row['name']); ?> : </span>
	<span id="chat_text"><?php echo $row['msg']; ?></span>
	<span id="chat_time"><?php echo formatDate($row['date']); ?></span>
</div>
<?php
	}
?>