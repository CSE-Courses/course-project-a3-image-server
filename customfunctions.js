// Adjust the navbar shape when the hamburger menu starts to open or finishes closing

$('#collapseMenu').on('hidden.bs.collapse', function () {
    document.getElementById("cseNavbar").className ="navbar rounded-pill-bottom";
})

$('#collapseMenu').on('show.bs.collapse', function () {
    document.getElementById("cseNavbar").className ="navbar rounded-pill-bottom-right";
})

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
        insertedForm.appendChild(insertedNode);
        
        insertedNode.className="form-group";
        
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
        
        insertedBox.type = "text";
        insertedBox.id = boxId;
        insertedBox.className = "form-control";
        insertedBox.setAttribute("placeholder", placeholder);
        insertedBox.value = textInput;
        if (readOnly === true) {
            insertedBox.setAttribute("readonly", "readonly");
        }
    }
}