// Martin Donovan

// Creates a form within the element imageDescription
// The form contains a label and a text box.
// The text box is formatted as a read only input form for aesthetics.

function weatherbox(textInput) {
	ImgServerView.weatherbox(textInput);
}

var ImgServerView = {
	weatherbox(textInput) {
		this.clearElement("imageDescription");
	
		let descriptionForm = this.insertForm("imageDescription");
		
		let weatherGroup = this.insertFormGroup(descriptionForm);
		
		this.insertLabel(weatherGroup, "weatherBox", "Weather");
		
		this.insertInputBox(weatherGroup, "weatherBox", "Weather", textInput, true);
	},
	
	clearElement(elementId) {
		let givenElement = document.getElementById(elementId);
		givenElement.innerHTML =""; // Clear the element
	},
	
	insertForm(containerElementId) {
		let containerElement = document.getElementById(containerElementId);
		
		let insertedForm = document.createElement("form");
		containerElement.appendChild(insertedForm);
		return (insertedForm);
	},
	
	insertFormGroup(insertedForm) {
		let insertedNode = document.createElement("div");
		insertedNode.className="form-group";
		insertedForm.appendChild(insertedNode);
		return(insertedNode);
	},
	
	insertLabel(group, labeledElement, labelText) {
		let weatherBoxLabel = document.createElement("label");
		group.appendChild(weatherBoxLabel);
		weatherBoxLabel.setAttribute("for", labeledElement);
		weatherBoxLabel.innerHTML = labelText;
	},
	
	insertInputBox(group, boxId, placeholder, textInput, readOnly) {
		let insertedBox = document.createElement("input");
		group.appendChild(insertedBox);
		insertedBox.setAttribute("type", "text");
		insertedBox.setAttribute("id", boxId);
		insertedBox.className = "form-control";
		insertedBox.setAttribute("placeholder", placeholder);
		insertedBox.setAttribute("value", textInput);
		insertedBox.innerHTML ="Test";
		if (readOnly === true) {
			insertedBox.setAttribute("readonly", "readonly");
		}	
	}
}
