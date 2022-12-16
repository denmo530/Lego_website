			<?php	
					
				 $connection = mysqli_connect("mysql.itn.liu.se","lego","","lego");
				if (!$connection) {
					die('MySQL connection error');
				}
				
				$contents = mysqli_query($connection, "SELECT inventory.Quantity, inventory.ItemTypeID, inventory.ItemID, inventory.ColorID, Colorname, parts.Partname 
				FROM inventory, parts, colors 
				WHERE inventory.SetID='375-2' AND inventory.ItemTypeID='P' AND inventory.ItemID=parts.PartID AND inventory.ColorID=colors.ColorID");
				
				
				
				while($row = mysqli_fetch_array($contents)) {
								
						print("<tr>");
					   $Quantity = $row['Quantity'];
					   print("<td>$Quantity</td>");
					   $url = "http://www.itn.liu.se/~stegu76/img.bricklink.com/";
					   $ItemID = $row['ItemID'];
					   $ColorID = $row['ColorID'];
					   $imagesearch = mysqli_query($connection, "SELECT * FROM images WHERE ItemTypeID='P' AND ItemID='$ItemID' AND ColorID=$ColorID");
					   $imageinfo = mysqli_fetch_array($imagesearch);
					   if($imageinfo['has_jpg']) { 
						 $filename = "P/$ColorID/$ItemID.jpg";
					   } else if($imageinfo['has_gif']) { 
						 $filename = "P/$ColorID/$ItemID.gif";
					   } else { 
						 $filename = "noimage_small.png";
					   }
					   print("<td>$filename</td>");
					   print("<td><img src=\"$url$filename\" alt=\"Part $ItemID\"/></td>");
					   $Colorname = $row['Colorname'];
					   $Partname = $row['Partname'];
					   print("<td>$Colorname</td>");
					   print("<td>$Partname</td>");
					   print("</tr>\n");
					}	
			mysqli_close($connection);
			?>