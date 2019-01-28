// var order7 = '{"education":['+
// '{"gwa_min":"3.0","gwa_max":"2.9","points":"6.60"},'+
// '{"gwa_min":"2.89","gwa_max":"2.8","points":"7.20"},'+
// '{"gwa_min":"2.79","gwa_max":"2.7","points":"7.80"},'+
// '{"gwa_min":"2.69","gwa_max":"2.6","points":"8.40"},'+
// '{"gwa_min":"2.59","gwa_max":"2.5","points":"9.00"}'+
// ']}';

var order7 = {
"education":[
	{"gwa_min":"3.0","gwa_max":"2.9","points":"6.60"},
	{"gwa_min":"2.89","gwa_max":"2.8","points":"7.20"},
	{"gwa_min":"2.79","gwa_max":"2.7","points":"7.80"},
	{"gwa_min":"2.69","gwa_max":"2.6","points":"8.40"},
	{"gwa_min":"2.59","gwa_max":"2.5","points":"9.00"},
	{"gwa_min":"2.49","gwa_max":"2.4","points":"9.60"},
	{"gwa_min":"2.39","gwa_max":"2.3","points":"10.20"},
	{"gwa_min":"2.29","gwa_max":"2.2","points":"10.80"},
	{"gwa_min":"2.19","gwa_max":"2.1","points":"11.40"},
	{"gwa_min":"2.09","gwa_max":"2.0","points":"12.00"},
	{"gwa_min":"1.99","gwa_max":"1.9","points":"12.60"},
	{"gwa_min":"1.89","gwa_max":"1.8","points":"13.20"},
	{"gwa_min":"1.79","gwa_max":"1.7","points":"13.80"},
	{"gwa_min":"1.69","gwa_max":"1.6","points":"14.40"},
	{"gwa_min":"1.59","gwa_max":"1.5","points":"15.00"},
	{"gwa_min":"1.49","gwa_max":"1.4","points":"15.60"},
	{"gwa_min":"1.39","gwa_max":"1.3","points":"16.20"},
	{"gwa_min":"1.29","gwa_max":"1.2","points":"16.80"},
	{"gwa_min":"1.19","gwa_max":"1.1","points":"17.40"},
	{"gwa_min":"1.09","gwa_max":"1.0","points":"18.00"}
]};

var order22 = {
"education":[
	{"gwa_min":"3.0","gwa_max":"2.8","points":"14.40"},
	{"gwa_min":"2.79","gwa_max":"2.5","points":"15.00"},
	{"gwa_min":"2.49","gwa_max":"2.2","points":"15.60"},
	{"gwa_min":"2.19","gwa_max":"1.9","points":"16.20"},
	{"gwa_min":"1.89","gwa_max":"1.6","points":"16.80"},
	{"gwa_min":"1.59","gwa_max":"1.3","points":"17.40"},
	{"gwa_min":"1.29","gwa_max":"1.0","points":"18.00"}
]};


// var obj = JSON.parse(order7);

function educationPoints(order,gwa) {

	var p;

	switch(order){

		case '7':
	
			for (var i = 0; i < order7.education.length; i++) {

				if (order7.education[i].gwa_min>=gwa && order7.education[i].gwa_max<=gwa) {
					p = order7.education[i].points;
					break;
				}
			}

		break;

		case '22':
	
			for (var i = 0; i < order22.education.length; i++) {

				if (order22.education[i].gwa_min>=gwa && order22.education[i].gwa_max<=gwa) {
					p = order22.education[i].points;
					break;
				}
			}
			
		break;

	}

	return p;
}