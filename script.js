document.addEventListener("DOMContentLoaded", function () {
  const form = document.getElementById("contact-form");
  form.addEventListener("submit", function (event) {
    event.preventDefault();
    // Handle form submission here (you can use AJAX to send form data)
    // For simplicity, we're not implementing the actual form submission in this example
    alert("Thank you for your message!");
    form.reset();
  });
});
