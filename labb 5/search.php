<?php include "header.txt";?>
	
		<div id="container">
			<div class="sidebar">
			</div>
			<div class="column">
				<h3>Blogg Inlägg</h3>
				<table>
				<?php
					$sql=$db->prepare('SELECT * FROM denmo530');
					$sql->execute(array(':entry'=>$_REQUEST[searchcategory]));

					while ($row=$sql->fetch())
					{
					   //Here is where you will loop through all the results for your search. If 
					   //you had for example for each product name, price, and category, 
					   //you might do the following
					    $heading	=	$row['entry_heading'];																															
						print("<h2>$heading</h2>\n");																																			
						$author	= $row['entry_author'];																																	
						$date	=	$row['entry_date'];																																					
						print("<p>$author,	$date</p	>\n");																														
						$text	=	$row['entry_text'];																																					
						print("<p>$text</p>\n");
						print("<hr/>");
					}
					?>
				</table>
				</div>
			<div class="sidebar2">
			</div>
	
			<div class="reklam">
				<img src="reklam.jpg" alt="reklam">
			</div>
<?php include "footer.txt";?>
