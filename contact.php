<?php
// Include database connection if needed
include "php/db.php";

// Initialize variables to avoid undefined errors
$name = $email = $message = "";
$formSubmitMessage = "";

// Form processing logic - this can be used for direct PHP form submission without AJAX
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Processing will be handled by AJAX/insert.php
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="images/icon.png" type="image/png">
    <title>Contact Us</title>
    <script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&display=swap" rel="stylesheet"> -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'archivo-black': ['"Archivo Black"', 'sans-serif'],
                        'archivo-narrow': ['"Archivo Narrow"', 'sans-serif'],
                    },
                    colors: {
                        'primary-green': '#005c05',
                        'dark-green': '#004609',
                        'light-blue': '#22A6DF',
                        'dark-blue': '#1C8CC4',
                        'gold': '#f0a500',
                        'dark-gold': '#d18e00',
                    },
                    backgroundImage: {
                        'faq-bg': "url('images/faqBG.png')",
                        'footer-bg': "url('images/footer-background.png')",
                    }
                }
            }
        };
    </script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Archivo+Black&display=swap');

        /* Base styles that are hard to achieve with pure Tailwind */
        body {
            background: url("images/faqBG.png") no-repeat center center fixed;
            background-size: cover;
            position: relative;
        }
        
        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 0;
        }
        
        .footer {
            background-image: url("images/footer-background.png");
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            position: relative;
        }
        
    </style>
</head>
<body class="font-archivo-black text-white flex flex-col min-h-screen justify-center items-center relative overflow-x-hidden">
    <!-- Combined Section (Contact & Map) -->
    <section class="w-full flex flex-col items-center gap-12 px-5 py-10 z-10">
        <!-- Contact and Form Section -->
        <div class="flex flex-col md:flex-row justify-between gap-8 w-full max-w-5xl bg-primary-green p-8 rounded-lg shadow-lg">
            <!-- Left Side -->
            <div class="flex-1 p-5 text-center md:text-left">
                <h2 class="text-2xl leading-relaxed mb-5">MSD Godspeed Exhibits Corp.</h2>
                <div class="mb-4">
                    <p class="mb-2">(02) 8 570-8069</p>
                    <br>
                    <p class="mb-2">0915-9785683</p>
                    <br>                    
                    <a href="https://maps.app.goo.gl/GQJoP1aYDHUgPhux8" target="_blank" class="text-white hover:text-blue-500 hover:underline font-archivo-narrow text-base transition-colors duration-300">
                    #324 Navy Road Veterans Village, Barangay, Holy Spirit, Diliman, Quezon City, Philippines 1127
                    </a>
                    <br>
                    <br>
                    <a href="https://maps.app.goo.gl/ntNrevxVrpNNQAy7A" target="_blank" class="text-white hover:text-blue-500 hover:underline font-archivo-narrow text-base transition-colors duration-300">
                    #1 King Constantine Street Kingspoint Subdivision Bagbag, Quezon City
                    </a>
                    <br>
                </div>
                <div class="flex gap-6 mt-5 ml-1">
                    <a href="https://www.facebook.com/MSDGospeedExhibitsCorp" class="w-[50px] h-[50px] flex items-center justify-center transition-transform duration-300 hover:scale-110">
                        <img src="images/facebook.png" alt="Facebook" class="w-12 h-12 object-contain">
                    </a>
                    <a href="https://www.instagram.com/msdgodspeed2022/" class="w-[50px] h-[50px] flex items-center justify-center transition-transform duration-300 hover:scale-110">
                        <img src="images/instagram.png" alt="Instagram" class="w-12 h-12 object-contain">
                    </a>
                </div>
            </div>

            <!-- Right Side (Form) -->
            <div class="flex-1 p-5 bg-white rounded-lg text-black mt-8 md:mt-0">
                <div id="status-message"></div>
                <form id="contact-form" method="POST" class="flex flex-col gap-4">
                    <input type="text" id="name" name="name" placeholder="Your name" required class="w-full p-2.5 border border-gray-300 rounded-md text-sm font-archivo-narrow">
                    <input type="email" id="email" name="email" placeholder="Your email" required class="w-full p-2.5 border border-gray-300 rounded-md text-sm font-archivo-narrow">
                    <textarea id="message" name="message" placeholder="Your message" required class="w-full p-2.5 border border-gray-300 rounded-md text-sm font-archivo-narrow h-20 resize-none"></textarea>
                    <!-- hCaptcha -->
                    <div class="h-captcha" data-sitekey="978268a0-7234-4f00-9f04-607afba2d4ea"></div>
                    <button type="submit" class="bg-light-blue text-white border-none py-2.5 px-5 rounded-md text-base font-bold cursor-pointer transition-all duration-300 hover:bg-dark-blue font-archivo-narrow">Send Message</button>
                </form>              
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="relative bg-[url('images/footer-background.png')] bg-cover bg-center bg-no-repeat py-0.5 sm:py-3 text-white overflow-hidden mt-auto w-full font-archivo-black">
    <!-- Dark green overlay -->
    <div class="absolute top-0 left-0 w-full h-full bg-[#011D02D9] z-0"></div>

    <div class="relative z-10 flex flex-col md:flex-row justify-between items-stretch max-w-6xl mx-auto px-5 md:px-8">
        <!-- Footer Left - Logo -->
        <div class="flex-none w-full md:w-1/5 flex items-center justify-center md:justify-start pt-1 sm:pt-5">
            <a href="index.php">
                <img src="images/campaign-monitor-logo.png" alt="MSD Godspeed Logo" class="max-w-[120px] sm:max-w-[180px] h-auto">
            </a>
        </div>

            <!-- Footer Center - Company Info -->
            <div class="flex-1 flex flex-col items-center md:items-start text-center md:text-left pl-0 md:pl-5 mt-2 sm:mt-8 text-xs sm:text-base leading-tight">
                <h3 class="text-gold font-archivo-black text-2xl mb-3">Main Office</h3>
                <a href="https://maps.app.goo.gl/GQJoP1aYDHUgPhux8" target="_blank" class="no-underline text-white hover:text-blue-500 hover:underline text-base">
                    #324 Navy Road Veterans Village,<br> Barangay, Holy Spirit, Diliman,<br>Quezon City, Philippines 1127
                </a>
                <br>
                <div class="flex items-center gap-2 mb-1 mt-1 sm:mt-4">
                    <div class="w-[30px] h-[30px] sm:w-[50px] sm:h-[50px]">
                        <img src="images/phone.png" alt="Phone" class="w-full h-full object-contain">
                    </div>
                    <div class="flex flex-col text-xs sm:text-sm">
                        <span class="font-bold text-gold">Phone:</span> (02) 8 570-8069<br>
                        <span class="font-bold text-gold">Mobile:</span> 0915-9785683
                    </div>
                </div>
            
                <div class="flex items-center gap-2 mb-1 mt-1 sm:mt-4">
                    <div class="w-[30px] h-[30px] sm:w-[50px] sm:h-[50px]">
                        <img src="images/email.png" alt="Email" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <a href="mailto:wdcampos@msdgodspeedexhibits.com" class="text-white no-underline hover:text-gold">wdcampos@msdgodspeedexhibits.com</a>
                    </div>
                </div>
            
                <div class="flex gap-2 mt-2 sm:mt-5">
                    <a href="https://www.facebook.com/MSDGospeedExhibitsCorp" class="w-[30px] h-[30px] sm:w-[50px] sm:h-[50px]" bg-transparent rounded-full flex items-center justify-center transition-transform duration-300 hover:scale-110">
                        <img src="images/facebook.png" alt="Facebook" class="w-full h-full object-contain">
                    </a>
                    <a href="https://www.instagram.com/msdgodspeed2022/" class="w-[30px] h-[30px] sm:w-[50px] sm:h-[50px]" bg-transparent rounded-full flex items-center justify-center transition-transform duration-300 hover:scale-110">
                        <img src="images/instagram.png" alt="Instagram" class="w-full h-full object-contain">
                    </a>
                </div>      
            </div>
            
            <!-- Footer Right - Navigation Links -->
            <div class="flex-none w-full md:w-1/3 flex justify-center md:justify-start items-center pt-1 mt-2 sm:mt-8 text-xs sm:text-sm">
                <ul class="grid grid-cols-2 gap-3 gap-x-8 text-center md:text-left list-none p-0 m-0">
                    <li><a href="photo-gallery.php" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Galleries</a></li>
                    <li><a href="contact.php" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Contact Us</a></li>
                    <li><a href="docs/company-profile.pdf" target="_blank" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Catalogue</a></li>
                    <li><a href="docs/pricelist.pdf" target="_blank" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Price Lists</a></li>
                    <li><a href="index.php#about" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">About Us</a></li>
                    <li><a href="more-product.php" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Products</a></li>
                    <li><a href="index.php#services" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Services</a></li>
                    <li><a href="helpcenter.php" target="_blank" class="text-white no-underline text-sm hover:text-gold transition-colors duration-300">Help Center</a></li>
                </ul>
            </div>
        </div>
        
        <!-- Copyright Text -->
        <div class="relative z-10 text-center mt-2 pt-2 sm:pt-3 border-t border-white/10 text-xs sm:text-sm">
            <p class="text-sm">&copy; 2025 MSD Godspeed Exhibits - All Rights Reserved | <a href="terms.php" target="_blank" class="text-white no-underline hover:text-gold">Terms & Policies</a></p>
        </div>
    </footer>
    
    <a href="contact.php" class="fixed bottom-8 right-8 bg-gold text-white text-base py-3 px-5 rounded-full font-bold shadow-md transition-all duration-300 hover:bg-dark-gold hover:scale-110 flex items-center gap-2.5 z-50">Contact Us</a>
    
    <button id="backButton" class="fixed top-5 right-5 font-archivo-narrow py-3 px-4 bg-white bg-opacity-10 backdrop-blur text-white border-none rounded-lg cursor-pointer text-base flex items-center gap-2 transition-all duration-300 hover:bg-white hover:bg-opacity-20 hover:scale-105 shadow-md z-50">
        <span class="text-lg">&#8592;</span> <!-- Left arrow -->
    </button>

<script src="https://js.hcaptcha.com/1/api.js" async defer></script>
<script src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>

<script>
document.addEventListener("DOMContentLoaded", function () {
    emailjs.init("N4KnnXr5z0Hxj8y80"); // Your EmailJS User ID

    document.getElementById("contact-form").addEventListener("submit", function (event) {
        event.preventDefault();
        
        // Get form values
        const name = document.getElementById("name").value;
        const email = document.getElementById("email").value;
        const message = document.getElementById("message").value;
        
        // Get status message container
        const statusMessage = document.getElementById("status-message");
        
        // Validate inputs
        if (!name || !email || !message) {
            statusMessage.innerHTML = '<div class="bg-red-100 text-red-700 p-2.5 mb-4 rounded-md text-center font-archivo-narrow text-normal">Please fill all fields</div>';
            return;
        }

        // Get hCaptcha response token
        const hcaptchaResponse = hcaptcha.getResponse();
        
        // Validate hCaptcha
        if (!hcaptchaResponse) {
            statusMessage.innerHTML = '<div class="bg-red-100 text-red-700 p-2.5 mb-4 rounded-md text-center font-archivo-narrow text-normal">Please complete the captcha verification</div>';
            return;
        }

        // Create FormData for PHP submission
        const formData = new FormData();
        formData.append("name", name);
        formData.append("email", email);
        formData.append("message", message);
        formData.append("h-captcha-response", hcaptchaResponse);

        // Show loading message
        statusMessage.innerHTML = '<div class="bg-green-100 text-green-700 p-2.5 mb-4 rounded-md text-center font-archivo-narrow text-normal">Sending message...</div>';

        // Step 1: Save to Database via PHP
        fetch("php/insert.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.text())
        .then(data => {
            console.log("Database Response:", data);
            
            // Try to parse the response as JSON
            let jsonResponse;
            try {
                jsonResponse = JSON.parse(data);
            } catch (e) {
                // If parsing fails, show the raw response
                statusMessage.innerHTML = '<div class="bg-red-100 text-red-700 p-2.5 mb-4 rounded-md text-center font-archivo-narrow text-normal">Error processing response: ' + data + '</div>';
                console.error("Failed to parse response:", data);
                return;
            }
            
            // Check database operation status
            if (jsonResponse.status !== "success") {
                statusMessage.innerHTML = '<div class="bg-red-100 text-red-700 p-2.5 mb-4 rounded-md text-center font-archivo-narrow text-normal">' + jsonResponse.message + '</div>';
                return;
            }
            
            // Assign recipient email based on department selection
            let recipientEmail = "msd.winlove@gmail.com";
            
            // Step 2: Send Email via EmailJS
            emailjs.send("service_ci53h1f", "template_oaswiav", {
                to_email: recipientEmail,
                from_name: name,
                from_email: email,
                message: message
            }).then(
                function (response) {
                    console.log("Email Sent:", response);
                    statusMessage.innerHTML = '<div class="bg-green-100 text-green-700 p-2.5 mb-4 rounded-md text-center font-archivo-narrow text-normal">Message sent successfully!</div>';
                    
                    // Reset form and hCaptcha
                    document.getElementById("contact-form").reset();
                    hcaptcha.reset();
                },
                function (error) {
                    console.log("EmailJS Error:", error);
                    statusMessage.innerHTML = '<div class="bg-yellow-100 text-yellow-700 p-2.5 mb-4 rounded-md text-center font-archivo-narrow text-normal">Email delivery failed, but your message was saved.</div>';
                }
            );
        })
        .catch(error => {
            console.error("Database Error:", error);
            statusMessage.innerHTML = '<div class="bg-red-100 text-red-700 p-2.5 mb-4 rounded-md text-center font-archivo-narrow text-normal">Failed to save message. Please try again.</div>';
        });
    });
});
        
document.getElementById("backButton").addEventListener("click", function () {
    window.location.href = "index.php";
});
</script>        

</body>
</html>