function calculate_bmi() {

	//declare variables
	user_height = 0;
	user_weight = 0;
	bmi = 0;

	//import user's height value
	if (document.getElementById("height").value > "") {
		user_height = document.getElementById("height").value;
			//display warning if height is greater than max acceptable
			if (user_height < 0 || user_height > 2.5) {
				alert("Acceptable height is between 0.00 and 2.50!");
				document.getElementById("height").value = null;
				document.getElementById("result").value = null;
				document.getElementById("bmi_evaluation").innerHTML = null;
			}
			else {
				user_height = document.getElementById("height").value;
				user_weight = document.getElementById("weight").value;
				bmi = eval(user_weight) / (eval(user_height) * eval(user_height));
				bmi = bmi.toFixed(1);
				document.getElementById("result").value = bmi;
			}
	}

	//import user's weight value
	if (document.getElementById("weight").value > "") {
		user_weight = document.getElementById("weight").value;
			//display warning if weight is greater than max acceptable
			if (user_weight < 0 || user_weight > 300) {
				alert("Acceptable weight is between 0.0 and 300!");
				document.getElementById("weight").value = null;
				document.getElementById("result").value = null;
				document.getElementById("bmi_evaluation").innerHTML = null;
			}
			else {
				user_height = document.getElementById("height").value;
				user_weight = document.getElementById("weight").value;
				bmi = eval(user_weight) / (eval(user_height) * eval(user_height));
				bmi = bmi.toFixed(1);
				document.getElementById("result").value = bmi;
			}
	}

	//Further operations needed to get BMI evaluation
	document.getElementById("button").addEventListener("click", get_bmi);

		function get_bmi() {
			//BMI categories information to be displayed
			if (bmi < 15) {
				document.getElementById("bmi_evaluation").innerHTML = "Very Severely Underweight";
			}
			else if (bmi <= 16) {
				document.getElementById("bmi_evaluation").innerHTML = "Severely Underweight";
			}
			else if (bmi <= 18.5) {
				document.getElementById("bmi_evaluation").innerHTML = "Underweight";
			}
			else if (bmi <= 25) {
				document.getElementById("bmi_evaluation").innerHTML = "Normal (Healthy Weight)";
			}
			else if (bmi <= 30) {
				document.getElementById("bmi_evaluation").innerHTML = "Overweight";
			}
			else if (bmi <= 35) {
				document.getElementById("bmi_evaluation").innerHTML = "Obese Class I (Moderately Obese)";
			}
			else if (bmi <= 40) {
				document.getElementById("bmi_evaluation").innerHTML = "Obese Class II (Severely Obese)";
			}
			else if (bmi > 40) {
				document.getElementById("bmi_evaluation").innerHTML = "Obese Class III (Very Severely Obese)";
			}
			else {
				document.getElementById("bmi_evaluation").innerHTML = "Not Categorized";
			}
		}

	//Clear the BMI calculator boxes
	document.getElementById("reset").addEventListener("click", clear);

		function clear() {
				document.getElementById("weight").value = null;
				document.getElementById("height").value = null;
				document.getElementById("result").value = null;
				document.getElementById("bmi_evaluation").innerHTML = null;
		}
}