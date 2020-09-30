
var ImgServerModel = {
    
    fileChanged(realFile) {
        if (realFile.value) {
            let realFileName  = realFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            ImgServerView.setElementText("but-text", realFileName);
            
            ImgServerView.displayImageDescription("Cloudy (test)", "New York (test)");
        } else {
            ImgServerView.setElementText("but-text", "No file uploaded");
            
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
    
    insertFooter() {
        document.getElementById("footer").innerHTML = "<div class=\"container\">\
        \
        <!-- The footer rectangle -->\
        <div class=\"card border-0 m-2\">\
            <div class=\"card-body p-2\">\
            \
                <!-- The rows and columns of the footer -->\
                <div class=\"row\">\
                    <div class=\"col-9\">\
                        <div class=\"card-text h-100 d-inline-flex align-items-center\">Created by Joyce Sommer, Martin Donovan, Mohit Gokul Murali, Nick Anzalone, and Sean Jones for Fall 2020 CSE 442 at SUNY University at Buffalo.<\/div>\
                    <\/div>\
                    \
                    <!-- text-reset makes the links inherit their color -->\
                    <div class=\"col-3 text-right\">\
                        <div>\
                            <a href=\"loginForm.html\" class=\"text-reset\">Log In<\/a>\
                        <\/div>\
                        <div>\
                            <a href=\"registrationForm.html\" class=\"text-reset\">Sign Up<\/a>\
                        <\/div>\
                        <div>\
                            <a href=\"aboutUs.html\" class=\"text-reset\">About Us<\/a>\
                        <\/div>\
                        <div>\
                            <a href=\"index.html\" class=\"text-reset\">Home<\/a>\
                        <\/div>\
                    <\/div>\
                <\/div>\
            <\/div>\
        <\/div>\
    <\/div>"; 
    },
    
    insertNavbar() {
     document.getElementById("navbar").innerHTML  = "<!-- The navbar -->\
        <nav id=\"cseNavbar\" class=\"navbar rounded-pill-bottom\" style=\"background-color: #918D85; color:#fff\">\
        \
            <!-- The dropdown menu, just a placeholder for now, pl-5 is there to give the corner space -->\
            <span class=\"nav-item pl-5\">\
                <a class=\"nav-link text-reset\" href=\"#collapseMenu\" role=\"button\" data-toggle=\"collapse\" aria-expanded=\"false\" aria-controls=\"collapseMenu\">\
        \
                    <!-- Hamburger icon -->\
                    <svg width=\"2em\" height=\"2em\" viewBox=\"0 0 16 16\" class=\"bi bi-list\" fill=\"currentColor\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\
                        <path fill-rule=\"evenodd\" d=\"M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z\"\/>\
                    <\/svg>\
                <\/a>\
            <\/span>\
            \
            <!-- The title, with text-reset to make the links inherit their color, and pr-5 to give the corner space -->\
            <a href=\"index.html\" class=\"navbar-brand text-reset m-0 h1 pr-5 py-0\" style=\"font-size: 2rem\">UB Image Server<\/a>\
        <\/nav>\
        \
        <!-- The dropdown menu, implemented as a collaped card -->\
        <div>\
            <div class=\"collapse\" id=\"collapseMenu\" style=\"position: absolute; z-index:1001;\">\
                <div class=\"menu-card card-body p-0\">\
                \
                <!-- Drop down form -->\
                    <form class=\"form-row px-2\" action=\"action_login.php\"method=\"post\">\
                        <div class=\"col-9\">\
                            <div class=\"form-group my-1 p-1\">\
                                <label class=\"sr-only\" for=\"menuEmail\">Email<\/label>\
                                <input type=\"text\" class=\"form-control\" id=\"menuEmail\" name=\"email\" placeholder=\"Email\" required>\
                            <\/div>\
                            <div class=\"form-group my-1 p-1\">\
                                <label class=\"sr-only\" for=\"menuPassword\">Password<\/label>\
                                <input type=\"password\" class=\"form-control\" id=\"menuPassword\" name=\"psw\" placeholder=\"Password\" required>\
                            <\/div>\
                        <\/div>\
                        <div class=\"col-3 d-flex align-items-center\">\
                            <button type=\"submit\" class=\"btn btn-dark\">\
                            \
                                <!-- Play icon -->\
                                <svg width=\"2em\" height=\"2em\" viewBox=\"0 0 16 16\" class=\"bi bi-play-fill\" fill=\"currentColor\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\
                                    <path d=\"M11.596 8.697l-6.363 3.692c-.54.313-1.233-.066-1.233-.697V4.308c0-.63.692-1.01 1.233-.696l6.363 3.692a.802.802 0 0 1 0 1.393z\"\/>\
                                <\/svg>\
                            <\/button>\
                        <\/div>\
                    <\/form>\
                    \
                    <!-- Drop down links -->\
                    <div class=\"text-left px-3 pb-2\" style=\"font-size: 1rem;\">\
                        <a class=\"text-reset\" href=\"loginForm.html\">Log In<\/a>&nbsp;|&nbsp;<a class=\"text-reset\" href=\"registrationForm.html\">Create Account<\/a>\
                    <\/div>\
                    <div class=\"d-inline-flex align-items-center text-center\">\
                    <\/div>\
                    <a class=\"text-reset py-2\" href=\"aboutUs.html\" style=\"font-size: 1.7rem\">About Us<\/a>\
                    <a class=\"text-reset py-2\" href=\"index.html\" style=\"font-size: 1.7rem\">Home<\/a>\
                <\/div>\
            <\/div>\
        <\/div>";  
    },
    
    // Create a form to view and edit the description
    displayImageDescription(weatherDescription, geolocationDescription) {
        this.clearImageDescription();
    
        let descriptionForm = this.insertForm("imageDescription", "descriptionForm");
        
        let weatherGroup = this.insertFormGroup(descriptionForm);
        
        this.insertLabel(weatherGroup, "weatherBox", "Weather");
        
        this.insertInputBox(weatherGroup, "weatherBox", "weather", "Weather", weatherDescription, true);
        
        let geolocationGroup = this.insertFormGroup(descriptionForm);
        
        this.insertLabel(geolocationGroup, "geolocationBox", "Geolocation");
        
        this.insertInputBox(geolocationGroup, "geolocationBox", "geolocation", "Geolocation", geolocationDescription, false);
        
        let buttonGroup = this.insertFormGroup(descriptionForm);
        
        this.insertButton(buttonGroup, "Confirm");
    },
    
    clearImageDescription() {
        this.setElementText("imageDescription", "");
    },
    
    setElementText(elementId, elementText) {
        document.getElementById(elementId).innerHTML = elementText;
    },
    
    insertForm(containerElementId, formId) {
        let containerElement = document.getElementById(containerElementId);
        
        let insertedForm = document.createElement("form");
        containerElement.appendChild(insertedForm);
        
        insertedForm.id = formId;
        
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
    
    insertInputBox(group, boxId, boxName, placeholder, textInput, readOnly) {
        let insertedBox = document.createElement("input");
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
    
    insertButton(group, buttonText) {
        let insertedButton = document.createElement("button");
        group.appendChild(insertedButton);
        insertedButton.type = "submit";
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
        
        realButton.addEventListener("click", function() {
            realFile.click();
        });
        
        realFile.addEventListener("change", function() {
            ImgServerModel.fileChanged(realFile);
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