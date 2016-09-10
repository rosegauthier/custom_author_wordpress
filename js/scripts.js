$(function(){

	//hamburger menu
	$(function(){
		$('.hamburger').on('click', function(){
			$('.menu').slideToggle();
		});
	});

	//countdown clock
	function getTimeRemaining(endtime){
	  var t = Date.parse(endtime) - Date.parse(new Date());
	  window.endtime = endtime;
	  var seconds = Math.floor( (t/1000) % 60 );
	  var minutes = Math.floor( (t/1000/60) % 60 );
	  var hours = Math.floor( (t/(1000*60*60)) % 24 );
	  var days = Math.floor( t/(1000*60*60*24) );
	  return {
	    'total': t,
	    'days': days,
	    'hours': hours,
	    'minutes': minutes,
	    'seconds': seconds
	  };
	}

	function initializeClock(id, endtime){
	  // var clock = document.getElementById(id);
	  var timeinterval = setInterval(function(){
	    var t = getTimeRemaining(endtime);
	    $('.days span').text(t.days);
	    $('.hours span').text(t.hours);
	    $('.minutes span').text(t.minutes);
	    $('.seconds span').text(t.seconds);
	    if(t.total<=0){
	      clearInterval(timeinterval);
	    }
	  },1000);
	}
	if (releaseDate) {
		initializeClock('release-date', releaseDate);
	}
});