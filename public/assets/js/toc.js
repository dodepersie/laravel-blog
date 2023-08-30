$(document).ready(function () {
    $('.toc-title').text('Daftar isi');

    if ($(".toc").length) {
        var fullString = "<ul>";
        var ID = 0;

        if(!$('.content').find("h1").length && !$('.content').find("h2").length)
        {
            $('.toc-title').text('');
            fullString += "<li><strong>Daftar isi tidak ditemukan.. :(</strong></li>";
        }

        $('.content').find("h1").each(function () {
            ID++;
            var h1Element = $(this);
            var h1Content = h1Element.text();
            h1Element.attr("id", "toc_" + ID);

            fullString +=
                "<li><button data-scroll-to='toc_" +
                ID +
                "'># " +
                h1Content +
                "</button>";

            var nestedList = "<ul>"; // For nested <h2> elements
            var h2Elements = h1Element.nextUntil("h1", "h2");

            h2Elements.each(function () {
                ID++;
                var h2Element = $(this);
                var h2Content = h2Element.text();
                h2Element.attr("id", "toc_" + ID);

                nestedList +=
                    "<li><button data-scroll-to='toc_" +
                    ID +
                    "'># " +
                    h2Content +
                    "</button></li>";
            });

            nestedList += "</ul>";

            fullString += nestedList + "</li>";
        });

        fullString += "</ul>";
        $(".toc-body").html(fullString);

        // Smooth scroll to the section when ToC link is clicked
        $(".toc-body button[data-scroll-to]").on("click", function (e) {
            e.preventDefault();

            var targetId = $(this).data("scroll-to");
            var targetOffset = $("#" + targetId).offset().top;

            $("html, body").animate(
                {
                    scrollTop: targetOffset,
                },
                "fast"
            );

            // Remove active class from all ToC links
            $(".toc-body button").removeClass("active");
            $(this).addClass("active");
        });

        // Check which header is at the top of the viewport
        function checkActiveHeader() {
            var scrollPos = $(document).scrollTop();

            // Remove active class from all ToC links
            $(".toc-body button").removeClass("active");

            var activeHeaderId = null;

            $("h1, h2").each(function () {
                var headerPos = $(this).offset().top;

                if (scrollPos >= headerPos) {
                    activeHeaderId = $(this).attr("id");
                }
            });

            if (activeHeaderId) {
                $(
                    ".toc-body button[data-scroll-to='" +
                        activeHeaderId +
                        "']"
                ).addClass("active");
            }
        }

        // Call the function on document ready and when the window is scrolled
        $(window).on("scroll", checkActiveHeader);
        checkActiveHeader();
    }

    // Show or hide the "Scroll to Top" link based on scroll position
    $(window).on("scroll", function () {
        var scrollPos = $(document).scrollTop();

        if (scrollPos > 100) {
            $(".scrollToTop").addClass("opacity-100").removeClass("opacity-0");
        } else {
            $(".scrollToTop").addClass("opacity-0").removeClass("opacity-100");
        }
    });

    // Scroll to Top Function
    $(".scrollTopLink").on("click", function (e) {
        e.preventDefault();
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            "fast"
        );
    });
});
