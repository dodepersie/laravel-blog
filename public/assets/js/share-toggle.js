$(document).ready(function() {
    $('.share-btn').click(function() {
        $('.share-btn-show').stop().slideToggle(function() {
            if ($(this).is(':visible')) {
                $('body').css('overflow', 'hidden');
            } else {
                $('body').css('overflow', 'scroll');
            }
        });
    });

    // When Clicked Outside
    $(document).click(function(e) {
        if ($('.share-btn-show').is(':visible') &&
            !$(e.target).is('.share-btn') &&
            !$(e.target).parents().is('.share-btn') &&
            !$(e.target).closest('.share-btn-show').length) {
            $('.share-btn-show').slideUp();
            $('body').css('overflow', 'scroll');
        }
    });

    if ($(window).height() <= $(window).height()+100) {
        $('.share-btn-show').addClass('dropdown-above');
    }

    // Adjust the dropdown class while scrolling
    $(window).scroll(function() {
        if ($(window).scrollTop() === 0) {
            $('.share-btn-show').addClass('dropdown-above');
        } else {
            $('.share-btn-show').removeClass('dropdown-above');
        }
    });
});