
var ImgServerModel = {
    
    fileChanged(realFile, realSpan) {
        if (realFile.value) {
            let realFileName  = realFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            ImgServerView.setElementText(realSpan, realFileName);
            
            ImgServerView.displayImageDescription("Cloudy (test)", "New York (test)");
        } else {
            ImgServerView.setElementText(realSpan, "No file uploaded");
            
            ImgServerView.clearImageDescription();
        }
    },
    
    menuOpening() {
        ImgServerView.navbarSquareLeftCorner();
    },
    
    menuClosed() {
        ImgServerView.navbarRoundLeftCorner();
    }
    
}

var ImgServerView = {
    
    setElementText(element, spanText) {
        element.innerHTML = spanText;
    },
   
    // Create a form to view and edit the description
    displayImageDescription(weatherDescription, geolocationDescription) {
        this.clearImageDescription();
    
        let descriptionForm = this.insertForm("imageDescription");
        
        let weatherGroup = this.insertFormGroup(descriptionForm);
        
        this.insertLabel(weatherGroup, "weatherBox", "Weather");
        
        this.insertInputBox(weatherGroup, "weatherBox", "Weather", weatherDescription, true);
        
        let geolocationGroup = this.insertFormGroup(descriptionForm);
        
        this.insertLabel(weatherGroup, "geolocationBox", "Geolocation");
        
        this.insertInputBox(weatherGroup, "geolocationBox", "Geolocation", geolocationDescription, false);
        
        let buttonGroup = this.insertFormGroup(descriptionForm);
        
        this.insertButton(buttonGroup, "Confirm");
    },
    
    clearImageDescription() {
        this.clearElement("imageDescription");
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
    },
    
    insertButton(group, buttonText) {
        let insertedButton = document.createElement("button");
        group.appendChild(insertedButton);
        insertedButton.type = "button";
        insertedButton.className = "btn btn-secondary";
        insertedButton.innerHTML = buttonText;
    },

    navbarSquareLeftCorner() {
        document.getElementById("cseNavbar").className ="navbar rounded-pill-bottom-right";
    },
    
    navbarRoundLeftCorner() {
        document.getElementById("cseNavbar").className ="navbar rounded-pill-bottom";
    }
}

var ImgServerController = {
    
    // Upload button setup
    cusButSetup() {
        const realFile = document.getElementById("real-file");
        const realButton = document.getElementById("cus-but");
        const realSpan = document.getElementById("but-text");
        
        realButton.addEventListener("click", function() {
            realFile.click();
        });
        
        realFile.addEventListener("change", function() {
            ImgServerModel.fileChanged(realFile, realSpan);
        });
    },
    
    // Adjust the navbar shape when the hamburger menu starts to open or finishes closing
    setupMenuEvents() {
        $('#collapseMenu').on('hidden.bs.collapse', function () {
            ImgServerModel.menuClosed();
        })
        
        $('#collapseMenu').on('show.bs.collapse', function () {
            ImgServerModel.menuOpening();
        })
    }
    
    

}