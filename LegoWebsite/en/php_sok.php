
<?php
		$connection = mysqli_connect("mysql.itn.liu.se", "lego", "", "lego");

		if(!$connection){
				die("Connection failed: " . mysqli_connect_error());
		}

		$searchText = $_GET['sB'];
		$searchText = LTRIM(RTRIM($searchText));
		
		

		function noResults(){
			print("<p class='noResults'>Sorry, no results were found, please try again!</p>");
		}
	
			
		if($searchText == ""){
			
		}

		else if(preg_match('~[0-9]~', $searchText)){
				
			$setName = mysqli_query($connection, "SELECT sets.SetID, sets.Setname, images.has_largejpg, images.has_largegif, images.has_jpg, images.has_gif FROM sets, images WHERE 
			sets.SetID LIKE '%$searchText%' AND images.ItemtypeID='S' AND images.ItemID=sets.SetID 
			ORDER BY CASE
			WHEN sets.SetID LIKE '$searchText%' THEN 1
			WHEN sets.SetID LIKE '%$searchText' THEN 2
			ELSE 3
			END");
		}

		else{
			
			$setName = mysqli_query($connection, "SELECT sets.SetID, sets.Setname, images.has_largejpg, images.has_largegif, images.has_jpg, images.has_gif FROM sets, images WHERE 
			sets.Setname LIKE '%$searchText%' AND images.ItemtypeID='S' AND images.ItemID=sets.SetID 
			ORDER BY CASE
			WHEN sets.Setname LIKE '$searchText' THEN 0
			WHEN sets.Setname LIKE '$searchText%' THEN 1
			WHEN sets.Setname LIKE '%$searchText%' THEN 2
			WHEN sets.Setname LIKE '%$searchText' THEN 3
			ELSE 4
			END");


			//If no sets were found, cut the string and search for first half of the string
			if($setName->num_rows === 0){
				$substr = substr($searchText, 0, (strlen($searchText)/2));
				$setName = mysqli_query($connection, "SELECT sets.SetID, sets.Setname, images.has_largejpg, images.has_largegif, images.has_jpg, images.has_gif FROM sets, images WHERE 
				sets.Setname LIKE '%$substr%' AND images.ItemtypeID='S' AND images.ItemID=sets.SetID 
				ORDER BY CASE
				WHEN sets.Setname LIKE '$substr' THEN 0
				WHEN sets.Setname LIKE '$substr%' THEN 1
				WHEN sets.Setname LIKE '%$substr%' THEN 2
				WHEN sets.Setname LIKE '%$substr' THEN 3
				ELSE 4
				END");

				$subSearch = 1;

				if($setName->num_rows === 0){
					$subSearch = 0;
					noResults();
				}
			}

			if($subSearch == 1){
				print("<p class='subSearch'>No results on '$searchText', were found, but here are similar sets that might interest you!</p>");
			}
		}

		#Print table
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

			print("<img src=\"$URL\" alt=\"$set_id\" class='setIMG'/></div>\n");
		}

?>