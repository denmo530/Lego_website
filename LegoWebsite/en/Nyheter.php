<?php 
include("header.html");
include("navbar.html");
?>


<div class="dropdown">
		<button class="dropbtn">Sort</button>
		<div class="dropdown-content">
			<a href="Nyheter.php?order=DESC">Newest 12</a>
			<a href="Nyheter.php?order=ASC">Oldest 12</a>
		</div>
	</div>
<div class="setWrapper">
	

<?php
		$connection = mysqli_connect("mysql.itn.liu.se", "lego", "", "lego");

		if(!$connection){
			die("Connection failed: " . mysqli_connect_error());
		}

		$order = $_GET['order'];
			if($order === "ASC"){
			print("<h3 id='ASC'>Now showing the 12 oldest sets</h3>");
		}

		else{
			print("<h3 id='ASC'>Now showing the 12 newest sets</h3>");
			$order = "DESC";
		}
		
		$latestSets = mysqli_query($connection, "SELECT sets.SetID, sets.Setname, sets.Year, images.has_largegif, images.has_largejpg, images.has_jpg, images.has_gif  FROM sets, images WHERE sets.Year AND images.ItemtypeID='S' AND images.ItemID=sets.SetID ORDER BY sets.Year $order LIMIT 12");

	

		while($row = mysqli_fetch_array($latestSets))	{
	
			$set_id = $row['SetID'];
			$set_name = $row['Setname'];
			$set_year = $row['Year'];
			
			
			print("<div class='sets' id='$set_id' onclick=inspectSet(this.id)><h4 class='h4-set'>$set_name</h4>");
			print("<p class='p-set'>$set_id</p>");
			$link = "http://weber.itn.liu.se/~stegu/img.bricklink.com/";


			//Checks format of image
			if($row['has_largegif']){
				$URL = $link . "SL/" . $set_id . ".gif";	
			}
			else if($row['has_largejpg']){
				$URL = $link . "SL/" . $set_id . ".jpg";
			}
			
			else if($row['has_gif']){
				$URL = $link . "S/" . $set_id . ".gif";
			}
			
			else if($row['has_jpg']){
				$URL = $link . "S/" . $set_id . ".jpg";
			}
			
			else{
			$URL = "../image/noimage.png";
			}
		
			print("<img src=\"$URL\" alt=\"$set_id\" class='setIMG'/></div>");
			}
?>
		</div>
		<button onclick="topFunction()" id="backtotop" title="Go to top">Back to top</button>
	
	</div>
	