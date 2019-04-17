var startTime = 0
var start = 0
var end = 0
var diff = 0
var timerID = 0
var chronometre = document.getElementById("chronotime");
var save = document.querySelector(".save");
save.disabled = true;
var startstop = document.getElementById('startstop');
var reset = document.getElementById('reset');
reset.disabled = true;
window.onload = chronoStart;
function chrono(){
	end = new Date()
	diff = end - start
	diff = new Date(diff)
	var msec = diff.getMilliseconds()
	var sec = diff.getSeconds()
	var min = diff.getMinutes()
	var hr = diff.getHours()-1
	if (min < 10){
		min = "0" + min
	}
	if (sec < 10){
		sec = "0" + sec
	}
	if(msec < 10){
		msec = "00" +msec
	}
	else if(msec < 100){
		msec = "0" +msec
	}
	
	chronometre.value = hr + ":" + min + ":" + sec + ":" + msec
	timerID = setTimeout("chrono()", 10)
}
function chronoStart(){
	startstop.value = "stop!"
	startstop.onclick = chronoStop
	reset.onclick = chronoReset
	start = new Date()
	chrono()
}
function chronoContinue(){
	startstop.value = "stop!"
	startstop.onclick = chronoStop
	reset.onclick = chronoReset
	if(startstop.value == 'stop!'){
		save.disabled = true;
		reset.disabled = true;
	}
	start = new Date()-diff
	start = new Date(start)
	chrono()
}
function chronoReset(){
	document.getElementById("chronotime").value = "0:00:00:000"
	start = new Date()
}
function chronoStopReset(){
	document.getElementById("chronotime").value = "0:00:00:000"
	startstop.onclick = chronoStart
}
function chronoStop(){
	startstop.value = "start!"
	startstop.onclick = chronoContinue
	reset.onclick = chronoStopReset
	if(startstop.value == 'start!'){
		save.disabled = false;
		reset.disabled = false;
	}
	clearTimeout(timerID)
}




