// Adjust the navbar shape when the hamburger menu starts to open or finishes closing

$('#collapseMenu').on('hidden.bs.collapse', function () {
    document.getElementById("cseNavbar").className ="navbar rounded-pill-bottom";
})

$('#collapseMenu').on('show.bs.collapse', function () {
    document.getElementById("cseNavbar").className ="navbar rounded-pill-bottom-right";
})