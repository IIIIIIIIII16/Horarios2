let prevScrollPos = window.pageYOffset;

window.onscroll = function() {
    let currentScrollPos = window.pageYOffset;

    if (prevScrollPos > currentScrollPos) {
        document.getElementById("navbar").style.top = "50px";
    } else {
        document.getElementById("navbar").style.top = "-50px";
    }

    prevScrollPos = currentScrollPos;
}