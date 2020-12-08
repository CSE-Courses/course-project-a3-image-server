
var ImgServerModel = {

    fileChanged: function (inputFile) {
        if (inputFile.value) {
            var inputFileName  = inputFile.files[0].name;

            ImgServerView.setElementText("db-text", inputFileName);

            ImgServerView.createImageForm(inputFile);
            ImgServerView.displayImageDescription("Cloudy (test)", "New York (test)");
            ImgServerView.displayEditPhoto();
        } else {
            ImgServerView.setElementText("db-text", "No file uploaded");

            ImgServerView.clearImageDescription();
        }
    },

    menuOpening: function () {
        ImgServerView.navbarSquareLeftCorner();
    },

    menuClosed: function () {
        ImgServerView.navbarRoundLeftCorner();
    }

}

var ImgServerView = {

    displayEditPhoto : function(){
        const descriptionForm = this.insertForm("imageDescription","editPhotofForm")

        const editPhotoGroup = this.insertFormGroup(descriptionForm);

        this.insertLabel(editPhotoGroup,"photoEditor", "Would You Like To Edit You Photo?") ;

        const editPhotoBtnGroup = this.insertFormGroup(descriptionForm);


        editPhotoBtn = document.createElement("input");

        editPhotoBtn.type="button";
        editPhotoBtn.value = "Click Here to Edit Your Photo!";
        editPhotoBtn.id = "edit";
        editPhotoBtn.className = "btn btn-secondary";
        editPhotoBtn.onclick = function(){
         $('#editModal').modal('show')

        }
       /* editPhotoBtn.onclick = function(){
            form = document.getElementById("editPhotofForm");
            form.remove();
            form = document.getElementById("descriptionForm");
            form.remove();
            imageDescription = document.getElementById("imageDescription");
            filterButtonForm = document.createElement("form");
            filterButtonForm.id = "filterButtonForm";
            imageDescription.appendChild(filterButtonForm);
            const div4Label = document.createElement("div");
            filterButtonForm.appendChild(div4Label);
            div4Label.className="form-group";
            const label = document.createElement("label");
            label.innerHTML = "Choose A Filter!";
            div4Label.appendChild(label);
            const div4Buttons = document.createElement("div");
            div4Buttons.className="form-group";
            blur = document.createElement("input");
            blur.type="button";
            blur.value = "Blur Image";
            blur.className = "btn btn-secondary";
            div4Buttons.appendChild(blur);
            sharpen = document.createElement("input");
            sharpen.type="button";
            sharpen.value = "Sharpen Image";
            sharpen.className = "btn btn-secondary";
            div4Buttons.appendChild(sharpen);
            emboss = document.createElement("input");
            emboss.type="button";
            emboss.value = "Apply Emboss Filter";
            emboss.className = "btn btn-secondary";
            div4Buttons.appendChild(emboss);
            enDetail = document.createElement("input");
            enDetail.type="button";
            enDetail.value = "Enhance Detail";
            enDetail.className = "btn btn-secondary";
            div4Buttons.appendChild(enDetail);
            div4Label.appendChild(div4Buttons);

        };*/
        editPhotoBtnGroup.appendChild(editPhotoBtn);
    },

    // Create a form to view and edit the description
    displayImageDescription: function (weatherDescription, geolocationDescription) {
        //this.clearImageDescription();

        const descriptionForm = this.insertForm("imageDescription", "descriptionForm");

        const weatherGroup = this.insertFormGroup(descriptionForm);

        this.insertLabel(weatherGroup, "weatherBox", "Weather");

        this.insertInputBox(weatherGroup, "weatherBox", "weather", "Weather", weatherDescription, true);

        const geolocationGroup = this.insertFormGroup(descriptionForm);

        this.insertLabel(geolocationGroup, "geolocationBox", "Geolocation");

        this.insertInputBox(geolocationGroup, "geolocationBox", "geolocation", "Geolocation", geolocationDescription, false);

        const buttonGroup = this.insertFormGroup(descriptionForm);

        this.insertButton(buttonGroup, "Confirm");


    },

    createImageForm: function (image) {
        const imageForm = this.insertForm("imageDescription", "imageForm");

        //imageForm.className="d-none";

        imageForm.action="./php/uploadimage.php"

        imageForm.method="post";

        imageForm.enctype="multipart/form-data";

        const imageGroup = this.insertFormGroup(imageForm);

        imageGroup.className="d-none";

        this.insertLabel(imageGroup, "imageElement", "Image");

        const imageInput = this.insertImageBox(imageGroup, "file_upload", "file_upload", "Image", image, true);

        const buttonGroup = this.insertFormGroup(imageForm);

        this.insertButton(buttonGroup, "Upload Image");

        imageInput.files = document.getElementById("real-file").files;

        //imageForm.submit();
    },

    clearImageDescription: function () {
        this.setElementText("imageDescription", "");
    },

    setElementText: function (elementId, elementText) {
        document.getElementById(elementId).innerHTML = elementText;
    },

    insertForm: function (containerElementId, formId) {
        const containerElement = document.getElementById(containerElementId);

        const insertedForm = document.createElement("form");
        containerElement.appendChild(insertedForm);

        insertedForm.id = formId;

        return (insertedForm);
    },

    createForm: function (formId) {
        const insertedForm = document.createElement("form");
        containerElement.appendChild(insertedForm);

        insertedForm.id = formId;

        return (insertedForm);
    },

    insertFormGroup: function (insertedForm) {
        const insertedNode = document.createElement("div");
        insertedForm.appendChild(insertedNode);

        insertedNode.className="form-group";

        return(insertedNode);
    },

    insertLabel: function (group, labeledElement, labelText) {
        const weatherBoxLabel = document.createElement("label");
        group.appendChild(weatherBoxLabel);

        weatherBoxLabel.setAttribute("for", labeledElement);
        weatherBoxLabel.innerHTML = labelText;
    },

    insertInputBox: function (group, boxId, boxName, placeholder, textInput, readOnly) {
        const insertedBox = document.createElement("input");
        group.appendChild(insertedBox);


        insertedBox.id = boxId;
        insertedBox.className = "form-control";
        insertedBox.name = boxName;
        insertedBox.setAttribute("placeholder", placeholder);
        insertedBox.value = textInput;
        insertedBox.type = "text";
        if (readOnly === true) {
            insertedBox.setAttribute("readonly", "readonly");
        }
    },

    insertImageBox: function (group, boxId, boxName, placeholder, imageInput, readOnly) {
        const insertedBox = document.createElement("input");
        group.appendChild(insertedBox);


        insertedBox.id = boxId;
        insertedBox.className = "form-control";
        insertedBox.name = boxName;
        insertedBox.setAttribute("placeholder", placeholder);
        insertedBox.type = "file";
        if (readOnly === true) {
            insertedBox.setAttribute("readonly", "readonly");
        }

        return insertedBox;
    },

    insertButton: function (group, buttonText) {
        const insertedButton = document.createElement("button");
        group.appendChild(insertedButton);
        insertedButton.type = "submit";
        insertedButton.className = "btn btn-secondary";
        insertedButton.innerHTML = buttonText;
    },

    navbarSquareLeftCorner: function () {
        document.getElementById("cseNavbar").className ="navbar rounded-pill-bottom-right";
    },

    navbarRoundLeftCorner: function () {
        document.getElementById("cseNavbar").className ="navbar rounded-pill-bottom";
    }
}

var ImgServerController = {

    // Upload button setup
    /*cusButSetup: function () {
        const realFile = document.getElementById("real-file");
        const realButton = document.getElementById("cus-but");

        realButton.addEventListener("click", function() {
            realFile.click();
        });

        realFile.addEventListener("change", function() {
            ImgServerModel.fileChanged(realFile);
        });
    },*/

    // drop and drag things
    dragdrop: function (){
        document.querySelectorAll(".dropbox__input").forEach((inputElem) => {
        const dropboxElem = inputElem.closest(".dropbox");
        const dropboxSpan = document.getElementById("db-text");

        dropboxElem.addEventListener("click", (e) => {
            inputElem.click();
        });

        inputElem.addEventListener("change", (e) => {
            ImgServerModel.fileChanged(inputElem);
        });

        dropboxElem.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropboxElem.classList.add("dropbox--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropboxElem.addEventListener(type, (e) => {
            dropboxElem.classList.remove("dropbox--over");
            });
        });

        dropboxElem.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
                inputElem.files = e.dataTransfer.files;
                ImgServerModel.fileChanged(inputElem);
            }

            dropboxElem.classList.remove("dropbox--over");
            });
        });
    },

    // Adjust the navbar shape when the hamburger menu starts to open or finishes closing
    setupMenuEvents: function () {
        $('#collapseMenu').on('hidden.bs.collapse', function () {
            ImgServerModel.menuClosed();
        })

        $('#collapseMenu').on('show.bs.collapse', function () {
            ImgServerModel.menuOpening();
        })
    }
}
