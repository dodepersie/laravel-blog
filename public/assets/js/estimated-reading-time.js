$(document).ready(function() {
    var txt = $(".content")[0].textContent,
        wordCount = txt.replace(/[^\w ]/g, "").split(/\s+/).length;
    var readingTimeInSeconds = Math.floor(wordCount / 4.1);
    var minutes = Math.floor(readingTimeInSeconds / 60);
    var seconds = readingTimeInSeconds % 60;
    var readingTimeAsString;

    if (minutes >= 1) {
        readingTimeAsString = "Estimasi waktu baca: " + minutes + " menit " + seconds + " detik";
    } else {
        readingTimeAsString = "Estimasi waktu baca: " + seconds + " detik";
    }

    $('.reading-time').html(readingTimeAsString);
});