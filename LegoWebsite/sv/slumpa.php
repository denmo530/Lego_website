<?php 
include("header.html");
include("navbar.html"); 


$connection = mysqli_connect("mysql.itn.liu.se", "lego", "", "lego");

	if(!$connection){
			die("Connection failed: " . mysqli_connect_error());
		}


	function checkLarge($largegif, $largejpg, $jpg, $gif, $itemID){
			if($largejpg == 1){
				$img = "http://www.itn.liu.se/~stegu76/img.bricklink.com/SL/" . $itemID . ".jpg";
				return $img;
			}

			else if($largegif == 1){
				$img = "http://www.itn.liu.se/~stegu76/img.bricklink.com/SL/" . $itemID . ".gif";
				return $img;
			}

			else if($gif == 1){
			$img = "http://www.itn.liu.se/~stegu76/img.bricklink.com/S/" . $itemID . ".gif";
			return $img;
			}

			else if($jpg == 1){

				$img = "http://www.itn.liu.se/~stegu76/img.bricklink.com/S/" . $itemID . ".jpg";
				return $img;
			}
	}

	$numSets = mysqli_query($connection, "SELECT COUNT(*) FROM sets");
	$fetch = mysqli_fetch_row($numSets)[0];
	$rNumber = rand(1, $fetch);
	$randomSet = mysqli_query($connection, "SELECT sets.SetID, sets.Setname, images.has_largegif, images.has_largejpg, images.has_gif, images.has_jpg 
	FROM sets, images 
	WHERE images.ItemID = sets.SetID LIMIT $rNumber, 1");
	
	print("<div class='setWrapperRand'>");
	?>

	<div class="randBtn-div">
		<button class="randBtn" onclick='window.location.reload();'>SLUMPA</button>
	</div>

	<?php
		while	($row = mysqli_fetch_array($randomSet))	{
			$set_name = $row['Setname'];
			$set_id = $row['SetID'];
			print("<div class='randSet' id='$set_id' onclick=inspectSet(this.id)><h4 class='h4-set'>$set_name</h4><p>$set_id</p>");

			$fileName = checkLarge($row['has_largegif'], $row['has_largejpg'], $row['has_jpg'], $row['has_gif'], $row['SetID']);

			print("<img src=\"$fileName\" alt=\"$set_id\" class='setIMG'/></div>");
				
		}

		print("</div>");

	?>

		
	<button onclick="topFunction()" id="backtotop" title="Go to top">Ta mig upp</button>
	
</div>

<script>document.getElementById("line").onload = sliderFunc()</script>
<script src="../addons/script.js"></script>

</body>

</html>
