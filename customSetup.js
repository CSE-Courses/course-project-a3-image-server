// Upload button setup
function cusButSetup() {
    const realFile = document.getElementById("real-file");
    const realButton = document.getElementById("cus-but");
    const realSpan = document.getElementById("but-text");
    
    realButton.addEventListener("click", function() {
        realFile.click();
    });
    
    realFile.addEventListener("change", function() {
        if (realFile.value) {
            realSpan.innerHTML = realFile.value.match(/[\/\\]([\w\d\s\.\-\(\)]+)$/)[1];
            ImgServerView.displayImageDescription("Cloudy (test)", "New York (test)");
        } else {
            realSpan.innerHTML = "No file uploaded";
            ImgServerView.clearImageDescription();
        }
    });
}