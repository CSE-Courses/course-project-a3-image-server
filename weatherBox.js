// Martin Donovan

// Creates a form within the element imageDescription
// The form contains a label and a text box.
// The text box is formatted as a read only input form for aesthetics.
function weatherbox(textInput) {
	let descriptionNode = document.getElementById("imageDescription");
	descriptionNode.innerHTML =""; // Clear the element
	
	let weatherForm = document.createElement("form");
	descriptionNode.appendChild(weatherForm);
	
	let weatherNode = document.createElement("div");
	weatherNode.className="form-group";
	weatherForm.appendChild(weatherNode);
	
	let weatherBoxLabel = document.createElement("label");
	weatherNode.appendChild(weatherBoxLabel);
	weatherBoxLabel.setAttribute("for", "weatherBox");
	weatherBoxLabel.innerHTML = "Weather";
	
	let weatherBox = document.createElement("input");
	weatherNode.appendChild(weatherBox);
	weatherBox.setAttribute("type", "text");
	weatherBox.setAttribute("id", "weatherBox");
	weatherBox.className = "form-control";
	weatherBox.setAttribute("placeholder", textInput);
	weatherBox.setAttribute("readonly", "readonly");
}