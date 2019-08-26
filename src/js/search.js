document.addEventListener("DOMContentLoaded", function () {

    let location = window.location.href;

    if (location.match(/search/)) {

        location = location.replace(/search/, 's');
        window.location.href = location;
    };
});