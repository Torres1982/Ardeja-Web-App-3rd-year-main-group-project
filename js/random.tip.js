function chosen_tip() {

//declared array of random tips
	tips = new Array();

//initialized indexes of the array
	tips[0] = "Don't overload yourself, take days off from workout.";
	tips[1] = "Eat 5 to 6 meals a day.";
	tips[2] = "Drink more water.";
	tips[3] = "Stick to the proper sleeping pattern &ndash; 6 to 9 hours every night.";
	tips[4] = "A lack of concentration during exercising can lead to injury.";
	tips[5] = "Choose interval training to get best results.";
	tips[6] = "Supplements can play a key role in boosting muscle growth.";
	tips[7] = "Remember that healthy eating is crucial.";
	tips[8] = "Learn to control your carbohydrate intake.";
	tips[9] = "If you want to build strength, you have to set goals and be patient.";

//chosen random tip
	var pick = Math.floor(Math.random() * tips.length);
	document.getElementById('tipbox').innerHTML = tips[pick];
}