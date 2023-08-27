$(document).ready(function() {
    $("div.progress").addClass("hidden");

    $(document).on("scroll", function() {
        $("div.progress").removeClass("hidden");
        var pixels = $(document).scrollTop();
        var pageHeight = $(document).height() - $(window).height();
        var progress = 100 * pixels / pageHeight;

        $("div.progress").css("width", progress + "%");
    })
})