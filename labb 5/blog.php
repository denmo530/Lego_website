<?php include "header.txt";?>
	
		<div id="container">
			<div class="sidebar">
			</div>
			<div class="column">
				<h3>Blogg Inlägg</h3>
			<?php					
					$connection1	=	mysqli_connect("mysql.itn.liu.se","blog","blog","blog");
					if (!$connection1) {
						die('MySQL connection1 error');
					}	
					
					$order = mysqli_real_escape_string($connection1,	$_GET['order']);
					$limit = mysqli_real_escape_string($connection1,	$_GET['limit']);
					$keyword = mysqli_real_escape_string($connection1,	$_GET['keyword']);
					
						
					if  ($keyword == '') {
						$keyword=NULL; 
					}
					if ($limit == 0){
						$limit = 10;
					}
					
					$result	=	mysqli_query($connection1,"SELECT*FROM denmo530 WHERE entry_heading LIKE '%$keyword%' OR entry_text LIKE '%$keyword%' ORDER	BY	entry_date	$order LIMIT $limit");		
					//	Skriv	ut	alla	poster	i	svaret																																		
					while	($row	=	mysqli_fetch_array($result))	
					{																						
						$heading	=	$row['entry_heading'];																															
						print("<h2>$heading</h2>\n");																																			
						$author	= $row['entry_author'];																																	
						$date	=	$row['entry_date'];																																					
						print("<p>$author,	$date</p	>\n");																														
						$text	=	$row['entry_text'];																																					
						print("<p>$text</p>\n");
						print("<hr/>");																																																	
					}	//	end	while
					mysqli_close($connection1);

				?>
											
				
			</div>
			<div class="sidebar2">
			</div>
	
			<div class="reklam">
				<img src="reklam.jpg" alt="reklam">
			</div>
<?php include "footer.txt";?>
