var units;


window.onload = function() {
  console.log("loaded");
  units = document.getElementById('units');
}



function showUnits(){
  if(units.className == "invisible"){
    turnVisible();
  }
}




//Gets height of block
function getHeight() {
		units.style.display = 'block'; // Make it visible
		var height = units.scrollHeight + 'px'; // Get it's height
		units.style.display = ''; //  Hide it again
		return height;
	};

function turnVisible(){
  units.className = "pre.visible";
  units.className = "visible";
}
