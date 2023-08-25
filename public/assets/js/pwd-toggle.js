$(document).ready(function() {
    var passwordInput = $("#password");
    var showPwd = $("#showPwd");
    var showSpan = $("#show");
    var hideSpan = $("#hide");

    function togglePasswordVisibility() {
        if (passwordInput.attr("type") === "password") {
            passwordInput.attr("type", "text");
            showSpan.css("display", "none");
            hideSpan.css("display", "block");
        } else {
            passwordInput.attr("type", "password");
            showSpan.css("display", "block");
            hideSpan.css("display", "none");
        }
    }

    showPwd.click(togglePasswordVisibility);
});