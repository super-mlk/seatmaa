var date = new Date();
var year = date.getFullYear();
var month = date.getMonth() + 1;
date.setTime(date.getTime()+ 24*60*60*1000);
var day = date.getDate();
var getyellowdate = year + '-' + month + '-' + day;
var scribeDate = [{
	value: '110000',
	text: getyellowdate,
	children: [{
		value: "one",
		text: "8:00 ~ 10:30"
	}, {
		value: "two",
		text: "13:00 ~ 16:00"
	}, {
		value: "three",
		text: "18:00 ~ 20:30"
	}]
}]
	