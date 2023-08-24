$(document).ready(function() {
    $(".comment-btn").click(function() {
        $(".comment-message").not($(this).next(".comment-message")).slideUp();
        $(this).next(".comment-message").slideToggle();
    });
});