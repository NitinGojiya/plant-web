document.addEventListener("DOMContentLoaded", function() {
    const paymentForm = document.getElementById("paymentForm");
    paymentForm.addEventListener("submit", function(event) {
        event.preventDefault();
        // Simulate successful payment
        alert("Payment Successful!");
        // Redirect to homepage
        window.location.href = "home.php"; // Update with your homepage URL
    });
});
