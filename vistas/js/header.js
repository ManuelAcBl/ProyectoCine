let navbar_open;

function open_navbar() {
    $(".navbar").toggleClass("navbar--hidden");

    $(".navbar__open__img").attr("src", navbar_open ? "/svg/justify.svg" : "/svg/cross.svg");

    navbar_open = !navbar_open;
}
