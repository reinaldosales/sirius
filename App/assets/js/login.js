$(document).ready(function() {
    $(".page-signin").hide();

    $("#btn-signin").click(function(e) {
        document.title = "Sirius · Sign in";

        e.preventDefault();

        $(".page-login").hide();
        $(".page-signin").fadeIn(1000);
        $(".page-signin").css("display", "flex");
    });

    $("#btn-backLogin").click(function(e) {
        document.title = "Sirius · Login";

        e.preventDefault();

        $(".page-signin").hide();
        $(".page-login").fadeIn(1000);
    });
});