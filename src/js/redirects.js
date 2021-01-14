document.addEventListener("DOMContentLoaded", function () {
  let location = window.location.href;

  // tmp redirect to alternative server
  if (location.match("https://prolog.cl.phil.hhu.de/")) {
    location = location.replace(
      "https://prolog.cl.phil.hhu.de/",
      "https://prolog.xciv.de/"
    );
    window.location.href = location;
  }

  if (location.match(/search/)) {
    location = location.replace(/search/, "s");
    window.location.href = location;
  }

  if (location.match(/register/)) {
    location = location.replace(/register/, "registrieren");
    window.location.href = location;
  }

  if (location.match(/folien-uebersicht/)) {
    location = location.replace(/folien-uebersicht\//, "");
    window.location.href = location;
  }
});
