<?php 
include("header.html");
include("navbar.html");
?>

		
		<button onclick="topFunction()" id="backtotop" title="Go to top">Ta mig upp</button>
		<div class="legoContent">
			<h3>Legos historia</h3>
			<?php include("LegosHistoria.txt");?>
			<iframe id="YT" src="https://www.youtube.com/embed/NdDU_BBJW9Y" allowfullscreen></iframe>
		
		</div>
	
	</div>

<script>document.getElementById("line").onload = sliderFunc()</script>
<script src="../addons/script.js"></script>

</body>

</html>
