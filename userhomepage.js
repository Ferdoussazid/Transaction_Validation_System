document.getElementById("transactionForm").addEventListener("submit", function(event) {
    event.preventDefault();

    const formData = new FormData(event.target);

    // Assuming you're using fetch API to send the form data to the server
    fetch("process_transaction.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert("Transaction sent successfully!");
        } else {
            alert("Transaction failed. Please try again.");
        }
    })
    .catch(error => {
        console.error("Error:", error);
    });
});
