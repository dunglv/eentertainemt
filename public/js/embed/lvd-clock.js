var day, month, year, hour, minute, seconds;
var date_pk = new Date();
dayOfWeek = date_pk.getDay();
week = ['Monday', 'Tuesday', 'Wednesday', 'Thurday', 'Friday', 'Saturday', 'Sunday'];
day = date_pk.getDate();
month = date_pk.getMonth()+1;
year =date_pk.getFullYear();
hour = date_pk.getHours();
minute = date_pk.getMinutes();
seconds = date_pk.getSeconds();

function setClock() {
	var clock = new Array();
	if (seconds == 59) {
		seconds = 0;
		if (minute == 59) {
			if (hour == 23) {
				hour = 0;
				if (day==30) {
					day=1;
					if (month == 12) {
						year++;
					}else{
						month++;
					}
				}else{
					day++;
				}
			}else{
				hour++;
			}
			minute = 0;
		}else{
			minute++;
		}
	}else{
		seconds++;
	}
	console.log(week[dayOfWeek-1]+', '+day+'/'+month+'/'+year+' '+hour+':'+minute+':'+seconds);
	clock['dayofweek'] = week[dayOfWeek-1];
	clock['day'] = (day<10)?'0'+day:day;
	clock['month'] = (month<10)?'0'+month:month;
	clock['year'] = (year<10)?'0'+year:year;
	clock['hour'] = (hour<10)?'0'+hour:hour;
	clock['minute'] = (minute<10)?'0'+minute:minute;
	clock['seconds'] = (seconds<10)?'0'+seconds:seconds;
	return clock;
}
	
	var wrapper = document.getElementById('lvd_clock');
	var p1 = document.createElement('p');
	var p2 = document.createElement('p');
	wrapper.appendChild(p1);
	wrapper.appendChild(p2);
	var html = '';
	setInterval(function(){
		var clock = setClock();
		// html = clock['dayofweek']+', '+clock['day']+'/'+clock['month']+'/'+clock['year'];
		// p1.innerHTML = html;
		// p2.innerHTML = clock['hour']+':'+clock['minute']+':'+clock['seconds'];
		wrapper.innerHTML = '<p>'+ clock['dayofweek']+', '+clock['day']+'/'+clock['month']+'/'+clock['year']+'</p>'+'<p>'+clock['hour']+':'+clock['minute']+':'+clock['seconds']+'</p>';
	}, 1000);

	// var lvd_clock = document.createElement('div');
	// lvd_clock.className = 'lvd-clock';
// var wrapper = document.getElementById('lvd_clock');

// displayClock(setClock());
// console.log(setClock());