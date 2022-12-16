	
				<?php	
					
					//	Koppla	upp	mot	databasen																																							
					$connection	=	mysqli_connect("mysql.itn.liu.se","blog_edit","bloggotyp","blog");
					if (!$connection) {
						die('MySQL connection error');
					}				
					$author	=	mysqli_real_escape_string($connection,	$_POST["author"]);									
					$heading	=	mysqli_real_escape_string($connection,	$_POST["heading"]);							
					$entry	=	mysqli_real_escape_string($connection,	$_POST["entry"]);	
					$password	=	mysqli_real_escape_string($connection,	$_POST["password"]);
					
					if	($_POST["password"]	!=	"1")	{																		
						print("<script>alert(\"Felaktigt	lösenord!	Försök	igen.\")</script>");			
						
						}																																																					
						else{		
								
							$query	=	"INSERT	INTO denmo530 VALUES(NULL,	'$author',	'$heading',	'$entry')";		
								//	Nu	har	vi	en	fråga	i	$query	som	vi	kan	skicka	till	MySQL!															
							mysqli_query($connection,	$query);	
						//	Ställ	frågan		
						}
					mysqli_close($connection);
					header('Location: blog.php');
				?>
				
			<!--	$password = $_POST["password"];			
					if	($_POST["password"]	!=	"1")	
					{																		
						print("<script>alert(\"Felaktigt	lösenord!	Försök	igen.\")</script>");			
					}	--> 