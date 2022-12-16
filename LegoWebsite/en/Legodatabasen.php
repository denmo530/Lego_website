<?php 
include("header.html");
include("navbar.html");
?>

<div id="searchBar">
	<form>
		<input type="text" class="searchArea" placeholder="Search for a Lego-set..." name="sB">
		<button type="button" class="infoButton" id="infoBtn" onclick="displayInfo()">
			<i id="info" class="fa fa-info-circle"></i>
        </button>
        <button type="submit" class="searchButton" onclick="changePos()">
			<i id="searchIcon" class="fa fa-search"></i>
		</button>
	</form>
</div>

<div id="infoBox">
	<p class="infoText">Here you can search for any type of Lego-set. To search, enter a SetID(Eg. "375-2") or enter a part of a name(Eg. "Harry Potter").</p>
	
</div>
<script>document.getElementById("searchBar").onload = sliderFunc()</script>
<div class="setWrapper">
	<?php 
		include("php_sok.php");
	?>

	
</div>
</div>
	
<button onclick="topFunction()" id="backtotop" title="Go to top">Back to top</button>

	