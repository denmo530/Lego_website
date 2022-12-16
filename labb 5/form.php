<?php include "header.txt";?>
	
		<div id="container">
			<div class="sidebar">
			</div>
			<div class="column">
				<h3>Formulär</h3>
				<form action="text.php" method="POST">
					<input type="text" name="author" placeholder="Namn">
					<input type="text" name="heading" placeholder="Rubrik">
					<textarea name="entry" placeholder="Inlägg"></textarea>
					<br>
					<input type="password" placeholder="Lösenord" name="password">
					<br>
					<input type="submit" value="Submit">
					<input type="Reset" value="Reset">
				</form> 
			</div>
			<div class="sidebar2">
			</div>
	
			<div class="reklam">
				<img src="reklam.jpg" alt="reklam">
			</div>
<?php include "footer.txt";?>
