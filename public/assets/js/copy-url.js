$(document).ready(function() {
    // Handle copy link functionality
    $("#copyLink").on("click", function(e) {
        e.preventDefault();

        var currentUrl = window.location.href;
        copyToClipboard(currentUrl);

        // Optionally provide some visual feedback, like changing the link text
        $(this).text("URL disalin!");

        // Reset the link text after a brief delay
        setTimeout(function() {
            $("#copyLink").text("Salin URL");
        }, 2000); // Reset after 2 seconds
    });

    // Function to copy text to clipboard
    function copyToClipboard(text) {
        var tempInput = document.createElement("input");
        tempInput.value = text;
        document.body.appendChild(tempInput);
        tempInput.select();
        document.execCommand("copy");
        document.body.removeChild(tempInput);
    }
});