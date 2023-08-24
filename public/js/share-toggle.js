// $(document).ready(function() {
//     var shareButtonShow = $("#share_button_show");

//     $("#share_button").on("click", function() {
//         shareButtonShow.slideToggle();

//         // Toggle body's overflow property to disable/enable scrolling
//         $("body").css("overflow", function(index, value) {
//             return value === "hidden" ? "auto" : "hidden";
//         });
//     });

//     // Hide the dropdown and re-enable scrolling when clicking outside
//     $(document).on("click", function(e) {
//         if (!$(e.target).closest("#share_button").length && !$(e.target).closest(
//                 "#share_button_show").length) {
//             shareButtonShow.slideUp();
//             $("body").css("overflow", "auto");
//         }
//     });

//     // Prevent the dropdown from closing when clicking inside
//     shareButtonShow.on("click", function(e) {
//         e.stopPropagation();
//     });
// });

$(document).ready(function () {
    $("#share_button").click(function (e) {
        e.stopPropagation(); // Prevent the click from propagating to the document

        var shareButtonShow = $(this).next("#share_button_show");

        // Hide other share_button_show elements and toggle the clicked one
        $("#share_button_show").not(shareButtonShow).slideUp();

        // Toggle body's overflow property to disable/enable scrolling
        $("body").css("overflow", function (index, value) {
            return value === "hidden" ? "auto" : "hidden";
        });
        shareButtonShow.slideToggle();
    });

    // Hide the dropdown and re-enable scrolling when clicking outside
    $(document).on("click", function (e) {
        var shareButtonShow = $("#share_button_show");
        if (
            !$(e.target).closest("#share_button").length &&
            !$(e.target).closest("#share_button_show").length
        ) {
            shareButtonShow.slideUp();
            $("body").css("overflow", "auto");
        }
    });
});
