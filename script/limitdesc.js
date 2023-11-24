document.addEventListener("DOMContentLoaded", function() {
  var span = document.getElementById("descrec");
  var maxLength = 382; // Set your desired character limit

  if (span.textContent.length > maxLength) {
      span.textContent = span.textContent.substring(0, maxLength) + "...";
  }
});