// Check for success query parameter in the URL
const urlParams = new URLSearchParams(window.location.search);
const success = urlParams.get("success");

// If success query parameter is present, display success popup
if (success === "1") {
  document.getElementById("success-message").style.display = "block";

  // Close the success popup after 3 seconds
  setTimeout(function () {
    document.getElementById("success-message").style.display = "none";
  }, 4000);
}
