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
	],
	"let_rating":[
		{"min":"75","max":"77.4","points":"11"},
		{"min":"77.5","max":"80.4","points":"12"},
		{"min":"80.5","max":"83.4","points":"13"},
		{"min":"83.5","max":"86.4","points":"14"},
		{"min":"86.5","max":"100","points":"15"}
	],
	"pbet_rating":[
		{"min":"70","max":"72.4","points":"11"},
		{"min":"72.5","max":"75.4","points":"12"},
		{"min":"75.5","max":"78.4","points":"13"},
		{"min":"78.5","max":"81.4","points":"14"},
		{"min":"81.5","max":"100","points":"15"}
	]
};

var order22 = {
	"education":[
		{"gwa_min":"3.0","gwa_max":"2.8","points":"14.40"},
		{"gwa_min":"2.79","gwa_max":"2.5","points":"15.00"},
		{"gwa_min":"2.49","gwa_max":"2.2","points":"15.60"},
		{"gwa_min":"2.19","gwa_max":"1.9","points":"16.20"},
		{"gwa_min":"1.89","gwa_max":"1.6","points":"16.80"},
		{"gwa_min":"1.59","gwa_max":"1.3","points":"17.40"},
		{"gwa_min":"1.29","gwa_max":"1.0","points":"18.00"}
	]
};

// function---------------------------------------------------------------
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

function experiencePoints(order,mnth){

	var p;

	switch(order){
		case '7':
			p = mnth*0.15;
		break;

		case '22':
			p = mnth*0.5;
		break;
	}

	if(p>12){
		p=12;
	}

	return p;

}

function eligibilityPoints(type,rate){
	
	var p;

	switch(type){
		
		case 'LET':
			for (var i = 0; i < order7.let_rating.length; i++) {
				if (rate>=order7.let_rating[i].min && rate<=order7.let_rating[i].max) {
					p = order7.let_rating[i].points;
					break;
				}
			}
		break;
		
		case 'PBET':
			for (var i = 0; i < order7.pbet_rating.length; i++) {
				if (rate>=order7.pbet_rating[i].min && rate<=order7.pbet_rating[i].max) {
					p = order7.pbet_rating[i].points;
					break;
				}
			}
		break;
		
	}

	return p;
	
}

function interviewPoints(points){
	var p;

	p = ((points/15)*0.10)*100;

	return p;
}

function demoteachingPoints(points){
	
	var p;

	p = ((points/60)*0.15)*100;

	return p;

}

function communicationPoints(points){
	var p;

	p = (points/100)*15;

	return p;
}