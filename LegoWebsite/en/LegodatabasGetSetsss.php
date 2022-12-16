
<?php
		$connection = mysqli_connect("mysql.itn.liu.se", "lego", "", "lego");

		if(!$connection){
				die("Connection failed: " . mysqli_connect_error());
		}

		$currentPart = $_GET['partName'];
		
		$setName = mysqli_query($connection, "SELECT sets.Setname sets.SetID FROM sets, parts, inventory WHERE sets.SetID = inventory.ItemID AND inventory.ItemID = parts.PartID AND parts.Partname = $currentPart")  
		
		
			
		while($row = mysqli_fetch_array($setName))	{
			
			
			$class = "sets";
			
			$set_id = $row['SetID'];
			$set_name = $row['Setname'];
			
			
			print("<div class='$class' id='$set_id' onclick=inspectSet(this.id)><h4 class='h4-set'>$set_name</h4>");
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
			$URL = "../images/noimage.png";
			
			}
			
			
			
			print("<img src=\"$URL\" alt=\"$set_id\" class='setIMG'/></div>");



			
		}

?>