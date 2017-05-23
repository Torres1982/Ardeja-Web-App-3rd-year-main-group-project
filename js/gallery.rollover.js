//declared images and their sizes
	var roll_pic1 = new Image(170, 100);
	var roll_pic2 = new Image(170, 100);
	var roll_pic3 = new Image(170, 100);
	var roll_pic4 = new Image(170, 100);
	var roll_pic5 = new Image(170, 100);
	var roll_pic6 = new Image(170, 100);
	var roll_pic7 = new Image(170, 100);
	var roll_pic8 = new Image(170, 100);
	var roll_pic9 = new Image(170, 100);
	var roll_pic10 = new Image(170, 100);

//source of the images
	roll_pic1.src = "images/gym_2.jpg";
	roll_pic2.src = "images/gym_1.jpg";
	roll_pic3.src = "images/swimming_pool_2.jpg";
	roll_pic4.src = "images/swimming_pool.jpg";
	roll_pic5.src = "images/yoga_2.jpg";
	roll_pic6.src = "images/yoga_classes.jpg";
	roll_pic7.src = "images/sports_hall_2.jpg";
	roll_pic8.src = "images/sports_hall.jpg";
	roll_pic9.src = "images/nutrition_clinic.jpg";
	roll_pic10.src = "images/nutrition_shop.jpg";

//*********************************************************************************//
//***************************** ROLLOVER PICTURE 1 ********************************//
//*********************************************************************************//

//swap out function
	function swap_out_1() {
		document.getElementById("rollover_pic1").src = roll_pic1.src;
	}
//swap back function
	function swap_back_1() {
		document.getElementById("rollover_pic1").src = roll_pic2.src;
	}

//*********************************************************************************//
//***************************** ROLLOVER PICTURE 2 ********************************//
//*********************************************************************************//

//swap out function
	function swap_out_2() {
		document.getElementById("rollover_pic2").src = roll_pic3.src;
	}
//swap back function
	function swap_back_2() {
		document.getElementById("rollover_pic2").src = roll_pic4.src;
	}

//*********************************************************************************//
//***************************** ROLLOVER PICTURE 3 ********************************//
//*********************************************************************************//

//swap out function
	function swap_out_3() {
		document.getElementById("rollover_pic3").src = roll_pic5.src;
	}
//swap back function
	function swap_back_3() {
		document.getElementById("rollover_pic3").src = roll_pic6.src;
	}

//*********************************************************************************//
//***************************** ROLLOVER PICTURE 4 ********************************//
//*********************************************************************************//

//swap out function
	function swap_out_4() {
		document.getElementById("rollover_pic4").src = roll_pic7.src;
	}
//swap back function
	function swap_back_4() {
		document.getElementById("rollover_pic4").src = roll_pic8.src;
	}

//*********************************************************************************//
//***************************** ROLLOVER PICTURE 5 ********************************//
//*********************************************************************************//

//swap out function
	function swap_out_5() {
		document.getElementById("rollover_pic5").src = roll_pic9.src;
	}
//swap back function
	function swap_back_5() {
		document.getElementById("rollover_pic5").src = roll_pic10.src;
	}