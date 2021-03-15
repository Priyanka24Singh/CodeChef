var countDown = new Date("Jan 5,2020 13:00:00").getTime();
var x = setInterval(function(){




var now = new Date().getTime();
var distance = countDown - now;
//var days = Math.floor(distance/(1000*60*60*24));
var hours = Math.floor((distance % (1000*60*60*24))/(1000*60*60));
var mins = Math.floor((distance % (1000*60*60))/(1000*60));
var sec = Math.floor((distance % (1000*60))/(1000));

document.getElementById("timer").innerHTML = "Time Left: "+hours+"h"+mins+"m"+sec+"s";

if(distance<0){
	clearInterval(x);
	document.getElementById("timer").innerHTML="Time UP";
}

},1000);