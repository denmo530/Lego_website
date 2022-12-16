

function change_color() {
	document.getElementById("header").style.backgroundColor = "red";
	document.getElementById("footer").style.backgroundColor = "red";

	
	var x = document.getElementsByClassName("column");
	var z = document.getElementsByClassName("navbar");
	
	for(var i = 0; i < x.length; i++) {
		
		x[i].style.backgroundColor = "red";
	}
	for(var i = 0; i < z.length; i++) {
		
		z[i].style.backgroundColor = "red";
	}
	
}

function font() {
	document.getElementById("container").style.color = "blue"; 
}

function size() {
	document.getElementById("container").style.fontSize = "30px"; 
}