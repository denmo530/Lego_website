

// When the user scrolls down 40px from the top of the document, show the button

    
window.onscroll = function () { scrollFunction() };


//After scrolling for a specific length, the "Back-to-top" button will show
function scrollFunction() {
    if (document.body.scrollTop > 40 || document.documentElement.scrollTop > 40) {
        
        document.getElementById("backtotop").style.display = "inline-block";
    } else {
        document.getElementById("backtotop").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}


//Change language to Swedish, keeping the current site alive
function changeToSwedish() {
    var URL = window.location.href;
    var newURL = URL.replace("/en/", "/sv/");
    window.location.href = newURL;
    
}
//Change language to English, keeping the current site alive
function changeToEnglish() {
    var URL = window.location.href;
    var newURL = URL.replace("/sv/", "/en/");
    window.location.href = newURL;
   
}


//Redirect to show selected set
function inspectSet(setID) {
    var swedish = "sv/Legodatabasen";
    if (window.location.href.includes(swedish)) {
        window.location.href = "../sv/LegodatabasSet.php?set=" + setID;
    }

    else {
        window.location.href = "../en/LegodatabasSet.php?set=" + setID;
    }
}

//Redirect to show sets including the selected part
function getSets(partID, ColorID) {
    var swedish = "/sv/";
    if (window.location.href.includes(swedish)) {
        window.location.href = "../sv/LegodatabasenParts.php?partID=" + partID + "&colorID=" + ColorID;
    }
    else {
        window.location.href = "../en/LegodatabasenParts.php?partID=" + partID + "&colorID=" + ColorID;
    }
}


// Show and hide search-info
function displayInfo() {

    if (document.getElementById("infoBox").style.display == "block") {

        document.getElementById("infoBox").style.display = "none";
    }
    else {
        document.getElementById("infoBox").style.display = "block";

    }
}

//Keeps track of what page is selected in the navbar. Highlights the current page
function sliderFunc() {
    var hem = "Legodatabasen.php";
    var legoSet = "LegodatabasSet.php";
    var slump = "slumpa.php";
    var nyheter = "Nyheter.php";
    var legoH = "LegoHistoria.php";
    var searchBar = "Legodatabasen.php?";

    if (window.location.href.includes(slump)) {
        document.getElementById("slumpBtn").style.color = "skyblue";
        document.getElementById("slumpBtn").style.borderBottom = "0.2vw solid skyblue";


    }

    else if (window.location.href.includes(nyheter)) {
        document.getElementById("nyBtn").style.color = "yellow";
        document.getElementById("nyBtn").style.borderBottom = "0.2vw solid yellow";



    }

    else if (window.location.href.includes(legoH)) {
        document.getElementById("legoBtn").style.color = "red";
        document.getElementById("legoBtn").style.borderBottom = "0.2vw solid red";


    }

    else if (window.location.href.includes(hem)) {
        document.getElementById("homeBtn").style.color = "white";
        document.getElementById("homeBtn").style.borderBottom = "0.2vw solid white";

    }

    if (window.location.href.includes(searchBar) && window.innerWidth >= 768) {
        document.getElementById("searchBar").style.marginTop = "2%";
      
    }
   
}
