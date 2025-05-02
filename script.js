document.getElementById("contact-form").addEventListener("submit", function (event) {
    event.preventDefault(); // Prevent default form submission

    // Get form values
    let formData = new FormData(this);

    // Step 1: Save to Database via PHP (Ajax Request)
    fetch("insert.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.text())
    .then(data => {
        console.log("Database Response:", data);
        
        // Step 2: Send Email via EmailJS
        emailjs.send("service_ci53h1f", "template_oaswiav", {
            name: formData.get("name"),
            email: formData.get("email"),
            department: formData.get("department"),
            message: formData.get("message"),
        }).then(
            function (response) {
                console.log("Email Sent:", response);
                alert("Message sent successfully!");
            },
            function (error) {
                console.log("EmailJS Error:", error);
            }
        );
    })
    .catch(error => console.error("Database Error:", error));
});
