<?php 
include("header.html");
include("navbar.html");
?>

		<div id="searchBar">
		<form>
			<input type="text" class="searchArea" placeholder="Sök efter ett Legoset..." name="sB">
			 <button type="button" class="infoButton" id="infoBtn" onclick="displayInfo()">
                    <i id="info" class="fa fa-info-circle"></i>
             </button>
             <button type="submit" class="searchButton" onclick="changePos()">
					<i id="searchIcon" class="fa fa-search"></i>
			 </button>
			 </form>
		</div>
		<div id="infoBox">
		<p class="infoText">Här kan du söka efter alla olika sorts Lego-sets. Du söker genom att antingen skriva in ett set-ID (T.ex. "375-2") eller skriva in del av ett namn(T.ex. "Harry Potter").</p>
	
	</div>
		<script>document.getElementById("searchBar").onload = sliderFunc()</script>
		<div class="setWrapper">
		<?php 

		include("php_sok.php");
	?>

	</div>
	<button onclick="topFunction()" id="backtotop" title="Go to top">Ta mig upp</button>


<script>document.getElementById("navbar").onload = sliderFunc()</script>
<script src="../addons/script.js"></script>

</body>

</html>

	