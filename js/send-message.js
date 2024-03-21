// JavaScript to display and close success message in a pop-up window
const urlParams = new URLSearchParams(window.location.search);
const success = urlParams.get("success");

// If success query parameter is present, display success popup
if (success === "1") {
  document.getElementById("success-message").style.display = "block";

  // Close the success popup after 4 seconds
  setTimeout(function () {
    document.getElementById("success-message").style.display = "none";
    // Remove the query parameter from the URL
    if (history.replaceState) {
      const cleanURL =
        window.location.pathname +
        window.location.search.replace(/\?success=1/, "");
      window.history.replaceState({}, document.title, cleanURL);
    }
  }, 4000);
}
