$(document).ready(function() {
    $('#mega-menu-button').click(function(e) {
        e.preventDefault();
        $('#mega-menu').slideToggle();
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('#mega-menu-button').length) {
            $('#mega-menu').slideUp();
        }
    });
});