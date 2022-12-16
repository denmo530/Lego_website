<?php 
include("header.html");
include("navbar.html");
?>


<div class="setWrapper">
	<?php 
		include("ShowSets.php");
	?>
</div>
	
	
<button onclick="topFunction()" id="backtotop" title="Go to top">Back to top</button>


<script>document.getElementById("navbar").onload = sliderFunc()</script>
<script src="../addons/script.js"></script>

</body>

</html>

	