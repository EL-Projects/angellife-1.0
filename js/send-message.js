const urlParams = new URLSearchParams(window.location.search);
const success = urlParams.get("success");

if (success === "1") {
  document.getElementById("success-message").style.display = "block";

  setTimeout(function () {
    document.getElementById("success-message").style.display = "none";

    if (history.replaceState) {
      const cleanURL =
        window.location.pathname +
        window.location.search.replace(/\?success=1/, "");
      window.history.replaceState({}, document.title, cleanURL);
    }
  }, 4000);
}
