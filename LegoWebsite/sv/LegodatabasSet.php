<?php

	include("header.html");
    include("navbar.html");
		$connection = mysqli_connect("mysql.itn.liu.se", "lego", "", "lego");

		if(!$connection){
				die("Connection failed: " . mysqli_connect_error());
		}

		$selectedSet = $_GET['set'];

		trim($selectedSet, " ");
		$currentSet = $selectedSet;
			

		$setName = mysqli_query($connection, "SELECT sets.Setname FROM sets WHERE sets.SetID='$currentSet'");
		$nameArray = mysqli_fetch_array($setName);
		$sN = $nameArray['Setname'];
		print("<h3 id='h3Rubrik'>$sN</h3>");
		print("<h4 id='h4Rubrik'>SET: $currentSet</h4>");
			
		function checkFormat($gif, $jpg){
			if($jpg == 1){
				return ".jpg";
			}

			else if($gif == 1){
				return ".gif";
			}

			else{
				return "noimage.png";
			}
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
			
		$setID	= mysqli_query($connection, "SELECT inventory.SetID, inventory.ColorID, inventory.Quantity, inventory.ItemID, inventory.ItemTypeID, colors.Colorname, images.has_gif,
		images.has_jpg, parts.Partname, parts.PartID 
		FROM inventory, colors, images, parts
		WHERE 
		inventory.SetID='$currentSet' AND colors.ColorID=inventory.ColorID AND images.ItemID=inventory.ItemID AND images.ColorID=inventory.ColorID
		AND images.ItemtypeID=inventory.ItemtypeID AND parts.PartID=inventory.ItemID");
		$minifigs = 0;


		if($setID->num_rows === 0){
		$setID	= mysqli_query($connection, "SELECT minifigs.MinifigID, minifigs.Minifigname, inventory.ItemID, images.has_gif, images.has_jpg
		FROM minifigs, inventory, images
		WHERE inventory.SetID = '$currentSet' AND inventory.ItemID = minifigs.MinifigID AND images.ItemID = inventory.ItemID");
		$minifigs = 1;
		}

		if($setID->num_rows === 0){
		$minifigs = 2;

		$setID	= mysqli_query($connection, "SELECT sets.SetID, sets.Setname, images.has_largegif, images.has_largejpg, images.has_jpg, images.has_gif 
		FROM inventory, images, sets 
		WHERE inventory.SetID = '$currentSet' AND inventory.ItemID = sets.SetID AND images.ItemID = inventory.SetID");
		$setsFound = 1;
		}

		if($setID->num_rows === 0){
		$setsFound = 0;
		}

		#Prints out parts
		if( $minifigs == 0){
		print("<div class='table-container'><table id='table-set'><tr><th>Kvantitet</th><th>Bild</th><th>Färg</th><th>Delnamn</th></tr>");
		while	($row = mysqli_fetch_array($setID))	{
				$quantity = $row['Quantity'];
				$partID = $row['PartID'];
				$colorID = $row['ColorID'];
				print("<tr class='partClick' onclick='getSets(\"$partID\", \"$colorID\")'><td>$quantity</td>");	
				$fileName = $row['ItemTypeID'] . "/" . $row['ColorID'] . "/" . $row['ItemID'] . checkFormat($row['has_gif'], $row['has_jpg']);
				$picture = "http://www.itn.liu.se/~stegu76/img.bricklink.com/" . $row['ItemTypeID'] . "/" .  $row['ColorID'] . "/" . $row['ItemID'] . checkFormat($row['has_gif'], $row['has_jpg']);
				if(checkFormat($row['has_gif'], $row['has_jpg']) == "noimage.png"){
					$picture = "../images/noimage.png";
				}
				print("<td><img src='$picture' alt='$fileName'/></td>");
				$color	= $row['Colorname'];
				print("<td>$color</td>");	
				$partName = $row['Partname'];
				print("<td>$partName</td></tr>");
		}
			print("</table>");
		}

		#Prints out minifigs
		else if ($minifigs == 1){
		print("<div class='table-container'><table id='table-set'><tr><th>Bild</th><th>Delnamn</th></tr>");

		while	($row = mysqli_fetch_array($setID))	{	
				$fileName = $row['ItemID'] . checkFormat($row['has_gif'], $row['has_jpg']);
				$picture = "http://www.itn.liu.se/~stegu76/img.bricklink.com/M/" . $row['ItemID'] . checkFormat($row['has_gif'], $row['has_jpg']);
				print("<td><img src='$picture' alt='$fileName'/></td>");
				$partName = $row['Minifigname'];
				print("<td>$partName</td></tr>");
		}

		print("</table>");

		}

		#Prints sets
		else if($setsFound == 1){
		print("<div class='setWrapper'>");
		
		
		while	($row = mysqli_fetch_array($setID))	{	
				$class = "sets";
				$set_id = $row['SetID'];
				$set_name = $row['Setname'];

				print("<div class='$class' id='$set_id' onclick=inspectSet(this.id)><h4 class='h4-set'>$set_name</h4>");
				
				$fileName = checkLarge($row['has_largegif'], $row['has_largejpg'], $row['has_jpg'], $row['has_gif'], $row['SetID']);
			
				print("<p class='p-set'>$set_id</p>");
				
				print("<img src=\"$fileName\" alt=\"$set_id\" class='setIMG'/></div>");
		}

			print("</div>");
		}

		else{
		
		print("<p class='noResultPart'>Den här satsen har tyvärr inga registrerade bilder...</p>");

	}
			
		print("</div>");		
?>

</div>
<button onclick="topFunction()" id="backtotop" title="Go to top">Ta mig upp</button>
<script>document.getElementById("line").onload = sliderFunc()</script>
<script src="../addons/script.js"></script>

</body>

</html>
